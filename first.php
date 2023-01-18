<?php 

if(isset($_POST['action']) && ($_POST['action']=='data')){
    include 'config.php';

   // print_r($_POST);
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql=" INSERT INTO `student`(`fname`, `lname`, `email`, `password`) VALUES ('$fname','$lname', '$email', '$password')";
    $result=mysqli_query($conn,$sql);

    // exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css"
  rel="stylesheet"
/>
</head>
<body>
    
    <div class="container my-5">
    <h2>Register Yourself!</h2>
    <form id="form_data">
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="fname" name="fname" class="form-control" />
        <label class="form-label" for="form3Example1">First name</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="lname" name="lname" class="form-control" />
        <label class="form-label" for="form3Example2">Last name</label>
      </div>
    </div>
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" id="email" name="email" class="form-control" />
    <label class="form-label" for="form3Example3">Email address</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="password" name="password" class="form-control" />
    <label class="form-label" for="form3Example4">Password</label>
  </div>

  <!-- Submit button -->
  <button type="button" id="submit" name="submit" class="btn btn-primary btn-block mb-4">Load Data</button>
  <br>
    <div id="response"></div>
  </form>
</div>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
></script>
<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
</body>
</html>
<script>
    $(document).ready(function(){
        $('#submit').click(function(){
            var fname= $('#fname').val();
            var lname= $('#lname').val();
            var email= $('#email').val();
            var password= $('#password').val();

           // console.log(fname);

            if(fname=="" || lname=="" || email=="" || password==""){
                $('#response').fadeIn();
                $('#response').html("All Fields are Required");

            }else{
                $.ajax({
                    
                    type:"POST",
                    data:{
                        action:"data",
                        fname:fname,
                        lname:lname,
                        email:email,
                        password:password
                    },
            
                    success:function(data){

                        console.log(data);
                        alert("success");

                    }
                })
            }
        })
    })



</script>