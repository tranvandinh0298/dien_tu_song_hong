<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Màn hình đăng nhập trang quản lý</title>
    <?php $this->load->view('/public/_block/meta') ?>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url("private/plugins/fontawesome-free/css/all.min.css") ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url("private/plugins/icheck-bootstrap/icheck-bootstrap.min.css") ?>">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo base_url("private/plugins/toastr/toastr.min.css") ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url("private/dist/css/adminlte.min.css") ?>">
    <!-- Custom css -->
    <link rel="stylesheet" href="<?php echo base_url("private/dist/css/main.css") ?>">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->

        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <div class="login-logo">
                    <img src="<?= base_url('public/assets/images/song_hong_logo.jpg') ?>">
                </div>
                <a href="<?php echo base_url('dashboard') ?>" class="h1"><b>Trang quản trị</b></a>
            </div>
            <div class="card-body">
                <?php load_view($content) ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?php echo base_url("private/plugins/jquery/jquery.min.js") ?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url("private/plugins/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
    <!-- bs-custom-file-input -->
    <script src="<?php echo base_url("private/plugins/bs-custom-file-input/bs-custom-file-input.min.js") ?>"></script>
    <!-- Toastr -->
    <script src="<?php echo base_url("private/plugins/toastr/toastr.min.js") ?>"></script>
    <!-- dropzonejs -->
    <script src="<?php echo base_url("private/plugins/dropzone/min/dropzone.min.js") ?>"></script>
    <!-- AdminLTE -->
    <script src="<?php echo base_url("private/dist/js/adminlte.js") ?>"></script>
    <!-- Custom Js -->
    <script src="<?php echo base_url("private/dist/js/main.js") ?>"></script>

    <?php load_view($components['alert']); ?>
</body>

</html>