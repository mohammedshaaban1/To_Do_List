<?php 
// namespace Route\ToDo\Classes\Validation;
use  Route\ToDo\Classes\Validation\validator;
    require_once 'validator.php';

    class Str implements validator{

        public function check ($key,$value)
        {
            if(is_numeric($value)){
                return "Value of $key should be a string";
            }else{
                return false;
            }
        }
    }

?>