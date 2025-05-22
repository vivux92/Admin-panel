<?php
include_once "./layout/header.php";
include_once "./layout/sidebar.php";
?>
<?php
require_once "conn.php";
$sql = "SELECT * FROM users WHERE role_id = 2";
$result = mysqli_query($con, $sql);
$data = [];
if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>
 <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Users</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashbored.php">Dashbored</a></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User Listing</h3>

                        <div class="card-tools">
                            <a href="user_add_edit.php" class="btn btn-outline-primary mr-2">Add User</a>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Name </th>
                                    <th> Email </th>
                                    <th> Status </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $key => $value) {
                                ?>
                                    <tr>
                                        <td><?php echo $value['id'] ?? '' ?></td>
                                        <td><?php echo $value['name'] ?? '' ?></td>
                                        <td><?php echo $value['email'] ?? '' ?></td>
                                        <td>
                                            <?php
                                            if ($value['status'] == 1) {
                                                echo '<span class="badge badge-success">Active</span>';
                                            } else {
                                                echo '<span class="badge badge-danger">Enactive</span>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="user_view.php?id= <?php echo $value['id'] ?? ''?>"><i class="fas fa-folder"></i> View</a>
                                            <a class="btn btn-info btn-sm" href="user_add_edit.php?id=<?php echo $value['id'] ?? ''?>"><i class="fas fa-pencil-alt"></i> Edit</a>
                                            <a class="btn btn-danger btn-sm" href="user_delete.php?id=<?php echo $value['id'] ?? ''?>"><i class="fas fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
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