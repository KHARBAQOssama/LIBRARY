<?php
$conn = mysqli_connect ('localhost','root','','library');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); // this a function that can tell us what is the error exactly
  }