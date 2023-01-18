<?php
include 'config.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){

    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $state=$_POST['st'];

$sql=" INSERT INTO `user`(`name`,`age`,`gender`,`state`) VALUES ('$name','$age','$gender','$state')";
$result=mysqli_query($conn,$sql);
}
?>