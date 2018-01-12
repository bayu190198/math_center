    <div id="content">
        <div class="title">Pencarian</div>
        <div class="content-box">
        <div class="box-title">Cari Peserta</div>
        <div class="box-body">
                <div class="form-pencarian">
                    <form class="form" method="POST" action="">
                        <table>
                            <tr><td>Nama Peserta</td><td>:</td><td><input type="text" name="qnama"></td></tr>
                             <tr>
                        <td>
                            <label> Kategori </label>
                        </td>
                        <td>:</td>
                        <td>
                            <select name="qkategori" id="kategori" style="width:100%">
                                <option>- Pilih Kategori -</option>
                                <?php foreach($kategori as $row) { ?>
                                <option value="<?=$row->id_kategori;?>"><?=$row->nama_kategori;?></option>
                                <?php } ?>
                            </select>
                        </td>
                        </td>
                    </tr>

                    <tr class="paket hide">
                        <td>
                            <label> Paket </label>
                        </td>
                        <td>:</td>
                        <td>
                            <select name="qpaket" id="paket" style="width:100%">
                            <option>- Pilih Paket -</option>
                            </select>
                        </td>
                        </td>
                    </tr>
                        </table>
                        <button type="submit" class="btn">Cari</button>
                    </form>
                </div>
        </div>
    </div>

            <?php
            if($cari){
            ?>
            <div class="content-box">
            <div class="box-title">Hasil Pencarian</div>
            <div class="box-body">
                <?php if($peserta != null) { ?>
                    <?php foreach($peserta as $row) { ?>
                        <div class="card">
                            <table>
                                <tr><td><b><?=$row->nama_peserta;?></b></tr>
                                <tr><td><?=$row->nama_kategori;?></tr>
                                <tr><td><?=$row->nama_paket;?></tr>
                                <tr><td><a href="<?=site_url('home/peserta/edit?id='.$row->id_peserta);?>">EDIT</a> &#183; <a href="<?=site_url('home/hapusPeserta?id='.$row->id_peserta);?>" onclick="return hapusData()">HAPUS</a> </tr>
                            </table>
                        </div>                    
                    <?php } ?>
                    <div class="clear"></div>
                <?php }else { ?>
                    Tidak ada data.
                <?php } ?>
            </div>
        </div>
            <?php }else { ?>
                
            <?php } ?>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#kategori").change(function(){
                var kategori = $("#kategori").val();
                $.ajax({
                    type: "POST",
                    url: "<?=base_url('home/getPaket');?>",
                    data: 'kategori='+kategori,
                    cache: false,
                    success: function(html) {
                        $(".paket").show();
                        $("#paket").append(html);
                    },
                    error: function() {
                        alert("Error!");
                    }
        });
            })
        })
    </script>
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