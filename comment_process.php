<?php
    session_start();

if(
    isset($_SESSION['email']) && 
    isset($_SESSION['id']) &&
    !empty($_SESSION['email']) &&
    !empty($_SESSION['id'])
    ){
     $loginmail=$_SESSION['email'];
    $loginid=$_SESSION['id'];

            if($_SERVER['REQUEST_METHOD']=="POST"){
                if(isset($_POST['u1']) && 
                   (isset($_POST['u2'])) &&
                  !empty($_POST['u1']) &&
                   !empty($_POST['u2'])
                    ){  
            $content=$_POST['u1'];
		      $hid=$_POST['u2'];  
	    try{
	    	 $con=new PDO('mysql:host=localhost:3306;dbname=hm;', 'root',''); 
	    	 $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
	    	 $codes= "INSERT INTO user_hotel VALUES($loginid,$hid,'$content',NOW())";
	    	 $con->exec($codes); 
	    	 ?>
            <script>
                location.assign('hotels.php')

            </script>
        <?php 

        }catch(PDOException $e){
       	?>
<script>
    location.assign('test1.php')

</script>
<?php 

       }

	}  
	else{
		?>
<script>
    location.assign('test2.php')

</script>
<?php

	}



}
    else{
  echo "<script>location.assign('test3.php')</script>"; 
}
      }
    else{
    ?>
<script>
    location.assign('login.php')

</script>
<?php
}

?>

