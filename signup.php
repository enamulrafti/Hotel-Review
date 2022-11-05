<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <title>Sign up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
         body{
         background-color: aliceblue;
          background-image: url('images/im1.jpg');
            background-size: 100%;
             

        }

        .cont {
            margin-top: 50px;
            width: 600px;
            background-color:black;
            color: white;
            padding: 50px;
            margin: auto;
            
        }
        .form-control:hover{
            background-color: black;
            color: white;
        }

    </style>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="http://localhost/hm/home.php">HOTEL REVIEW</a>
            </div>
            <ul class="nav navbar-nav">
               <li><a href="http://localhost/hm/login.php">Login</a></li>
                <li class="active"><a href="http://localhost/hm/signup.php">Sign Up</a></li>
                

            </ul>
        </div>
    </nav>

    <div class="cont">
           <h4>User signup</h4>

            <form action="reg.php" method="POST">
                <div class="form-group">
                <label for="u1">User Name: </label>
                <input type="name" class="form-control" id="u1" name="u1" placeholder="Enter Your Name" required>
                </div>
                
                <div class="form-group">
                <label for="u2">Email: </label>
                <input type="email" class="form-control" id="u2" name="u2"  placeholder="Enter Your Email here" title="Give Valid Email" required>
                </div>

               <div class="form-group">
                <label for="u3">Mobile Number: </label>
                <input type="tel" class="form-control" id="u3" name="u3" placeholder="Enter Your Mobile Number" required>
                </div>
                
                 <div class="form-group">
                <label for="u4">Password: </label>
                <input type="password" class="form-control" id="u4" name="u4" placeholder="Enter Password" required>
                </div>

                
                <input type="submit" class="form-control" value="Click to Signup">
                <br>
            </form>



    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>


</html>

















