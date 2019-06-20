<?php
    require_once 'classes/config.php';

    if(Session::exist('nick')) {
        Session::delete('score');
        Session::delete('question');
        Session::delete('questions');
        Session::delete('id_question');
    } 

    header('Location: level.php');
    
?>