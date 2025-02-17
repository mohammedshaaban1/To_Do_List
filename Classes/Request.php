<?php
namespace Route\ToDo\Classes;
class Request {
    //get
    public function get($key=null)
    {
        return (isset($_GET[$key])) ? $_GET[$key] : null;       
    }
    //post
    public function post($key=null)
    {
        return (isset($_POST[$key])) ? $_POST[$key] : null;       
    }
    //hasPost
    public function hasPost($key)
    {
        return isset($key);
    }
    //clean 
    public function clean($key) {
        return trim(htmlspecialchars($key));
    }

    public function redirect($file) {
        header("location:$file"); 
    }
}


// Session (session start , set(2) , get(1) , unset , destroy )