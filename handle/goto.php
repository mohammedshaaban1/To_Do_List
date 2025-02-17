<?php


require_once '../App.php';
if($request->hasPost($request->get("name"))&& $request->hasPost(($request->get("id")))){
    $name=$request->get("name");
    $id=$request->get("id");
    
    $stm= $conn->prepare("select `title` from todo where id=:id ");
    $stm->bindParam(":id",$id);
       $stm->execute();
       if($stm->rowCount()>0){
        $stm =$conn->prepare(" update todo set `status`=:name  where id=:id");
        $stm->bindParam(":name",$name);
        $stm->bindParam(":id",$id);
        $out= $stm->execute();
        if($out) {
            $session->set("success","status updated successfuly"); 
            $request->redirect("../index.php");
        }else{
            $session->set("errors",["error"]);
            $request->redirect("../index.php");
        }
    }else{
        $session->set("errors",["not found"]);
    $request->redirect("../index.php");
        
    }
}else{
    $request->redirect("../index.php");
}