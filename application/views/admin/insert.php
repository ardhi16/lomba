<div class="p-3">
   <form enctype="multipart/form-data" method="post" action="<?= base_url() ?>Admin/insertku">
      <div class="d-flex justify-content-center">
         <div class="card w-75">
            <!-- <img class="card-img-top" src="holder.js/100x180/" alt=""> -->
            <div class="card-body">
               <h4>
                  <a href="<?= base_url('admin/produk') ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i></i>Kembali</a>
               </h4>
               <h1 align="center">Tambah Produk</h1><br>
               <div class="form-row">
                  <div class="col-sm">
                     <h4>
                        Nama Produk
                     </h4>
                     <div class="form-group">
                        <input type="text" placeholder="Nama Produk" autofocus class="form-control" name="nama_produk" id="" placeholder="">
                     </div>
                  </div>
               </div>
               <div class="form-row">
                  <div class="col-sm">
                     <h4>
                        Harga Produk
                     </h4>
                     <div class="form-group">
                        <input type="number" placeholder="Harga" class="form-control" name="harga_produk" id="" placeholder="">
                     </div>
                  </div>
                  <div class="col-sm">
                     <h4>
                        Diskon
                     </h4>
                     <div class="form-group">
                        <input type="number" placeholder="Diskon" class="form-control" name="diskon" id="" placeholder="">
                     </div>
                  </div>
                  <div class="col-sm">
                     <h4>
                        Stok tersedia
                     </h4>
                     <div class="form-group">
                        <input type="number" placeholder="Stok Tersedia" class="form-control" name="quantity" id="" placeholder="">
                     </div>
                  </div>
               </div>
               <h4>
                  Deskripsi
               </h4>
               <div class="form-group">
                  <textarea style="height: 200" class="form-control" name="deskripsi" id=""></textarea>
               </div>
               <div class="form-row">
                  <div class="col-sm">
                     <div class="form-group">
                        <label for=""></label>
                        <input type="file" class="form-control-file" name="foto" id="" placeholder="" aria-describedby="fileHelpId">
                     </div>
                  </div>
                  <div align="right" class="col-sm">
                     <button type="submit" class="btn btn-dark">Tambah Produk</button>
                  </div>

               </div>
            </div>
         </div>
      </div>
   </form>
</div>