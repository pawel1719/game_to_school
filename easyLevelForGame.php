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

    <!-- Bootstrap core CSS -->
    <link href="discriptions/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">

</HEAD>

<BODY>
    <div class="container">
        <div class="container-fluid">
            <div class="head">
                <div class="float-left">
                    <h2><b>GRA - Wisielec</b></h2>
                </div>
                <div class="" style="text-align:right">
                    <a href="endCityGame.php"><button class="btn btn-info">Powrót</button></a>
                    <div>
                        <br>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="content">
            <?php

                echo '<div class="col">Wynik: ' . ($game->getScore() * 10) . '/' . $game->getMaxScore() * 10;
                echo '</div><div class="col">Liczba pozostałych pytań: ' . count(Session::get('questions'));
                echo '<hr/>';
                

                //ACTION FOR FORM
                if (Input::exists()) {
                    if (Token::check(Input::get('token'))) {

                        if ($game->checkAnswer(Input::get('city'), 4)) {
                            if(count(Session::get('questions'))==0) {
                                $game->addScoreToDB(4);
                                
                                Session::flash('end_game_city', 'GRATULACJE! <br/> Twój wynik to '. Session::get('score')*10);
                                Session::delete('score');
                                Session::delete('question');
                                Session::delete('questions');
                                Session::delete('id_question');

                                header('Location: endCityGame.php');
                            }
                            echo '<div class="alert alert-success" role="alert">Brawo! Poprawna odpowiedź.</div>';

                        } else {
                            
                            $game->addScoreToDB(4);
                            header('Location: endCityGame.php');
                        }
                         
                    }
                }

                // echo var_dump($game->getQuestion());
                // echo var_dump($game->getQuestion()) .'<br/>----<br/>';

                $index_array = $game->randIndex();
                $answer[0] = $game->getQuestion()->answer; 
                $answer[1] = $game->getQuestion()->answer1; 
                $answer[2] = $game->getQuestion()->answer2; 
                $answer[3] = $game->getQuestion()->answer3; 

            ?>

                <form method="POST">
                    <p><?php echo $game->getQuestion()->question; ?></p>
                    <div class="btn-group" role="group1" aria-label="Basic example">
                        <label class="btn btn-secondary ">
                            <input type="radio" name="city" id="captio1" value="<?php echo $answer[$index_array[0]]; ?>" autocomplete="off"> <?php echo $answer[$index_array[0]]; ?>
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" name="city" id="captio2" value="<?php echo $answer[$index_array[1]]; ?>" autocomplete="off"> <?php echo $answer[$index_array[1]]; ?>
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" name="city" id="captio3" value="<?php echo $answer[$index_array[2]]; ?>" autocomplete="off"> <?php echo $answer[$index_array[2]]; ?>
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" name="city" id="captio4" value="<?php echo $answer[$index_array[3]]; ?>" autocomplete="off"> <?php echo $answer[$index_array[3]]; ?>
                        </label>
                        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
                        <input type="hidden" name="score" value="<?php echo $score; ?>" />
                    </div>
                    <div>
                        <input type="submit" value="Zapisz" class="btn btn-info " />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <?php
            // echo var_dump($game->db_questions);
            // echo var_dump(Session::get('questions')) .'<br/>----<br/>';
        ?>
    </footer>

</BODY>

</HTML>