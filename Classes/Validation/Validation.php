<?php 
namespace Route\ToDo\Classes\Validation;


class validation {
    private $errors=[];
    public function validator($key,$value,$rules){
        foreach ($rules as $rule){
            $object = new $rule;
            $error= $object->check($key,$value);
            
            if($error!=false){
                $this->errors[]=$error;
            }
        }
    }
    public function getErrors(){
        return $this->errors;
    }
}
?>