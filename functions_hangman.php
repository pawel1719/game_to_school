<?php
require_once 'classes/config.php';
function fetchWordArray($wordFile)
{
    $file = fopen($wordFile, 'r');
    if ($file) {
        $random_line = null;
        $line = null;
        $count = 0;
        while (($line = fgets($file)) != false) {
            $count++;
            if (rand() % $count == 0) {
                $random_line = trim($line);
            }
        }
        if (!feof($file)) {
            fclose($file);
            return null;
        } else {
            fclose($file);
        }
    }
    $answer = str_split_unicode($random_line);
    return $answer;
}

function str_split_unicode($str, $l = 0) {
    if ($l > 0) {
        $ret = array();
        $len = mb_strlen($str, "UTF-8");
        for ($i = 0; $i < $len; $i += $l) {
            $ret[] = mb_substr($str, $i, $l, "UTF-8");
        }
        return $ret;
    }
    return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
}

function hidenCharacters($answer)
{
    $noOfHiddenChars = floor((sizeof($answer)/2)+1);
    $count = 0;
    $hidden = $answer;
    while($count < $noOfHiddenChars)
    {
        $rand_element = rand(0,sizeof($answer)-2);
        if($hidden[$rand_element]!='_'){
            $hidden = str_replace($hidden[$rand_element],'_',$hidden,$replace_count);
            $count = $count + $replace_count;
        }
    }
    return $hidden;
}

function checkAndReplace($userInput, $hidden, $answer)
{
    $i=0;
    $wrongGuess = true;
    while($i<count($answer))
    {
        if($answer[$i]==$userInput)
        {
            $hidden[$i] = $userInput;
            $wrongGuess = false;
        }
        $i = $i +1;
    }
    if(!$wrongGuess) $_SESSION['attempts'] = $_SESSION['attempts']-1;
    return $hidden;
}

function chceckGameOver($MAX_ATTEMPTS, $userAttempts, $answer, $hidden)
{
    if($hidden==$answer)
    {
        echo '<h1>'.'Wygrałeś!'.'</h1>'; 
        echo "\n\r".'<h4>'.'<br>'.'Prawidłowe słowo to: '.'</h4>';
        
        foreach($answer as $letter)
        {
            echo $letter;
        }
        echo '<br><form action="hangman.php" method="POST">
        <input type="submit" class="btn btn-danger" name="newWord" value="Zagraj ponownie"></form><br>';
        if(isset($_POST['newWord']))
        {
            unset($_SESSION['hidden']);
        }
        Session::delete('hidden');
        die;
    }
    if($userAttempts >= $MAX_ATTEMPTS)  
    {
        echo '<h1>'.'Przegrałeś!'.'</h1>'; 
        echo '<h2>'.'Gra skończona!'.'</h2>'; 
        echo "\n\r".'<h4>'.'<br>'.'Słowo to: '.'</h4>';
        
        echo 'Gra skończona: Prawidłowe słowo to:  ';
        foreach($answer as $letter)
        {
            echo $letter;
        }
        echo '<br><form action="hangman.php" method="POST">
        <input type="submit" name="newWord" class="btn btn-danger" value="Zagraj ponownie"></form><br>';
        if(isset($_POST['newWord']))
        {
            unset($_SESSION['hidden']);
        }
        Session::delete('hidden');
        die;
    }

}
?>