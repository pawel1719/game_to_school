<?php
require_once 'classes/config.php';

if (!Session::exist('nick')) {
    header('Location: index.php');
}
?>
<!DOCTYPE HTML>
<HTML lang="pl">

<HEAD>

    <?php require_once PATH_TO_HEAD; ?>

    <title>Projekt - GRA</title>

    <style>
        img {
            height: 240px;
            width: 320px;
        }
    </style>

</HEAD>

<BODY>

    <div class="head">
        <h2><b>GRY: <u><?php echo Session::get('nick'); ?></u> wybierz grę!</b></h2>
    </div>
    
    <br/><hr /><br/>
    
    <div class="content">

    <div class="row">

        <div class="col-md-4">
            <div class="card text-white bg-secondary text-center">
            <h2 class="card-header">
                <a href="hangman.php" style="color: white;">Wisielca</a>
            </h2>
            <div class="card-block">
                <a href="hangman.php"><img src="include\screen\wisielec1.png" alt="Placeholder" class="rounded"></a>
                    <br/>
                    <hr/>
                <a href="hangman.php" alt="wisielec" class="btn btn-light btn-link">Zagraj</a>
            </div>
            <div class="card-footer text-muted">
                <a href="resultUsers.php" alt="Pokaż wyniki" class="btn btn-dark btn-link">Wyniki</a>
            </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card text-white bg-secondary text-center">
            <h2 class="card-header">
                <a href="level.php" style="color: white;">Zgadywanka stolic</a>
            </h2>
            <div class="card-block">
                <a href="level.php"><img src="include\screen\panstwo1.png" alt="Placeholder" class="rounded"></a>
                    <hr/>                
                <a href="level.php" alt="Zagraj w zgadywanke stolic" class="btn btn-light btn-link">Zagraj</a>
            </div>
            <div class="card-footer text-muted">
                <a href="resultUsers.php" alt="Pokaż wyniki" class="btn btn-dark btn-link">Wyniki</a>
            </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-secondary text-center">
            <h2 class="card-header">
                <a href="hardWay.php" style="color: white;">Tor przeszkód</a>
            </h2>
            <div class="card-block">
                <a href="hardWay.php"><img src="include\screen\way1.png" alt="Placeholder" class="rounded"></a>
                    <br/>
                    <hr/>
                <a href="hardWay.php" alt="Zagraj w tor przeszkód" class="btn btn-light btn-link">Zagraj</a>
            </div>
            <div class="card-footer text-muted">
                <a href="resultUsers.php" alt="Pokaż wyniki" class="btn btn-dark btn-link">Wyniki</a>
            </div>
            </div>
        </div>

    </div>

    <br/>
    <hr />
    <br/>
    <br/>
    <br/>
    <br/>

    <div class="text-center">
        <a href="endGame.php" alt="koniec gry"><button class="bnt btn-primary btn-lg" >WYJDŹ</button></a>
    </div>

 

    </div>
    <footer></footer>
    <script src="discriptions/js/bootstrap.min.js"></script>

</BODY>

</HTML>