<?php
defined('BASEPATH') or exit('No direct script access allowed');

class karyawan extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();

        //memanggil model
        $this->load->model('presensi_model');
    }

    public function index()
    {
        //mengarahkan ke function read
        $this->insert();
    }

    public function insert()
    {
        //mengirim data ke view
        $output = array(
            //memanggil view
            'judul' => 'Tambah karyawan',
        );

        //memanggil file view
        $this->load->view('karyawan_insert', $output);
    }

    public function insert_submit()
    {
        //menangkap data input dari view
        $nomor_pegawai = $this->input->post('nomor_pegawai');
        $nama = $this->input->post('nama');
        $no_hp = $this->input->post('no_hp');
        $alamat = $this->input->post('alamat');
        $jenis_kelamin = $this->input->post('jenis_kelamin');

        //mengirim data ke model
        $input = array(
            //format : nama field/kolom table => data input dari view
            'nomor_pegawai' => $nomor_pegawai,
            'nama' => $nama,
            'no_hp' => $no_hp,
            'alamat' => $alamat,
            'jenis_kelamin' => $jenis_kelamin,
        );

        //memanggil function insert pada karyawan model
        //function insert berfungsi menyimpan/create data ke table karyawan di database
        $data_karyawan = $this->karyawan_model->insert($input);

        //mengembalikan halaman ke function read
        redirect('karyawan/read');
    }
}
