<br>
<a class="btn btn-primary" href="<?php echo site_url('izin/insert'); ?>">Ajukan</a>
<a class="btn btn-light" href="<?php echo site_url('cuti/read'); ?>">Cuti</a>

<br /><br />

<table class="table table-borderless shadow p-3 mb-5 bg-white rounded" id="datatables">
	<thead class="thead-blue">
		<tr>
			<th>ID</th>
			<?php if ($this->session->userdata('status') == 'manager') : ?>
				<th>Nama</th>
			<?php endif; ?>
			<th>Tanggal Izin</th>
			<th>Tanggal Selesai</th>
			<th>Keterangan</th>
			<th>Surat</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>

		<?php foreach ($data_izin as $izin) : ?>


			<tr>
				<td><?php echo $izin['id']; ?></td>
				<?php if ($this->session->userdata('status') == 'manager') : ?>
					<td><?php echo $izin['nama']; ?></td>
				<?php endif; ?>
				<td><?php echo $izin['tgl_izin']; ?></td>
				<td><?php echo $izin['tgl_selesai']; ?></td>
				<td><?php echo $izin['keterangan']; ?></td>
				<td>
					<div class="dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ?>
							Show file</a>
						<div class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
							<img class="dropdown-item" src="<?php echo base_url('upload_folder/' . $izin['surat']); ?>" alt="" style="width: 200px;">
						</div>
					</div>
				</td>
				<td><?php echo $izin['status']; ?></td>
				<td>
					<!--link ubah data (menyertakan id per baris untuk dikirim ke controller)-->
					<a href="<?php echo site_url('izin/update/' . $izin['id']); ?>" class="btn btn-info">
						Ubah
					</a>
					<?php if ($this->session->userdata('status') == 'manager') : ?>

						<!--link hapus data (menyertakan id per baris untuk dikirim ke controller)-->
						<a href="<?php echo site_url('izin/delete/' . $izin['id']); ?>" onClick="return confirm('Apakah anda yakin?')" class="btn btn-danger">
							Hapus
						</a>
					<?php endif; ?>

				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>