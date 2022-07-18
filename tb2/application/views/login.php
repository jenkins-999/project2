<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>


    <title><?php echo $judul;; ?></title>

    <!-- css yang digunakan theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="<?php echo base_url('assets/css/login.css'); ?>" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="main">
        <div class="p-5">
            <div class="text-center">
                <h1 class="title">Sistem Presensi Kantor</h1>
            </div>

            <?php echo validation_errors('<div class="alert alert-danger text-center">', '</div>'); ?>

            <form method="post" action="<?php echo site_url('karyawan/login/'); ?>">
                <div class="form" style="display: flex;">
                    <input type="text" name="nomor_pegawai" class="form-control form-control-user" placeholder="NIP" value="" required="">
                </div>
                <div class="form">
                    <input type="password" name="password" class="form-control form-control-user" placeholder="Password" value="" required="">
                </div>

                <button class="button btn btn-primary" type="submit" name="submit" value="Login"> Masuk </button>

            </form>
            <br>
            Admin: 23 &nbsp; &nbsp; &nbsp;
            karyawan: 24 &nbsp; &nbsp; &nbsp;
            Manager: 25 <br>
            Password: zakki
        </div>

</body>

</html>