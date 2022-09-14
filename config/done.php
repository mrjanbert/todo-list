<?php
  require_once "../connection/db.php";

  if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $update = $conn->query("UPDATE task SET status = 'Done' WHERE id = '$id'");

    if ($conn->affected_rows > 0) {
      header("location: ../index.php");
    } else {
      echo "Error. " . PHP_EOL . "<span><a href=\"../index.php\">Try again</a></span>";
    }
  }