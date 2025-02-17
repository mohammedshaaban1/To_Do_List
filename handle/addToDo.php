<?php
require_once '../App.php';

if ($request->hasPost($request->post('submit'))) {

    $title= $request->clean($request->post("title"));
    
    //validation 
    
    $validation->validator("title",$title,["Required","str"]);
    
    $errors= $validation->getErrors();
    
    if (empty($errors)) {
        // insert 
        $stm= $conn->prepare( "insert into todo(`title`)values(:title)");
        $stm->bindParam(":title",$title,PDO::PARAM_STR);  
        $out= $stm->execute();
        if ($out) {
            $session->set("success","data inserted successfuly");
            $request->redirect("../index.php");
        }else {
            $session->set("errors",["error"]);
            $request->redirect("../index.php");      
        }
    
    }else{
        $session->set("errors",$errors);
        $request->redirect("../index.php"); 
    }
    
    // is valid ->insrt  , msg

    // not valid -> errors session ,redorect 


}