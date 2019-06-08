<?php
require_once 'config.php';

class playCity {
    private static $started = false;
    private $_db,
            $max_score,
            $score = 0,
            $nick;
    public  $db_questions = array(),
            $question = array();
    

    public function __construct($nick) {
        $this->_db = DBB::getInstance();
        $this->nick = $nick;
    }//end construct

    public static function getObject() {
        if(!self::$started) {
            self::$started = new playCity();
        }
        return self::$started;
    }//end function


    public function getNick() {
        return $this->nick;
    }//end function

    public function getScore() {
        return $this->score*10;
    }//end function

}//end class

/* **************************
 * ALGORYTM
 * 
 * 1. sprawdzić czy toczy sie gra
 * 2. jesli toczy sie gra wylosować kolejne pytanie jeśli nie rozpocząć losowanei 
 * 3. sprawdzić odpoweidz i ustosunkować sie do niej 
 * 4. pokaż wynik lub wróć do puntk 2
 * ************************* */

?>