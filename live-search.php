<?php
include 'config.php';
$search_value = $_POST['search'];

$sql = "SELECT * FROM `student` WHERE `fname` LIKE '%{$search_value}%' OR `lname` LIKE '%$search_value%'";
$result = mysqli_query($conn, $sql);



?>

    
        <table class="table table-bordered border-primary" id="table-data">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php if (mysqli_num_rows($result) > 0) {
                     while ($row = $result->fetch_assoc()) {  ?>
                <tr>
                    <td><?php echo $row['sno']; ?> </td>
                    <td><?php echo $row['fname']; ?> </td>
                    <td><?php echo $row['lname']; ?> </td>
                    <td><?php echo $row['email']; ?> </td>
                    <td><button class='delete-btn' data-id='<?php echo $row['sno']; ?>'>DELETE </button>&nbsp&nbsp&nbsp<button class='edit-btn' data-bs-toggle="modal" data-bs-target="#exampleModal" data-eid='<?php echo $row['sno']; ?>'>EDIT </button></td>
                </tr>
        <?php }
}
        ?>
            </tbody>
        </table>

