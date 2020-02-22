    <div class="py-3"></div>
    <div class="container">

        <h1 class="">
            <?= $affected ?>
        </h1>
        <h1 class="" style="font-weight: bold">
            <?= $keyword ?>
        </h1>
        <div class="form-row no-gutters ">
            <?php
            // debug($keyword);
            if ($query == NULL) {
                echo "Barang yang anda cari tidak ada";
            } elseif ($keyword == NULL) {
                redirect('home');
            } else {

                foreach ($query as $data) {
            ?>
                    <div class="card mx-3 w-25">
                        <img src="<?= base_url('assets/img/' . $data->foto) ?>" class="card-img" alt="...">
                        <div class="card-body">
                            <h1>
                                <?= $data->nama_produk ?>
                            </h1>
                            <h2>Rp <?= number_format($data->harga_produk, 0, '.', '.')  ?></h2>
                        </div>
                    </div>


                    <!-- Button trigger modal -->

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
                                    <div class="form-row no-gutters">
                                        <div class="col">
                                            <img class="card-img" src="<?= base_url('assets/img/' . $data->foto) ?>" alt="">
                                        </div>
                                        <div class="col py-5">
                                            <!-- <div class=""> -->
                                            <?= $data->nama_produk ?>
                                            <!-- </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>