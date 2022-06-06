<?php

    $id = $_GET['id'];
    $conn = new mysqli("localhost", "root", "", "school");
    $sql = "delete from students where studentID=$id";
    $result = $conn->query($sql);

    if($result){
        header('location:student-list.php');
     } else {
         die(mysqli_error($conn));
     }

?>