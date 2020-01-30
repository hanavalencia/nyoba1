<?php
class Layanan extends CI_Controller{
	function __construct(){
		parent::__construct();
		
		$this->load->model('m_layanan');

	}
	function index(){
	
		$data['data']=$this->m_layanan->tampil_layanan();
		$this->load->view('admin/v_layanan',$data);
	}

	function tambah_layanan(){
	
		$kode_layanan=$this->m_layanan->get_kode();
		$nama_layanan=$this->input->post('nama_layanan');
		$harga=str_replace(',', '', $this->input->post('harga'));
		$this->m_layanan->simpan_layanan($kode_layanan,$nama_layanan,$harga);

		redirect('admin/layanan');
	}

	function edit_layanan(){
	
		$kode_layanan=$this->input->post('kode_layanan');
		$nama_layanan=$this->input->post('nama_layanan');
		$harga=str_replace(',', '', $this->input->post('harga'));
		$this->m_layanan->update_layanan($kode_layanan,$nama_layanan,$harga);
		redirect('admin/layanan');
	}

	function hapus_layanan(){
	
		$kode=$this->input->post('kode');
		$this->m_layanan->hapus_layanan($kode);
		redirect('admin/layanan');
	
	}
}