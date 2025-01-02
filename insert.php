<?php

include "connection.php";

$title=$_POST['title'];
$desc=$_POST['desc'];

$sql="INSERT INTO `TASKS`(`title`, `description`) VALUES('$title', '$desc')";

if(mysqli_query($conn, $sql)){
    header("location:index.php");
}
else{
    echo mysqli_error($conn);
}

mysqli_close($conn);

?>