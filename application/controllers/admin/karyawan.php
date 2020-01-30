<?php
class karyawan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_karyawan');

	}
	function index(){
	if($this->session->userdata('akses')=='1'){
		$data['data']=$this->m_karyawan->tampil_karyawan();
		$this->load->view('admin/v_karyawan',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function tambah_karyawan(){
	if($this->session->userdata('akses')=='1'){
		$id=$this->m_karyawan->get_id();
		$nama=$this->input->post('nama');
		$alamat=$this->input->post('alamat');
		$tlp=$this->input->post('tlp');
		$this->m_karyawan->simpan_karyawan($id,$nama,$alamat,$tlp);

		redirect('admin/karyawan');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function edit_karyawan(){
	if($this->session->userdata('akses')=='1'){
		$id=$this->m_karyawan->input->post('id');
		$nama=$this->input->post('nama');
		$alamat=$this->input->post('alamat');
		$tlp=$this->input->post('tlp');
		$this->m_karyawan->update_karyawan($id,$nama,$alamat,$tlp);
		redirect('admin/karyawan');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function hapus_karyawan(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$this->m_karyawan->hapus_karyawan($kode);
		redirect('admin/karyawan');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
}
?>