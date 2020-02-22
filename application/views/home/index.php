<?php
// echo time;
?>
<div class="jumbotron  text-white" style="border:0px solid black;background-color:hsl(190, 71%, 31%)">
   <h1 class="display-1">ARK Keyboard</h1>
   <h1 class="">Nyaman menegetik dimana saja dan kapan saja</h1>
   <h3 style="font-weight:lighter">
      dengan tampilam keyboard yang stylish dan elegan yang membuat jari anda makin bergaya
   </h3>
   <hr style="background-color: hsla(0, 0%, 100%,.7)">
   <p class="lead">
      <a class="btn btn-info btn-lg" href="<?= base_url('home/etalase') ?>" role="button">Lihat Produk</a>
   </p>
</div>
<div class="px-5" style="overflow-x: hidden">
   <div data-aos="fade-left">
      <div class="card my-3" style="min-height:100px;border: 0px solid black">
         <div class="row no-gutters justify-content-end">
            <div class="col-md-3">
               <img class="card-img-top" style="object-fit:cover" src="<?= base_url('assets/img/index/img1.jpg') ?>" alt="">
            </div>
            <div class="col-md">
               <div class="card-body">
                  <h2 class="card-title">Desain klasik yang stylish</h2>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div data-aos="fade-right">
      <div class="card my-3 text-right" style="min-height:100px;border: 0px solid black">
         <div class="row no-gutters d-flex justify-content-end">
            <div class="col-md-7">
               <div class="card-body float-right">
                  <h2 class="card-title">Menyediakan berbagai macam warna</h2>
               </div>
            </div>
            <div class="col-md-3">
               <img class="card-img-top" style="object-fit:cover" src="<?= base_url('assets/img/index/img2.jpg') ?>" alt="">
            </div>
         </div>
      </div>
   </div>
   <div data-aos="fade-left">
      <div class="card my-3" style="min-height:100px;border: 0px solid black">
         <div class="row no-gutters justify-content-end">
            <div class="col-md-3">
               <img class="card-img-top" style="object-fit:cover" src="<?= base_url('assets/img/index/img3.jpg') ?>" alt="">
            </div>
            <div class="col-md">
               <div class="card-body">
                  <h2 class="card-title">Travel distance yang rendah</h2>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div data-aos="fade-right">
      <div class="card my-3" style="min-height:100px;border: 0px solid black">
         <div class="row no-gutters justify-content-end">
            <div class="col-md-9">
               <div class="card-body float-right">
                  <h2 class="card-title">Tuts keyboard yang bisa di modifikasi</h2>
               </div>
            </div>
            <div class="col-md-3">
               <img class="card-img-top" style="object-fit:cover" src="<?= base_url('assets/img/index/img4.jpg') ?>" alt="">
            </div>
         </div>
      </div>
   </div>
</div>
<?php

?>
<h1 class="text-center">Diskon besar besaran</h1>
<div class="row no-gutters">
   <div class="d-flex justify-content-center">
      <?php foreach ($diskon as $data) : ?>
         <div class="card mx-2 w-25 shadow ">
            <img class="card-img-top" height="200" style="object-fit: cover" src="<?= base_url('assets/img/' . $data->foto) ?>" alt="">
            <div class="card-body">
               <h2>
                  <?= $data->nama_produk ?>
               </h2>
               <?php
               $diskon = intval($data->harga_produk) * intval($data->diskon) / 100;
               $hasil_diskon = intval($data->harga_produk) - $diskon;
               if (intval($data->diskon) > 0) {
               ?>
                  <h5><strike>Rp. <?= number_format($data->harga_produk, 0, '.', '.') ?></strike></h5>
                  <h5><?= $data->diskon ?>%</h5>
                  <h5>Rp. <?= number_format($hasil_diskon, 0, '.', '.') ?></h5>
               <?php
               } else {
               ?>
                  <h5>Rp. <?= number_format($data->harga_produk, 0, '.', '.') ?></h5>
               <?php
               }
               ?>
               <!-- CEK KETERSEDIAAN PRODUK -->
               <?php
               if (intval($data->quantity) < 0 || intval($data->quantity) == 0) {
               ?>
                  Stok Sudah Habis
                  <button disabled type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#data<?= $data->id_produk ?>">Beli</button>
               <?php
               } else {
               ?>
                  Stok Tersedia <?= $data->quantity ?>
                  <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#data<?= $data->id_produk ?>">Beli</button>
               <?php
               }
               ?>
               <div class="modal fade" style="overflow-y: scroll" id="data<?= $data->id_produk ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel"><?= $data->nama_produk ?></h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="row">
                              <div class="col-md">
                                 <img class="card-img-top" style="object-fit: cover" src="  <?= base_url('assets/img/' . $data->foto)  ?>" alt="">
                              </div>
                              <div class="col-md">
                                 <h3><?= $data->nama_produk ?></h3>
                                 <?php
                                 $diskon = intval($data->harga_produk) * intval($data->diskon) / 100;
                                 $hasil_diskon = intval($data->harga_produk) - $diskon;
                                 if (intval($data->diskon) > 0) {
                                 ?>
                                    <h5><strike>Rp. <?= number_format($data->harga_produk, 0, '.', '.') ?></strike></h5>
                                    <h5>Rp. <?= number_format($hasil_diskon, 0, '.', '.') ?></h5>
                                 <?php
                                 } else {
                                 ?>
                                    <h5>Rp. <?= number_format($data->harga_produk, 0, '.', '.') ?></h5>
                                 <?php
                                 }
                                 ?>
                                 <form action="<?= base_url('home/invoiceku/' . $data->id_produk) ?>" method="post">
                                    <?php
                                    if (empty($_SESSION)) {
                                    ?>
                                       <h5>Anda harus login sebelum membeli</h5>
                                       <a href="<?= base_url('home/login') ?>" class="btn btn-info"><i class="fas fa-sign-in-alt"></i>&nbsp; Login</a>
                                    <?php
                                    } else {
                                    ?>
                                       <div class="form-group">
                                          <label for="">Jumlah Pembelian</label>
                                          <input type="number" class="form-control" value="1" autofocus="true" required placeholder="Min 1" name="jumlah_pembelian">
                                       </div>
                                       <h6>Jasa Pengiriman</h6>
                                       <div class="form-check form-check-inline">
                                          <label class="form-check-label">
                                             <input class="form-check-input" type="radio" required checked name="jasa_kurir" id="" value="tiki.png"> <img src="<?= base_url('assets/img/kurir/tiki.png') ?>" width="10%" alt=""> TIKI
                                          </label>
                                       </div>
                                       <div class="form-check form-check-inline">
                                          <label class="form-check-label">
                                             <input class="form-check-input" type="radio" required name="jasa_kurir" id="" value="jne.png"> <img width="10%" src="<?= base_url('assets/img/kurir/jne.png') ?>" alt=""> JNE
                                          </label>
                                       </div>
                                       <div class="form-check form-check-inline">
                                          <label class="form-check-label">
                                             <input class="form-check-input" type="radio" required name="jasa_kurir" id="" value="sicepat.png"> <img width="10%" src="<?= base_url('assets/img/kurir/sicepat.png') ?>" alt=""> SiCepat
                                          </label>
                                       </div>
                                       <div class="form-check form-check-inline">
                                          <label class="form-check-label">
                                             <input class="form-check-input" type="radio" required name="jasa_kurir" id="" value="jt.png"> <img width="10%" src="<?= base_url('assets/img/kurir/jt.png') ?>" alt=""> J&T
                                          </label>
                                       </div>
                                       <div class="form-group">
                                          <h6 for="">Tujuan Pengiriman</label>
                                             <select required class="form-control" name="tujuan_pengiriman" id="">
                                                <option>Cilebut</option>
                                                <option>Bogor</option>
                                                <option>Cibuluh</option>
                                                <option>Salabenda</option>
                                                <option>Kebon Pedes</option>
                                             </select>
                                       </div>
                                       <button type="submit" class="btn btn-info btn-block mt-2">Beli Sekarang</button>
                                 </form>
                                 <a href="<?= base_url('home/keranjangku/' . $data->id_produk) ?>" class="btn btn-info btn-block"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Tambahkan Ke Keranjang</a>
                              <?php
                                    }
                              ?>
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
                                    <!-- <div class="text-right"><i class="fa fa-trash" aria-hidden="true"></i></div> -->
                                 </div>
                              </div>
                              <hr>
                           <?php
                           }
                           ?>
                           <?php
                           if (!empty($_SESSION)) {
                              # code...
                           ?>
                              <p>Komentar</p>

                              <form action="<?= base_url('home/komentar/' . $data->id_produk) ?>" method="post">
                                 <div class="form-group">
                                    <textarea style="" class="form-control text-justify" name="komentar" id=""></textarea>
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
                        <!-- <div class="modal-footer">
                           <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Close</button>
                        </div> -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      <?php endforeach; ?>
   </div>
</div>
<div class="py-3"></div>
<h1 class="text-center">Our Partner</h1><div class="pt-3"></div>
<div class="d-flex justify-content-center">
   <div class="row">
      <div class="col">
         <img width="150px" style="object-fit:cover" src="<?= base_url('assets/img/index/ardi.jpg') ?>" class="border border-dark srounded rounded-circle" alt="">
        <div class="py-2"></div> <h5 class="text-center">Ardi Bashorie</h5>
         <p class="text-center">X Multimedia 1</p>
      </div>
      <div class="col">
         <img width="150px" style="object-fit:cover" src="<?= base_url('assets/img/index/me.jpg') ?>" class="border border-dark srounded rounded-circle" alt="">
         <div class="py-2"></div><h5 class="text-center">Arfan Kurnianto</h5>
         <p class="text-center">XII Software Engineer</p>
      </div>
   </div>
</div>
<div class="py-2"></div>
<nav class="nav justify-content-center bg-info py-1 text-white">
   &copy; ARK Company <?= date('Y') ?>
</nav>
<script>
   AOS.init();
</script>