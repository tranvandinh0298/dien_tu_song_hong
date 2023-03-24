<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= !empty($title) ? $title : 'Trang quản trị'; ?></title>
    <?php $this->load->view('/public/_block/meta')?>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url("private/plugins/fontawesome-free/css/all.min.css") ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url("private/plugins/select2/css/select2.min.css") ?>">
    <!-- Tagsinput -->
    <link rel="stylesheet" href="<?php echo base_url("private/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css") ?>">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url("private/plugins/icheck-bootstrap/icheck-bootstrap.min.css") ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url("private/dist/css/adminlte.min.css") ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url("private/plugins/summernote/summernote-bs4.min.css") ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url("private/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("private/plugins/datatables-responsive/css/responsive.bootstrap4.min.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("private/plugins/datatables-buttons/css/buttons.bootstrap4.min.css") ?>">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="<?php echo base_url("private/plugins/dropzone/min/dropzone.min.css") ?>">
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="<?php echo base_url("private/plugins/ekko-lightbox/ekko-lightbox.css") ?>">
    <!-- Custom css -->
    <link rel="stylesheet" href="<?php echo base_url("private/dist/css/main.css") ?>">
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php load_view($components['header']); ?>

        <!-- Main Sidebar Container -->
        <?php load_view($components['sidebar']); ?>

        <!-- Content Wrapper. Contains page content -->
        <?php load_view($content) ?>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <?php load_view($components['footer']); ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?php echo base_url("private/plugins/jquery/jquery.min.js") ?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url("private/plugins/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
    <!-- bs-custom-file-input -->
    <script src="<?php echo base_url("private/plugins/bs-custom-file-input/bs-custom-file-input.min.js") ?>"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url("private/plugins/select2/js/select2.full.min.js") ?>"></script>
    <!-- Tagsinput -->
    <script src="<?php echo base_url("private/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.js") ?>"></script>
    <!-- AdminLTE -->
    <script src="<?php echo base_url("private/dist/js/adminlte.js") ?>"></script>
    <!-- Summernote -->
    <script src="<?php echo base_url("private/plugins/summernote/summernote-bs4.min.js") ?>"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?php echo base_url("private/plugins/datatables/jquery.dataTables.min.js") ?>"></script>
    <script src="<?php echo base_url("private/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") ?>"></script>
    <script src="<?php echo base_url("private/plugins/datatables-responsive/js/dataTables.responsive.min.js") ?>"></script>
    <script src="<?php echo base_url("private/plugins/datatables-responsive/js/responsive.bootstrap4.min.js") ?>"></script>
    <script src="<?php echo base_url("private/plugins/datatables-buttons/js/dataTables.buttons.min.js") ?>"></script>
    <script src="<?php echo base_url("private/plugins/datatables-buttons/js/buttons.bootstrap4.min.js") ?>"></script>
    <script src="<?php echo base_url("private/plugins/datatables-buttons/js/buttons.html5.min.js") ?>"></script>
    <script src="<?php echo base_url("private/plugins/datatables-buttons/js/buttons.print.min.js") ?>"></script>
    <script src="<?php echo base_url("private/plugins/datatables-buttons/js/buttons.colVis.min.js") ?>"></script>
    <!-- dropzonejs -->
    <script src="<?php echo base_url("private/plugins/dropzone/min/dropzone.min.js") ?>"></script>
    <!-- Ekko Lightbox -->
    <script src="<?php echo base_url("private/plugins/ekko-lightbox/ekko-lightbox.min.js") ?>"></script>
    <!-- Filterizr-->
    <script src="<?php echo base_url("private/plugins/filterizr/jquery.filterizr.min.js") ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url("private/dist/js/demo.js") ?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- Custom JS -->
    <script src="<?php echo base_url("private/dist/js/main.js?v=".VERSION) ?>"></script>


    <?php load_view($components['alert']); ?>
</body>

</html>