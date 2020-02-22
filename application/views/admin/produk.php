<h3><?= $judul ?></h3>
<hr>

<div class="">
    <h3>

        <a href="<?= base_url('admin/insert') ?>">Tambah Produk?</a>
    </h3>
</div>
<!-- <div class="row no-gutters"> -->
<?php
foreach ($hasil as $data) :
?>
    <!-- Button trigger modal -->

    <!-- <div class="col-12 col-md-6 col-lg-2 "> -->
    <div class="card shadow my-3 bg-white rounded" style="min-height: 200px">
        <div class="form-row ">
            <div class="col-4">
                <img height="200px" src="<?= base_url('assets/img/' . $data->foto) ?>" style="object-fit: cover" class="card-img" alt="...">
            </div>
            <div class="col">
                <div class="card-body ">
                    <div class="row ">
                        <div class="col">
                            <h4>Nama Produk </h4>
                            <h4>Harga </h4>
                            <h4>Diskon </h4>
                        </div>
                        <div class="col">
                            <h4><?= $data->nama_produk ?></h4>
                            <h4>Rp <?= number_format($data->harga_produk, 0, '.', '.') ?></h4>
                            <h4><?= $data->diskon ?>%</h4>
                        </div>
                        <div class="col-2">

                            <!-- <button href="<?= base_url('admin/edit/' . $data->id_produk) ?>"><button class="btn btn-success"></button></a> -->
                            <button type="button" class="btn btn-success btn" data-toggle="modal" data-target="#modelId<?= $data->id_produk ?>">
                                <i class="fas fa-pen    "></i>
                            </button>
                            <a href="<?= base_url('admin/delete/' . $data->id_produk) ?>"><button class="btn btn-danger btn"><i class="fa fa-trash" aria-hidden="true"></i></button></a>

                            <!-- Modal -->
                            <div class="modal fade" id="modelId<?= $data->id_produk ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"><?= $data->nama_produk ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form enctype="multipart/form-data" method="post" action="<?= base_url('Admin/update/' . $data->id_produk) ?>">
                                                <!-- <div class="d-flex justify-content-center"> -->
                                                <!-- <div class="card w-75"> -->
                                                <div class="card-body">
                                                    <h1 align="center">Edit Produk</h1><br>
                                                    <div class="form-row">
                                                        <div class="col-sm">
                                                            <h4>
                                                                Nama Produk
                                                            </h4>
                                                            <div class="form-group">
                                                                <input value="<?= $data->nama_produk ?>" autofocus type="text" placeholder="Nama Produk" class="form-control" name="nama_produk" id="" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm">
                                                            <h4>
                                                                Harga Produk
                                                            </h4>
                                                            <div class="form-group">
                                                                <input value="<?= $data->harga_produk ?>" type="number" placeholder="Harga" class="form-control" name="harga_produk" id="" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm">
                                                            <h4>
                                                                Diskon
                                                            </h4>
                                                            <div class="form-group">
                                                                <input value="<?= $data->diskon ?>" type="number" placeholder="Diskon" class="form-control" name="diskon" id="" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm">
                                                            <h4>
                                                                Stok tersedia
                                                            </h4>
                                                            <div class="form-group">
                                                                <input value="<?= $data->quantity ?>" type="number" placeholder="Stok Tersedia" class="form-control" name="quantity" id="" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h4>
                                                        Deskripsi
                                                    </h4>
                                                    <div class="form-group">
                                                        <textarea style="height: 200" class="form-control text-justify" name="deskripsi" id=""><?= $data->deskripsi ?></textarea>
                                                    </div>
                                                    <!-- <img src="" alt=""> -->
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for=""></label>
                                                                <input" type="file" class="form-control-file" name="foto" >
                                                                <?= form_upload('foto') ?>
                                                            </div>
                                                        </div>
                                                        <div align="right" class="col">
                                                            <!-- <button type="submit" class="btn btn-dark">Button</button>
                                                            <a href="<?= base_url('produk') ?>" class="btn btn-danger">Kembali</a> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- </div> -->
                                                <!-- </div> -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->

<?php
endforeach;
?>
<!-- <div class="com-md-6">

    </div> -->
<!-- </div> -->