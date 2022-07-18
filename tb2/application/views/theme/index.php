<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - <?php echo $judul;; ?></title>

    <!-- css yang digunakan theme -->
    <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css/sb-admin-2.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/theme.css'); ?>" rel="stylesheet">
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(('assets/css/table.css')) ?>">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

    <!-- css yang digunakan datatables -->
    <link href="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">
    <style type="text/css">
        .dataTables_filter {
            color: red;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- load sidebar -->
        <?php $this->load->view('theme/sidebar'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- load header -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- load halaman sesuai controller yang dipilih dari sidebar -->
                    <?php $this->load->view($theme_page); ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- load footer -->
            <?php $this->load->view('theme/footer'); ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- js yang digunakan theme -->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/sb-admin-2.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/sidebar.js'); ?>"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
    <script src="http://cdn.datatables.net/plug-ins/1.11.3/sorting/datetime-moment.js"></script>

    <!-- js yang digunakan datatables -->
    <script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#datatables').DataTable({
                "lengthChange": false,
                "pageLength": 7,
            });
        });
    </script>

</body>

</html>