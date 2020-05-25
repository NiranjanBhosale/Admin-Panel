
<!DOCTYPE html>
<html lang="en">
<?php
ob_start();
?>
<head>
<?php 
 include ("includes/db.php");
?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register</title>
  <link rel="shortcut icon" href="favicon_1.ico" type="image/x-icon">
  <link rel="icon" href="#favicon_1.ico" type="image/x-icon">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input required type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name" name="username">
                  </div>
                  <div class="col-sm-6">
                    <input required type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name" name="lastname">
                  </div>
                </div>
                <div class="form-group">
                  <input required type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" name="mailaddr">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input required type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Address" name="addr">
                  </div>
                  <div class="col-sm-6">
                    <input required type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Phone Number" name="phone_number">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input required type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                  </div>
                  <div class="col-sm-6">
                    <input required type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" name="reppass">
                  </div>
                </div>
                <div class="form-group ">
                  <!-- <label for="">Select profile picture</label> -->
                  <span class="form-control form-control-user"><input type="file" name="image" style="margin:-20px 50px 5px 5px; "></span>
                  <!-- <input type="file" class="form-control-user" name="" id="" value="Select Profile Picture" style="margin-bottom:10px;"> -->
                </div>
                <input type="submit" class="btn btn-primary btn-user btn-block" name="reg_btn" value="Register Account" name="" id=""><br>
                <hr>
                <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.html">Already have an account? Login!</a>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script>
    
  </script>

  <?php
    if (isset($_POST['reg_btn'])) 
    {
    $name=$_POST['username'];
    $lastname=$_POST['lastname'];
    $mail=$_POST['mailaddr'];
    $address=$_POST['addr'];
    $phno=$_POST['phone_number'];
    $pass=$_POST['password'];
    $confpass=$_POST['reppass'];
    $len_pass=strlen($pass);
    $len_confpass=strlen($confpass);
    $len_phone=strlen($phno);

    if(isset($_FILES['image']))
      {
        

        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        

        if(empty($errors)==true)
        {
          move_uploaded_file($file_tmp,"img/".$file_name);
      
          $image = $file_name;

        }
        else{
          print_r($errors);
          $image = "";

        }
      }


    if($pass==$confpass && $len_phone == 10)
    {
      $insert_query="INSERT INTO users(user_name,last_name,user_email,address,phone_num,user_password,profile_picture) VALUES ('$name','$lastname','$mail','$address','$phno','$pass','$image') ";

    $insert_result=mysqli_query($connection,$insert_query);

      if($insert_result)
      {
        header("Location:index.php");
      }
      else{
        echo "Error ".mysqli_error($connection);
      }
    }
    elseif($len_pass < 8)
    {
      echo "
<script>
    alert('Password too small');
</script>
      ";
    }
    elseif($len_phone < 10 || $len_phone > 10 )
    {
      echo "
<script>
    alert('Not a valid phone number');
</script>
      ";
    }
    else {
      echo "
<script>
    alert('Password didn\'t match');
</script>
      ";
    }

    }
    ?>

</body>

</html>


