<?php
defined('BASEPATH') or exit('No direct script access allowed');

class karyawan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //memanggil model
        $this->load->model('karyawan_model');
    }

    public function index()
    {
        //mengarahkan ke function read
        $this->read();
    }
    public function login()
    {

        //memanggil fungsi login submit	(agar di view tidak dilihat fungsi login submit)
        $this->login_submit();

        //mengirim data ke view
        $output = array(
            'judul' => 'Login',
        );

        //memanggil file view
        $this->load->view('login', $output);
    }

    private function login_submit()
    {

        //proses jika tombol login di submit
        if ($this->input->post('submit') == 'Login') {

            //aturan validasi input login
            $this->form_validation->set_rules('nomor_pegawai', 'nomor_pegawai', 'required|alpha_numeric|callback_login_check');
            $this->form_validation->set_rules('password', 'Password', 'required|alpha_numeric|min_length[4]');

            //jika validasi sukses 
            if ($this->form_validation->run() == TRUE) {

                //redirect ke user (bisa dirubah ke controller & fungsi manapun)
                redirect('karyawan/home');
            }
        }
    }

    public function login_check()
    {
        //menangkap data input dari view
        $nomor_pegawai = $this->input->post('nomor_pegawai');
        $password = $this->input->post('password');

        //password encrypt
        $password_encrypt = md5($password);

        //check username & password sesuai dengan di database
        $data_karyawan = $this->karyawan_model->login_check($nomor_pegawai, $password_encrypt);

        //jika cocok : dikembalikan ke fungsi login_submit (validasi sukses)
        if (!empty($data_karyawan)) {

            //buat session user 
            $this->session->set_userdata('nomor_pegawai', $data_karyawan['nomor_pegawai']);
            $this->session->set_userdata('nama', $data_karyawan['nama']);
            $this->session->set_userdata('status', $data_karyawan['status']);

            return TRUE;

            //jika tidak cocok : dikembalikan ke fungsi login_submit (validasi gagal)
        } else {

            //membuat pesan error
            $this->form_validation->set_message('login_check', 'NIP & password tidak tepat');

            return FALSE;
        }
    }

    public function logout()
    {

        //hapus session user
        $this->session->unset_userdata('nomor_pegawai');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('status');

        //mengembalikan halaman ke function read
        redirect('karyawan/login');
    }

    public function reset_password()
    {

        //memanggil fungsi login submit	(agar di view tidak dilihat fungsi login submit)
        $this->login_submit();

        //mengirim data ke view
        $output = array(
            'theme_page' => 'reset_password',
            'judul' => 'Reset Password'
        );

        //memanggil file view
        $this->load->view('karyawan/user', $output);
    }

    public function home()
    {
        if (empty($this->session->userdata('nomor_pegawai'))) {
            redirect('user/login');
        }

        $this->load->view('home');
    }
    public function read()
    {
        if ($this->session->userdata('status') === 'karyawan') {
            echo '<script>alert("Dilarang masuk")</script>';
            exit();
        }

        //memanggil function read pada karyawan model
        //function read berfungsi mengambil/read data dari table karyawan di database
        $data_karyawan = $this->karyawan_model->read();



        //mengirim data ke view
        $output = array(
            //memanggil view
            'judul' => 'Daftar karyawan',
            'theme_page' => 'karyawan_read',


            //data karyawan dikirim ke view
            'data_karyawan' => $data_karyawan

        );

        //memanggil file view
        $this->load->view('theme/index', $output);
    }
    public function user()
    {
        if ($this->session->userdata('status') === 'karyawan') {
            echo '<script>alert("Dilarang masuk")</script>';
            exit();
        }
        //memanggil function read pada karyawan model
        //function read berfungsi mengambil/read data dari table karyawan di database
        $data_karyawan = $this->karyawan_model->read();

        //mengirim data ke view
        $output = array(
            //memanggil view
            'judul' => 'Daftar karyawan',
            'theme_page' => 'user_read',

            //data karyawan dikirim ke view
            'data_karyawan' => $data_karyawan
        );

        //memanggil file view
        $this->load->view('theme/index', $output);
    }


    public function insert()
    {
        if ($this->session->userdata('status') === 'karyawan') {
            echo '<script>alert("Dilarang masuk")</script>';
            exit();
        }
        //mengirim data ke view
        $output = array(
            //memanggil view
            'judul' => 'Tambah Karyawan',
            'theme_page' => 'karyawan_insert'
        );

        //memanggil file view
        $this->load->view('theme/index', $output);
    }

    public function insert_submit()
    {
        //menangkap data input dari view
        $nomor_pegawai = $this->input->post('nomor_pegawai');
        $nama = $this->input->post('nama');
        $no_hp = $this->input->post('no_hp');
        $alamat = $this->input->post('alamat');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $password = $this->input->post('password');
        $status = $this->input->post('status');
        $cuti = $this->input->post('kuota_cuti');
        $password_encrypt = md5($password);


        //mengirim data ke model
        $input = array(
            //format : nama field/kolom table => data input dari view
            'nomor_pegawai' => $nomor_pegawai,
            'nama' => $nama,
            'no_hp' => $no_hp,
            'alamat' => $alamat,
            'jenis_kelamin' => $jenis_kelamin,
            'status' => $status,
            'password' => $password_encrypt,
            'kuota_cuti' => $cuti,
        );

        //memanggil function insert pada karyawan model
        //function insert berfungsi menyimpan/create data ke table karyawan di database
        $data_karyawan = $this->karyawan_model->insert($input);

        //mengembalikan halaman ke function read
        redirect('karyawan/read');
    }

    public function update()
    {
        if ($this->session->userdata('status') === 'karyawan') {
            echo '<script>alert("Dilarang masuk")</script>';
            exit();
        }
        //menangkap id data yg dipilih dari view (parameter get)
        $id = $this->uri->segment(3);

        //function read berfungsi mengambil 1 data dari table karyawan sesuai id yg dipilih
        $data_karyawan_single = $this->karyawan_model->read_single($id);

        //mengirim data ke view
        $output = array(
            'judul' => 'Ubah karyawan',
            'theme_page' => 'karyawan_update',

            //mengirim data karyawan yang dipilih ke view
            'data_karyawan_single' => $data_karyawan_single,
        );

        //memanggil file view
        $this->load->view('theme/index', $output);
    }

    public function update_submit()
    {
        //menangkap id data yg dipilih dari view
        $id = $this->uri->segment(3);

        //menangkap data input dari view
        $nomor_pegawai = $this->input->post('nomor_pegawai');
        $nama = $this->input->post('nama');
        $no_hp = $this->input->post('no_hp');
        $alamat = $this->input->post('alamat');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $status = $this->input->post('status');
        $cuti = $this->input->post('kuota_cuti');

        //mengirim data ke model
        $input = array(
            //format : nama field/kolom table => data input dari view
            'nomor_pegawai' => $nomor_pegawai,
            'nama' => $nama,
            'no_hp' => $no_hp,
            'alamat' => $alamat,
            'jenis_kelamin' => $jenis_kelamin,
            'kuota_cuti' => $cuti,
            'status' => $status,
        );

        //memanggil function insert pada karyawan model
        //function insert berfungsi menyimpan/create data ke table karyawan di database
        $data_karyawan = $this->karyawan_model->update($input, $id);

        //mengembalikan halaman ke function read
        redirect('karyawan/read');
    }

    public function reset()
    {
        //menangkap id data yg dipilih dari view (parameter get)
        $id = $this->uri->segment(3);

        //function read berfungsi mengambil 1 data dari table karyawan sesuai id yg dipilih
        $data_karyawan_single = $this->karyawan_model->read_single($id);

        //mengirim data ke view
        $output = array(
            'judul' => 'Reset Password',
            'theme_page' => 'user_update',

            //mengirim data karyawan yang dipilih ke view
            'data_karyawan_single' => $data_karyawan_single,
        );

        //memanggil file view
        $this->load->view('theme/index', $output);
    }

    public function reset_submit()
    {
        //menangkap id data yg dipilih dari view
        $id = $this->uri->segment(3);

        //menangkap data input dari view
        $password = $this->input->post('password');
        $password_encrypt = md5($password);
        $status = $this->input->post('status');

        //mengirim data ke model
        $input = array(
            //format : nama field/kolom table => data input dari view
            'password' => $password_encrypt,
            'status' => $status,
        );

        //memanggil function insert pada karyawan model
        //function insert berfungsi menyimpan/create data ke table karyawan di database
        $data_karyawan = $this->karyawan_model->update($input, $id);

        //mengembalikan halaman ke function read
        redirect('karyawan/user');
    }

    public function delete()
    {
        //menangkap id data yg dipilih dari view
        $id = $this->uri->segment(3);

        //memanggil function delete pada karyawan model
        $data_karyawan = $this->karyawan_model->delete($id);

        //mengembalikan halaman ke function read
        redirect('karyawan/read');
    }
}
