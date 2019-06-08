<?php
require_once 'Session.php';

class Token {
    
    public static function generate() {
        $value = md5(uniqid());

        return Session::put('token', $value);
    }//end function

    public static function check($token) {
        $tokenName = 'token';

        if(Session::exist($tokenName) && $token===Session::get($tokenName)) {
            Session::delete($tokenName);
            return true;
        } else {
            return false;
        }
    }//end function check

}//end class

?>