<?php
    // Create connection
    $conn = new mysqli("localhost", "root", "", "todo")or die("Could not connect to mysql: ". mysqli_error($conn));
