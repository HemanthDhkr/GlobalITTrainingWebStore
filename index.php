<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Global IT Training Web Store</title>
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
    <h1 ><span class="glyphicon glyphicon-king"></span>Global IT Training Web Store</h1>      
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
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">Deals</a></li>
        <li><a href="#">Stores</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php 
            include './phpfun.php';
            session_start();
            if(isset($_SESSION['status']))
            {
                    //echo $_SESSION['unm']; 
                    if($_SESSION["role"]=="admin")
                        Redirect('http://localhost/GlobalITBooks/admin.php', false);
                    if($_SESSION["role"]=="mgr")
                        Redirect('http://localhost/GlobalITBooks/mgr.php', false);
                    if($_SESSION["role"]=="sadmin")
                        Redirect('http://localhost/GlobalITBooks/superadmin.php', false);
                    echo("<li><a href=\"logout.php\"><span class=\"glyphicon glyphicon-off style=\"color:RED\"></span>&nbsp;&nbsp;");
                    echo("<span class=\"glyphicon glyphicon-user\"></span>".$_SESSION['uname']."</a></li>");
                    echo("<li><a href=\"#\"><span class=\"glyphicon glyphicon-shopping-cart\"></span> Cart</a></li>");
            }
            else
            {	
                echo("<li><a href=\"login-signup.php\"><span class=\"glyphicon glyphicon-off\"></span> &nbsp;Login&nbsp;/   &nbsp;Signup </a></li>");
            }
            ?>
        
      </ul>
    </div>
  </div>
</nav>

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">New Courses</div>
        <div class="panel-body"><img src="./img/book (1).jpg" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Become Perfect in 1 Week</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-danger">
        <div class="panel-heading">New Courses</div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Become Perfect in 1 Week</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-success">
        <div class="panel-heading">New Courses</div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Become Perfect in 1 Week</div>
      </div>
    </div>
  </div>
</div><br>

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">New Courses</div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Become Perfect in 2 Weeks</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">New Courses</div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Become Perfect in 2 Weeks</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-primary">
        <div class="panel-heading">New Courses</div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Become Perfect in 2 Weeks</div>
      </div>
    </div>
  </div>
</div><br><br>
<footer class="container-fluid text-center">
  <p><b>Global IT Training Web Store</b> is optimized for learning, testing, and training. Examples might be simplified to improve reading and basic understanding. Tutorials, references, and examples are constantly reviewed to avoid errors, but we cannot warrant full correctness of all content. While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy. <br>Copyright 1999-2018 by Refsnes Data. All Rights Reserved.
.
</p>  
  
</footer>

</body>
</html>

