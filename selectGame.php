<?php
require_once 'classes/config.php';

if (!Session::exist('nick')) {
    header('Location: index.php');
}
?>
<!DOCTYPE HTML>
<HTML lang="pl">

<HEAD>
    <!-- Bootstrap core CSS -->
    <link href="discriptions/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">

    <?php require_once PATH_TO_HEAD; ?>

    <title>Projekt - GRA</title>


</HEAD>

<BODY>

    <div class="head">
        <h2><b>GRY: <u><?php echo Session::get('nick'); ?></u> wybierz grę!</b></h2>
    </div>
    <div class="container">

        <div class="container-fluid">
            <hr>
            </hr>
            <div class="float-left">
                <div class="card text-white bg-secondary text-center">
                    <h2 class="title">
                        <a href="hangman.php" style="color: white;">Wisielca</a>
                    </h2>
                    <div class="imgGame">
                        <a href="hangman.php"><img src="include\screen\wisielec1.png" alt="Placeholder"
                                class="rounded"></a>
                    </div>
                    <div class="button-game">
                        <a href="hangman.php" alt="wisielec" class="btn btn-light btn-link">Zagraj</a>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="resultUsers.php" alt="Pokaż wyniki" class="btn btn-dark btn-link">Wyniki</a>
                    </div>
                </div>
            </div>

            <div class="float-left">
                <div class="card text-white bg-secondary text-center">
                    <h2 class="title">
                        <a href="level.php" style="color: white;">Zgadywanka stolic</a>
                    </h2>
                    <div class="imgGame">
                        <a href="level.php"><img src="include\screen\panstwo1.jpeg" alt="Placeholder"
                                class="rounded"></a>
                    </div>
                    <div class="button-game">
                        <a href="level.php" alt="Zagraj w zgadywanke stolic" class="btn btn-light btn-link">Zagraj</a>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="resultUsers.php" alt="Pokaż wyniki" class="btn btn-dark btn-link">Wyniki</a>
                    </div>
                </div>
            </div>

            <div class="float-left">
                <div class="card text-white bg-secondary text-center">
                    <h2 class="title">
                        <a href="hardWay.php" style="color: white;">Tor przeszkód</a>
                    </h2>
                    <div class="imgGame">
                        <a href="hardWay.php"><img src="include\screen\way1.png" alt="Placeholder" class="rounded"></a>
                    </div>
                    <div class="button-game">
                        <a href="hardWay.php" alt="Zagraj w tor przeszkód" class="btn btn-light btn-link">Zagraj</a>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="resultUsers.php" alt="Pokaż wyniki" class="btn btn-dark btn-link">Wyniki</a>
                    </div>
                </div>
            </div>
            <div class="buttonExit">
                <a href="endGame.php" alt="koniec gry"><button class="bnt btn-primary btn-lg">WYJDŹ</button></a>
            </div>
        </div>
    </div>
    <footer>

        <?php require_once PATH_TO_FOOTER; ?>

    </footer>
    <script src="discriptions/js/bootstrap.min.js"></script>

</BODY>

</HTML>