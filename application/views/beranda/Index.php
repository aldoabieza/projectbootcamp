<div class="container">
    <div class="row mt-5">
        <div class="col-md-6">
            <a href="<?= base_url('home/tambah_produk') ?>" class="btn btn-primary">Tambah Data Produk</a>
        </div>
    </div>
    <table class="table my-3">
        <?= $this->session->flashdata('message') ?>
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($produk as $p) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $p->nama_produk; ?></td>
                    <td><?= $p->keterangan; ?></td>
                    <td><?= $p->harga; ?></td>
                    <td><?= $p->jumlah; ?></td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="<?= base_url('home/edit_produk/') ?><?= $p->id_produk ?>"><i class="far fa-edit"></i></a>
                        <a class="btn btn-xs btn-danger" href="<?= base_url('home/delete_produk/') ?><?= $p->id_produk ?>" onclick="return confirm('Anda ingin menghapus ?')"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>