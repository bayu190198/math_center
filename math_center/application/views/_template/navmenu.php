
    <div id="navmenu">
        <ul class="nav-menu">
            <a href="<?=site_url();?>home"><li>Home <i class="fa fa-divider"></i></li></a>
            <a href="<?=site_url();?>home/peserta"><li>Peserta</li></a>
            <a href="<?=site_url();?>home/pencarian"><li>Pencarian</li></a>
            <?php if($this->session->userdata('role') == 'admin') { ?>
            <a href="<?=site_url();?>home/laporan"><li>Laporan</li></a>
            <?php } ?>
        </ul>
    </div>
