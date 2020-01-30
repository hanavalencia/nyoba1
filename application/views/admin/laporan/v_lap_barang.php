<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>laporan data barang</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css')?>"/>
</head>
<body onload="window.print()">
<div id="laporan">
<table align="center" style="width:900px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
<!--<tr>
    <td><img src="<?php// echo base_url().'assets/img/kop_surat.png'?>"/></td>
</tr>-->
</table>

<table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
<tr>
    <td colspan="2" style="width:800px;paddin-left:20px;"><center><h4>LAPORAN DATA BARANG</h4></center><br/></td>
</tr>
                       
</table>
 
<table border="0" align="center" style="width:900px;border:none;">
        <tr>
            <th style="text-align:left"></th>
        </tr>
</table>

<table border="1" align="center" style="width:900px;margin-bottom:20px;">
<thead>
    <tr>
        <th style="width:50px;">No</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Harga Barang</th>
        <th>Stock</th>
    </tr>
</thead>
<tbody>
<?php
     $no=0;
        foreach ($data->result_array() as $i) {
         $no++;
         $barang_id=$i['barang_id'];
         $barang_nama=$i['barang_nama'];
         $barang_harga=$i['barang_harga'];
         $barang_stok=$i['barang_stok'];
            
?>
        <tr>
                <td style="text-align:center;"><?php echo $no;?></td>
                <td style="text-align:center;"><?php echo $barang_id;?></td>
                <td style="text-align:left;"><?php echo $barang_nama;?></td>
                <td style="text-align:center;"><?php echo 'Rp '.number_format($barang_harga);?></td>
                <td style="text-align:center;"><?php echo $barang_stok;?></td>  
        </tr>
<?php }?>
</tbody>

</table>

</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td></td>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td align="right">Tasikmalaya, <?php echo date('d-M-Y')?></td>
    </tr>
    <tr>
        <td align="right"></td>
    </tr>
   
    <tr>
    <td><br/><br/><br/><br/></td>
    </tr>    
    <tr>
       
    </tr>
    <tr>
        <td align="center"></td>
    </tr>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <th><br/><br/></th>
    </tr>
    <tr>
        <th align="left"></th>
    </tr>
</table>
</div>
</body>
</html>