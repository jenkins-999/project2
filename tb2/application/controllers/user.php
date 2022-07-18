<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //memanggil model
        $this->load->model(array('user_model', 'karyawan_model'));
    }

    public function index()
    {
        //mengarahkan ke function read
        $this->login();
    }

    public function Feed()
    {

        $this->load->helper('xml');
        $this->load->helper('text');
        $this->load->model('posts_model', 'posts');

    }

    public function login()
    {

        //memanggil fungsi login submit	(agar di view tidak dilihat fungsi login submit)
        $this->login_submit();

        //mengirim data ke view
        $output = array(
            'judul' => 'Login'
        );

        //memanggil file view
        $this->load->view('login', $output);
    }

    private function login_submit()
    {

        //proses jika tombol login di submit
        if ($this->input->post('submit') == 'Login') {

            //aturan validasi input login
            $this->form_validation->set_rules('username', 'Username', 'required|alpha|callback_login_check');
            $this->form_validation->set_rules('password', 'Password', 'required|alpha_numeric|min_length[4]');

            //jika validasi sukses 
            if ($this->form_validation->run() == TRUE) {

                //redirect ke user (bisa dirubah ke controller & fungsi manapun)
                redirect('karyawan/read');
            }
        }
    }

    public function login_check()
    {
        //menangkap data input dari view
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        //password encrypt
        $password_encrypt = md5($password);

        //check username & password sesuai dengan di database
        $data_user = $this->user_model->login_check($username, $password_encrypt);

        //jika cocok : dikembalikan ke fungsi login_submit (validasi sukses)
        if (!empty($data_user)) {

            //buat session user 
            $this->session->set_userdata('id', $data_user['id']);
            $this->session->set_userdata('username', $data_user['username']);
            $this->session->set_userdata('status', $data_user['status']);

            return TRUE;

            //jika tidak cocok : dikembalikan ke fungsi login_submit (validasi gagal)
        } else {

            //membuat pesan error
            $this->form_validation->set_message('login_check', 'Username & password tidak tepat');

            return FALSE;
        }
    }

    public function logout()
    {

        //hapus session user
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');

        //mengembalikan halaman ke function read
        redirect('user/login');
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
        $this->load->view('user/read', $output);
    }

    public function read()
    {
        //memanggil function read pada user model
        //function read berfungsi mengambil/read data dari table user di database
        $data_user = $this->user_model->read();


        //mengirim data ke view
        $output = array(
            //memanggil view
            'judul' => 'Daftar User',
            'theme_page' => 'user_read',

            //data user dikirim ke view
            'data_user' => $data_user,

        );

        //memanggil file view
        $this->load->view('theme/index', $output);
    }

    public function insert()
    {
        $data_karyawan = $this->karyawan_model->read();
        //mengirim data ke view
        $output = array(
            //memanggil view
            'judul' => 'Tambah user',
            'theme_page' => 'user_insert',
            'data_karyawan' => $data_karyawan
        );

        //memanggil file view
        $this->load->view('theme/index', $output);
    }

    public function insert_submit()
    {
        //menangkap data input dari view
        $id = $this->uri->segment(3);

        $id_karyawan = $this->input->post('id_karyawan');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $status = $this->input->post('status');

        $password_encrypt = md5($password);


        //mengirim data ke model
        $input = array(
            //format : username field/kolom table => data input dari view
            'id_karyawan' => $id_karyawan,
            'username' => $username,
            'password' => $password_encrypt,
            'status' => $status,

        );

        //memanggil function insert pada user model
        //function insert berfungsi menyimpan/create data ke table user di database
        $data_user = $this->user_model->insert($input);

        //mengembalikan halaman ke function read
        redirect('user/read');
    }

    public function update()
    {
        //menangkap id data yg dipilih dari view (parameter get)
        $id = $this->uri->segment(3);

        //function read berfungsi mengambil 1 data dari table user sesuai id yg dipilih
        $data_user_single = $this->user_model->read_single($id);

        $data_karyawan = $this->karyawan_model->read();

        //mengirim data ke view
        $output = array(
            'judul' => 'Ubah User',
            //mengirim data user yang dipilih ke view
            'data_user_single' => $data_user_single,
            'data_karyawan' => $data_karyawan,
        );

        //memanggil file view
        $this->load->view('theme/index', $output);
    }

    public function update_submit()
    {
        //menangkap id data yg dipilih dari view
        $id = $this->uri->segment(3);

        $id_karyawan = $this->input->post('id_karyawan');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $status = $this->input->post('status');

        $password_encrypt = md5($password);


        //mengirim data ke model
        $input = array(
            //format : username field/kolom table => data input dari view
            'id_karyawan' => $id_karyawan,
            'username' => $username,
            'password' => $password_encrypt,
            'status' => $status,

        );

        //memanggil function insert pada user model
        //function insert berfungsi menyimpan/create data ke table user di database
        $data_user = $this->user_model->update($input, $id);

        //mengembalikan halaman ke function read
        redirect('user/read');
    }

    public function delete()
    {
        //menangkap id data yg dipilih dari view
        $id = $this->uri->segment(3);

        //memanggil function delete pada user model
        $data_user = $this->user_model->delete($id);

        //mengembalikan halaman ke function read
        redirect('user/login');
    }
}
