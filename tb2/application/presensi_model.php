<?php
defined('BASEPATH') or exit('No direct script access allowed');

class presensi_model extends CI_Model
{

	//function read berfungsi mengambil/read data dari table user di database
	public function read($id_karyawan = '')
	{

		//sql read
		$this->db->select('presensi.*');
		$this->db->select('karyawan.nama AS nama');
		$this->db->from('presensi');
		$this->db->join('karyawan', 'presensi.id_karyawan = karyawan.nomor_pegawai');

		//filter data sesuai id yang dikirim dari controller
		if ($id_karyawan != '') {
			$this->db->where('presensi.id_karyawan', $id_karyawan);
		}

		$this->db->order_by('presensi.tanggal_masuk DESC');
		$query = $this->db->get();
		//$query->result_array = mengirim data ke controller dalam bentuk semua data
		return $query->result_array();
	}

	//function read berfungsi mengambil/read data dari table user di database
	public function read_single($id, $id_karyawan)
	{

		//sql read
		$this->db->select('*');
		$this->db->from('presensi');

		//$id = id data yang dikirim dari controller (sebagai filter data yang dipilih)
		//filter data sesuai id yang dikirim dari controller
		$this->db->where('id', $id);
		$this->db->where('id_karyawan', $id_karyawan);

		$query = $this->db->get();

		//query->row_array = mengirim data ke controller dalam bentuk 1 data
		return $query->row_array();
	}

	//function insert berfungsi menyimpan/create data ke table user di database
	public function insert($input)
	{
		//$input = data yang dikirim dari controller
		return $this->db->insert('presensi', $input);
	}

	//function update berfungsi merubah data ke table user di database
	public function update($input, $id)
	{
		//$id = id data yang dikirim dari controller (sebagai filter data yang diubah)
		//filter data sesuai id yang dikirim dari controller
		$this->db->where('id', $id);

		//$input = data yang dikirim dari controller
		return $this->db->update('presensi', $input);
	}

	//function delete berfungsi menghapus data dari table user di database
	public function delete($id)
	{
		//$id = id data yang dikirim dari controller (sebagai filter data yang dihapus)
		$this->db->where('id', $id);
		return $this->db->delete('presensi');
	}
	public function detail_presensi(){
		$this->db->select('presensi.*');
		$this->db->select('karyawan.nama AS nama');
		$this->db->from('presensi');
		$this->db->join('karyawan', 'presensi.id_karyawan = karyawan.nomor_pegawai');
		$query = $this->db->get();

		return $query->result_array();
	}












	
}
