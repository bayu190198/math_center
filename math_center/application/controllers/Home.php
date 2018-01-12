<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    private $user;

    public function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model('auth_model');
        $this->load->model('user_model');

        $this->load->model('peserta_model');

        // check login
        $this->auth_model->check();

        //get userdata
        $this->user = $this->user_model->getUser($this->session->userdata("username"));
    }

    public function index()
    {

        $head['title'] = "Home";
        $head['user'] = $this->user_model->getUser($this->session->userdata("username"));

        $this->load->view('_template/header', $head);
        $this->load->view('_template/navmenu');
        $this->load->view('user/home');
    }

    public function peserta()
    {
        $head['title'] = "Peserta";
        $head['user'] = $this->user_model->getUser($this->session->userdata("username"));

        $this->load->view('_template/header', $head);
        $this->load->view('_template/navmenu');

        if ($this->uri->segment(3)=='tambah')
        {
            $data['kategori'] = $this->peserta_model->getKategori();
            $this->load->view('user/peserta/tambah', $data);
        }else if ($this->uri->segment(3)=='edit')
        {
            $data['kategori'] = $this->peserta_model->getKategori();
            $data['peserta'] = $this->peserta_model->getPesertaByID($this->input->get('id'));
            $this->load->view('user/peserta/edit', $data);
        } else{
            $jumlah_data = $this->peserta_model->getJumlahPeserta();
            $this->load->library('pagination');
            $config['total_rows'] = $jumlah_data;
            $config['per_page'] = 10;
            $config['base_url'] = base_url()."home/peserta";
            $from = $this->uri->segment(3);
            if($from==NULL) $from = 0;
            $this->pagination->initialize($config);     
            $data['peserta'] = $this->peserta_model->getPesertaPagination($config['per_page'], $from);

            $this->load->view('user/peserta', $data);
        }
    }

    public function pencarian()
    {

        $head['title'] = "Pencarian";
        $head['user'] = $this->user_model->getUser($this->session->userdata("username"));

        $this->load->view('_template/header', $head);
        $this->load->view('_template/navmenu');
        
        $query_nama = $this->input->post('qnama');
        $query_kategori = $this->input->post('qkategori');
        $query_paket = $this->input->post('qpaket');

        $data['kategori'] = $this->peserta_model->getKategori();
        $data['cari'] = false;

        if (isset($query_nama) || isset($query_kategori) || isset($query_paket)){
            $data['cari'] = true;
            $data['peserta'] = $this->peserta_model->cariPeserta($query_nama, $query_kategori, $query_paket);
        }
        $this->load->view('user/pencarian', $data);
    }

    public function laporan()
    {

        $head['title'] = "Laporan";
        $head['user'] = $this->user_model->getUser($this->session->userdata("username"));

        $this->load->view('_template/header', $head);
        $this->load->view('_template/navmenu');
        $this->load->view('user/laporan');
    }

    public function getPaket()
    {
        $id_kategori = $this->input->post('kategori');

            if(isset($id_kategori)){
                $paket = $this->peserta_model->getPaketByKategori($id_kategori);
                if($paket!="")
                foreach($paket as $row){
                    echo "<option value='$row->id_paket'>$row->nama_paket</option>";
                }else {
                    echo "Tidak ada kategori";
                }
            }else {
                echo "ERROR: ID EMPTY!";
            }
    }

    public function printPeserta()
    {
        $id_peserta  = $this->input->get('id');
        if($this->peserta_model->cekPeserta($id_peserta)){
            $this->load->library('PdfGenerator');

            $data['peserta'] = $this->peserta_model->getPesertaByID($id_peserta);

             $html = $this->load->view('print/data_peserta', $data, true);

            //echo $html;
            $this->pdfgenerator->generate($html,'file');
        }else {
            $this->session->set_flashdata('error', 'Data peserta tidak ada');
            redirect('home/peserta?error');
        }
    }

    public function hapusPeserta()
    {
        $id_peserta  = $this->input->get('id');
        if($this->peserta_model->hapusPeserta($id_peserta)){
            redirect('home/peserta');
        }else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect('home/peserta?error');
        }
    }

    public function tambahPeserta()
    {
        $data = $this->input->post();
        unset($data['kategori']);
        foreach($data as $item=>$value){
            if($value == ""){
                $err[] = $item . " tidak boleh kosong!";
            }
        }
        $data2 = array('create_by' => $this->user->id_user,
                        'create_date' => date("Y-m-d"),
            );

        $data = array_merge($data,$data2);

        //print_r($data);

        if(isset($err)){
            $err = implode(" ", $err);
            $this->session->set_flashdata('error', $err);
            redirect('home/peserta/tambah');
        }else {
            $insert = $this->peserta_model->tambahPeserta($data);
            //print_r($insert);
            if($insert['status']){
                $this->session->set_flashdata('error', 'sukses');
                redirect('home/peserta/');
            }else {
                $this->session->set_flashdata('error', $insert['error']);
                redirect('home/peserta/tambah');
            }
        }
    }

    public function editPeserta()
    {
        $id = $this->input->get('id');
        $data = $this->input->post();
        unset($data['kategori']);
        foreach($data as $item=>$value){
            if($value == ""){
                $err[] = $item . " tidak boleh kosong!";
            }
        }
        $data2 = array('update_by' => $this->user->id_user,
                        'update_date' => date("Y-m-d"),
            );

        $data = array_merge($data,$data2);

        //print_r($data);

        if(isset($err)){
            $err = implode(" ", $err);
            $this->session->set_flashdata('error', $err);
            redirect('home/peserta/edit?id='.$id);
        }else {
            $edit = $this->peserta_model->editPeserta($id, $data);
            //print_r($edit);
            if($edit['status']){
                $this->session->set_flashdata('error', 'sukses');
                redirect('home/peserta/');
            }else {
                $this->session->set_flashdata('error', $edit['error']);
                redirect('home/peserta/edit?id='.$id);
            }
        }
    }

    public function printReport()
    {
        $this->load->library('PdfGenerator');
        
        $data['mahasiswa'] = $this->peserta_model->getPesertaForReport($this->input->get('bulan'), $this->input->get('year'));
        if($data['mahasiswa']==""){
            echo "Tidak ada data";
        }else {
            $data['bulan'] = $this->peserta_model->translateBulan($this->input->get('bulan'));
            $html = $this->load->view('print/laporan', $data, true);
            //echo $html;
            $this->pdfgenerator->generate($html,'file');
        }
        

    }

}
