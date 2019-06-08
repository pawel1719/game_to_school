<?php
    require_once 'classes/config.php';
?>
<!DOCTYPE HTML>
<HTML lang="pl">
<HEAD>
    
    <?php require_once PATH_TO_HEAD; ?>
    
    <title>Projekt - GRA</title>

</HEAD>
<BODY>

    <header>GRA - zdadnij stolicę</header>

    <section>

        <?php

            $db = DBB::getInstance();
            $score = Input::exists('score') ? Input::get('score') + 10 : 0;
            

            //ACTION FOR FORM
            if(Input::exists()) {
                if(Token::check(Input::get('token'))) {
                    $validate = new Validate();
                    $validation = $validate->check($_POST, array(
                        'city' => array(
                            'required' => true,
                            'min' => 2,
                            'max' => 35,
                            'isLetter' => true
                        )
                    ));

                    if($validation->passed() && count(Session::get('questions')!=0)) {

                            if(trim(strtolower(Session::get('actual_question')->annswer)) === trim(strtolower(Input::get('city')))) {
                                echo 'Gratulacje<hr/>';
                                $db->update('question_to_game', Session::get('actual_question')->ID, array('correct_ansewer' => (Session::get('actual_question')->correct_ansewer + 1)));
                                $score = Input::get('score') + 10;
        
                                $data = array();
                                $z = 0;
                                
                                //deleting actual question from question base
                                for($i=0; $i<(count(Session::get('questions'))); $i++, $z++) {
                                    
                                    if(Session::get('questions')[$i]->ID === Session::get('actual_question')->ID) {
                                        $z--;
                                        continue;
                                    }
                                    $data[$z] = Session::get('questions')[$i];

                                }
                                // print_r($data);
                                // echo '<br/>-----------------------------<br/>';
                                // echo var_dump(Session::get('questions'));
                                // foreach(Session::get('questions') as $q){
                                //     echo $q->ID .'<br/>';
                                // }
                                // echo '----------';
                                // echo Session::get('actual_question')->ID;

                                // clear memory
                                Session::put('questions', $data);
                                Session::delete('actual_question');
                                unset($data);
                                unset($z);

                            } else {
                                echo 'No niestety<hr/>';
                                $db->update('question_to_game', Session::get('actual_question')->ID, array('wrong_answer' => (Session::get('actual_question')->wrong_answer + 1)));
                                Session::delete('questions');
                                Session::delete('score');
                            }
                    }else{
                        //error for validation form
                        foreach($validation->errors() as $error) {
                            echo $error .'<br/>';
                        }
                    }
                }
            }
    
            if(!Session::exist('actual_question') && count(Session::get('actual_question'))!=0) {
                // random number question
                $no_question = rand(0, count(Session::get('questions'))-1);
                Session::put('score', count(Session::get('questions')));
                Session::put('actual_question', Session::get('questions')[$no_question]);
            }

            //show score user
            if(Session::exist('score')) {
                echo '<h3>Liczba punktów: '. $score .'</h3>';
            }

            if(!Session::exist('questions')) {
                //question from database
                Session::put('questions', $db->get('question_to_game', array('ID', '>', 0))->results());
            }else {
                //question for user
                echo Session::get('actual_question')->question;
            }

                     

        ?>

        <form method="POST">
            <input placeholder="Wpisz odpowiedź..." type="text" value="<?php echo Session::exist('actual_question') ? Session::get('actual_question')->annswer : ''; ?>" name="city" required />
            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
            <input type="hidden" name="score" value="<?php echo $score ?>" />
            <input type="submit" value="Ustaw" />
        </form>

    </section>

    <footer></footer>

</BODY>
</HTML>