<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Produk_model', 'mp');
    }

    public function index()
    {
        $data['title'] = 'Beranda Produk';
        $data['produk'] = $this->mp->tampilProduk();
        $this->load->view('templates/header', $data);
        $this->load->view('beranda/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_produk()
    {
        $data['title'] = 'Tambah Produk';
        $this->form_validation->set_rules('namaproduk', 'Nama', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('produk/v_tambahproduk');
            $this->load->view('templates/footer');
        } else {
            $data['produk'] = $this->mp->tambahProduk();
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2">Produk Berhasil ditambah');
            redirect('home');
        }
    }
    public function delete_produk($id)
    {
        $this->mp->hapusProduk($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-2">Produk Berhasil dihapus');
        redirect('home');
    }

    public function edit_produk($id)
    {
        $data['title'] = 'Edit Data Permintaan';
        $data['produk'] = $this->mp->getProdukById($id);
        $this->form_validation->set_rules('namaproduk', 'Nama', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('produk/v_editproduk', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_produk' => $this->input->post('namaproduk', true),
                'keterangan' => $this->input->post('keterangan', true),
                'harga' => $this->input->post('harga', true),
                'jumlah' => $this->input->post('jumlah', true),
            ];
            $this->db->where('id_produk', $id);
            $this->db->update('produk', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-2" role="alert">Produk berhasil diubah!</div>');
            redirect('home');
        }
    }
}
