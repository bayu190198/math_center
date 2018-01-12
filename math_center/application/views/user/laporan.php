    <div id="content">
        <div class="title">Laporan</div>
        <div class="content-box">
        <div class="box-title">Print Laporan</div>
        <div class="box-body">
                <div class="form-pencarian">
                    <form class="form" method="GET" action="<?=base_url('home/printReport');?>">
                        <table>
                    <tr>
                        <td>
                            <label> Bulan </label>
                        </td>
                        <td>:</td>
                        <td>
                            <select name="bulan" style="width:100%">
                                <option>- Pilih Bulan -</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label> Tahun </label>
                        </td>
                        <td>:</td>
                        <td>
                            <select name="year" style="width:100%">
                                <option>- Pilih Tahun -</option>
                                <?php
                                for($year = date("Y")+2; $year > 2010; $year--) { ?>
                                <option value="<?=$year;?>"><?=$year;?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                        </table>
                        <button type="submit" class="btn">PRINT</button>
                    </form>
                </div>
        </div>
    </div>
    </div>