<?php
  $server = "localhost";
  $root = "root";
  $password = "";
  $database = "galois";

  $conn = mysqli_connect($server, $root, $password, $database);
  if (!$conn) {
    die("connection echoue!!!" . mysqli_connect_error());
  }
?>