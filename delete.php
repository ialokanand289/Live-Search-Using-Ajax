<?php

use LDAP\Result;

include 'config.php';


$delete_data=$_POST['id'];
$sql=" DELETE FROM `student` WHERE sno='$delete_data'";
if(mysqli_query($conn,$sql)){
    echo 1;
}else{
    echo 0;
}




?>