<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cuti extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('nomor_pegawai'))) {
			redirect('user/login');
		}
		//memanggil model
		$this->load->model('cuti_model');
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
		$data_karyawan_single = $this->karyawan_model->read_single($id_karyawan);

		if ($this->session->userdata('status') === 'manager') {
			$data_cuti = $this->cuti_model->read();
		} else {
			$data_cuti = $this->cuti_model->read($id_karyawan);
		}

		//mengirim data ke view
		$output = array(
			//memanggil view
			'judul' => 'Pengajuan cuti',
			'theme_page' => 'cuti_read',
			'data_karyawan_single' => $data_karyawan_single,

			//data provinsi dikirim ke view
			'data_cuti' => $data_cuti
		);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert()
	{
		$id = $this->session->userdata('nomor_pegawai');
		$data_karyawan_single = $this->karyawan_model->read_single($id);

		//mengirim data ke view
		$output = array(
			//memanggil view
			'judul' => 'Ajukan Cuti',
			'theme_page' => 'cuti_insert',
			'data_karyawan_single' => $data_karyawan_single,
		);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function insert_submit()
	{
		$id = $this->session->userdata('nomor_pegawai');
		$data_karyawan_single = $this->karyawan_model->read_single($id);

		//menangkap data input dari view
		$id_karyawan = $this->input->post('id_karyawan');
		$tgl_pengajuan = $this->input->post('tgl_pengajuan');
		$tgl_cuti = $this->input->post('tgl_cuti');
		$tgl_selesai = $this->input->post('tgl_selesai');
		$keterangan = $this->input->post('keterangan');
		$status = $this->input->post('status');

		$kuota_cuti = $data_karyawan_single['kuota_cuti'];
		$mulai_cuti = strtotime($tgl_cuti);
		$selesai_cuti = strtotime($tgl_selesai);


		$timeDiff = abs($selesai_cuti - $mulai_cuti);
		$lama_cuti = $timeDiff / 86400;
		$lama_cuti = intval($lama_cuti);
		// $sisa_cuti = $kuota_cuti - $lama_cuti;

		// $kuota_cuti = array(
		// 	'kuota_cuti' =>  $sisa_cuti,
		// );

		// var_dump($kuota_cuti);
		// die;

		//mengirim data ke model
		$input = array(
			//format : nama field/kolom table => data input dari view
			'tgl_pengajuan' => date('Y-m-d H:i:s'),
			'id_karyawan' => $id_karyawan,
			'tgl_cuti' => $tgl_cuti,
			'tgl_selesai' => $tgl_selesai,
			'keterangan' => $keterangan,
			'status' => $status,
			'lama_cuti' => $lama_cuti
		);

		//memanggil function insert pada provinsi model
		//function insert berfungsi menyimpan/create data ke table provinsi di database
		$data_cuti = $this->cuti_model->insert($input);
		// $data_karyawan_single = $this->karyawan_model->update($kuota_cuti, $id);

		//mengembalikan halaman ke function read
		redirect('cuti/read');
	}

	public function update()
	{
		//menangkap id data yg dipilih dari view (parameter get)
		$id = $this->uri->segment(3);
		$data_cuti_single = $this->cuti_model->read_single($id);
		$nip = $data_cuti_single['id_karyawan'];

		$data_karyawan_single = $this->karyawan_model->read_single($nip);

		//function read berfungsi mengambil 1 data dari table provinsi sesuai id yg dipilih

		//mengirim data ke view
		$output = array(
			'judul' => 'Ubah Pengajuan Cuti',
			'theme_page' => 'cuti_update',

			//mengirim data provinsi yang dipilih ke view
			'data_cuti_single' => $data_cuti_single,
			'data_karyawan_single' => $data_karyawan_single,
		);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}

	public function update_submit()
	{
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);
		$data_cuti_single = $this->cuti_model->read_single($id);

		$nip = $data_cuti_single['id_karyawan'];
		$data_karyawan_single = $this->karyawan_model->read_single($nip);

		//menangkap data input dari view
		$status = $this->input->post('status');
		$kuota_cuti = $data_karyawan_single['kuota_cuti'];
		$lama_cuti = $data_cuti_single['lama_cuti'];

		$sisa_cuti = $kuota_cuti - $lama_cuti;

		$kuota_cuti = array(
			'kuota_cuti' =>  $sisa_cuti,
		);

		//mengirim data ke model
		$input = array(
			//format : nama field/kolom table => data input dari view
			'status' => $status,
			'lama_cuti' => $lama_cuti
		);

		//memanggil function insert pada provinsi model
		//function insert berfungsi menyimpan/create data ke table provinsi di database
		$data_cuti = $this->cuti_model->update($input, $id);

		if ($status == 'Disetujui') {
			$data_karyawan_single = $this->karyawan_model->update($kuota_cuti, $nip);
		};



		//mengembalikan halaman ke function read
		redirect('cuti/read');
	}

	public function delete()
	{
		//menangkap id data yg dipilih dari view
		$id = $this->uri->segment(3);

		//memanggil function delete pada provinsi model
		$data_cuti = $this->cuti_model->delete($id);

		//mengembalikan halaman ke function read
		redirect('cuti/read');
	}

	public function data_export()
	{
		//memanggil function read pada karyawan model
		//function read berfungsi mengambil/read data dari table karyawan di database
		echo $bulan = $this->input->post('bulan');
		$id_karyawan = '';
		//mengirim data ke model
		$data_cuti = $this->cuti_model->laporan($id_karyawan, $bulan);		//$data_karyawan = $this->karyawan_model->laporan();


		//memanggil function insert pada karyawan model
		//function insert berfungsi menyimpan/create data ke table karyawan di database

		//mengirim data ke view
		$output = array(
			//memanggil view
			'judul' => 'Daftar Cuti',

			//data karyawan dikirim ke view
			'data_cuti' => $data_cuti,
			//'data_karyawan' => $data_karyawan,
		);

		//memanggil file view
		$this->load->view('cuti_data_export', $output);
	}

	public function data_view()
	{
		//memanggil function read pada karyawan model
		//function read berfungsi mengambil/read data dari table karyawan di database
		echo $bulan = $this->input->post('bulan');
		$id_karyawan = '';
		//mengirim data ke model
		$data_cuti = $this->cuti_model->laporan($id_karyawan, $bulan);		//$data_karyawan = $this->karyawan_model->laporan();


		//memanggil function insert pada karyawan model
		//function insert berfungsi menyimpan/create data ke table karyawan di database

		//mengirim data ke view
		$output = array(
			//memanggil view
			'judul' => 'Daftar Cuti',
			'theme_page' => 'cuti_data_view',

			//data karyawan dikirim ke view
			'data_cuti' => $data_cuti,
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
			'judul' => 'Laporan Cuti Karyawan',
			'theme_page' => 'cuti_laporan'
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
		$data_cutii = $this->cuti_model->laporan($id_karyawan, $bulan);

		//mengembalikan halaman ke function read
		$this->load->view('theme/index');
	}

	public function pie()
	{
		//memanggil function read pada kota model
		//function read berfungsi mengambil/read data dari table kota di database
		$data_cuti = $this->cuti_model->read();
		$total_cuti = $this->cuti_model->get_data_cuti();

		//mengirim data ke view
		$output = array(
			'theme_page' => 'cuti_pie',
			'judul' => 'Pie Chart',
			'data_cuti' => $data_cuti,
			'total_cuti' => $total_cuti
		);

		//memanggil file view
		$this->load->view('theme/index', $output);
	}
}
