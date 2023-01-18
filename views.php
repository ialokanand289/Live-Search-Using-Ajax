<?php
include 'config.php';

$sql = " SELECT * FROM `student`";
$result = mysqli_query($conn, $sql);

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Views</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="test">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" data-bs-dismiss="modal" class="btn btn-primary e_submit" name="submit">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <h1>this is view page </h1>
  <div>
    <input type="text" id="search-bar" placeholder="Search.." name="search">

    <div class="container">
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
          <?php
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
          ?>
              <tr>
                <td><?php echo $row['sno']; ?> </td>
                <td><?php echo $row['fname']; ?> </td>
                <td><?php echo $row['lname']; ?> </td>
                <td><?php echo $row['email']; ?> </td>
                <td><button class='delete-btn' data-id='<?php echo $row['sno']; ?>'>DELETE </button>&nbsp&nbsp&nbsp<button class='edit-btn' data-bs-toggle="modal" data-bs-target="#exampleModal" data-eid='<?php echo $row['sno']; ?>'>EDIT </button></td>


              </tr>
          <?php
            }
          }
          ?>

        </tbody>
      </table>
      
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
</body>

</html>
<script>
  $(document).ready(function() {
    $('.delete-btn').click(function() {
      var deletedata = $(this).data('id');
      var element = this;
      // alert(deletedata);
      $.ajax({
        url: "delete.php",
        type: "POST",
        data: {
          id: deletedata
        },
        success: function(data) {
          if (data == 1) {
            // console.log(data);
            $(element).closest("tr").fadeOut();
            // }
          }
        }
      });
    });

    //UPDATE INPUT FIELD
    $(".edit-btn").click(function() {
      $(".modal fade").show();
      var student_id = $(this).data('eid');
      // alert(student_id);
      $.ajax({
        url: 'update-form.php',
        type: "POST",
        data: {
          id: student_id
        },
        success: function(data) {
          // console.log(data);
          $('.test').html(data);
        }
      });
    });

    //SAVE BUTTON FUNCTIONALITY
    $(".e_submit").on("click", function() {

      var up_id = $("#eid").val();
      var fname = $("#e_fname").val();
      var lname = $("#e_lname").val();
      // console.log(up_id);

      $.ajax({
        url: "submitpage.php",
        type: "POST",
        data: {
          update_id: up_id,
          fname: fname,
          lname: lname
        },
        success: function(data) {
          alert("Record Updated");
          if (data == 1) {
            // $("#exampleModal").hide();
            // loadTable();

          }

        }
      });

    });
    //live search
    $("#search-bar").keyup(function() {
      var search_term = $(this).val();
      console.log(search_term);
      $.ajax({
        url: "live-search.php",
        type: "post",
        data: {
          search: search_term
        },
        success: function(data) {
          $("#table-data").html(data);
        }
      })
    })

    //pagination
    function loadTable(page) {
      $.ajax({
        url: "pagination.php",
        type: "post",
        data: {
          page_id: page
        },
        success: function(data) {
          $("#table-data").html(data);
        }
      })
    }
    loadTable();

    //pagination code
    $(document).on("click", "#pagination a", function(e) {
      e.preventDefault();
      var page_id=(this).attr(id);
      loadTable(page_id);

    })
  });
</script>