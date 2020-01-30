<?php
class Laporan extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_barang');
		$this->load->model('m_laporan');
		}
	function index(){
		$data['data']=$this->m_barang->tampil_barang();
		$this->load->view('admin/v_laporan',$data);
	}

	function lap_data_barang(){
		$x['data']=$this->m_laporan->get_data_barang();
		$this->load->view('admin/laporan/v_lap_barang',$x);
	}
}