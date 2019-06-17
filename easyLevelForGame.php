<?php
require_once 'classes/config.php';
?>
<!DOCTYPE HTML>
<HTML lang="pl">

<HEAD>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Projekt - GRA</title>

    <!-- Bootstrap core CSS -->
    <link href="discriptions/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">

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
    </div>
    <div class="content" style="width:800px; margin-top:35px; margin-left:auto; margin-right:auto;">
        <h5>Dopasuj poprawną odpowiedź</h5>

        <form metod="POST">
            <p>Dopasuj stolicę do Państwa:</p>
            <div class="btn-group" role="group1" aria-label="Basic example">
                <label class="btn btn-secondary ">
                    <input type="radio" name="options" id="captio1" value="" autocomplete="off"> Stolica 1
                </label>
                <label class="btn btn-secondary">
                    <input type="radio" name="options" id="captio2" value="" autocomplete="off"> Stolica 2
                </label>
                <label class="btn btn-secondary">
                    <input type="radio" name="options" id="captio3" value="" autocomplete="off"> Stolica 3
                </label>
                <label class="btn btn-secondary">
                    <input type="radio" name="options" id="captio4" value="" autocomplete="off"> Stolica 4
                </label>
            </div>
            <br>
            <p>Dopasuj Państwo do stolicy:</p>
            <div class="btn-group" role="group2" aria-label="Basic example">
                <label class="btn btn-secondary ">
                    <input type="button" name="options" id="country1" value="" autocomplete="off"> Państwo 1
                </label>
                <label class="btn btn-secondary">
                    <input type="button" name="options" id="country2" value="" autocomplete="off"> Państwo 2
                </label>
                <label class="btn btn-secondary">
                    <input type="button" name="options" id="country3" value="" autocomplete="off"> Państwo 3
                </label>
                <label class="btn btn-secondary">
                    <input type="button" name="options" id="country4" value="" autocomplete="off"> Państwo 4
                </label>
            </div>
            <div>
                <input type="submit" value="Zapisz" class="btn btn-info " />
            </div>
        </form>


    </div>


    <footer></footer>

</BODY>

</HTML>