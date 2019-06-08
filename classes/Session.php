<?php
    session_start();

class Session {

    public static function exist($name) {
        return (isset($_SESSION[$name]) ? true : false);
    }// end function

    public static function put($name, $value) {
        return $_SESSION[$name] = $value;
    }// end function

    public static function get($name) {
        return $_SESSION[$name];
    }// end function

    public static function delete($name) {
        if(self::exist($name)) {
            unset($_SESSION[$name]);
        }
    }//end function

    public static function flash($name, $string = '') {
        if(self::exist($name)) {
            $session = self::get($name);
            self::delete($name);

            return $session;
        }else{
            self::put($name, $string);
        }
    }// end function

}//end class

?>