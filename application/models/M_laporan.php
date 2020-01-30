<?php
class M_laporan extends CI_Model{

	function get_data_barang(){
		$hsl=$this->db->query("SELECT barang_id,barang_nama,barang_harga,barang_stok FROM tbl_barang");
		return $hsl;
	}
}