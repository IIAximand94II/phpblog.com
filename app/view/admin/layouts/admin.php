<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?=ADMIN_VIEW?>plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=ADMIN_VIEW?>dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?=ADMIN_VIEW?>plugins/summernote/summernote-bs4.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <?php require('includes/navbar.php')?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Starter Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Starter Page</li>
                        </ol>
                    </div><!-- /col -->
                </div><!-- /row -->
            </div><!-- /container-fluid -->
        </div>
        <!-- /content-header -->


        <!-- MAIN CONTENT -->
        <?=$content?>
        <!-- /MAIN CONTENT -->


    <!-- Main Footer -->
    <?php require('includes/footer.php')?>
    </div>
</div>
<!-- /wrapper -->

<!-- REQUIRED SCRIPTS -->
<?php foreach($scripts as $script){
    echo $script;
}?>
<!-- jQuery -->
<script src="<?=ADMIN_VIEW?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=ADMIN_VIEW?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=ADMIN_VIEW?>dist/js/adminlte.min.js"></script>
</body>
</html>
