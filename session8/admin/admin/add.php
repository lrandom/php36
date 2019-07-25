<?php
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    include('./../../dals/admin.php');
    $obj = new Admin();
    $data = array($username, $password, $email, $fullname);
    $obj->insert($data);
}
?>
<!DOCTYPE html>
<html>
<?php include_once('./../common/head.php'); ?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include_once('./../common/header.php'); ?>
        <!-- Left side column. contains the logo and sidebar -->
        <?php include_once('./../common/sidebar.php'); ?>
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Quản trị admin
                    <small>Thêm mới admin</small>
                </h1>
            </section>
            <!-- Main content -->
            <section class="content container-fluid">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">UserName</label>
                                <input type="text" name="username" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">FullName</label>
                                <input type="text" name="fullname" class="form-control" id="exampleInputPassword1"
                                    placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputPassword1"
                                    placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="Password">
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
        <?php include_once('../common/footer.php'); ?>
    </div>
    <?php include_once('../common/scripts.php') ?>
</body>

</html>