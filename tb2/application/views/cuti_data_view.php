<button class="btn btn-primary" onclick="location.href='<?php echo site_url('cuti/data_export'); ?>'"> Export </button>
<?php
//header("Content-Type: application/vnd.ms-excel");
//header("Content-disposition: attachment; filename=export_data_cuti.xls");

?>



<table border=" ">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Tanggal Pengajuan</th>
            <th>Tanggal Cuti</th>
            <th>Tanggal Selesai</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th>Lama Cuti</th>

        </tr>
    </thead>
    <tbody>
        <!--looping data provinsi-->
        <?php foreach ($data_cuti as $cuti) : ?>

            <!--cetak data per baris-->
            <tr>
                <td><?php echo $cuti['id']; ?></td>
                <td><?php echo $cuti['nama'] ?></td>
                <td><?php echo $cuti['tgl_pengajuan']; ?></td>
                <td><?php echo $cuti['tgl_cuti'] ?></td>
                <td><?php echo $cuti['tgl_selesai'] ?></td>
                <td><?php echo $cuti['keterangan'] ?></td>
                <td><?php echo $cuti['status'] ?></td>
                <td><?php echo $cuti['lama_cuti'] ?></td>


            </tr>
        <?php endforeach ?>
    </tbody>
</table>