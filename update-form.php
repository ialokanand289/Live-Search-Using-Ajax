<?php
include 'config.php';

$studentid=$_POST['id'];
$sql=" SELECT * FROM `student` where `sno`= '".$studentid."' ";
$result=mysqli_query($conn,$sql);
if($result->num_rows >0){
    while($row=$result->fetch_assoc()){
?>
  <div class="modal-body">
        <h3>Edit Form:</h3>
     
    
       
      
         <tr>
            <td>First Name:
            <input type="text" id="e_fname" name="e_fname" value="<?php echo $row['fname']; ?>"><br>
    
            <input type="text" id="eid" name="eid" hidden value='<?php echo $row['sno']; ?>'><br>
            </td>
         <td>Last Name:<input type="text" id="e_lname" name="e_lname" value="<?php echo $row['lname']; ?>"><br>
         </td>
        </tr>
        </div>
   
<?php
    }
}



?>