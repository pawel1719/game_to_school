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

    <?php require_once PATH_TO_HEAD; ?>

    <style>
        .bb {
            margin-left: auto;
            margin-right: auto;
            width: 30%;
            padding: 25px;
        }
    </style>

    <title>Wybór poziomu - GRA</title>

</HEAD>

<BODY>
    <div class="content text-center border rounded border-warning bb">
    
        <div class="head2 h3">
            <?php echo '<b>' . Session::get('nick') . '</b>'; ?> ,wybierz poziom trudności
        </div>

            <?php 

                if(Session::exist('end_game_city')) {
                    echo '<div class="alert alert-warning" role="alert">'. Session::flash('end_game_city') .'</div>'; 
                }
                
            ?>

        <hr class="border-warning" /><br/>

        <section>

            <a href="easyLevelForGame.php"><button class="btn btn-success ">Łatwy</button></a>
            <a href="hardLevelForGame.php"><button class="btn btn-danger ">Trudny</button></a>
        </section>
        
        <hr class="border-warning" />
        
        <a href="selectGame.php"><button class="btn btn-info ">Wyjdź z gry</button></a>
    </div>

    <footer></footer>

</BODY>

</HTML>