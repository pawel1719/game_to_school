<?php
require_once 'DBB.php';
require_once 'Sanitize.php';

class Validate {
    private $_passed = false,
            $_errors = array(),
            $_db = null;
    
    
    public function __construct() {
        $this->_db = DBB::getInstance();
    }//end construct

    public function check($source, $items = array()) {
        foreach($items as $item => $rules) {
            foreach($rules as $rule => $rule_value) {

                empty($source[$item]) ? $value = '' : $value = trim($source[$item]);
                $item = Sanitize::escape($item);

                if($rule==='required' && empty($value)) {
                    
                    $this->addError("{$item} is required!");

                }else if(!empty($value)) {
                    switch($rule)
                    {
                        case 'min' :
                            //chacking minimum case of variables
                            if(strlen($value)<$rule_value) {
                                $this->addError("{$item} musi posiadać minimum {$rule_value} znaków!");
                            }
                        break;
                        case 'max' : 
                            //checker maximum case on variables
                            if(strlen($value)>$rule_value) {
                                $this->addError("{$item} nie może posiadać więcej niż {$rule_value} znaków!");
                            }
                        break;
                        case 'isNumeric' :
                            // validation that cases are numbers
                            if(is_numeric($value)!=$rule_value) {
                                $this->addError("{$item} musi być liczbą!");
                            }
                        break;
                        case 'isLetters' :
                            // validation that case are letters
                            if(preg_match("/^([A-Za-ząćęłńóśźżĄĆĘŁŃÓŚŹŻ\s]{2,})$/", $value)!=$rule_value) {
								$this->addError("{$item} musi być literą!");
							}
                        break;
                        case 'letter_or_number' :
                            // validation that case are letters
                            if(preg_match("/^([A-Za-z0-9_]{2,})$/", $value)!=$rule_value) {
								$this->addError("{$item} musi być literą lub liczbą!");
							}
                        break;
                    }
                }//end if
            }
        }

        if(empty($this->_errors)) {
            $this->_passed = true;
        }

        return $this;
    }//end function

    public function addError($error) {
        $this->_errors[] = $error;
    }//end function

    public function errors() {
        return $this->_errors;
    }//end function

    public function passed() {
        return $this->_passed;
    }//end function

}//end class

?>