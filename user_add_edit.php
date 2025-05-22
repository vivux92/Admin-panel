<?php
include_once "./layout/header.php";
include_once "./layout/sidebar.php";
?>
<?php
require_once "conn.php";
$id = $_GET['id'] ?? '';
$data = [];
if ($id) {
    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id            = $_POST['id'] ?? '';
    $name          = $_POST['name'] ?? '';
    $email         = $_POST['email'] ?? '';
    $password      = $_POST['password'] ?? '';
    $status        = (isset($_POST['status']) && $_POST['status'] == 1 ? '1' : '0');


    if ($password) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
    }

    if ($id) {
        if ($password_hash) {
            $sql = "UPDATE users SET name='$name',email='$email',passward='$password_hash',status='$status' WHERE id='$id'";
        } else {
            $sql = "UPDATE users SET name='$name',email='$email',status='$status' WHERE id='$id'";
        }
    } else {
        $sql = "INSERT INTO users (name,email,passward,status) VALUES ('$name','$email','$password_hash','$status')";
    }

    if (mysqli_query($con, $sql)) {
        // echo "ussre add ";
        echo "<script>location.href = './users_list.php';</script>";
        // header('Refresh:3;url=users_list.php');
        // exit;
    }

}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>General Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashbored.php">Dashbored</a></li>
                        <li class="breadcrumb-item active"><a href="users_list.php">User</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add User</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" id="myform">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="id" id="id" value="<?php echo $data['id'] ?? '' ?>">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name : <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter Name" value="<?php echo $data['name'] ?? '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address : <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" name="email" placeholder="Enter email" value="<?php echo $data['email'] ?? ''?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password : <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Comfirm Password : <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="com_password" placeholder="Comfirm Password">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div><label for="exampleInputPassword1">Is Active :</label></div>
                                        <!-- <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch> -->
                                        <input type="checkbox" name="status" data-bootstrap-switch data-off-color="danger" value="1" data-on-color="success" <?php echo (isset($data['status']) && $data['status'] ? 'checked' : '') ?>>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="reset" class="btn btn-danger">Clear</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include_once "./layout/footer.php";
?>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js" integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
    $(document).ready(function() {
        $("#myform").validate({
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true
                },
                password: {
                    required: function() {
                        if ($("#id").val()) {
                            return false
                        } else {
                            return true
                        }
                    }
                },
                com_password: {
                    required: function() {
                        if ($("#id").val()) {
                            return false
                        } else {
                            return true
                        }
                    },
                    equalTo: "#password"
                }
            }
        });
    });
</script>