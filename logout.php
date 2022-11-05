<?php
session_start();
if(
  isset($_SESSION['email']) &&
  !empty ($_SESSION['email'])   
){
   
    unset($_SESSION['email']);
    session_destroy();
    
     ?> 
	<script>location.assign('home.php')</script>
		<?php
   
}else{
    ?> 
	<script>location.assign('home.php')</script>
		<?php
}

?>
