<html lang="en">
<head>
  <title>Global IT Books</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <script src="./js/jquery.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>
    
<div class="jumbotron">
  <div class="container text-center">
    <h1 ><span class="glyphicon glyphicon-king"></span>Global IT Books</h1>      
    <p>We fulfill your learning desires... </p>
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand"><span class="glyphicon glyphicon-king"></span><b>GIB</b></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <!--ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">Deals</a></li>
        <li><a href="#">Stores</a></li>
        <li><a href="#">Contact</a></li>
      </ul-->
      <ul class="nav navbar-nav navbar-right">
      </ul>
    </div>
  </div>
</nav>


<?php
    include 'phpfun.php';
    $name = $rand = $hash = $email = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = test_input($_POST["email"]);
        $hash = test_input($_POST["hash"]);
        $rand = test_input($_POST["rand"]);
        //echo $email." ".$hash." ".$rand;
    }
    else{
        Redirect('http://localhost/GlobalITBooks/', false);
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $servername = "localhost";
    $username = "root";
    $password = "123";
    $dbname = "gibs";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed:- " . $conn->connect_error);
    }
    // prepare and bind
    $stmt = $conn->prepare("SELECT u_fnm, u_pwd, u_role from user where u_email= ?");
    $stmt->bind_param("s",$email);
    if ($stmt->execute()) {
        $stmt->bind_result($u_fname, $u_pwd, $u_role);
        if ($stmt->fetch()) {

            //echo "name: " . $u_fname . "pass: " . $u_pwd . "role: " . $u_role;
            if(md5($rand.$u_pwd)==$hash){
                $conn->close();
                session_start();
                // Storing session data
                $_SESSION["uname"] = $u_fname;
                $_SESSION["role"] = $u_role;
                $_SESSION['status']=true;
                if($_SESSION["role"]=="admin")
                    Redirect('http://localhost/GlobalITBooks/admin.php', false);
                else if($_SESSION["role"]=="mgr")
                    Redirect('http://localhost/GlobalITBooks/mgr.php', false);
                else if($_SESSION["role"]=="sadmin")
                    Redirect('http://localhost/GlobalITBooks/superadmin.php', false);
                else 
                    Redirect('http://localhost/GlobalITBooks/', false);
            }
            else{
                echo "<H1>Wrong password</h1>";
            }
        }
        else{
            
            echo "<h1>Indalid user name!</h1>";
        }
        
    } 
    else {

        echo "<h1>DB error<h1>";
    }

    $conn->close();
?>

<br>
<h2><a href="./login-signup.php">Back</a></h2>
    </body>
</html>