<?php 
            if ($session->has("errors")) {
               
            
                foreach($session->get("errors")as $error){
            ?>
<div class="alert alert-danger"><?php echo  $error; ?></div>
<?php }}
            $session->remove("errors");?>