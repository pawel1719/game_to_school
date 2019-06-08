<?php

class DBB {
    private static $_instance = null;
    private $__host = 'localhost',
            $__name_db = 'gra',
            $__post_conection = '3307',
            $__encoding = 'UTF8',
            $__user = 'root',
            $__password = 'usbw';
    private $_pdo,
            $_query,
            $_error = false,
            $_results,
            $_count = 0;
   

    public function __construct() {
        try {
            $this->_pdo = new PDO('mysql:host='. $this->__host .';dbname='. $this->__name_db .';port='. $this->__post_conection .';charset='. $this->__encoding, $this->__user, $this->__password );
        }catch(PDOException $e) {
            die('Error conncetion '. $e->getMessage());
        }
    }//end construct

    public static function getInstance() {
        if(!isset(self::$_instance)) {
            self::$_instance = new DBB();
        }
        return self::$_instance;
    }//end getInstance
    
    public function query($sql, $params = array()) {
        $this->_error = false;
        if($this->_query = $this->_pdo->prepare($sql)) {
            $x = 1;
            if(count($params)) {
                foreach($params as $parm) {
                    $this->_query->bindValue($x, $parm);
                    $x++;
                }
            }

            if($this->_query->execute()) {
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
            } else {
                $this->_error = true;
            }
        }

        return $this;
    }//end function

    public function action($action, $table, $where = array()) {
        if(count($where)===3) {
            $operators = array('=', '<', '>', '>=', '<=', '!=', '<>');

            //fields inside query
            $field      = $where[0];
            $operator   = $where[1];
            $value      = $where[2];

            if(in_array($operator, $operators)) {
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";

                //query on database
                if(!$this->query($sql, array($value))->error()) {
                    return $this;
                }
            }
        }

        return false;
    }//end function

    public function get($name, $where) {
        return $this->action('SELECT *', $name, $where);
    }//end function

    public function delete($table, $where) {
        return $this->action('DELETE', $table, $where);
    }//end function

    public function insert($table, $fields = array()) {
        $key = array_keys($fields);
        $value = '';
        $x = 1;

        foreach($fields as $field) {
            $value .= '?';
            if($x<count($fields)) {
                $value .= ', ';
            }
            $x++;
        }

        //query
        $sql = "INSERT INTO {$table} (`". implode('`, `', $key) ."`) VALUES ({$value})";

        //update on database
        if(!$this->query($sql, $fields)->error()) {
            return true;
        }

        return false;
    }//end function

    public function update($table, $id, $fields = array()) {
        $set = '';
        $x = 1;

        foreach($fields as $name => $value) {
            $set .= "{$name} = ?";
            if($x<count($fields)) {
                $set .= ', ';
            }
            $x++;
        }

        //query
        $sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";

        //upddate on database
        if(!$this->query($sql, $fields)->error()) {
            return true;
        }

        return false;
    }//end function

    public function results() {
        return $this->_results;
    }//end function

    public function first() {
        return $this->results()[0];
    }//end function

    public function error() {
        return $this->_error;
    }//end function

    public function count() {
        return $this->_count;
    }//end function

}//end class

?>  