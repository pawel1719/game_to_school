<?php

class Input {

    public static function exists($type = 'POST') {
        switch($type) 
        {
            case 'POST' : 
                return (!empty($_POST)) ? true : false;
            break;
            case 'GET':
                return (!empty($_GET)) ? true : false;
            break;
            default:
                return false;
            break;
        }
    }//end function

    public static function get($item) {
        if(isset($_POST[$item])) {
            return $_POST[$item];        
        } else if(isset($_POST[$item])) {
            return $_POST[$item];    
        }

        return '';
    }//end function

    public static function set($name, $value, $type = 'GET') {
        switch($type) 
        {
            case 'POST' : 
                return $_POST[$name] = $value;
            break;
            case 'GET' : 
                return $_GET[$name] = $value;
            break;
            default:
                return 'Error 404';
            break;
        }
    }//end function

    public static function destroy($name) {
        if(isset($_POST[$name])) {
            unset($_POST[$name]);
            return true;
        } else if(isset($_GET[$name])) {
            unset($_GET[$name]);
            return true;
        }

        return false;
    }//end function 

}//end class

?>