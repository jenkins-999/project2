<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $judul ?></title>
</head>

<body>

    <h1><?php echo $judul ?></h1>

    <!--$data_karyawan_single['id'] : perlu diletakan di url agar bisa diterima/tangkap pada controller (sbg penanda id yang akan diupdate) -->
    <form method="post" action="<?php echo site_url('karyawan/insert_submit/'); ?>">
        <div class="col-md-3 mb-3">
            <label>Nomor Pegawai</label>
            <input type="number" class="form-control" name="nomor_pegawai" value="">
        </div>

        <div class="col-md-3 mb-3">
            <label>Nama</label> <br>
            <input type="text" class="form-control" name="nama" value="">
        </div>

        <div class="col-md-3 mb-3">
            <label>no hp</label> <br>
            <input type="text" class="form-control" name="no_hp" value="" required="">
        </div>

        <div class="col-md-3 mb-3">
            <label>Alamat</label> <br>
            <input type="text" class="form-control" name="alamat" value="" required="">
        </div>
        <div class="col-md-3 mb-3">
            <label>Password</label> <br>
            <input type="password" class="form-control" name="password" value="" required="">
        </div>
        <div class="form-check">
            <label>Gender</label> <br>
            <input type="radio" class="form-check-radio" name="jenis_kelamin" value="Pria">
            <label class="form-check-label" for="">Pria</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-radio" name="jenis_kelamin" value="Wanita">
            <label class="form-check-label" for=""> Wanita </label>
        </div>

        <button class="btn btn-primary" type="submit" name="submit" value="Simpan"> Simpan </button>
    </form>

</body>

</html>