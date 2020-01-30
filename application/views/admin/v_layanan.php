<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Produk By Mfikri.com">
    <meta name="author" content="M Fikri Setiadi">

    <title>Management data layanan</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/style.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/font-awesome.css'?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets/css/4-col-portfolio.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/dataTables.bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/jquery.dataTables.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/dist/css/bootstrap-select.css'?>" rel="stylesheet">
</head>

<body>

    <!-- Navigation -->
   <?php 
        $this->load->view('admin/menu');
   ?>

    <!-- Page Content -->
    <div class="container">
        
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data
                    <small>layanan</small>
                    <div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#largeModal"><span class="fa fa-plus"></span> Tambah layanan</a></div>
                </h1>
            </div>
      </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                
            <table class="table table-bordered table-condensed" style="font-size:11px;" id="mydata">
                <thead>
                    <tr>
                        <th style="text-align:center;width:40px;">No</th>
                        <th>Kode layanan</th>
                        <th>Nama layanan</th>
                        <th>Harga</th>
                        <th style="width:100px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    foreach ($data->result_array() as $a):
                        $no++;
                        $layanan_id=$a['layanan_id'];
                        $layanan_nama=$a['layanan_nama'];
                        $layanan_harga=$a['layanan_harga'];

                ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no;?></td>
                        <td><?php echo $layanan_id;?></td>
                        <td><?php echo $layanan_nama;?></td>
                        <td style="text-align:right;"><?php echo 'Rp '.number_format($layanan_harga);?></td>
                        <td style="text-align:center;">
                            <a class="btn btn-xs btn-warning" href="JavaScript:void(0)" onclick='editLayanan("<?php echo $layanan_id;?>", "<?php echo $layanan_nama;?>", "<?php echo $layanan_harga;?>")' title="Edit"><span class="fa fa-edit"></span> Edit</a>
                            <a class="btn btn-xs btn-danger" href="JavaScript:void(0)" onclick='hapusLayanan("<?php echo $id;?>")' title="Hapus"><span class="fa fa-close"></span> Hapus</a>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
            </div>
        </div>
        <div id="modalHapus" class="modal fade" role="dialog" aria-labelledby="largeModal">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Hapus layanan</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/Layanan/hapus_layanan'?>">
                <div class="modal-body">
                   <p>Anda yakin mau menghapus <b><?php echo $layanan_nama;?></b></p>
                            <input name="kode" type="hidden" class="kode_hapus" value="">
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button type="submit" class="btn btn-primary">Hapus</button>
                </div>
            </form>
        </div>
        </div>
        </div>

        <div>
            <!--Modal Edit  -->
        <div id="modalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Edit layanan</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/Layanan/edit_layanan'?>">
                        <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Kode layanan</label>
                            <div class="col-xs-9">
                                <input name="kode_layanan" class="form-control kobar_edit" type="text" value="<?php echo $layanan_id;?>" placeholder="Kode layanan..." style="width:335px;" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Nama layanan</label>
                            <div class="col-xs-9">
                                <input name="nama_layanan" class="form-control nabar_edit" type="text" value="<?php echo $layanan_nama;?>" placeholder="Nama layanan..." style="width:335px;" required>
                            </div>
                        </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Harga layanan</label>
                        <div class="col-xs-9">
                            <input name="harga" class="form-control harjul_edit" type="text" value="<?php echo $layanan_harga;?>" placeholder="Harga layanan..." style="width:335px;" required>
                        </div>
                    </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </form>
                </div>
                </div>
                </div>
        </div>
        <div>
             <!-- ============ MODAL ADD =============== -->
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah layanan</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/Layanan/tambah_layanan'?>">
                <div class="modal-body">

                    <!-- <div class="form-group">
                        <label class="control-label col-xs-3" >Kode layanan</label>
                        <div class="col-xs-9">
                            <input name="kode_layanan" class="form-control" type="hidden" placeholder="Kode layanan..." style="width:335px;" required value="">
                        </div>
                    </div> -->


                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama layanan</label>
                        <div class="col-xs-9">
                            <input name="nama_layanan" class="form-control" type="text" placeholder="Nama layanan..." style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Harga layanan</label>
                        <div class="col-xs-9">
                            <input name="harga" class="form-control" type="text" placeholder="Harga layanan..." style="width:335px;" required>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        </div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url().'assets/dist/js/bootstrap-select.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/dataTables.bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.price_format.min.js'?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#mydata').DataTable();
        } );
    </script>
    <script type="text/javascript">
        $(function(){
            $('.harpok').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('.harjul').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
        });

        var edit_layanan = (kode_layanan, nama_layanan, harga) => {
            $('#modalEdit').modal('show');
            $('.kode_layanan_edit').val(kode_layanan);
            $('.nama_layanan_edit').val(nama_layanan);
            $('.harga_edit').val(harga);
        }

        var hapus_layanan = (kode_layanan) => {
            $('#modalHapus').modal('show');
            $('.kode_hapus').val(kode_layanan);
        }
    </script>
    
</body>

</html>
