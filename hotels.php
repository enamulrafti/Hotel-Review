<?php
    #session_start();

if(
    isset($_SESSION['email']) && 
    isset($_SESSION['id']) &&
    !empty($_SESSION['email']) &&
    !empty($_SESSION['id'])
    ){
     $loginmail=$_SESSION['email'];
    $loginid=$_SESSION['id'];
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>hotels</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body{
         background-color: aliceblue;
          background-image: url('images/im3.jpg');
            background-size: 100%;
        }

        .res {
            text-align: center;
        }

        .bt {
            background-color: white;
            color: black;
            width: 100px;
            text-align: center;

        }

        .top {
            text-align: center;
            color: white;
        }

        .box {
            background-color: lightblue;
            width: 100%;
            padding: 25px;

        }

        .image_box {
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
        }

        .innbox {
            margin-left: 90px;
        }

        .image {
            margin-right: 30px;
        }

        .p1 {
            font-size: 15px;
            color: blue;
        }
        .comment_box{
            margin-right: 70px;
        }
        .review_box {
            box-shadow: rgba(0, 0, 0, 0.15) 2.4px 2.4px 3.2px;
            margin-right: 70px;
         }
        .contents{
           
        }

    </style>
</head>

<body>

    <nav class="navbar navbar-inverse ">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">HOTEL REVIEW</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="http://localhost/hm/logout.php">log out</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="active"><a href="http://localhost/hm/hotels.php">hotels</a></li>
            </ul>

            <form class="navbar-form navbar-right" action="http://localhost/hm/search.php" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Hotel Name" name="key">
                </div>
                <button type="submit" class="btn btn-default">search</button>
            </form>
        </div>

    </nav>
    <h3 class="top">Hotels</h3>
    <br />
    <?php 
    
    try{
       $conn=new PDO('mysql:host=localhost:3306;dbname=hm;','root','');
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        
        $selectquery="SELECT * FROM hotel ORDER BY RAND()";
        $test=$conn->query($selectquery);
        $returnobj=$test->fetchAll();
       
        foreach($returnobj AS $data){
            $hid=$data['id'];
            $hotel=$data['hotel_name'];
            $loc=$data['location'];
            $image1=$data['pic1'];
            $image2=$data['pic2'];
            
    ?>
    <div class="container">
        <div class="box">
            <div class="innbox">
                <h2><?php echo $hotel; ?></h2>
                <small><?php echo $loc; ?></small>
                <hr />
                <div class="image_box">
                    <div class="image">
                        <img src="images/<?php echo $image1;?>" alt="Progress" width="350" height="200">
                    </div>

                    <div class="image">
                        <img src="images/<?php echo $image2;?>" alt="Progress" width="350" height="200">
                    </div>
                </div>
                <br /> <br />


                <div class="comment_box">
                    <form action="comment_process.php" method="POST" class="form_">
                        <div class="form-group">
                            <label for="u1">Write your review bellow</label>
                            <input type="hidden" name="u2" value="<?php echo $hid?>"/>
                            <textarea type="text" class="form-control" id="u1" name="u1" rows="4" placeholder="start typing..."></textarea>
                        </div>

                        <input type="submit" class="btn btn-default" value="Submit">
                        <br>
                    </form>

                </div>
                <br /><br />

                <?php
                
                $selectquery1="SELECT u.name AS u1,
                                    h.hotel_name AS u2,
                                    uh.review AS u3,
                                    uh.date AS u4

                            FROM user_hotel AS uh
                                LEFT JOIN user AS u 
                                ON uh.userid=u.id
                                LEFT JOIN hotel AS h 
                                ON uh.hotelid=h.id
                             WHERE uh.hotelid=$hid
                            ORDER BY uh.date DESC ";
            $test1=$conn->query($selectquery1);
            $returnobj1=$test1->fetchAll();
            
            if($test1->rowCount()!=0){
               
                foreach($returnobj1 AS $data1){
                     
               $name=$data1['u1'];
               $rev=$data1['u3'];
               $date=$data1['u4'];
                ?>
                <div class="review_box">
                    <div class="contents">
                    <p class="p1"> <?php echo $name ?> </p>
                    <small><?php echo $date ?></small>
                    <hr />
                    <p><?php  echo $rev ?></p>
                    <br />
                    </div>
                </div>
                <br />
                <?php
                
                }
            }
            else{
                ?>
               <div class="review_box">

                    <p>No review yet! </p>
                </div>
                <?php
            }
               ?>

            </div>

        </div>
        <br />
    </div>
    <?php
    }
            
        ?>
</body>

</html>
<?php
        }
    catch(PDOException $ex ){
        ?>
<script>
    location.assign('home.php')

</script>
<?php
    }

//}
    else{
    ?>
<script>
    location.assign('login.php')

</script>
<?php
}

?>
