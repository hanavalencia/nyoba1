<?php
class M_karyawan extends CI_Model{

	function hapus_karyawan($kode){
		$hsl=$this->db->query("DELETE FROM tbl_karyawan where karyawan_id='$kode'");
		return $hsl;
	}

	function update_karyawan($id,$nama,$alamat,$tlp){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("UPDATE tbl_karyawan SET karyawan_nama='$nama', karyawan_alamat='$alamat,'karyawan_no_hp='$tlp' WHERE karyawan_id='$id'");
		return $hsl;
	}

	function tampil_karyawan(){
		$hsl=$this->db->query("SELECT karyawan_id,karyawan_nama,karyawan_alamat,karyawan_no_hp FROM tbl_karyawan");
		return $hsl;
	}

	function simpan_karyawan($id,$nama,$alamat,$tlp){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("INSERT INTO tbl_karyawan(karyawan_id, karyawan_nama,karyawan_alamat,karyawan_no_hp) VALUES ('$id','$nama','$alamat','$tlp')");
		return $hsl;
	}


	function get_karyawan($id){
		$hsl=$this->db->query("SELECT * FROM tbl_karyawan where karyawan_id='$id'");
		return $hsl;
	}

	function get_id(){
		$q = $this->db->query("SELECT MAX(RIGHT(karyawan_id,6)) AS kd_max FROM tbl_karyawan");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "001";
        }
        return "KR".$kd;
	}

}