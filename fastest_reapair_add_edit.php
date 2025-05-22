<?php
include_once "./layout/header.php";
include_once "./layout/sidebar.php";
?>
<?php
require_once "conn.php";
$id = $_GET['id'] ?? '';
$data = [];
if ($id) {
    $sql = "SELECT * FROM fastest_repair_service WHERE id='$id'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id            = $_POST['id'] ?? '';
    $title         = $_POST['title'] ?? '';
    $desc          = $_POST['desc'] ?? '';
    $status        = (isset($_POST['status']) && $_POST['status'] == 1 ? '1' : '0');
    $old_img       = $_POST['old_img'] ?? '';
    $image = "";
    $image = $old_img;
    if (isset($_FILES['image']) && $_FILES['image']['name']) {
        $file_name = time() . '-' . $_FILES['image']['name'];
        $file_tmp  = $_FILES['image']['tmp_name'];
        $upload    = move_uploaded_file($file_tmp, "upload/" . $file_name);
        $image = $file_name;
    }


    if ($id) {
        $sql = "UPDATE fastest_repair_service SET title='$title',description='$desc',image='$image',status='$status' WHERE id='$id'";
    } else {
        $sql = "INSERT INTO fastest_repair_service (title,description,image,status) 
        VALUES ('$title','$desc','$image','$status')";
    }

    if (mysqli_query($con, $sql)) {
        // echo "ussre add ";
        echo "<script>location.href = './fastest_repair.php';</script>";
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
                    <h1>Add Service</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashbored.php">Dashbored</a></li>
                        <li class="breadcrumb-item"><a href="users_list.php">Home Service</a></li>
                        <li class="breadcrumb-item active"><a href="home_add_edit_slider.php">Add Home Service</a></li>
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
                            <h3 class="card-title">Add Service</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" id="myform" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="id" id="id" value="<?php echo $data['id'] ?? '' ?>">
                                        <input type="hidden" name="old_img" value="<?php echo $data['image'] ?? ''?>">
                                        <div class="form-group">
                                            <label for="title">Title : <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="title" placeholder="Enter Title" value="<?php echo $data['title'] ?? '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Image">Image : <span class="text-danger">*</span></label>
                                            <input type="file" name="image" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="desc">Description : <span class="text-danger">*</span></label>
                                            <textarea name="desc" class="form-control" id="" placeholder="Enter Description"><?php echo $data['description'] ?? '' ?></textarea>
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
                title_1: {
                    required: true
                },
                title_2: {
                    required: true
                },
                title_3: {
                    required: true
                },
                button_lable: {
                    required: true
                },
                button_url: {
                    required: true
                },
                desc: {
                    required: true
                },

            }
        });
    });
</script>