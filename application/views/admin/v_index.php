<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Produk By Mfikri.com">
    <meta name="author" content="M Fikri Setiadi">

    <title>Kita Salon</title>

    <!-- Bootstrap Core CSS -->
      <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
	    <link href="<?php echo base_url().'assets/css/style.css'?>" rel="stylesheet">
	    <link href="<?php echo base_url().'assets/css/font-awesome.css'?>" rel="stylesheet">
    <!-- Custom CSS -->
      <link href="<?php echo base_url().'assets/css/4-col-portfolio.css'?>" rel="stylesheet">

      <style type="text/css">
      .bg {
           width: 100%;
           height: 100%;
           position: fixed;
           z-index: -1;
           float: left;
           left: 0;
           margin-top: -20px;
      }
      </style>
</head>

<body>
<img src="<?php echo base_url().'assets/img/bg1.jpg'?>" alt="gambar" class="bg" />
    <!-- Navigation -->
   <?php 
        $this->load->view('admin/menu');
   ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="color:#fcc;">KITA
                    <small  style="color:#fcc;">SALON</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->
	<div class="mainbody-section text-center">
     <?php $h=$this->session->userdata('akses'); ?>
     <?php $u=$this->session->userdata('user'); ?>

        <!-- Projects Row -->
        <div class="row">
         <?php if($h=='1'){ ?> 
            <div class="col-md-4 portfolio-item">
                <div class="menu-item blue" style="height:170px;">
                     <a href="<?php echo base_url().'admin/penjualan'?>" data-toggle="modal">
                           <i class="fa fa-shopping-bag" align="center"></i>
                            <p style="text-align:left;font-size:20px;padding-left:150px;">Kasir</p>
                      </a>
                </div> 
            </div>
            <div class="col-md-4 portfolio-item">
                <div class="menu-item green" style="height:170px;">
                     <a href="<?php echo base_url();?>admin/Layanan" data-toggle="modal">
                           <i class="fa fa-cubes"></i>
                            <p style="text-align:left;font-size:20px;padding-left:140px;">Layanan</p>
                      </a>
                </div> 
            </div>
             <div class="col-md-4 portfolio-item">
                <div class="menu-item purple" style="height:170px;">
                     <a href="<?php echo base_url().'admin/barang'?>" data-toggle="modal">
                           <i class="fa fa-shopping-cart"></i>
                            <p style="text-align:left;font-size:20px;padding-left:150px;">Barang</p>
                      </a>
                </div> 
            </div>
            
            <?php }?>
            <?php if($h=='2'){ ?> 
             <div class="col-md-6 portfolio-item">
                <div class="menu-item blue" style="height:180px;">
                     <a href="<?php echo base_url().'admin/penjualan'?>" data-toggle="modal">
                           <i class="fa fa-shopping-bag" align="center"></i>
                            <p style="text-align:left;font-size:23px;padding-left:250px;">Kasir</p>
                      </a>
                </div> 
            </div>
            <div class="col-md-6 portfolio-item">
                <div class="menu-item green" style="height:180px;">
                     <a href="<?php echo base_url().'admin/layanan'?>" data-toggle="modal">
                           <i class="fa fa-cubes"></i>
                            <p style="text-align:left;font-size:23px;padding-left:235px;">Layanan</p>
                      </a>
                </div> 
            </div>
           
            <?php }?>
        </div>
        
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
        <?php if($h=='1'){ ?> 
          <div class="col-md-4 portfolio-item">
                <div class="menu-item color" style="height:170px;">
                     <a href="<?php echo base_url().'admin/karyawan'?>" data-toggle="modal">
                           <i class="fa fa-sitemap"></i>
                            <p style="text-align:left;font-size:20px;padding-left:130px;">Karyawan</p>
                      </a>
                </div> 
            </div>
            <div class="col-md-4 portfolio-item">
                <div class="menu-item red" style="height:170px;">
                     <a href="<?php echo base_url().'admin/pengguna'?>" data-toggle="modal">
                           <i class="fa fa-users"></i>
                            <p style="text-align:left;font-size:20px;padding-left:130px;">Pengguna</p>
                      </a>
                </div> 
            </div>
            <div class="col-md-4 portfolio-item">
                <div class="menu-item blue" style="height:170px;">
                     <a href="<?php echo base_url().'admin/laporan'?>" data-toggle="modal">
                           <i class="fa fa-bar-chart"></i>
                            <p style="text-align:left;font-size:20px;padding-left:135px;">Laporan</p>
                      </a>
                </div> 
            </div>
           
            <?php }?>
            <?php if($h=='2'){ ?> 
            <div class="col-md-6 portfolio-item">
                <div class="menu-item purple" style="height:180px;">
                     <a href="<?php echo base_url().'admin/barang'?>" data-toggle="modal">
                           <i class="fa fa-shopping-cart"></i>
                            <p style="text-align:left;font-size:23px;padding-left:245px;">Barang</p>
                      </a>
                </div> 
            </div>
           <div class="col-md-6 portfolio-item">
                <div class="menu-item blue" style="height:180px;">
                     <a href="<?php echo base_url().'admin/laporan'?>" data-toggle="modal">
                           <i class="fa fa-bar-chart"></i>
                            <p style="text-align:left;font-size:23px;padding-left:240px;">Laporan</p>
                      </a>
                </div> 
            </div>
            
            <?php }?>
        </div>
        
		
        <!-- /.row -->
	
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>

</body>

</html>
