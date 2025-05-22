<?php
include_once "./layout/header.php";
include_once "./layout/sidebar.php";
?>
<?php
require_once "conn.php";
$id  = $_GET['id'] ?? '';
if ($id) {
    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($con, $sql);
    $data = [];
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashbored.php">Dashbored</a></li>
                        <li class="breadcrumb-item"><a href="users_list.php">Users</a></li>
                        <li class="breadcrumb-item"><a href="#">User Details</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="col-md-12 mx-auto">
        <section class="content">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">User Details</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body p-0">

                    <table class="table table-bordered text-center">
                        <tbody>
                            <tr>
                                <th> Name </th>
                                <?php
                                foreach ($data as $key => $value) {
                                ?>
                                    <td><?php echo $value['name'] ?? '' ?></td>
                                <?php
                                } ?>
                            </tr>
                            <tr>
                                <th> Email </th>
                                <?php
                                foreach ($data as $key => $value) {
                                ?>
                                    <td><?php echo $value['email'] ?? '' ?></td>
                                <?php
                                } ?>
                            </tr>
                            <tr>
                                <th> Status </th>
                                <?php
                                foreach ($data as $key => $value) {
                                ?>
                                    <td>
                                        <?php
                                        if ($value['status'] == 1) {
                                            echo '<span class="badge badge-success">Active</span>';
                                        } else {
                                            echo '<span class="badge badge-danger">Enactive</span>';
                                        }
                                        ?></td>
                                <?php
                                } ?>
                            </tr>
                            <tr>
                                <th> Created Time  </th>
                                <?php
                                foreach ($data as $key => $value) {
                                ?>
                                    <td><?php echo $value['created_at'] ?? '' ?></td>
                                <?php
                                } ?>
                            </tr>
                            <tr>
                                <th> Updated Time </th>
                                <?php
                                foreach ($data as $key => $value) {
                                ?>
                                    <td><?php echo $value['updated_at'] ?? '' ?></td>
                                <?php
                                } ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

<?php
include_once "./layout/footer.php";
?>