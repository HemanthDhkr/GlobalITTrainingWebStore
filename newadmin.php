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
    $fname = $lname = $email = $pass = $city= $addr="";
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_SESSION["role"]=="sadmin") {
        $fname = test_input($_POST["sfname"]);
        $lname = test_input($_POST["slname"]);
        $email = test_input($_POST["semail"]);
        $pass = test_input($_POST["spass"]);
        $city= test_input($_POST["scity"]);
        $addr=test_input($_POST["saddr"]);
        //echo $fname . $lname . $email . $pass . $city . $addr;
    }
    else{
        //Redirect('http://localhost/GlobalITBooks/', false);
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
    $role='admin';
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed:- " . $conn->connect_error);
    }
    // prepare and bind
    $stmt = $conn->prepare("INSERT into user values (?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssss",$fname,$lname,$pass,$email,$addr,$city,$role);
    if ($stmt->execute()) {
        $conn->close();
        Redirect('./login-signup.php', false);
    }
    else{
        echo '<h1>Unable to create user</h1><br><h3>eMail ID is already registered.</h3>';
        
    }
?>  
    <br>
<h2><a href="./login-signup.php">Back</a></h2>
    </body>
</html>