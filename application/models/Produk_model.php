<?php

class Produk_model extends CI_Model
{
    public function tampilProduk()
    {
        return $this->db->get('produk')->result();
    }

    public function tambahProduk()
    {
        $data = [
            'nama_produk' => $this->input->post('namaproduk', true),
            'keterangan' => $this->input->post('keterangan', true),
            'harga' => $this->input->post('harga', true),
            'jumlah' => $this->input->post('jumlah', true),
        ];
        $this->db->insert('produk', $data);
    }

    public function getProdukById($id)
    {
        return $this->db->get_where('produk', ['id_produk' => $id])->row();
    }

    public function hapusProduk($id)
    {
        $this->db->delete('produk', ['id_produk' => $id]);
    }
}
