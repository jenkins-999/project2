<title><?php echo $judul ?></title>
<br>
<button onclick="history.back()" class="btn btn-link ml-4">
    < Kembali</button>
        <br><br>
        <h1 class="h1 ml-4 text-gray-900"><b><?php echo $judul ?></b></h1>
        <br><br><br>

        <!--$data_karyawan_single['id'] : perlu diletakan di url agar bisa diterima/tangkap pada controller (sbg penanda id yang akan diupdate) -->
        <form method="post" action="<?php echo site_url('karyawan/insert_submit/'); ?>" class="ml-4">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nomor Pegawai</label>
                <div class="col-sm-2">
                    <input type="number" name="nomor_pegawai" value="" required="" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-2">
                    <input type="text" name="nama" value="" required="" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">No. HP</label>
                <div class="col-sm-2">
                    <input type="text" name="no_hp" value="" required="" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-4">
                    <input type="text" name="alamat" value="" required="" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-2">
                    <input type="password" name="password" value="" required="" class="form-control">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-2">
                    <input type="radio" name="jenis_kelamin" value="Pria" required="" class="form-check-radio">
                    <label>Laki-laki</label>
                </div>
                <div class="col-sm-2">
                    <input type="radio" name="jenis_kelamin" value="Wanita" required="" class="form-check-radio">
                    <label>Perempuan</label>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jumlah Cuti</label>
                <div class="col-sm-2">
                    <input type="number" name="kuota_cuti" value="" required="" class="form-control">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-2">
                    <select name="status" class="custom-select">
                        <option value="admin">Admin</option>
                        <option value="karyawan">Karyawan</option>
                        <option value="manager">Manajer</option>
                    </select>
                </div>
            </div>

            <br>
            <button class="btn btn-primary" type="submit" name="submit" value="Simpan"> Simpan </button>
        </form>