<?php

include "connection.php";

$id=$_GET['id'];

$title=$_POST['title'];
$desc=$_POST['desc'];
$status=$_POST['status'];

$sql="UPDATE `TASKS` SET `title`='$title', `description`='$desc', `status`='$status' where `tasks`.`id`=$id";

if(mysqli_query($conn, $sql)){
    header("location:index.php");
}
else{
    echo mysqli_error($conn);
}

mysqli_close($conn);







?>