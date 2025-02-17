<?php
namespace Route\ToDo\Classes;


class Session {

    public function __construct()
    {
        session_start();
    }

    //set 
    public function set($key,$value){

        $_SESSION[$key] = $value;
    }
    //has
    
    public function has($key) {
        return isset($_SESSION[$key]);
    }
    //get
     
    public function get($key){
        return $_SESSION[$key];
    }

    //unset 
    public function remove($key){
        unset($_SESSION[$key]);
    }

    //destroy 
    public function destroy() {
        session_destroy();
    }
}