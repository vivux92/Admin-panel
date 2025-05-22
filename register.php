<?php
require_once "conn.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $name          = $_POST['name'] ?? '';
  $email         = $_POST['email'] ?? '';
  $password      = $_POST['password'] ?? '';
  $password_hash = password_hash($password, PASSWORD_DEFAULT);

  $sql = "INSERT INTO users (name,email,passward) VALUES ('$name','$email','$password_hash')";

  if (mysqli_query($con, $sql)) {
    $_SESSION['flash_message'] = 'User Add Successfully';
    $_SESSION['flash_type']    = 'success';
    header("refresh:3;url=login.php");
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new membership</p>
        <?php 
        if(isset($_SESSION['flash_message'])){
          $message = $_SESSION['flash_message'];
          $type    = $_SESSION['flash_type'];
          unset($_SESSION['flash_message']);
          unset($_SESSION['flash_type']);
        }
        ?>

        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" id="myform">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="name" placeholder="Full name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="com_password" placeholder="Retype password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div> -->
            <!-- /.col -->
            <!-- <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div> -->
            <!-- /.col -->
          </div>


          <div class="social-auth-links text-center">
            <button type="submit" class="btn btn-block btn-primary">
              <i class="fab fa-facebook mr-2"></i>
              Register
            </button>
            <a href="login.php" type="submit" class="btn btn-block btn-danger">
              <i class="fab fa-google-plus mr-2"></i>
              Login
            </a>
          </div>
        </form>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->
  <!-- jQuery -->
  <script src="./plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="./dist/js/adminlte.min.js"></script>
</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script>
  $(document).ready(function(){
    var message = '<?php echo $message ?? '' ?>'
    var type    = '<?php echo $type ?? '' ?>'

    if(message){
      if(type == 'success'){
        toastr.success(message);
      }
    }
  });
</script>