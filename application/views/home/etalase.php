<h3 class="mt-3 ml-3">Etalase</h3>
<hr>

<div class="container-fluid">



   <div class="pt-3">
      <div class="form-row">
         <?php

         // $time = ;
         // echo date('Y-m-d H:i:s', time());
         foreach ($hasil as $data) {
            $diskon = intval($data->harga_produk) * intval($data->diskon) / 100;
            $hasil_diskon = intval($data->harga_produk) - $diskon;
         ?>
            <div class="card mx-3 my-3 w-25">
               <img height="200" style="object-fit: cover" src="<?= base_url('assets/img/' . $data->foto) ?>" alt="">

               <div class="card-body">
                  <h2><?= $data->nama_produk; ?></h2>
                  <!-- Cek Diskon Produk -->
                  <?php
                  if (intval($data->diskon) > 0) {
                     # code...
                  ?>
                     <h5 class="row no-gutters">

                        <?= $data->diskon ?>% &nbsp; <div style="text-decoration: line-through"> Rp <?= number_format($data->harga_produk, 0, '.', '.'); ?></div>
                     </h5>
                     <h4>Rp <?= number_format($hasil_diskon, 0, '.', '.') ?></h4>
                  <?php
                  } else {
                  ?>
                     <h4>Rp <?= number_format($data->harga_produk, 0, '.', '.'); ?></h4>
                  <?php
                  }
                  ?>
                  <!-- //Cek Diskon Produk -->



                  <!-- Cek Ketersediaan Produk -->
                  <?php
                  if (intval($data->quantity) < 0 || intval($data->quantity) == 0) {
                  ?>
                     <h6>

                        Stok Sudah Habis <br> <br>
                     </h6>
                     <button disabled type="submit" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modelId<?= $data->id_produk ?>">
                        Beli
                     </button>
                  <?php
                  } else {
                  ?>
                     <h6>
                        Stok Tersedia <?= $data->quantity ?> <br> <br>
                     </h6>
                     <button type="submit" class="btn btn-info btn-lg btn-block" data-toggle="modal" data-target="#modelId<?= $data->id_produk ?>">
                        Beli
                     </button>
                  <?php
                  }
                  ?>
                  <!-- /Cek Ketersediaan Produk -->
               </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="modelId<?= $data->id_produk ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
               <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title"><?= $data->nama_produk ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body">
                        <div class="form-row">
                           <div class="col-sm">
                              <img class="card-img" style="object-fit: cover" src="<?= base_url('assets/img/' . $data->foto) ?>" alt="">
                           </div>
                           <div class="col-sm">
                              <h1>
                                 <?= $data->nama_produk ?>
                              </h1>
                              <h3>
                                 Rp <?= number_format($hasil_diskon, 0, '.', '.') ?>
                              </h3>
                              <div class="form-row">
                                 <form action="<?= base_url('home/invoiceku/' . $data->id_produk) ?>" method="post">
                                    <?php
                                    if (empty($_SESSION)) {
                                    ?>
                                       <h5>Anda harus login sebelum membeli</h5>
                                       <a href="<?= base_url('home/login') ?>" class="btn btn-info"><i class="fas fa-sign-in-alt"></i>&nbsp; Login</a>
                                    <?php
                                    } else {
                                    ?>
                                       <div class="col">
                                          <div class="form-group">
                                             <h6>
                                                Jumlah Pembelian
                                             </h6>
                                             <input type="number" value="1" class="form-control" name="jumlah_pembelian" id="" placeholder="">
                                          </div>
                                          <h6>Jasa Pengiriman</h6>
                                          <div class="form-check form-check-inline">
                                             <label class="form-check-label">
                                                <input class="form-check-input" checked type="radio" name="jasa_kurir" id="" value="tiki.png"> <img src="<?= base_url('assets/img/kurir/tiki.png') ?>" width="10%" alt=""> TIKI
                                             </label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                             <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="jasa_kurir" id="" value="jne.png"> <img width="10%" src="<?= base_url('assets/img/kurir/jne.png') ?>" alt=""> JNE
                                             </label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                             <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="jasa_kurir" id="" value="sicepat.png"> <img width="10%" src="<?= base_url('assets/img/kurir/sicepat.png') ?>" alt=""> SiCepat
                                             </label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                             <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="jasa_kurir" id="" value="jt.png"> <img width="10%" src="<?= base_url('assets/img/kurir/jt.png') ?>" alt=""> J&T
                                             </label>
                                          </div>
                                          <div class="form-group">
                                             <h6 for="">Tujuan Pengiriman</label>
                                                <select class="form-control" name="tujuan_pengiriman" id="">
                                                   <option>Cilebut</option>
                                                   <option>Bogor</option>
                                                   <option>Cibuluh</option>
                                                   <option>Salabenda</option>
                                                   <option>Kebon Pedes</option>
                                                </select>
                                          </div>
                                          <button type="submit" class="btn btn-info">Beli sekarang</button> <br><br>
                                       </div>
                                       <div class="col">
                                          <a href="<?= base_url('home/keranjangku/' . $data->id_produk) ?>" class="btn btn-info"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Tambahkan ke keranjang</a>
                                       </div>
                                    <?php
                                    }
                                    ?>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div class="mt-3">
                           <h5>Deskripsi</h5>
                           <p><?= $data->deskripsi ?></p>
                        </div>
                        <hr>
                        <?php
                        $komentar = $this->db->query("SELECT * FROM `komentar` INNER JOIN user USING (id_user) INNER JOIN produk USING (id_produk) where id_produk='$data->id_produk'")->result();
                        // debug($komentar);
                        foreach ($komentar as $user) {
                        ?>
                           <div class="media">
                              <img class="mr-3" src="<?= base_url('assets/img/user/' . $user->foto_user) ?>" width="10%" alt="Generic placeholder image">
                              <div class="media-body">
                                 <h5 class="mt-0"><?= $user->username ?></h5>
                                 <?= $user->komentar ?>
                              </div>
                           </div>
                           <hr>
                        <?php
                        }
                        ?>
                        <p>Komentar</p>
                        <?php
                        if (!empty($_SESSION)) {

                        ?>
                           <form action="<?= base_url('home/komentar_etalase/' . $data->id_produk) ?>" method="post">
                              <div class="form-group">
                                 <textarea style="height: 200" class="form-control text-justify" name="komentar" id=""></textarea>
                              </div>
                              <button type="submit" class="btn btn-info btn-block">Kirim</button>
                           </form>
                        <?php
                        } else {

                        ?>
                           <a href="<?= base_url('home/login') ?>" class="text-white btn btn-info">Anda harus login sebelum berkomentar</a>
                        <?php
                        }
                        ?>

                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Close</button>
                     </div>
                  </div>
               </div>
            </div>
         <?php
         }
         ?>
      </div>

   </div>
</div>