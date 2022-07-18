<br>
<a href="<?php echo site_url('cuti/insert'); ?>" class="btn btn-primary">Ajukan</a>
<a href="<?php echo site_url('cuti/read'); ?>" class="btn btn-light">Izin</a>
<br><br>
Jatah Cuti= <?php echo $data_karyawan_single['kuota_cuti']; ?>


<table class="table table-borderless shadow p-3 mb-5 bg-white rounded" id="datatables">
	<thead class="thead-blue">
		<tr>
			<th>ID</th>
			<th>Nama</th>
			<th>Tanggal Pengajuan</th>
			<th>Tanggal cuti</th>
			<th>Tanggal Selesai</th>
			<th>Keterangan</th>
			<th>Lama Cuti</th>
			<th>Status</th>
			<?php if ($this->session->userdata('status') == 'manager') : ?>
				<th>Action</th>
			<?php endif; ?>
		</tr>
	</thead>
	<tbody>

		<?php foreach ($data_cuti as $cuti) : ?>


			<tr>
				<td><?php echo $cuti['id']; ?></td>
				<td><?php echo $cuti['nama']; ?></td>
				<td><?php echo $cuti['tgl_pengajuan']; ?></td>
				<td><?php echo $cuti['tgl_cuti']; ?></td>
				<td><?php echo $cuti['tgl_selesai']; ?></td>
				<td><?php echo $cuti['keterangan']; ?></td>
				<td><?php echo $cuti['lama_cuti']; ?></td>
				<td><?php echo $cuti['status']; ?></td>
				<?php if ($this->session->userdata('status') == 'manager') : ?>
					<td>
						<!--link ubah data (menyertakan id per baris untuk dikirim ke controller)-->
						<a href="<?php echo site_url('cuti/update/' . $cuti['id']); ?>" class="btn btn-info">
							Ubah
						</a>

						<!--link hapus data (menyertakan id per baris untuk dikirim ke controller)-->
						<a href="<?php echo site_url('cuti/delete/' . $cuti['id']); ?>" onClick="return confirm('Apakah anda yakin?')" class="btn btn-danger">
							Hapus
						</a>

					</td>
				<?php endif; ?>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>