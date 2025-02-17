<?php 
// namespace Route\ToDo\Classes\Validation;
 use Route\ToDo\Classes\Validation\validator;
     require_once 'validator.php';  

     class Required implements Validator{
        public function check($key, $value){
            if(empty($value)){
                return "$key is Required";
            }else{
                return false; 
            }
        }
    }
?>