<?php
class M_layanan extends CI_Model{

	function hapus_layanan($kode){
		$hasil=$this->db->query("DELETE FROM tbl_layanan where layanan_id='$kode'");
		return $hasil;
	}
	
	function tampil_layanan(){
		$hasil=$this->db->query("SELECT * FROM tbl_layanan");
		return $hasil;
	}

	function simpan_layanan($kode_layanan,$nama_layanan,$harga){
		$hasil=$this->db->query("INSERT INTO tbl_layanan(layanan_id,layanan_nama,layanan_harga) VALUES ('$kode_layanan','$nama_layanan','$harga')");
		return $hasil;
	}

	function edit_layanan($kode_layanan,$nama_layanan,$harga){
		$user_id=$this->session->userdata('idadmin');
		$hasil=$this->db->query("UPDATE tbl_layanan SET layanan_nama='$nama_layanan',layanan_harga='$harga' WHERE layanan_id='$kode_layanan'");
		return $hasil;
	}

	
	function get_layanan($kode_layanan){
		$hasil=$this->db->query("SELECT * FROM tbl_layanan where layanan_id='$kode_layanan'");
		return $hasil;
	}

	function get_kode(){
		$q = $this->db->query("SELECT MAX(RIGHT(layanan_id,3)) AS kd_max FROM tbl_layanan");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "LY".$kd;
	}

}
?>