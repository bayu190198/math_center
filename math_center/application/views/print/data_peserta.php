<html>
<head>
<style type="text/css">
    body,html {
        font-size: 11pt;
        font-family: Arial;
    }

    header {
        border-bottom: solid 3px black;
    }

    h1 {
        padding: 0;
        margin: 0;
        font-size: 12pt;
    }

    table, th, td {
        border: 1px solid black;
    }

</style>
</head>
<body>
<header>
<center>
<img src="<?=base_url();?>assets/images/sakamoto-logo.jpg" style="width: 220px">
<br>
<br>
<h1>SAKOMOTO METHOD</h1>
<h1>JAPANESE MATHEMATICS CENTER</h1>
<i style="font-size:10pt">ITC Marina Plaza Blok B Nomor 11 Manado<br/>
Telp. (0431) 8880057</i></center>
<br>
</header>
<section>
    <br>
    

    <div>
        <div style="display: inline;"><b>Laporan Data Peserta</b></div>
        <div style="display: inline;position:absolute;float: right;right: 0;"><b>Tanggal: <?php echo date("d/m/Y");?></b></div>
    </div>
    <br>

    <center><b>DATA PESERTA</b></center>
    
    <br>
    <br>

    <table border="0" width="100%">
    <tr>
        <td width="25%">No. Induk</td> <td>:</td> <td><?=$peserta->id_peserta;?></td>
    </tr>
    <tr>
        <td width="25%">Nama</td> <td width="2%">:</td> <td width="73%"><?=$peserta->nama_peserta;?></td>
    </tr>
    <tr>
        <td width="25%">Jenis Kelamin</td> <td width="2%">:</td> <td width="73%"><?=$peserta->jenis_kelamin;?></td>
    </tr>
    <tr>
        <td width="25%">Tempat Lahir</td><td width="2%">: </td><td width="73%"><?=$peserta->tempat_lahir;?></td>
    </tr>
    <tr>
        <td width="25%">Tanggal Lahir </td>  <td width="2%">:</td> <td width="73%"><?=date("d/m/Y", strtotime($peserta->tanggal_lahir));?></td>
    </tr>
    <tr>
        <td width="25%">Alamat Lengkap</td>  <td width="2%">:</td><td width="73%"><?=$peserta->alamat_peserta;?></td>
    </tr>
    <tr>
        <td width="25%">Kota</td> <td width="2%">:</td> <td width="73%"><?=$peserta->kota;?></td>
    </tr>
    <tr>
        <td width="25%">Propinsi</td> <td width="2%">:</td> <td width="73%"><?=$peserta->provinsi;?></td>
    </tr>
    <tr>
        <td width="25%">Kode Pos</td> <td width="2%">:</td> <td width="73%"><?=$peserta->kode_pos;?></td>
    </tr>
    <tr>
        <td width="25%">No. Telepon</td> <td width="2%">:</td> <td width="73%"><?=$peserta->nomor_telepon;?></td>
    </tr>
    <tr>
        <td width="25%">Tanggal Mulai</td> <td width="2%">:</td> <td width="73%"><?=$peserta->create_date;?></td>
    </tr>
    </table>

    <br>
    <br>
    
    <table width="100%" cellspacing="0">
        <tr>
            <th>Tanggal</th>
            <th>Bahasa</th>
            <th>Paket</th>
            <th>Jumlah</th>
        </tr>
        <tr>
            <td align="center"><?=$peserta->create_date;?></td>
            <td align="center"><?=$peserta->bahasa;?></td>
            <td align="center"><?=$peserta->nama_paket;?></td>
            <td align="center"><?=number_format($peserta->biaya, 2);?></td>
        </tr>
    </table>

    <br>
    <br>

    <div style="font-weight: bold;text-align: right;">
    MANADO, <?=date("d M Y");?>
    </div>
    <div style="clear:both"></div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <center><i>Staff Sakamoto</i>
    <br>
    <br>
    <br>
    <br>
    <br>
    (Nama Disini)</center>

    <div style="position: absolute;bottom: 0;">
    <small><i>* ini hanyalah format hanya sementara</i></small>
    </div>

</section>
</body>
</html>