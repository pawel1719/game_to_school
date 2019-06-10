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

</HEAD>

<BODY>

    <div class="head">
        <h2><b>GRA - wybierz grę</b></h2>
    </div>
    <div class="content">
        <section>

            <a href="hangman.php" alt="wisielec"><button>Zagraj w wisielca</button></a>
            <a href="level.php" alt="Zagraj w zgadywanke stolic"><button>Zagraj w zgadywanke stolic</button></a>
            <a href="hardWay.php" alt="Zagraj w tor przeszkód"><button>Zagraj w tor przeszkód</button></a>


        </section>
    </div>
    <footer></footer>
    <script src="discriptions/js/bootstrap.min.js"></script>

</BODY>

</HTML>