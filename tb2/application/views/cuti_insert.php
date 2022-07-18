<title><?php echo $judul; ?></title>
<br>
<button onclick="history.back()" class="btn btn-link ml-4">
	< Kembali</button>
		<br><br>
		<h1 class="h1 ml-4 text-gray-900"><b><?php echo $judul ?></b></h1>
		<br><br><br>

		<form method="post" action="<?php echo site_url('cuti/insert_submit/'); ?>" class="ml-4">

			<input type="hidden" name="id_karyawan" value="<?php echo $this->session->userdata('nomor_pegawai') ?>;">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal cuti</label>
				<div class="col-sm-2">
					<input type="date" name="tgl_cuti" value="" required="" class="form-control">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Selesai</label>
				<div class="col-sm-2">
					<input type="date" name="tgl_selesai" value="" required="" class="form-control">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-6">
					<textarea name="keterangan" value="" required="" class="form-control"> </textarea>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kuota Cuti</label>
				<div class="col-sm-2">
					<input type="text" name="kuota_cuti" value="<?php echo $data_karyawan_single['kuota_cuti']; ?>" required="" class="form-control" disabled>
				</div>
			</div>
			<input type="hidden" name="status" value="menunggu">

			<input type="submit" name="submit" value="Simpan" class="btn btn-primary">
		</form>