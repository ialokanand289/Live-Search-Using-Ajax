<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">

        <h1>Seeialze the table input</h1>
        <form id="form_action">
                <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" >
                
            </div>
            <div class=" mb-3">
                <label class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age">
            </div>
            <div class="mb-3">
                <label class="form-label">Gender</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="male" checked>
                <label class="form-check-label" for="male" >Male</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="female" checked>
                <label class="form-check-label" for="female" >Female</label>
            </div>
            <label for="st" class="form-label">State</label>
            <input class="form-control" list="browsers" name="st" id="st">
            <datalist id="browsers">
            <option value="Bihar">
            <option value="U.P">
            <option value="Rajasthan">
            <option value="Chandigarh">
            <option value="Jharkhand">
            </datalist>    
            <button type="submit" name="submit" id="submit" class="btn btn-primary mt-3">Submit</button>

            <div id="response"></div>
        </form>
        
    </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous">

</script>
<script>
    $(document).ready(function(){
        $('#submit').click(function(){
            var name=$('#name').val();
            var age=$('#age').val();

            if(name=='' || age==''|| !$('input:radio[name=gender]').is(':checked')){
                $('#response').fadeIn();
                $('#response').removeClass('#success=mg').addClass('#error-mgs').html('All Fields Are Required');
            }else{
                $.ajax({
                    url:'zzz.php',
                    type:'POST',
                    data: $('#form_action').serialize(),
                   
                    success:function(data){

                        console.log(data);
                        $('#response').fadeIn();
                        $('#response').removeClass('#error-mgs').addClass('#success-mg').html(data);
                    }
                })
            }
        })
    })
</script>