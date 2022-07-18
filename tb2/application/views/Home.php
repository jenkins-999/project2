<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/home3.css'); ?>">
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>


</head>

<body>
    <div class="header">Selamat Datang</div>

    <div class="card2" onclick="myFunction()">
        <a href="<?php echo site_url('presensi/masuk') ?>">
            <div class="masuk" id="masuk">
                <span class="popuptext" id="myPopup">Absen Berhasil!</span>
            </div>
            <div class="container">Presensi Masuk

            </div>
        </a>
    </div>


    <div class="card1" href="<?php echo site_url('presensi/read') ?>">
        <a href="<?php echo site_url('presensi/read') ?>">
            <div class="keluar"> </div>
            <div class="container">Presensi Keluar

            </div>
        </a>
    </div>



    <!-- <div class="card2">
        <div class="keluar"> </div>
        <div class="container">Keluar</div>
    </div> -->

    <div class="card3">
        <a href="<?php echo site_url(('izin/read')) ?>">
            <div class="pengajuan"> </div>
            <div class="container2">Pengajuan <br> Cuti & Izin</div>
        </a>
    </div>

    <div class="card4">
        <a href="<?php echo site_url(('feeds')) ?>">
            <div class="news"> </div>
            <div class="container4">News page

            </div>
        </a>
    </div>

    <?php if ($this->session->userdata('status') == 'admin' or $this->session->userdata('status') == 'manager') : ?>
        <a href="<?php echo site_url('karyawan/read') ?>">
            <div class="button-admin">
                <div class="admin-icon"> </div>
                <div class="container3">Admin</div>
            </div>
        </a>
    <?php endif; ?>
    <a href="<?php echo site_url('karyawan/login') ?>">
        <div class="button-quit">
            <div class="quit"></div>
        </div>
    </a>



    <script>
        function myFunction() {
            var card2 = document.getElementById("myPopup");
            card2.classList.toggle("show");
        }
    </script>
</body>

</html>