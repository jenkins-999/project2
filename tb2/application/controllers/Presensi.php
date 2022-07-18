<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Presensi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('nomor_pegawai'))) {
			redirect('user/login');
		}
		date_default_timezone_set("Asia/Jakarta");
		//memanggil model
		$this->load->model(array('presensi_model', 'karyawan_model'));
	}

	public function index()
	{
		//mengarahkan ke function read
		$this->read();
	}

	public function read()
	{
		//$this->session->userdata('nomor_pegawai')
		$id_karyawan = $this->session->userdata('nomor_pegawai');
		if ($this->session->userdata('status') === 'admin') {
			$data_presensi = $this->presensi_model->read();
		} else {
			$data_presensi = $this->presensi_model->read($id_karyawan);
		}
		//mengirim data ke view
		$output = array(
			//memanggil view
			'judul' => 'Absen Karyawan',
			'theme_page' => 'presensi_read',


			//data karyawan dikirim ke view
			'data_presensi' => $data_presensi
		);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert()
	{
		//mengirim data ke view
		$output = array(
			//memanggil view
			'judul' => 'Absensi Karyawan',
			'theme_page' => 'presensi_insert'
		);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function masuk()
	{
		//menangkap data input dari view
		$id_karyawan = $this->input->post('id_karyawan');
		$tanggal_masuk = $this->input->post('tanggal_masuk');

		//mengirim data ke model
		$input = array(
			//format : nama field/kolom table => data input dari view
			'tanggal_masuk' => date('Y-m-d H:i:s'),
			'id_karyawan' => $this->session->userdata('nomor_pegawai'),

		);

		//memanggil function insert pada karyawan model
		//function insert berfungsi menyimpan/create data ke table karyawan di database
		$data_presensi = $this->presensi_model->insert($input);

		//mengembalikan halaman ke function read
		redirect('presensi/read');
	}

	public function update()
	{
		//menangkap id data yg dipilih dari view (parameter get)
		$id = $this->uri->segment(3);

		//function read berfungsi mengambil 1 data dari table karyawan sesuai id yg dipilih
		$data_presensi_single = $this->presensi_model->read_single($id);

		//mengirim data ke view
		$output = array(
			'judul' => 'Absensi Karyawan',
			'theme_page' => 'presensi_update',

			//mengirim data karyawan yang dipilih ke view
			'data_presensi_single' => $data_presensi_single,
		);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}
	public function keluar()
	{
		$id = $this->uri->segment(3);
		//menangkap data input dari view
		$id_karyawan = $this->input->post('id_karyawan');
		$tanggal_keluar = $this->input->post('tanggal_keluar');


		//mengirim data ke model
		$input = array(
			//format : nama field/kolom table => data input dari view
			'tanggal_keluar' => date('Y-m-d H:i:s'),
			'id_karyawan' =>  $this->session->userdata('nomor_pegawai'),

		);

		//memanggil function insert pada karyawan model
		//function insert berfungsi menyimpan/create data ke table karyawan di database
		$data_presensi = $this->presensi_model->update($input, $id);

		//mengembalikan halaman ke function read
		redirect('presensi/read');
	}

	public function data_export()
	{
		//memanggil function read pada karyawan model
		//function read berfungsi mengambil/read data dari table karyawan di database
		$bulan = $this->input->post('bulan');
		$id_karyawan = '';
		//mengirim data ke model
		$data_presensi = $this->presensi_model->laporan($id_karyawan, $bulan);		//$data_karyawan = $this->karyawan_model->laporan();


		//memanggil function insert pada karyawan model
		//function insert berfungsi menyimpan/create data ke table karyawan di database

		//mengirim data ke view
		$output = array(
			//memanggil view
			'judul' => 'Daftar presensi',

			//data karyawan dikirim ke view
			'data_presensi' => $data_presensi,
			//'data_karyawan' => $data_karyawan,
		);



		//memanggil file view
		$this->load->view('presensi_data_export', $output);
	}

	public function data_view()
	{
		//memanggil function read pada karyawan model
		//function read berfungsi mengambil/read data dari table karyawan di database
		$bulan = $this->input->post('bulan');
		$id_karyawan = '';
		//mengirim data ke model
		$data_presensi = $this->presensi_model->laporan($id_karyawan, $bulan);		//$data_karyawan = $this->karyawan_model->laporan();


		//memanggil function insert pada karyawan model
		//function insert berfungsi menyimpan/create data ke table karyawan di database

		//mengirim data ke view
		$output = array(
			//memanggil view
			'judul' => 'Daftar presensi',
			'theme_page' => 'presensi_data_view',

			//data karyawan dikirim ke view
			'data_presensi' => $data_presensi,
			//'data_karyawan' => $data_karyawan,
		);



		//memanggil file view
		$this->load->view('theme/index', $output);
	}


	public function laporan()
	{
		//mengirim data ke view
		$output = array(
			//memanggil view
			'judul' => 'Laporan Presensi Karyawan',
			'theme_page' => 'presensi_laporan'
		);
		//memanggil file view
		$this->load->view('theme/index', $output);
	}
	public function laporan_submit()
	{
		//menangkap data input dari view
		$bulan = $this->input->post('bulan');
		$id_karyawan = '';
		//mengirim data ke model


		//memanggil function insert pada karyawan model
		//function insert berfungsi menyimpan/create data ke table karyawan di database
		$data_presensi = $this->presensi_model->laporan($id_karyawan, $bulan);

		//mengembalikan halaman ke function read
		$this->load->view('theme/index');
	}
	public function pie()
	{
		//memanggil function read pada kota model
		//function read berfungsi mengambil/read data dari table kota di database
		$data_presensi = $this->presensi_model->read();
		$presensi_masuk = $this->presensi_model->get_data_presensi();

		//mengirim data ke view
		$output = array(
			'theme_page' => 'presensi_pie',
			'judul' => 'Pie Chart',
			'data_presensi' => $data_presensi,
			'presensi_masuk' => $presensi_masuk,
		);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}
}
