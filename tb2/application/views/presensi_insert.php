<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title><?php echo $judul; ?></title>
</head>

<body>

	<form method="post" action="<?php echo site_url('presensi/insert_submit/'); ?>">
		<table border="1">
			<input type="hidden" name="id_karyawan" value="<?php echo $this->session->userdata('nomor_pegawai') ?>;">
			<tr>
				<td>Absensi Masuk</td>
				<td><input type="datetime" null="yes" name="tanggal_masuk" value="<?php echo date('Y-m-d H:i:s'); ?>"></td>
			</tr>
			<tr>
				<td>Absensi Keluar</td>
				<td><input type="datetime" null="yes" name="tanggal_keluar" value=""></td>
			</tr>

			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Simpan"></td>
			</tr>
		</table>
	</form>

</body>

</html>