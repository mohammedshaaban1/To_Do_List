<?php 
            if ($session->has("success")) {
               
            
               
            ?>
<div class="alert alert-success"><?php echo  $session->get("success"); ?></div>
<?php 
$session->remove("success");

            }?>