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
                    <small>Danh sách admin</small>
                </h1>
            </section>
            <!-- Main content -->
            <section class="content container-fluid">
                <?php
                include_once('./../../dals/admin.php');
                $obj = new Admin();
                $rs = $obj->getAll();
                ?>
                <div class="box">
                    <div class="box-header with-border">
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>username</th>
                                    <th>email</th>
                                    <th>Fullname</th>
                                    <th>Thao tác</th>
                                </tr>
                                <tr>
                                    <?php if ($rs != null) {
                                        foreach ($rs as $r) {
                                            ?>
                                    <td><?php echo $r[Admin::COL_ID]; ?></td>
                                    <td><?php echo $r[Admin::COL_USERNAME]; ?></td>
                                    <td><?php echo $r[Admin::COL_EMAIL]; ?></td>
                                    <td><?php echo $r[Admin::COL_FULLNAME]; ?></td>
                                    <td></td>
                                    <?php
                                        }
                                    } ?>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <li><a href="#">«</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
        <?php include_once('../common/footer.php'); ?>
    </div>
    <?php include_once('../common/scripts.php') ?>
</body>

</html>