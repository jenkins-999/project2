<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Izin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') === 'karyawan') {
			echo '<script>alert("Dilarang masuk")</script>';
			exit();
		}
		//memanggil model
		$this->load->model('izin_model');
	}

	public function index()
	{
		//mengarahkan ke function read
		$this->read();
	}

	public function read()
	{

		$data_izin = $this->izin_model->read();

		//mengirim data ke view
		$output = array(
			//memanggil view
			'judul' => 'Pengajuan Izin',
			'theme_page' => 'izin_read',

			//data provinsi dikirim ke view
			'data_izin' => $data_izin
		);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert()
	{
		//mengirim data ke view
		$output = array(
			//memanggil view
			'judul' => 'Ajukan izin',
			'theme_page' => 'izin_insert'
		);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert_submit()
	{
		//menangkap data input dari view
		$id_karyawan = $this->input->post('id_karyawan');
		$tgl_izin = $this->input->post('tgl_izin');
		$tgl_selesai = $this->input->post('tgl_selesai');
		$keterangan = $this->input->post('keterangan');
		$status = $this->input->post('status');

		//mengirim data ke model
		$input = array(
			//format : nama field/kolom table => data input dari view
			'id_karyawan' => $id_karyawan,
			'tgl_izin' => $tgl_izin,
			'tgl_selesai' => $tgl_selesai,
			'keterangan' => $keterangan,
			'status' => $status,
		);

		//memanggil function insert pada provinsi model
		//function insert berfungsi menyimpan/create data ke table provinsi di database
		$data_izin = $this->izin_model->insert($input);

		//mengembalikan halaman ke function read
		redirect('izin/read');
	}

	public function update()
	{
		//menangkap id data yg dipilih dari view (parameter get)
		$id = $this->uri->segment(3);

		//function read berfungsi mengambil 1 data dari table provinsi sesuai id yg dipilih
		$data_izin_single = $this->izin_model->read_single($id);

		//mengirim data ke view
		$output = array(
			'judul' => 'Ubah Pengajuan Izin',
			'theme_page' => 'izin_update',

			//mengirim data provinsi yang dipilih ke view
			'data_izin_single' => $data_izin_single,
		);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function update_submit()
	{
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		//menangkap data input dari view
		$status = $this->input->post('status');

		//mengirim data ke model
		$input = array(
			//format : nama field/kolom table => data input dari view
			'status' => $status,
		);

		//memanggil function insert pada provinsi model
		//function insert berfungsi menyimpan/create data ke table provinsi di database
		$data_izin = $this->izin_model->update($input, $id);

		//mengembalikan halaman ke function read
		redirect('izin/read');
	}

	public function delete()
	{
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		//memanggil function delete pada provinsi model
		$data_izin = $this->izin_model->delete($id);

		//mengembalikan halaman ke function read
		redirect('izin/read');
	}

	public function read_export()
	{
		//memanggil function read pada provinsi model
		//function read berfungsi mengambil/read data dari table provinsi di database
		$data_izin = $this->izin_model->read();

		//mengirim data ke view
		$output = array(
			//memanggil view
			'judul' => 'Rekap Izin',

			//data provinsi dikirim ke view
			'data_izin' => $data_izin
		);

		//memanggil file view
		$this->load->view('izn_read_export', $output);
	}

	public function rekap()
	{
		//memanggil function read pada provinsi model
		//function read berfungsi mengambil/read data dari table provinsi di database
		$data_izin = $this->izin_model->read();

		//mengirim data ke view
		$output = array(
			//memanggil view
			'judul' => 'Rekap Izin',
			'theme_page' => 'izin_rekap',

			//data provinsi dikirim ke view
			'data_izin' => $data_izin
		);

		//memanggil file view
		$this->load->view('izin_rekap', $output);


}
}
