<?php session_start();?>

<!-- ROUTING -->
<?php
// DATABASE CONNECTION
require 'core/connection.php';
?>
<?php include "templates/header.php";?>



<!-- Header -->
<?php include 'templates/nav_header.php';?>



<!-- ROUTE -> Content -->
<?php require "core/route.php";?>



<!-- Footer -->
<?php include 'templates/nav_footer.php';?>
<?php include 'templates/footer.php';?>
