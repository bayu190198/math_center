<?php
    $no = $this->uri->segment('3') + 1;
?>
    <div id="content">
        <div class="title">Peserta</div>
        <div class="content-box">
            <div class="box-title">
            Daftar Peserta <a href="<?=site_url();?>home/peserta/tambah"><button>Tambah Peserta</button></a>
            </div>
            <div class="box-body">
            <?php if($peserta != null) { ?>
                <?php foreach($peserta as $row) { $no++;?>
                    <div class="card">
                        <table>
                            <tr><td><b><?=$row->nama_peserta;?></b></tr>
                            <tr><td><?=$row->nama_kategori;?></tr>
                            <tr><td><?=$row->nama_paket;?></tr>
                            <tr><td><a class="btn btn-small" href="<?=site_url('home/peserta/edit?id='.$row->id_peserta);?>"><i class="fa fa-pencil"></i> EDIT</a> <a class="btn btn-small" href="<?=site_url('home/hapusPeserta?id='.$row->id_peserta);?>" onclick="return hapusData()"><i class="fa fa-trash"></i> HAPUS</a> <a class="btn btn-small" href="<?=site_url('home/printPeserta?id='.$row->id_peserta);?>"><i class="fa fa-print"></i> CETAK</a> </tr>
                        </table>
                    </div>                    
                <?php } ?>
                <div class="clear"></div>
            <?php
        }else { ?>
                Tidak ada data.
            <?php } ?>
            </div>
        </div>
        <center>PAGE: <?=$this->pagination->create_links();?></center>
    </div>
    <script type="text/javascript">
        function hapusData()
        {
            var tanya = confirm("Anda yakin menghapus Data ini?");
            if(tanya){
                return true;
            }else {
                return false;
            }
        }
    </script>