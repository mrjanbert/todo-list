<?php 
  require_once '../connection/db.php';

  if(isset($_POST['submit'])) {
    extract($_POST);

    $query = "INSERT INTO task SET task = '$task', status = 'Working', suggested = '$suggested'";
    $results = $conn->query($query);

    if($conn->affected_rows > 0) {
      header("location: ../index.php");
    } else {
      echo "Error. " . PHP_EOL . "<span><a href=\"../index.php\">Try again</a></span>";
    }
  }