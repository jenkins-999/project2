<?php
defined('BASEPATH') or exit('No direct script access allowed');

class karyawan_model extends CI_Model
{

    public function login_check($nomor_pegawai, $password)
    {

        //sql read
        $this->db->select('*');
        $this->db->from('karyawan');

        //$id = id data yang dikirim dari controller (sebagai filter data yang dipilih)
        //filter data sesuai id yang dikirim dari controller
        $this->db->where('nomor_pegawai', $nomor_pegawai);
        $this->db->where('password', $password);

        $query = $this->db->get();

        //query->row_array = mengirim data ke controller dalam bentuk 1 data
        return $query->row_array();
    }

    //function read berfungsi mengambil/read data dari table provinsi di database
    public function read()
    {

        //sql read
        $this->db->select('*');
        $this->db->from('karyawan');
        $query = $this->db->get();

        //$query->result_array = mengirim data ke controller dalam bentuk semua data
        return $query->result_array();
    }

    //function read berfungsi mengambil/read data dari table provinsi di database
    public function read_single($id)
    {

        //sql read
        $this->db->select('*');
        $this->db->from('karyawan');

        //$id = id data yang dikirim dari controller (sebagai filter data yang dipilih)
        //filter data sesuai id yang dikirim dari controller
        $this->db->where('nomor_pegawai', $id);

        $query = $this->db->get();

        //query->row_array = mengirim data ke controller dalam bentuk 1 data
        return $query->row_array();
    }

    //function insert berfungsi menyimpan/create data ke table provinsi di database
    public function insert($input)
    {
        //$input = data yang dikirim dari controller
        return $this->db->insert('karyawan', $input);
    }

    //function update berfungsi merubah data ke table provinsi di database
    public function update($input, $id)
    {
        //$id = id data yang dikirim dari controller (sebagai filter data yang diubah)
        //filter data sesuai id yang dikirim dari controller
        $this->db->where('nomor_pegawai', $id);

        //$input = data yang dikirim dari controller
        return $this->db->update('karyawan', $input);
    }

    //function delete berfungsi menghapus data dari table provinsi di database
    public function delete($id)
    {
        //$id = id data yang dikirim dari controller (sebagai filter data yang dihapus)
        $this->db->where('nomor_pegawai', $id);
        return $this->db->delete('karyawan');
    }
}
