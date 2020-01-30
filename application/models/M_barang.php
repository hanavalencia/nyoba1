<?php
class M_barang extends CI_Model{

	function hapus_barang($kode){
		$hsl=$this->db->query("DELETE FROM tbl_barang where barang_id='$kode'");
		return $hsl;
	}

	function update_barang($kobar,$nabar,$harjul,$stok){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("UPDATE tbl_barang SET  barang_nama='$nabar', barang_harga='$harjul', barang_stok='$stok',barang_tgl_last_input=NOW() WHERE barang_id='$kobar'");
		return $hsl;
	}

	function tampil_barang(){
		$hsl=$this->db->query("SELECT barang_id,barang_nama,barang_harga,barang_stok FROM tbl_barang");
		return $hsl;
	}

	function simpan_barang($kobar,$nabar,$harjul,$stok){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("INSERT INTO tbl_barang(barang_id, barang_nama, barang_harga, barang_stok) VALUES ('$kobar','$nabar','$harjul','$stok')");
		return $hsl;
	}


	function get_barang($kobar){
		$hsl=$this->db->query("SELECT * FROM tbl_barang where barang_id='$kobar'");
		return $hsl;
	}

	function get_kobar(){
		$q = $this->db->query("SELECT MAX(RIGHT(barang_id,6)) AS kd_max FROM tbl_barang");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "BR".$kd;
	}

}