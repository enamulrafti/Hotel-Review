<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){
	if( 
	   isset($_POST['u2']) && 
       isset($_POST['u4']) &&
	   !empty($_POST['u2']) &&
	   !empty($_POST['u4'])
	 
   ){  
	
	
	    $email=$_POST['u2'];
        $pass=$_POST['u4'];  
        $enc_pass=md5($pass);

	    try{
	    	 $con=new PDO('mysql:host=localhost:3306;dbname=hm;', 'root',''); 
	    	 $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
	    	 $codes= "SELECT * FROM user WHERE email='$email' AND passsword='$enc_pass'"; 
	    	 $ret=$con->query($codes); 
            $obj=$ret->fetchAll();
            
              if($ret->rowCount()==1){
             session_start();  
                  
            $_SESSION['email']=$email;
                  
                  foreach($obj AS $data){
                      $id=$data['id'];
                      $name=$data['name'];
                      $email=$data['email'];
                  }
            $_SESSION['id']=$id;
                  $_SESSION['name']=$name;
                  $_SESSION['email']=$email;

             
           ?>
<script>
       
    location.assign('hotels.php')

</script>
<?php 


              } else{
              	 ?>
<script>
    location.assign('login.php')

</script>
<?php 

              }

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
    location.assign('login.php')

</script>
<?php

	}


}else{
  echo "<script>location.assign('login.php')</script>"; //bahirer ta "" holy vitory '' & viceversa
  
}
?>
