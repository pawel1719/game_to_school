<?php
require_once 'config.php';

class playCity {
    private static $started = false;
    private $_db,
            $nick,
            $table_name = 'question_to_game';
    public  $db_questions = array(),
            $question = array(),
            $score = 0,
            $max_score;
    

    public function __construct($nick = '') {
        $this->_db = DBB::getInstance();
        $this->nick = $nick;
        $this->getQuestions();
        $this->getQuestion();
        $ses = Session::exist('score') ? Session::get('score') : $this->score;
        $this->setScore($ses);
    }//end construct

    public static function getObject($nick) {
        if(!self::$started) {
            self::$started = new playCity($nick);
        }
        return self::$started;
    }//end function

    public function getQuestions() {
        if(Session::exist('questions')) {
            $this->db_questions = Session::get('questions');
            $this->max_score = $this->_db->query('SELECT COUNT(*) no FROM '. $this->table_name)->first();
            // echo var_dump(Session::get('questions'));
        }else{
            $this->db_questions = $this->_db->get($this->table_name, array('ID', '>', 0))->results();
            Session::put('questions', $this->db_questions);
            $this->max_score = $this->_db->query('SELECT COUNT(*) no FROM '. $this->table_name)->first();
        }
    }//end function

    public function getQuestion() {
        if(Session::exist('id_question') && strlen(Session::get('id_question'))>0) {
            //case when was rand the question
            foreach($this->db_questions as $question) {
                if($question->ID === Session::get('id_question')) {
                    $this->question = $question;
                    break;
                }
            }
        }else{
            //generate new question
            $no = rand(0, count($this->db_questions)-1);
            // $no = ($no>1) ? $no : 1;
            $this->question = $this->db_questions[$no];
            Session::put('id_question', $this->question->ID);
        }

        return $this->question;
    }//end function

    public function checkAnswer($answer) {
        // echo var_dump($this->question);
        // echo var_dump($this->db_questions);
        if(strtolower($this->question->answer)===strtolower($answer) && strlen($answer)>0) {
            
            $this->counterCorrectAnswer($this->question->ID);
            $this->addScore(1);
            $this->deleteQuestion();

            Session::put('score', $this->getScore());
            Session::put('questions', $this->db_questions);
            Session::delete('question');
            Session::delete('id_question');

            return true;
        }else{
            $this->counterWrongAnswer($this->question->ID);
            $this->addScoreToDB();
            Session::flash('end_game_city', 'KONIEC GRY!  <br/> Twój wynik to '. $this->score*10 .' <br/> Spróbuj jeszcze raz');

            Session::delete('score');
            Session::delete('question');
            Session::delete('questions');
            Session::delete('id_question');

            return false;
        }
    }//end function

    public function addScoreToDB() {
        $exist = $this->_db->get('user_ranking', array('nick', '=', $this->nick));
        $biggest = false;
        // echo var_dump($exist);

        foreach($exist->results() as $array) {
            if(Session::get('score') > $array->score) {
                $biggest = true;
            }
        }

        if($biggest==true || $exist->count()==0) {
            //set hidden as 1 when row exist
            if($exist->count() > 0) {
                foreach($exist->results() as $row) {
                    $this->_db->update('user_ranking',$row->ID, array('hidden' => 1));
                }      
            }
            //add score to db
            $this->_db->insert('user_ranking', array(
                'nick'      => $this->nick,
                'score'     => $this->getScore()*10,
                'hidden'    => 0,
                'id_type'   => 1,
                'date'      => date('Y-m-d H:i:s')
            ));
        }
    }//end function

    private function deleteQuestion() {
        $array = array();
        $j = 0;

        for($i=0; $i<count($this->db_questions); $i++, $j++) {
            if($this->db_questions[$i]->ID===$this->question->ID) {
                $j--;
                continue;
            }
            $array[$j] = $this->db_questions[$i];
        }

        $this->setDbQuestion($array);
        unset($array);
    }//end function

    public function randIndex($string_numer = '0123') {
        $result = array();
                
        for($i=0; $i<4; $i++) {
            $index          = rand(0, strlen($string_numer)-1);
            $result[$i]     = $string_numer[$index];
            $string_numer   = str_replace($string_numer[$index], '', $string_numer);
        }
        
        return $result;
    }//end function

    private function counterCorrectAnswer($id) {
        $this->_db->update($this->table_name, $id, array('correct_ansewer' => ($this->question->correct_answer + 1)));
    }//end function

    private function counterWrongAnswer($id) {
        $this->_db->update($this->table_name, $id, array('wrong_answer' => ($this->question->wrong_answer + 1)));
    }//end function

    public function addScore($addPoints) {
        $this->setScore($this->getScore() + $addPoints);
    }//end function

    public function setNick($nick) {
        $this->nick = $nick;
    }//end function

    private function setDbQuestion($questions) {
        $this->db_questions = $questions;
    }//end function

    public function setScore($score) {
        $this->score = $score;
    }//end function

    public function getNick() {
        return $this->nick;
    }//end function

    public function getScore() {
        return $this->score;
    }//end function

    public function getMaxScore() {
        return $this->max_score->no;
    }//end function

}//end class

?>