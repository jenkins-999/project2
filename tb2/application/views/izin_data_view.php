<button class="btn btn-primary" onclick="location.href='<?php echo site_url('izin/data_export'); ?>'"> Export </button>
<?php
//header("Content-Type: application/vnd.ms-excel");
//header("Content-disposition: attachment; filename=export_data_izin.xls");

?>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Tanggal Izin</th>
            <th>Tanggal Selesai</th>
            <th>Keterangan</th>
            <th>Status</th>

        </tr>
    </thead>
    <tbody>
        <!--looping data provinsi-->
        <?php foreach ($data_izin as $izin) : ?>

            <!--cetak data per baris-->
            <tr>
                <td><?php echo $izin['id']; ?></td>
                <td><?php echo $izin['nama'] ?></td>
                <td><?php echo $izin['tgl_izin']; ?></td>
                <td><?php echo $izin['tgl_selesai'] ?></td>
                <td><?php echo $izin['keterangan'] ?></td>
                <td><?php echo $izin['status'] ?></td>

            </tr>
        <?php endforeach ?>
    </tbody>
</table>