<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Izin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('nomor_pegawai'))) {
			redirect('user/login');
		}
		//memanggil model
		$this->load->model('izin_model');
		$this->load->model('karyawan_model');
	}

	public function index()
	{
		//mengarahkan ke function read
		$this->read();
	}

	public function read()
	{
		$id_karyawan = $this->session->userdata('nomor_pegawai');
		if ($this->session->userdata('status') === 'manager') {
			$data_izin = $this->izin_model->read();
		} else {
			$data_izin = $this->izin_model->read($id_karyawan);
		}

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

		//setting library upload
		$config['upload_path']          = './upload_folder/';
		$config['allowed_types']        = 'gif|jpg|png|pdf';
		$config['max_size']             = 10000;
		//$config['encrypt_name']         = TRUE;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('userfile')) {

			//respon alasan kenapa gagal upload
			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];


			//mengirim output ke view
			$input = array(
				'id_karyawan' => $id_karyawan,
				'tgl_izin' => $tgl_izin,
				'tgl_selesai' => $tgl_selesai,
				'keterangan' => $keterangan,
				'status' => $status,
				'surat' => $file_name,
			);
			$data_izin = $this->izin_model->insert($input);

			redirect('izin/read');

			//jika upload berhasil
		} else {

			//respon upload berhasil 
			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];


			//pesan berhasil (boleh dirubah)
			$input = array(
				'id_karyawan' => $id_karyawan,
				'tgl_izin' => $tgl_izin,
				'tgl_selesai' => $tgl_selesai,
				'keterangan' => $keterangan,
				'status' => $status,
				'surat' => $file_name,
			);
			$data_izin = $this->izin_model->insert($input);
			redirect('izin/read');
		}
	}

	public function update()
	{
		//menangkap id data yg dipilih dari view (parameter get)
		$id = $this->uri->segment(3);

		//function read berfungsi mengambil 1 data dari table provinsi sesuai id yg dipilih
		$data_izin_single = $this->izin_model->read_single($id);
		$nip = $data_izin_single['id_karyawan'];
		$data_karyawan_single = $this->karyawan_model->read_single($nip);

		//function read berfungsi mengambil 1 data dari table provinsi sesuai id yg dipilih

		$output = array(
			'judul' => 'Ubah Pengajuan Izin',
			'theme_page' => 'izin_update',

			//mengirim data provinsi yang dipilih ke view
			'data_izin_single' => $data_izin_single,
			'data_karyawan_single' => $data_karyawan_single,

		);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function update_submit()
	{
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		$data_izin_single = $this->izin_model->read_single($id);

		//menangkap data input dari view

		$status = $this->input->post('status');
		$keterangan = $this->input->post('keterangan');

		//setting library upload
		$config['upload_path']          = './upload_folder/';
		$config['allowed_types']        = 'gif|jpg|png|pdf';
		$config['max_size']             = 10000;
		//$config['encrypt_name']         = TRUE;
		$this->load->library('upload', $config);
		//jika gagal upload
		if (!$this->upload->do_upload('userfile')) {

			//respon upload berhasil 
			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];


			//pesan berhasil (boleh dirubah)
			$response = 'berhasil upload, nama file  : ' . $file_name;

			$input = array(
				'keterangan' => $keterangan,
				'status' => $status,
				'surat' => $file_name,
			);
			$data_izin = $this->izin_model->update($input, $id);
			redirect('izin/read');
		} else {

			//respon upload berhasil 
			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];


			//pesan berhasil (boleh dirubah)
			$response = 'berhasil upload, nama file  : ' . $file_name;

			$input = array(
				'keterangan' => $keterangan,
				'status' => $status,
				'surat' => $file_name,
			);
			$data_izin = $this->izin_model->update($input, $id);
			redirect('izin/read');
		}
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




	public function data_export()
	{
		//memanggil function read pada karyawan model
		//function read berfungsi mengambil/read data dari table karyawan di database
		echo $bulan = $this->input->post('bulan');
		$id_karyawan = '';
		//mengirim data ke model
		$data_izin = $this->izin_model->laporan($id_karyawan, $bulan);		//$data_karyawan = $this->karyawan_model->laporan();


		//memanggil function insert pada karyawan model
		//function insert berfungsi menyimpan/create data ke table karyawan di database

		//mengirim data ke view
		$output = array(
			//memanggil view
			'judul' => 'Daftar Izin',

			//data karyawan dikirim ke view
			'data_izin' => $data_izin,
			//'data_karyawan' => $data_karyawan,
		);

		//memanggil file view
		$this->load->view('izin_data_export', $output);
	}

	public function data_view()
	{
		//memanggil function read pada karyawan model
		//function read berfungsi mengambil/read data dari table karyawan di database
		echo $bulan = $this->input->post('bulan');
		$id_karyawan = '';
		//mengirim data ke model
		$data_izin = $this->izin_model->laporan($id_karyawan, $bulan);		//$data_karyawan = $this->karyawan_model->laporan();


		//memanggil function insert pada karyawan model
		//function insert berfungsi menyimpan/create data ke table karyawan di database

		//mengirim data ke view
		$output = array(
			//memanggil view
			'judul' => 'Daftar Izin',
			'theme_page' => 'izin_data_view',

			//data karyawan dikirim ke view
			'data_izin' => $data_izin,
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
			'judul' => 'Laporan Izin Karyawan',
			'theme_page' => 'izin_laporan'
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
		$data_izin = $this->izin_model->laporan($id_karyawan, $bulan);

		//mengembalikan halaman ke function read
		$this->load->view('theme/index');
	}

	public function pie()
	{
		//memanggil function read pada kota model
		//function read berfungsi mengambil/read data dari table kota di database
		$data_izin = $this->izin_model->read();
		$total_izin = $this->izin_model->get_data_izin();

		//mengirim data ke view
		$output = array(
			'theme_page' => 'izin_pie',
			'judul' => 'Pie Chart',
			'data_izin' => $data_izin,
			'total_izin' => $total_izin
		);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}
}
