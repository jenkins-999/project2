<title><?php echo $judul; ?></title>
<br>
<button onclick="history.back()" class="btn btn-link ml-4">
	< Kembali</button>
		<br><br>
		<h1 class="h1 ml-4 text-gray-900"><b><?php echo $judul ?></b></h1>
		<br><br><br>

		<form method="post" action="<?php echo site_url('izin/update_submit/' . $data_izin_single['id']); ?>" class="ml-4" enctype="multipart/form-data">
			<div class=" form-group row">
				<label class="col-sm-2 col-form-label">Nomor Pegawai</label>
				<div class="col-sm-2">
					<input type="number" name="id_karyawan" value="<?php echo $data_izin_single['id_karyawan']; ?>" class="form-control" disabled>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-2">
					<input type="text" name="nama" value="<?php echo $data_karyawan_single['nama']; ?>" class="form-control" disabled>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-6">
					<input name="keterangan" value="<?php echo $data_izin_single['keterangan']; ?>" class="form-control"> </input>
				</div>
			</div>
			<?php if ($this->session->userdata('status') == 'manager') : ?>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Status</label>
					<div class="col-sm-2">
						<input type="checkbox" name="status" value="Disetujui" class="form-check-checkbox">
						<label>Disetujui</label>
					</div>
					<div class="col-sm-2">
						<input type="checkbox" name="status" value="Ditolak" class="form-check-checkbox">
						<label>Ditolak</label>
					</div>

				</div>
			<?php endif; ?>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Bukti surat</label>
				<div class="col-sm-6">
					<input type="file" name="userfile" size="20" class="form-control">
				</div>
			</div>
			<br>
			<input type="submit" name="submit" value="Simpan" class="btn btn-primary">

		</form>