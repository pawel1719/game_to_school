<?php session_start(); ?>
<html>

<head>
    <title>Wisielec</title>
</head>

<body>
    <?php
    include 'config_hangman.php';
    include 'functions_hangman.php';
    if (empty($_POST)){
        
    }
    // if (isset($_SESSION['answer'])) unset($_SESSION['answer']);
    if (!isset($_SESSION['answer'])) {
        $_SESSION['attempts'] = 0;
        $answer = fetchWordArray($WORDLISTFILE);
        $_SESSION['answer'] = $answer;
        $_SESSION['hidden'] = hidenCharacters($answer);
        echo 'Pozostałe ruchy: ' . ($MAX_ATTEMPTS - $_SESSION['attempts']) . '<br>';
    } else {
        if (isset($_POST['userInput'])) {
            $userInput = $_POST['userInput'];
            $_SESSION['hidden'] = checkAndReplace(strtolower($userInput), $_SESSION['hidden'], $_SESSION['answer']);
            chceckGameOver($MAX_ATTEMPTS, $_SESSION['attempts'], $_SESSION['answer'], $_SESSION['hidden']);
        }
        $_SESSION['attempts'] = $_SESSION['attempts'] + 1;
        echo 'Pozostałe ruchy: ' . ($MAX_ATTEMPTS - $_SESSION['attempts']) . '<br>';
    }
    $hidden = $_SESSION['hidden'];
    foreach ($hidden as $char) echo $char . "";
    ?>

    <script type="application/javascript">
        function validateInput() {
            var x = document.forms["inputForm"]["userInput"].value;
            if (x == "" || x == ""){
                alert ("Please enter a character");
                return false;
            }
            if(!isNaN(x)){
                alert("Please enter a character");
                return false;
            }
        }
    </script>

    <form name="inputForm" action="" method="post">
        Your Guess: <input name="userInput" type="text" size="1" maxlength="1">
        <input type="submit" value="Check" onclick="return validateInput();">
        <input type="submit" value="Try Another Word" name="newWord">
    </form>

</body>

</html>