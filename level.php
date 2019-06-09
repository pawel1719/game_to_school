<?php
require_once 'classes/config.php';

//session exist
if (!Session::exist('nick')) {
    header('Location: index.php');
}

?>
<!DOCTYPE HTML>
<HTML lang="pl">

<HEAD>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require_once PATH_TO_HEAD; ?>

    <title>Wybór poziomu - GRA</title>
    <!-- Bootstrap core CSS -->
    <link href="discriptions/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">

</HEAD>

<BODY>
    <div class="head2">
        <header><?php echo '<b>' . Session::get('nick') . '</b>'; ?> ,wybierz poziom trudności</header>
    </div>
    <div class="content">

        <section>

            <a href="easyLevelForGame.php"><button class="btn btn-success ">Łatwy</button></a>
            <a href="hardLevelForGame.php"><button class="btn btn-danger ">Trudny</button></a>
        </section>
    </div>

    <hr /><a href="endGame.php"><button class="btn btn-info ">Wyjdź z gry</button></a>

    <footer></footer>

</BODY>

</HTML>