<?php
class M_penjualan extends CI_Model{

	
	function simpan_penjualan($nofak,$total,$jml_uang,$kembalian){
		$idadmin=$this->session->userdata('idadmin');
		$this->db->query("INSERT INTO tbl_detail_jual (jual_nofak,jual_total,jual_jml_uang,jual_kembalian) VALUES ('$nofak','$total','$jml_uang','$kembalian')");
		foreach ($this->cart->contents() as $item) {
			$data=array(
				'd_jual_nofak' 			=>	$nofak,
				'd_jual_layanan_id'		=>	$item['kode_layanan'],
				'd_jual_nama_layanan'	=>	$item['nama_layanan'],
				'd_jual_harga'			=>	$item['harga'],
				'd_jual_kobar'			=>	$item['kobar'],
				'd_jual_nabar'			=>	$item['nabar'],
				'd_jual_harjul'			=>	$item['harjul'],
				'd_jual_qty'			=>	$item['qty'],
				'd_jual_total'			=>	$item['total']
			);
			$this->db->insert('tbl_detail_jual',$data);
			$this->db->query("update tbl_barang set barang_stok=barang_stok-'$item[qty]' where barang_id='$item[id]'");
		}
		return true;
	}
	function get_nofak(){
		$q = $this->db->query("SELECT MAX(RIGHT(jual_nofak,6)) AS kd_max FROM tbl_jual WHERE DATE(jual_tanggal)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "000001";
        }
        return date('dmy').$kd;
	}

	//=====================Penjualan grosir================================
	function simpan_penjualan_grosir($nofak,$total,$jml_uang,$kembalian){
		$idadmin=$this->session->userdata('idadmin');
		$this->db->query("INSERT INTO tbl_jual (jual_nofak,jual_total,jual_jml_uang,jual_kembalian,) VALUES ('$nofak','$total','$jml_uang','$kembalian')");
		foreach ($this->cart->contents() as $item) {
			$data=array(
				'd_jual_nofak' 			=>	$nofak,
				'd_jual_layanan_id'		=>	$item['kode_layanan'],
				'd_jual_nama_layanan'	=>	$item['nama_layanan'],
				'd_jual_harga'			=>	$item['harga'],
				'd_jual_kobar'			=>	$item['kobar'],
				'd_jual_nabar'			=>	$item['nabar'],
				'd_jual_harjul'			=>	$item['harjul'],
				'd_jual_qty'			=>	$item['qty'],
				'd_jual_total'			=>	$item['total']
			);
			$this->db->insert('tbl_detail_jual',$data);
			$this->db->query("update tbl_barang set barang_stok=barang_stok-'$item[qty]' where barang_id='$item[id]'");
		}
		return true;
	}

	function cetak_faktur(){
		$nofak=$this->session->userdata('nofak');
		$hsl=$this->db->query("SELECT jual_nofak,DATE_FORMAT(jual_tanggal,'%d/%m/%Y %H:%i:%s') AS jual_tanggal,jual_total,jual_jml_uang,jual_kembalian,d_jual_layanan_nama,d_jual_harga,d_jual_kobar,d_jual_nabar,d_jual_harjuld_jual_qty,d_jual_total FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak WHERE jual_nofak='$nofak'");
		return $hsl;
	}
	
}