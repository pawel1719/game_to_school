<?php

    spl_autoload_register(function($class_name) {
        if(file_exists('classes/'. $class_name .'.php')) {
            require_once('classes/'. $class_name .'.php');
        }
    });


define('PATH_TO_HEAD', 'include/inc.head.html');

?>