<?php
session_start();
header("location:../index.php");
unset($_SESSION["email"]);
session_destroy($_SESSION["email"]);
?>