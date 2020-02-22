<!-- <input" type="file" class="form-control-file" name="foto" id="" placeholder="" aria-describedby="fileHelpId"> -->
<!-- <div class="p-3"> -->
<form enctype="multipart/form-data" method="post" action="<?= base_url('Admin/update/' . $result->id_produk) ?>">
    <div class="d-flex justify-content-center">
        <div class="card w-75">
            <div class="card-body">
                <h1 align="center">Edit Produk</h1><br>
                <div class="form-row">
                    <div class="col-sm">
                        <h4>
                            Nama Produk
                        </h4>
                        <div class="form-group">
                            <input value="<?= $result->nama_produk ?>" autofocus type="text" placeholder="Nama Produk" class="form-control" name="nama_produk" id="" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm">
                        <h4>
                            Harga Produk
                        </h4>
                        <div class="form-group">
                            <input value="<?= $result->harga_produk ?>" type="number" placeholder="Harga" class="form-control" name="harga_produk" id="" placeholder="">
                        </div>
                    </div>
                    <div class="col-sm">
                        <h4>
                            Diskon
                        </h4>
                        <div class="form-group">
                            <input value="<?= $result->diskon ?>" type="number" placeholder="Diskon" class="form-control" name="diskon" id="" placeholder="">
                        </div>
                    </div>
                    <div class="col-sm">
                        <h4>
                            Stok tersedia
                        </h4>
                        <div class="form-group">
                            <input value="<?= $result->quantity ?>" type="number" placeholder="Stok Tersedia" class="form-control" name="quantity" id="" placeholder="">
                        </div>
                    </div>
                </div>
                <h4>
                    Deskripsi
                </h4>
                <div class="form-group">
                    <textarea style="height: 200" class="form-control text-justify" name="deskripsi" id=""><?= $result->deskripsi ?></textarea>
                </div>
                <!-- <img src="" alt=""> -->
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for=""></label>
                            <!-- <input" type="file" class="form-control-file" name="foto" > -->
                            <?= form_upload('foto') ?>
                        </div>
                    </div>
                    <div align="right" class="col">
                        <button type="submit" class="btn btn-dark">Button</button>
                        <a href="<?= base_url('produk') ?>" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- </div> -->