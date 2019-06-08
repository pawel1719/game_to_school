<?php
    require_once 'classes/config.php';

    //session exist
    if(!Session::exist('nick')) {
        header('Location: index.php');
    }

?>
<!DOCTYPE HTML>
<HTML lang="pl">
<HEAD>
    
    <?php require_once PATH_TO_HEAD; ?>

    <title>Wybór poziomu - GRA</title>

</HEAD>
<BODY>

    <header><?php echo '<b>'. Session::get('nick') .'</b>'; ?> ,wybierz poziom trudności</header>

    <section>
        
        <a href="easyLevelForGame.php"><button>Łatwy</button></a>
        <a href="hardLevelForGame.php"><button>Trudny</button></a>

        <br/><br/><hr/>

        <a href="endGame.php"><button>Wyjdź z gry</button></a>

    </section>

    <footer></footer>

</BODY>
</HTML>