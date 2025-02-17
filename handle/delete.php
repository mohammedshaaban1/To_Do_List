<?php
require_once '../App.php';
if($request->hasPost($request->get("id"))){
        $id= $request->get("id");
        $stm= $conn->prepare("select `title` from todo where id=:id ");
       $stm->bindParam(":id",$id);
       $stm->execute();
       if($stm->rowCount()>0){
            $stm=$conn->prepare("delete from todo  where id=:id");
            $stm->bindParam(":id",$id);
            $stm->execute();
            if($out){
                $session->set("errors",["not found"]);
                $request->redirect("../index.phphp");
            }else{
                $session->set("success"," data deleted  successfully");
                $request->redirect("../index.php");
            }
       }else{
            $session->set("errors",["not found"]);
            $request->redirect("../index.phphp");
        
       }
}else{
    $request->redirect("../index.php");
}