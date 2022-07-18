<title><?php echo $judul; ?></title>
<br>
<button onclick="history.back()" class="btn btn-link ml-4">
	< Kembali</button>
		<br><br>
		<h1 class="h1 ml-4 text-gray-900"><b><?php echo $judul ?></b></h1>
		<br><br><br>

		<form method="post" action="<?php echo site_url('izin/insert_submit/'); ?>" class="ml-4" enctype="multipart/form-data">
			<input type="hidden" name="id_karyawan" value="<?php echo $this->session->userdata('nomor_pegawai') ?>;">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Izin</label>
				<div class="col-sm-2">
					<input type="datetime-local" name="tgl_izin" value="" required="" class="form-control">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Selesai</label>
				<div class="col-sm-2">
					<input type="datetime-local" name="tgl_selesai" value="" required="" class="form-control">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-6">
					<textarea name="keterangan" value="" required="" class="form-control"> </textarea>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Bukti surat</label>
				<div class="col-sm-6">
					<input type="file" name="userfile" size="20" class="form-control">
				</div>
			</div>
			<input type="hidden" name="status" value="menunggu">
			<br>
			<input type="submit" name="submit" value="Simpan" class="btn btn-primary">
		</form>