<a href=" <?php echo site_url('presensi/masuk'); ?>"" class=" btn btn-primary">Presensi Masuk</a>

<br><br>

<table class="table table-borderless table-hover shadow p-3 mb-5 bg-white rounded" id="datatables">
	<thead class="thead-blue">
		<tr>
			<th>ID</th>
			<?php if ($this->session->userdata('status') == 'admin') : ?>
				<th>Nama</th>
			<?php endif; ?>
			<th>Presensi Masuk</th>
			<th>Presensi Keluar</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>

		<?php foreach ($data_presensi as $presensi) : ?>
			<tr>
				<td><?php echo $presensi['id']; ?></td>
				<?php if ($this->session->userdata('status') == 'admin') : ?>
					<td><?php echo $presensi['nama'] ?></td>
				<?php endif; ?>
				<td><?php echo $presensi['tanggal_masuk']; ?></td>
				<td><?php echo $presensi['tanggal_keluar']; ?></td>
				<td>
					<a href="<?php echo site_url('presensi/keluar/' . $presensi['id']); ?>" class="btn btn-danger">
						Presensi keluar
					</a>
				</td>

			</tr>
		<?php endforeach ?>
	</tbody>
</table>