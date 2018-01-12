<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta_model extends CI_Model {
    public function getPeserta()
    {
        $query = $this->db->query("select `peserta`.*, `kategori`.nama_kategori, `paket`.nama_paket from `peserta` JOIN `paket` ON `paket`.id_paket=`peserta`.id_paket JOIN `kategori` ON `kategori`.`id_kategori`=`paket`.`id_kategori`");
        if($query->num_rows()>0)
        {
            return $query->result();
        }else {
            return "";
        }
    }

    public function getPesertaPagination($number, $offset)
    {
        $query = $this->db->query("select `peserta`.*, `kategori`.nama_kategori, `paket`.nama_paket from `peserta` JOIN `paket` ON `paket`.id_paket=`peserta`.id_paket JOIN `kategori` ON `kategori`.`id_kategori`=`paket`.`id_kategori` ORDER BY `peserta`.id_peserta ASC LIMIT $offset, $number");
        if($query->num_rows()>0)
        {
            return $query->result();
        }else {
            return "";
        }
    }

    public function getPesertaByID($id)
    {
        $query = $this->db->query("select `peserta`.*,`kategori`.id_kategori, `kategori`.nama_kategori, `paket`.id_paket, `paket`.nama_paket, `paket`.bahasa,`paket`.biaya from `peserta` JOIN `paket` ON `paket`.id_paket=`peserta`.id_paket JOIN `kategori` ON `kategori`.`id_kategori`=`paket`.`id_kategori` WHERE `peserta`.id_peserta = '$id'");
        if($query->num_rows()>0)
        {
            return $query->row();
        }else {
            return "";
        }
    }

    public function getPesertaForReport($month, $year)
    {
        $query = $this->db->query("select `peserta`.*, `kategori`.nama_kategori, `paket`.nama_paket, `paket`.bahasa,`paket`.biaya from `peserta` JOIN `paket` ON `paket`.id_paket=`peserta`.id_paket JOIN `kategori` ON `kategori`.`id_kategori`=`paket`.`id_kategori` WHERE YEAR(`peserta`.`create_date`) = '$year' AND `peserta`.`create_date` LIKE '%%%%-$month-%%'");
        if($query->num_rows()>0)
        {
            return $query->result();
        }else {
            return "";
        }
    }

     public function getJumlahPeserta()
    {
        $query = $this->db->query("select * from peserta");

        return $query->num_rows();
    }

    public function cekPeserta($id)
    {
        $query = $this->db->query("select * from peserta where id_peserta = '$id'");

        if($query->num_rows()>0) {
            return true;
        }else {
            return false;
        }
    }

    public function cariPeserta($nama = null, $kategori = null, $paket = null)
    {
        if($nama!=null && $kategori!=null && $paket!=null){
            $query = $this->db->query("select `peserta`.*, `kategori`.nama_kategori, `paket`.nama_paket from `peserta` JOIN `paket` ON `paket`.id_paket=`peserta`.id_paket JOIN `kategori` ON `kategori`.`id_kategori`=`paket`.`id_kategori` WHERE `peserta`.nama_peserta LIKE '%$nama%' AND `kategori`.id_kategori = '$kategori' AND `paket`.id_paket = '$paket'");
        }else if($nama!=null && $kategori!=null && $paket==null){
            $query = $this->db->query("select `peserta`.*, `kategori`.nama_kategori, `paket`.nama_paket from `peserta` JOIN `paket` ON `paket`.id_paket=`peserta`.id_paket JOIN `kategori` ON `kategori`.`id_kategori`=`paket`.`id_kategori` WHERE `peserta`.nama_peserta LIKE '%$nama%' AND `kategori`.id_kategori = '$kategori'");
        }else if($nama!=null && $kategori==null && $paket==null){
            $query = $this->db->query("select `peserta`.*, `kategori`.nama_kategori, `paket`.nama_paket from `peserta` JOIN `paket` ON `paket`.id_paket=`peserta`.id_paket JOIN `kategori` ON `kategori`.`id_kategori`=`paket`.`id_kategori` WHERE `peserta`.nama_peserta LIKE '%$nama%'");
        }else if($nama==null && $kategori!=null && $paket==null){
            $query = $this->db->query("select `peserta`.*, `kategori`.nama_kategori, `paket`.nama_paket from `peserta` JOIN `paket` ON `paket`.id_paket=`peserta`.id_paket JOIN `kategori` ON `kategori`.`id_kategori`=`paket`.`id_kategori` WHERE `kategori`.id_kategori = '$kategori'");
        }
        
        if(isset($query)){
            if($query->num_rows()>0)
            {
                return $query->result();
            }else {
                return "";
            }
        }
    }

    public function tambahPeserta($data)
    {
        $query = $this->db->insert('peserta', $data);
        if($query)
        {
            $result = array('status'=>true);
            return $result;
        }else {
            $result = array('status'=>false, 'error' => "Data gagal di tambah".$this->db->error());
            return $result;
        }
    }

     public function editPeserta($id, $data)
    {
        $this->db->where('id_peserta', $id);
        $query = $this->db->update('peserta', $data);
        if($query)
        {
            $result = array('status'=>true);
            return $result;
        }else {
            $result = array('status'=>false, 'error' => "Data gagal di uodate".$this->db->error());
            return $result;
        }
    }

    public function getKategori()
    {
        $query = $this->db->query("select * from kategori");
        if($query->num_rows()>0)
        {
            return $query->result();
        }else {
            return "";
        }
    }

    public function getPaketByKategori($kategori)
    {
        $query = $this->db->query("select * from paket where id_kategori='$kategori'");
        if($query->num_rows()>0)
        {
            return $query->result();
        }else {
            return "";
        }
    }

    public function hapusPeserta($id)
    {
        $query = $this->db->query("delete from peserta where id_peserta='$id'");
        if($query)
        {
            return true;
        }else {
            return false;
        }
    }


    public function translateBulan($bulan)
    {
        if($bulan=='01'){
            return "Januari";
        }else if($bulan=='02'){
            return "Februari";
        }else if($bulan=='03'){
            return "MARET";
        }else if($bulan=='04'){
            return "April";
        }else if($bulan=='05'){
            return "Mei";
        }else if($bulan=='06'){
            return "Juni";
        }else if($bulan=='07'){
            return "Juli";
        }else if($bulan=='08'){
            return "Agustus";
        }else if($bulan=='09'){
            return "September";
        }else if($bulan=='10'){
            return "Oktober";
        }else if($bulan=='11'){
            return "November";
        }else if($bulan=='12'){
            return "Desember";
        }
    }


}
