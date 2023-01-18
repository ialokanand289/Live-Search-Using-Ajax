<?php
include 'config.php';
$sub_id=$_POST['update_id'];
$f_name=$_POST['fname'];
$l_name=$_POST['lname'];

$sql=" UPDATE `student` SET `fname`= '$f_name', `lname`= '$l_name' WHERE `sno` = '$sub_id'";

if(mysqli_query($conn,$sql)){
    echo 1;
}else{
    echo 0;

}







?>