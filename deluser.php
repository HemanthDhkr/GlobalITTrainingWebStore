<?php
    include 'phpfun.php';
    session_start();
    if(!(isset($_SESSION['status']) && $_SESSION["role"]=="sadmin"))
    {
        Redirect('http://localhost/GlobalITBooks/', false);
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
    $query="delete from user where u_email ='".$_GET['sid']."'";
    mysqli_query($conn,$query) or die("can't Execute...");
    Redirect('http://localhost/GlobalITBooks/superadmin.php', false);
?>