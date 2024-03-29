<?php 

    require_once 'classes/config.php';

    //session exist
    if (!Session::exist('nick')) {
        header('Location: index.php');
    }

?>
<!DOCTYPE HTML>
<HTML lang="pl">

    <?php require_once PATH_TO_HEAD; ?>

    <title>Wisielec</title>
    
</head>

<body>
    <div class="container" style="width:800px; margin-top:35px">
        <div class="head">
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
        <div class="container-fluid">
            <div class=""style="text-align:left">
                <?php
                include 'config_hangman.php';
                include 'functions_hangman.php';
                
                if (empty($_POST)) {
                    if (isset($_SESSION['answer'])) unset($_SESSION['answer']);
                }


                if (!isset($_SESSION['answer'])) {
                    
                    $_SESSION['attempts'] = 0;
                    $answer = fetchWordArray($WORDLISTFILE);
                    $_SESSION['answer'] = $answer;
                    $_SESSION['hidden'] = hidenCharacters($answer);
                    echo '<b>' . 'Pozostałe ruchy: ' . ($MAX_ATTEMPTS - $_SESSION['attempts']) . '</b>' . '<br>';
                
                } else {

                    if (isset($_POST['userInput'])) {
                        $userInput = $_POST['userInput'];
                        $_SESSION['hidden'] = checkAndReplace(strtolower($userInput), $_SESSION['hidden'], $_SESSION['answer']);
                        chceckGameOver($MAX_ATTEMPTS, $_SESSION['attempts'], $_SESSION['answer'], $_SESSION['hidden']);
                    }
                    
                    $_SESSION['attempts'] = $_SESSION['attempts'] + 1;
                    echo '<b>' . 'Pozostałe ruchy: ' . ($MAX_ATTEMPTS - $_SESSION['attempts']) . '</b>' . '<br>';
                }


                ?> 
            <div class="word">
                    <h3>
                        <?php
                        $hidden =Session::get('hidden');
                        foreach ($hidden as $char) echo '<b>' . $char . " " . '</b>';
                        ?>
                    </h3>
                </div>
            </div>

            <script type="application/javascript">
                function validateInput() {
                    var x = document.forms["inputForm"]["userInput"].value;
                    if (x == "" || x == "") {
                        alert("Prosze wprowadź słowo");
                        return false;
                    }
                    if (!isNaN(x)) {
                        alert("Prosze wprowadź słowo");
                        return false;
                    }
                }
            </script>
            
            <div class="formularz">
                <form name="inputForm" action="" method="post">
                    <div class="float-left">
                        Podaj literę: <input name="userInput" style=" border-radius: 5px; width:50px" type="text" size="1" maxlength="1">
                    </div>
                    <div class="float-left" style="text-align:left;">
                        <input type="submit" value="Sprawdź" class="btn btn-secondary" style="margin-left:10px;margin-right:10px" onclick="return validateInput();">
                    </div>
                </form>
            </div>
            <div>
                <a href="" class="btn btn-danger" style="text-align:right;">Spróbuj inne słowo</a>
            </div>
        </div>
    </div>

</body>

</html>