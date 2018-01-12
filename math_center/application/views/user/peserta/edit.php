    <div id="content">
        <div class="title">Edit Peserta</div>
        <div class="content-box">
        <div class="box-title">Edit Peserta</div>
        <div class="box-body">
            <div class="form-peserta">
            <?php
                    $error = $this->session->flashdata('error');
                    if(isset($error)){
                ?>
                    <div class="error"><?php echo $this->session->flashdata('error');?></div>
                <?php } ?>
                <form class="form" method="POST" action="<?=site_url('home/editPeserta?id=');?><?=$peserta->id_peserta;?>">
                <table>
                    <tr>
                        <td>
                            <label> NO INDUK</label></td>
                        <td>:</td>
                        <td>
                            <input type="text" name="id_peserta" style="width:100%" value="<?=$peserta->id_peserta;?>">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label> Nama Peserta</label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="nama_peserta" style="width:100%" value="<?=$peserta->nama_peserta;?>">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label> Jenis Kelamin</label>
                        </td>
                        <td>:</td>
                        <td>
                            <select name="jenis_kelamin" style="width:100%">
                            <option><?=$peserta->jenis_kelamin;?></option>
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                            </select>
                        </td>
                    </tr>

                     <tr>
                        <td>
                            <label> Tempat Lahir</label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="tempat_lahir" style="width:100%" value="<?=$peserta->tempat_lahir;?>">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label> Tanggal Lahir (yyyy-mm-dd) </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="tanggal_lahir" style="width:100%" value="<?=$peserta->tanggal_lahir;?>">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label> Alamat </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="alamat_peserta" style="width:100%" value="<?=$peserta->alamat_peserta;?>">
                        </td>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label> Kota </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="kota" style="width:100%" value="<?=$peserta->kota;?>">
                        </td>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label> Propinsi </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="provinsi" style="width:100%" value="<?=$peserta->provinsi;?>">
                        </td>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label> Kode Pos </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="kode_pos" style="width:100%" value="<?=$peserta->kode_pos;?>">
                        </td>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label> Nomor Telepon </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="nomor_telepon" style="width:100%" value="<?=$peserta->nomor_telepon;?>">
                        </td>
                        </td>
                    </tr>

                    <tr>
                        <td valign="top">Orang Tua / Wali</td>
                        <td valign="top">:</td>
                    </tr>
                    <tr>
                        <td valign="top"></td>
                        <td valign="top"></td>
                        <td valign="top" align="left">
                            <table>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td valign="top">:</td>
                                    <td><input type="text" name="nama_wali_1" style="width:100%" value="<?=$peserta->nama_wali_1;?>"></td>
                                </tr>
                                <tr>
                                    <td>Telepon</td>
                                    <td valign="top">:</td>
                                    <td><input type="text" name="no_telp_wali_1" style="width:100%" value="<?=$peserta->no_telp_wali_1;?>"></td>
                                </tr>
                                <tr><td></td></tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label> Kategori </label>
                        </td>
                        <td>:</td>
                        <td>
                            <select name="kategori" id="kategori" style="width:100%">
                                <option value="<?=$peserta->id_kategori;?>"><?=$peserta->nama_kategori;?></option>
                                <?php foreach($kategori as $row) { ?>
                                <option value="<?=$row->id_kategori;?>"><?=$row->nama_kategori;?></option>
                                <?php } ?>
                            </select>
                        </td>
                        </td>
                    </tr>

                    <tr class="paket">
                        <td>
                            <label> Paket </label>
                        </td>
                        <td>:</td>
                        <td>
                            <select name="id_paket" id="paket" style="width:100%">
                            <option value="<?=$peserta->id_paket;?>"><?=$peserta->nama_paket;?></option>
                            </select>
                        </td>
                        </td>
                    </tr>
                    </table>
                    <button type="submit" class="btn">Edit</button>
                </form>
            </div>
        </div>
    </div>
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
                        $("#paket").html("");
                        $("#paket").append("<option>- Pilih Paket -</option>");
                        $("#paket").append(html);
                    },
                    error: function() {
                        alert("Error!");
                    }
        });
            })
        })
    </script>