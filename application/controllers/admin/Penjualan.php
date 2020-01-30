<?php
class Penjualan extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_layanan');
		$this->load->model('m_barang');
		$this->load->model('m_penjualan');
	}
	function index(){
		$data['layanan']=$this->m_layanan->tampil_layanan();
		$data['barang']=$this->m_barang->tampil_barang();
		$this->load->view('admin/v_penjualan',$data);
	}

	function get_layanan(){
	
		$kode_layanan=$this->input->post('kode_layanan');
		$x['layanan']=$this->m_layanan->get_layanan($kode_layanan);
		$this->load->view('admin/v_detail_barang_jual',$x);
	
	}

	function get_barang(){
	
		$kobar=$this->input->post('kobar');
		$x['barang']=$this->m_barang->get_barang($kobar);
		$this->load->view('admin/v_detail_barang_jual',$x);
	
	}

	
	function add_to_cart_layanan(){
	
		$kode_layanan=$this->input->post('kode_layanan');
		$pelayanan=$this->m_layanan->get_layanan($kode_layanan);
		$i=$pelayanan->row_array();
		$data = array(
               'kode_layanan'       => $i['layanan_id'],
               'nama_layanan'     	=> $i['layanan_nama'],
               'harga'    			=> str_replace(",", "", $this->input->post('harga')),
               'qty'     			=> $this->input->post('qty')
           );
		if(!empty($this->cart->total_items())){
		foreach ($this->cart->contents() as $items){
			$kode_layanan=$items['layanan_id'];
			$qtylama=$items['qty'];
			$rowid=$items['rowid'];
			$kode_layanan=$this->input->post('kode_layanan');
			$qty=$this->input->post('qty');
			if($id==$kode_layanan){
				$up=array(
					'rowid'=> $rowid,
					'qty'=>$qtylama+$qty
					);
				$this->cart->update($up);
			}else{
				$this->cart->insert($data);
			}
		}
	}else{
		$this->cart->insert($data);
	}
	// var_dump($data);
	redirect('admin/penjualan');
	
	}


	function add_to_cart_barang(){
	
		$kobar=$this->input->post('kobar');
		$pembelian=$this->m_barang->get_barang($kobar);
		$i=$pembelian->row_array();
		$data = array(
               'kobar'      => $i['kobar'],
               'nabar'     	=> $i['nabar'],
               'harjul'    	=> str_replace(",", "", $this->input->post('harjul')),
               'stok'     	=> $i['stok'],
               'qty'     	=> $this->input->post('qty')
           );
		if(!empty($this->cart->total_items())){
		foreach ($this->cart->contents() as $items){
			$kobar=$items['kobar'];
			$qtylama=$items['qty'];
			$rowid=$items['rowid'];
			$kobar=$this->input->post('kobar');
			$qty=$this->input->post('qty');
			if($id==$kobar){
				$up=array(
					'rowid'=> $rowid,
					'qty'=>$qtylama+$qty
					);
				$this->cart->update($up);
			}else{
				$this->cart->insert($data);
			}
		}
	}else{
		$this->cart->insert($data);

	}
	redirect('admin/penjualan');
	
	}

	function remove(){
	
		$row_id=$this->uri->segment(4);
		$this->cart->update(array(
               'rowid'      => $row_id,
               'qty'     => 0
            ));
		redirect('admin/penjualan');
	
	}
	function simpan_penjualan(){
	
		$total=$this->input->post('total');
		$jml_uang=str_replace(",", "", $this->input->post('jml_uang'));
		$kembalian=$jml_uang-$total;
		if(!empty($total) && !empty($jml_uang)){
			if($jml_uang < $total){
				echo $this->session->set_flashdata('msg','<label class="label label-danger">Jumlah Uang yang anda masukan Kurang</label>');
				redirect('admin/penjualan');
			}else{
				$nofak=$this->m_penjualan->get_nofak();
				$this->session->set_userdata('nofak',$nofak);
				$order_proses=$this->m_penjualan->simpan_penjualan($nofak,$total,$jml_uang,$kembalian);
				if($order_proses){
					$this->cart->destroy();
					
					$this->session->unset_userdata('tglfak');
					$this->session->unset_userdata('suplier');
					$this->load->view('admin/alert/alert_sukses');	
				}else{
					redirect('admin/penjualan');
				}
			}
			
		}else{
			echo $this->session->set_flashdata('msg','<label class="label label-danger">Penjualan Gagal di Simpan, Mohon Periksa Kembali Semua Inputan Anda!</label>');
			redirect('admin/penjualan');
		}

	
	}

	function cetak_faktur(){
		$x['data']=$this->m_penjualan->cetak_faktur();
		$this->load->view('admin/laporan/v_faktur',$x);
		//$this->session->unset_userdata('nofak');
	}

}