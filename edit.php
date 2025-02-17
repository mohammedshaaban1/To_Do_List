<?php
require_once 'inc/header.php';
require_once 'App.php';
?>

<?php 
    if($request->hasPost($request->get("id"))){
        $id=$request->get("id");

       $stm= $conn->prepare("select `title` from todo where id=:id ");
       $stm->bindParam(":id",$id);
       $stm->execute();
    }else{
        $request->redirect("index.php");
    }


?>


<body class="container w-50 mt-5">
    <?php if($stm->rowCount()>0): 
           $todo= $stm->fetch(PDO::FETCH_ASSOC);
        ?>
    <?php
            require_once 'inc/errors.php';
        ?>
    <form action="handle/edit.php?id=<?php echo $id ?>" method="post">
        <textarea type="text" class="form-control" name="title" id=""
            placeholder="enter your note here"><?php echo $todo["title"] ;?></textarea>
        <div class="text-center">
            <button type="submit" name="submit" class="form-control text-white bg-info mt-3 ">Update</button>
        </div>
    </form>
    <?php else: echo "no data founded";
        
        endif ;?>
</body>

</html>