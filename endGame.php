<?php
require_once 'classes/config.php';

    if(Session::exist('nick')) {
        Session::delete('nick');
    } 

    header('Location: index.php');
    
?>