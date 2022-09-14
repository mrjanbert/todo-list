<?php
  require_once '../connection/db.php';

  if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete = mysqli_query($conn, "DELETE FROM task WHERE id = '$id'");

    if($delete) {
      header("location: ../index.php");
    } else {
      echo "Error. " . PHP_EOL . "<span><a href=\"../index.php\">Try again</a></span>";
    }
  }