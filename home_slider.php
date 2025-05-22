<?php
include_once "./layout/header.php";
include_once "./layout/sidebar.php";
?>
<?php
require_once "conn.php";
$sql = "SELECT * FROM home_slider";
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
                            <h1>Home Slider</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashbored.php">Dashbored</a></li>
                                <li class="breadcrumb-item"><a href="home_slider.php">Home Slider</a></li>
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
                        <h3 class="card-title">Slider Listing</h3>

                        <div class="card-tools">
                            <a href="home_add_edit_slider.php" class="btn btn-outline-primary mr-2"> <i class="fas fa-plus"></i> Add</a>
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
                                    <th> Title </th>
                                    <th> Description </th>
                                    <th> Button Lable </th>
                                    <th> Button Url </th>
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
                                        <td><?php echo $value['title_1'].' '.$value['title_2'].' '.$value['title_3'] ?? '' ?></td>
                                        <td><?php echo $value['description'] ?? '' ?></td>
                                        <td><?php echo $value['button_lable'] ?? '' ?></td>
                                        <td><?php echo $value['button_url'] ?? '' ?></td>
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
                                            <a class="btn btn-info btn-sm" href="home_add_edit_slider.php?id=<?php echo $value['id'] ?? ''?>"><i class="fas fa-pencil-alt"></i> Edit</a>
                                            <a class="btn btn-danger btn-sm" href="home_slider_delete.php?id=<?php echo $value['id'] ?? ''?>"><i class="fas fa-trash"></i> Delete</a>
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