<!--link tambah data-->
<br>
<a href="<?php echo site_url('karyawan/insert'); ?>" class="btn btn-primary">Tambah</a>
<br><br>


<table class="table table-borderless shadow p-3 mb-5 bg-white rounded" id="datatables">
    <thead class="thead-blue">
        <tr>
            <th>NIP</th>
            <th>Nama</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <!--looping data karyawan-->
        <?php foreach ($data_karyawan as $karyawan) : ?>

            <!--cetak data per baris-->
            <tr>
                <td><?php echo $karyawan['nomor_pegawai']; ?></td>
                <td><?php echo $karyawan['nama'] ?></td>
                <td><?php echo $karyawan['status'] ?></td>
                <td>
                    <!--link ubah data (menyertakan id per baris untuk dikirim ke controller)-->
                    <a href="<?php echo site_url('karyawan/reset/' . $karyawan['nomor_pegawai']); ?>" class="btn btn-info">
                        Reset Password
                    </a>

                    <!--link hapus data (menyertakan id per baris untuk dikirim ke controller)-->
                    <a href="<?php echo site_url('karyawan/delete/' . $karyawan['nomor_pegawai']); ?>" onClick="return confirm('Apakah anda yakin?')" class="btn btn-danger">
                        Hapus
                    </a>

                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>