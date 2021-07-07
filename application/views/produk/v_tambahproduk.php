<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <?= form_open_multipart('home/tambah_produk') ?>
            <div class="form-group">
                <label for="namaproduk">Nama Produk</label>
                <input type="text" class="form-control" placeholder="Sabun" id="namaproduk" name="namaproduk">
                <?= form_error('namaproduk', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control" placeholder="Harga Produk" id="harga" name="harga">
                <?= form_error('harga', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah Produk</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah">
                <?= form_error('jumlah', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="editor"></textarea>
                <?= form_error('keterangan', '<small class="text-danger">', '</small>') ?>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
            <?= form_close() ?>
        </div>
    </div>
</div>