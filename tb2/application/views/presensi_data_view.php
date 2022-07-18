<button class="btn btn-primary" onclick="location.href='<?php echo site_url('presensi/data_export'); ?>'"> Export </button>

<?php
//header("Content-Type: application/vnd.ms-excel");
//header("Content-disposition: attachment; filename=export_data_presensi.xls");

?>



<table border=" ">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Jam masuk</th>
            <th>Jam keluar</th>
        </tr>
    </thead>
    <tbody>
        <!--looping data provinsi-->
        <?php foreach ($data_presensi as $presensi) : ?>

            <!--cetak data per baris-->
            <tr>
                <td><?php echo $presensi['id']; ?></td>
                <td><?php echo $presensi['nama'] ?></td>
                <td><?php echo $presensi['tanggal_masuk']; ?></td>
                <td><?php echo $presensi['tanggal_keluar'] ?></td>

            </tr>
        <?php endforeach ?>
    </tbody>
</table>