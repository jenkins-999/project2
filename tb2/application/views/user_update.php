<title><?php echo $judul; ?></title>
<br>
<button onclick="history.back()" class="btn btn-link ml-4">< Kembali</button>
<br><br>

<h1 class="h1 ml-4 text-gray-900"><b><?php echo $judul ?></b></h1>
<br><br><br>

<!--$data_user_single['id'] : perlu diletakan di url agar bisa diterima/tangkap pada controller (sbg penanda id yang akan diupdate) -->
<form method="post" action="<?php echo site_url('karyawan/reset_submit/' . $data_karyawan_single['nomor_pegawai']); ?>" class="ml-4">

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-2">
            <input type="password" name="password" value="" required="" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-2">
            <select name="status" class="form-control">
                <option value="admin" <?php if ($data_karyawan_single['status'] == "admin") {
                                            echo "selected";
                                        } ?>>admin</option>
                <option value="karyawan" <?php if ($data_karyawan_single['status'] == "karyawan") {
                                                echo "selected";
                                            } ?>>karyawan</option>
                <option value="manager" <?php if ($data_karyawan_single['status'] == "manager") {
                                            echo "selected";
                                        } ?>>manager</option>
            </select>
        </div>
    </div>
    <br>
    <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
</form>