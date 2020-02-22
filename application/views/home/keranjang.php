   <h3 class="mt-3 ml-3">
      Keranjang
   </h3>
   <hr>
   <div class="container">

      <?php
         foreach ($query as $data) {
            $diskon = intval($data->harga_produk) * intval($data->diskon) / 100;
            $hasil_diskon = intval($data->harga_produk) - $diskon;
         ?>
            <div class="card my-5">
               <div class="row no-gutters">
                  <div class="col-4">
                     <img class="card-img-top" height="200px" style="object-fit: cover" src="<?= base_url('assets/img/' . $data->foto) ?>" alt="">
                  </div>
                  <div class="col-7">
                     <div class="card-body">
                        <h2><?= $data->nama_produk ?></h2>
                        <?php
                        $hitung_diskon = intval($data->harga_produk) * intval($data->diskon) / 100;
                        $diskon = intval($data->harga_produk) - $hitung_diskon;
                        if (intval($data->diskon) > 0) {
                        ?>
                           <p><strike>Rp. <?= number_format($data->harga_produk, 0, '.', '.') ?></strike></p>
                           <h4>Rp. <?= number_format($diskon, 0, '.', '.') ?></h4>
                        <?php
                        } else {
                        ?>
                           <h5>Rp. <?= number_format($data->harga_produk, 0, '.', '.') ?></h5>
                        <?php
                        }
                        ?>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modelId<?= $data->id_produk ?>">
                           Beli
                        </button>

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
                                                         <input type="number" class="form-control" value="1" name="jumlah_pembelian" id="" placeholder="">
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
                                                      <button type="submit" class="btn btn-info">Beli sekarang</button> <br>
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
                                    <div class="pb-3"></div>
                                    <form action="<?= base_url('home/komentar_keranjang/' . $data->id_produk) ?>" method="post">
                                       <div class="form-group">
                                          <textarea style="height: 200" class="form-control text-justify" name="komentar" id=""></textarea>
                                       </div>
                                       <button type="submit" class="btn btn-info btn-block">Kirim</button>
                                    </form>
                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col my-3">
                     <a class="btn btn-danger" href="<?= base_url('home/hapus_keranjang/' . $data->id_produk) ?>"><i class="fas fa-trash    "></i></a>
                  </div>
               </div>
            </div>
      <?php
         } 
      ?>
   </div>