<?php
    require_once 'classes/config.php';

    //session exist
    if (!Session::exist('nick')) {
        header('Location: index.php');
    }

    $game = playCity::getObject(Session::get('nick'));

?>
<!DOCTYPE HTML>
<HTML lang="pl">
<HEAD>

    <?php require_once PATH_TO_HEAD; ?>

    <title>Projekt - GRA</title>

</HEAD>
<BODY>
    <div class="head" style="width:800px; margin-top:35px; margin-left:auto; margin-right:auto;">
        <div class="float-left">
            <h2><b>GRA - Wisielec</b></h2>
        </div>
        <div class="" style="text-align:right">
            <a href="selectGame.php"><button class="btn btn-info">Powrót</button></a>
            <div>
                <br><hr>    
            </div>
    </div>
    <div class="card" style="width:800px; margin-top:35px; margin-left:auto; margin-right:auto; text-align: left; ">
        <div class="card-body">
            <h6 class="card-title">
                <?php

                echo '<div class="col">Wynik: ' . ($game->getScore() * 10) . '/' . $game->getMaxScore() * 10;
                echo '</div><div class="col">Liczba pozostałych pytań: ' . count(Session::get('questions'));
                echo '<hr/>';

                //ACTION FOR FORM
                if (Input::exists()) {
                    if (Token::check(Input::get('token'))) {
                        $validate = new Validate();
                        $validation = $validate->check($_POST, array(
                            'city' => array(
                                'required' => true,
                                'min' => 2,
                                'max' => 35,
                                'isLetter' => true
                            )
                        ));

                        if ($validation->passed()) {
                            // echo $game->question->answer .' '. Input::get('city') .' --';
                            // echo var_dump(strtolower($game->question->answer)===strtolower(Input::get('city')));
                            if ($game->checkAnswer(Input::get('city'))) {
                                echo '<div class="alert alert-success" role="alert">Brawo! Poprawna odpowiedź.</div>';
                            } else {
                                header('Location: level.php');
                            }
                        } else {
                            echo '<div class="alert alert-danger" role="alert">';
                            //error for validation form
                            foreach ($validation->errors() as $error) {
                                echo $error . '<br/>';
                            }
                            echo '</div>';
                        }
                    }
                }

                ?>
        </div>
        </h6>
        <h5 class="card-title"><?php echo $game->getQuestion()->question; ?></h5>
        <p class="card-text">
            <form method="POST">
                <input placeholder="Wpisz odpowiedź..." type="text" style="width: 200px;" class="form-control" value="<?php //echo $answer = (strlen($game->getQuestion()->answer) > 0) ? $game->getQuestion()->answer : ''; ?>" name="city" required /><br />
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
                <input type="hidden" name="score" value="<?php echo $score ?>" />
                <input type="submit" value="Sprawdź" class="btn btn-primary" />
            </form>
        </p>
    </div>

    <footer></footer>

</BODY>

</HTML>