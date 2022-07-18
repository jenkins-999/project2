<title><?php echo $judul; ?></title>

<br>
<button onclick="history.back()" class="btn btn-link ml-4">< Kembali</button>
<br><br>

<h1 class="h1 ml-4 text-gray-900"><b><?php echo $judul ?></b></h1>
<br><br><br>

<form method="post" action="<?php echo site_url('cuti/update_submit/' . $data_cuti_single['id']); ?>" class="ml-4">
	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Nomor Pegawai</label>
		<div class="col-sm-2">
			<input type="number" name="id_karyawan" value="<?php echo $data_cuti_single['id_karyawan']; ?>" class="form-control" disabled>
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
			<input name="keterangan" value="<?php echo $data_cuti_single['keterangan']; ?>" class="form-control" disabled> </input>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Tanggal Mulai Cuti</label>
		<div class="col-sm-2">
			<input type="date" name="tgl_cuti" value="<?php echo $data_cuti_single['tgl_cuti']; ?>" required="" class="form-control" disabled>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Lama Cuti</label>
		<div class="col-sm-2">
			<input type="text" name="tgl_selesai" value="<?php echo $data_cuti_single['lama_cuti']; ?>" required="" class="form-control" disabled> 
		</div>
	</div>

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


	<input type="submit" name="submit" value="Simpan" class="btn btn-primary">

</form>