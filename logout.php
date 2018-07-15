<?php
include 'phpfun.php';
session_start();
session_unset();
Redirect('http://localhost/GlobalITBooks/', false);
?>
