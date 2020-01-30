<?php
class Barang extends CI_Controller{
	function __construct(){
		parent::__construct();
		
		$this->load->model('m_barang');
		$this->load->library('barcode');
	}
	function index(){
	
		$data['data']=$this->m_barang->tampil_barang();
		$this->load->view('admin/v_barang',$data);
	}

	function tambah_barang(){
	
		$kobar=$this->m_barang->get_kobar();
		$nabar=$this->input->post('nabar');
		$harjul=str_replace(',', '', $this->input->post('harjul'));
		$stok=$this->input->post('stok');
		$this->m_barang->simpan_barang($kobar,$nabar,$harjul,$stok);

		redirect('admin/barang');
	}

	function edit_barang(){
	
		$kobar=$this->input->post('kobar');
		$nabar=$this->input->post('nabar');
		$harjul=str_replace(',', '', $this->input->post('harjul'));
		$stok=$this->input->post('stok');
		$this->m_barang->update_barang($kobar,$nabar,$harjul,$stok);
		redirect('admin/barang');
	}

	function hapus_barang(){
	
		$kode=$this->input->post('kode');
		$this->m_barang->hapus_barang($kode);
		redirect('admin/barang');
	
	}
}