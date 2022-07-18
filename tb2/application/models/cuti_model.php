<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cuti_model extends CI_Model
{

	//function read berfungsi mengambil/read data dari table provinsi di database
	public function read($id_karyawan = '')
	{

		//sql read
		$this->db->select('cuti.*');
		$this->db->select('karyawan.nama AS nama');
		$this->db->from('cuti');
		$this->db->join('karyawan', 'cuti.id_karyawan = karyawan.nomor_pegawai');

		//filter data sesuai id yang dikirim dari controller
		if ($id_karyawan != '') {
			$this->db->where('cuti.id_karyawan', $id_karyawan);
		}

		$this->db->order_by('cuti.id ASC');
		$query = $this->db->get();
		//$query->result_array = mengirim data ke controller dalam bentuk semua data
		return $query->result_array();
	}

	//function read berfungsi mengambil/read data dari table provinsi di database
	public function read_single($id)
	{

		//sql read
		$this->db->select('*');
		$this->db->from('cuti');

		//$id = id data yang dikirim dari controller (sebagai filter data yang dipilih)
		//filter data sesuai id yang dikirim dari controller
		$this->db->where('id', $id);

		$query = $this->db->get();

		//query->row_array = mengirim data ke controller dalam bentuk 1 data
		return $query->row_array();
	}

	//function insert berfungsi menyimpan/create data ke table provinsi di database
	public function insert($input)
	{
		//$input = data yang dikirim dari controller
		return $this->db->insert('cuti', $input);
	}

	//function update berfungsi merubah data ke table provinsi di database
	public function update($input, $id)
	{
		//$id = id data yang dikirim dari controller (sebagai filter data yang diubah)
		//filter data sesuai id yang dikirim dari controller
		$this->db->where('id', $id);

		//$input = data yang dikirim dari controller
		return $this->db->update('cuti', $input);
	}

	//function delete berfungsi menghapus data dari table provinsi di database
	public function delete($id)
	{
		//$id = id data yang dikirim dari controller (sebagai filter data yang dihapus)
		$this->db->where('id', $id);
		return $this->db->delete('cuti');
	}

	public function laporan($id_karyawan = '', $bulan = '')
	{
		$this->db->select('cuti.*');
		$this->db->select('karyawan.nama AS nama');
		$this->db->from('cuti');
		$this->db->join('karyawan', 'cuti.id_karyawan = karyawan.nomor_pegawai');
		if ($bulan != '') {
			$this->db->where('DATE_FORMAT(tgl_pengajuan,"%m")', $bulan);
		}

		//filter data sesuai id yang dikirim dari controller
		if ($id_karyawan != '') {
			$this->db->where('cuti.id_karyawan', $id_karyawan);
		}

		$this->db->order_by('cuti.id ASC');
		$query = $this->db->get();
		//$query->result_array = mengirim data ke controller dalam bentuk semua data
		return $query->result_array();
	}

	public function get_data_cuti()
	{
		$this->db->select('cuti.*');
		$this->db->select('COUNT(status) AS data_cuti');
		$this->db->from('cuti');
		$this->db->group_by('status');
		$query = $this->db->get();

		// $query = $this->db->query("SELECT id_karyawan,COUNT(id_karyawan) AS data_presensi FROM presensi GROUP BY id_karyawan");

		return $query->result_array();
	}
}
