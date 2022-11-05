<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){
	if(isset($_POST['u1']) && 
	   isset($_POST['u2']) && 
	   isset($_POST['u3']) &&

       isset($_POST['u4']) && 
	  
       !empty($_POST['u1']) && 
	  !empty($_POST['u2']) &&
	  !empty($_POST['u3']) &&
       !empty($_POST['u4'])
		
   ){  
      
		$name=$_POST['u1'];  
	    $email=$_POST['u2'];
	    $cont=$_POST['u3'];


		$pass=$_POST['u4'];  
	    $enc_pass=md5($pass);
        
	    try{
	    	 $con=new PDO('mysql:host=localhost:3306;dbname=hm;', 'root',''); 
	    	 $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	    	 $codes= "INSERT INTO user VALUES( NULL,'$name','$email','$cont','$enc_pass')";
	    	 $con->exec($codes); 
	    	 ?>
<script>
    location.assign('login.php')

</script>
<?php 



       }catch(PDOException $e){
       	?>
<script>
    location.assign('signup.php')

</script>
<?php 

       }

	}  
	else{
		?>
<script>
    location.assign('signup.php')

</script>
<?php

	}



}else{
  echo "<script>location.assign('signup.php')</script>";

}
?>
