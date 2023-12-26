<?php

class Session{

    private $session = NULL;
    
    public function __construct($session_name){
        session_start();

        if(!isset($_SESSION[$session_name])){
            $_SESSION[$session_name] = NULL;
            //echo "Sesión $session_name creada";
        }
        //echo "Sesión $session_name ya existe";
        
        $this->session = $session_name;
    }

    public function setValueSession($value){
        $_SESSION[$this->session] = $value;
    }

    public function getValueSession(){
        return $_SESSION[$this->session];
    }
}

?>

