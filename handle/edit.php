<?php
require_once '../App.php';
if($request->hasPost($request->post("submit"))&& $request->hasPost('id')){
    $id=$request->get("id");
    $title=$request->clean($request->post("title"));

    // Validation 
    $validation->validator("title",$title,["Required","Str"]);
    $errors=$validation->getErrors();
    if(empty($errors)){
        $stm= $conn->prepare("select `title` from todo where id=:id ");
        $stm->bindParam(":id",$id);
        $stm->execute();
        if($stm->rowCount()>0){
           $stm= $conn->prepare("update todo set `title`=:title  where id=:id");
            $stm->bindParam(":title",$title);
            $stm->bindParam(":id",$id);
            $out= $stm->execute();
            if($out)
            {
                $session->set("sucess","data updated successfuly");
                $request->redirect("../index.php"); 
            }else{
                $session->set("error","Error in update data");
                $request->redirect("../index.php"); 
            }
        }else{
            $session->set("errors",[" not found"]);
        $request->redirect("../index.php");
        }
    }else{
        $session->set("errors",$errors);
        $request->redirect("../edit.php?id=$id");
    }
    
}else{
    $request->redirect("../index.php");
}