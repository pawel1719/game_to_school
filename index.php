<?php
    require_once 'classes/config.php';

    if(Session::exist('nick')) {
        header('Location: level.php');
    }
?>
<!DOCTYPE HTML>
<HTML lang="pl">
<HEAD>
    
    <?php require_once PATH_TO_HEAD; ?>
    
    <title>Projekt - GRA</title>

</HEAD>
<BODY>

    <header>GRA - zdadnij państwo lub stolicę</header>

    <section>

        <?php

            if(Input::exists()) {
                if(Token::check(Input::get('token'))) {
                    $validate = new Validate();
                    $validation = $validate->check($_POST, array(
                        'nick' => array(
                            'min' => 6,
                            'max' => 25,
                            'letter_or_number' => true
                        )
                    ));

                    if($validation->passed()) {
                        //success for validation
                        Session::put('nick', Input::get('nick'));
                        header('Location: level.php');
                    }else{
                        //error for validation
                        foreach($validation->errors() as $error) {
                            echo $error .'<br/>';
                        }
                    }
                }
            }

        ?>

        <form method="POST">
            <input placeholder="Nick" type="text" name="nick" required />
            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
            <input type="submit" value="Ustaw" />
        </form>

    </section>

    <footer></footer>

</BODY>
</HTML>