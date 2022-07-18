<title><?php echo $judul ?></title>
<br>
<button onclick="history.back()" class="btn btn-link ml-4">
    < Kembali</button>
        <br><br>
        <h1 class="h1 ml-4 text-gray-900"><b><?php echo $judul ?></b></h1>
        <br><br><br>

        <!--$data_karyawan_single['id'] : perlu diletakan di url agar bisa diterima/tangkap pada controller (sbg penanda id yang akan diupdate) -->
        <form method="post" action="<?php echo site_url('karyawan/update_submit/' . $data_karyawan_single['nomor_pegawai']); ?>" class="ml-4">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nomor Pegawai</label>
                <div class="col-sm-2">
                    <input type="number" name="nomor_pegawai" value="<?php echo $data_karyawan_single['nomor_pegawai']; ?>" required="" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-2">
                    <input type="text" name="nama" value="<?php echo $data_karyawan_single['nama']; ?>" required="" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">No. HP</label>
                <div class="col-sm-2">
                    <input type="text" name="no_hp" value="<?php echo $data_karyawan_single['no_hp']; ?>" required="" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-4">
                    <input type="text" name="alamat" value="<?php echo $data_karyawan_single['alamat']; ?>" required="" class="form-control">
                </div>
            </div>

            <br>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-2">
                    <input type="radio" class="form-check-radio" name="jenis_kelamin" value="Pria" <?php if ($data_karyawan_single['jenis_kelamin'] == "Pria") {
                                                                                                        echo "checked";
                                                                                                    } ?>>
                    <label>Pria</label>
                </div>
                <div class="col-sm-2">
                    <input type="radio" class="form-check-radio" name="jenis_kelamin" value="Wanita" <?php if ($data_karyawan_single['jenis_kelamin'] == "Wanita") {
                                                                                                            echo "checked";
                                                                                                        } ?>>
                    <label>Wanita</label>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jumlah Cuti</label>
                <div class="col-sm-2">
                    <input type="number" name="kuota_cuti" value="<?php echo $data_karyawan_single['kuota_cuti']; ?>" required="" class="form-control">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jabatan</label>
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

            <button class="btn btn-primary" type="submit" name="submit" value="Simpan"> Simpan </button>
        </form>