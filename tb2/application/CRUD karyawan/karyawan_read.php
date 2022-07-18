<br>
<button class="btn btn-primary" type="submit" name="submit" value="Simpan" onclick="location.href='<?php echo site_url('karyawan/insert'); ?>'"> Tambah </button>
<br /><br />

<table class="table">
    <thead class="thead-light">
        <tr>
            <th class="judul">NIP</th>
            <th class="judul">Nama</th>
            <th class="judul">No hp</th>
            <th class="judul">JK</th>
            <th class="judul">Alamat</th>
            <th class="judul">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data_karyawan as $karyawan) : ?>
            <tr>
                <td class="isi"><?php echo $karyawan['nomor_pegawai']; ?></td>
                <td class="isi"><?php echo $karyawan['nama']; ?></td>
                <td class="isi"><?php echo $karyawan['no_hp']; ?></td>
                <td class="isi"><?php echo $karyawan['jenis_kelamin']; ?></td>
                <td class="isi"><?php echo $karyawan['alamat'] ?></td>
                <td class="isi">
                    <a href="<?php echo site_url('karyawan/update/' . $karyawan['nomor_pegawai']); ?>">
                        Ubah
                    </a>

                    <a href="<?php echo site_url('karyawan/delete/' . $karyawan['nomor_pegawai']); ?>" onClick="return confirm('Apakah anda yakin?')">
                        Hapus
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>