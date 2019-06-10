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

            $game = playCity::getObject(Session::get('nick'));
            echo $game->getNick() .'<br/>';
            echo 'Wynik: '. $game->getScore()*10 .'/'. $game->getMaxScore()*10 .'<br/><br/>';

            echo $game->getQuestion()->question .'<br/>';

            // echo var_dump($game->db_questions) .'<br/>-------------<br/>';

            echo var_dump($game->getQuestion()) .'<br/>';
            echo 'Liczba elementów w bazie pytań: '. count(Session::get('questions')) .'<br/>';

            echo $game->question->ID .'----<br/>';
            echo $game->db_questions[7]->ID .'===<br/>';
            for($i=0; $i<count($game->db_questions); $i++) {
                echo var_dump($game->question->ID===$game->db_questions[$i]->ID);
            }
            
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
                    
                    if($validation->passed()) {
                        // echo $game->question->answer .' '. Input::get('city') .' --';
                        // echo var_dump(strtolower($game->question->answer)===strtolower(Input::get('city')));
                        if($game->checkAnswer(Input::get('city'))) {
                            echo 'Gratulję';
                        }else{
                            echo 'Przykro mi. Koniec gry';
                        }
                    } else {
                        //error for validation form
                        foreach($validation->errors() as $error) {
                            echo $error .'<br/>';
                        }
                    }
                }
            }


            /*

                            if(trim(strtolower(Session::get('actual_question')->aznswer)) === trim(strtolower(Input::get('city')))) {
                                echo 'Gratulacje<hr/>';
                                $db->update('question_to_game', Session::get('actual_question')->ID, array('correct_ansewer' => (Session::get('actual_question')->correct_answer + 1)));
                                $score = Input::get('score') + 10;
                                 
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
                 
                    }
                }
            }
    
            if(!Session::exist('actual_question') && count(Session::get('actual_question'))!=0) {
                // random number question
                $no_question = rand(0, count(Session::get('questions'))-1);
                Session::put('score', count(Session::get('questions')));
                Session::put('actual_question', Session::get('questions')[$no_question]);
            }

            if(!Session::exist('questions')) {
                //question from database
                Session::put('questions', $db->get('question_to_game', array('ID', '>', 0))->results());
            }else {
                //question for user
                echo Session::get('actual_question')->question;
            }
            */
                     

        ?>

        <form method="POST">
            <input placeholder="Wpisz odpowiedź..." type="text" value="<?php echo $answer = (strlen($game->getQuestion()->answer)>0) ? $game->getQuestion()->answer : ''; ?>" name="city" required />
            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
            <input type="hidden" name="score" value="<?php echo $score ?>" />
            <input type="submit" value="Ustaw" />
        </form>

    </section>

    <footer></footer>

</BODY>
</HTML>