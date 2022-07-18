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


	<form method="post" action="<?php echo site_url('presensi/update_submit/' . $data_presensi_single['id']); ?>">
		<table>
			<tr>
				<td>Absen Masuk</td>
				<td><input type="datetime-local" name="tanggal_masuk" value="<?php echo $data_presensi_single['tanggal_masuk']; ?>" required=""></td>
			</tr>
			<tr>
				<td>Absen Keluar</td>
				<td><input type="datetime-local" name="tanggal_keluar" value="<?php echo $data_presensi_single['tanggal_presensi']; ?>" required=""></td>
			</tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit" value="Simpan"></td>
			</tr>
		</table>
	</form>

</body>

</html>