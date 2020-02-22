<style>
@media print {
    #print{
        display: none;
    }
    h5{
        font-size: 30px;
    }
}
</style>
<div id=></div>
<h3 class="mt-3 ml-3">
    Detail Pesanan
</h3>
<hr>
<div class="container">

    <img src="" alt="">
    <div class="row">
        <div class="col-md-4">
            <h5>Nama Pembeli</h5>
            <h5>Nama Produk</h5>
            
            <div class="mt-3">
                <h5>Tanggal Transaksi</h5>
                <h5>Tujuan Pengiriman</h5>
                <h5>Jasa Kurir</h5>
            </div>

            <div class="mt-5">
                <h5>Harga</h5>
                <h5>Jumlah Pembelian</h5>
                <h5>Diskon</h5>
                <h5>Total</h5>
            </div>

        </div>
        <div class="col-md-1">
            <h5>:</h5>
            <h5>:</h5>

            <div class="mt-3">
                <h5>:</h5>
                <h5>:</h5>
                <h5>:</h5>
            </div>

            <div class="mt-5">
                <h5>:</h5>
                <h5>:</h5>
                <h5>:</h5>
                <h5>:</h5>
            </div>

        </div>
      
        <div class="col-md">
            <h5><?= $data->display ?></h5>
            <h5><?= $data->nama_produk ?></h5>

            <div class="mt-3">
            <h5><?= date('H:i:s / l,d F Y', strtotime($data->tanggal_transaksi)) ?></h5>
            <h5><?= $data->tujuan_pengiriman ?></h5>
            <h5><img src="<?= base_url('assets/img/kurir/'.$data->jasa_kurir) ?>" width="15%" alt=""> <?= strtoupper(pathinfo($data->jasa_kurir,PATHINFO_FILENAME)) ?></h5>
        </div>
            <div class="mt-5">
                <?php
                $hitung_diskon = intval($data->harga_produk) * intval($data->diskon) / 100;
                $diskon = intval($data->harga_produk) - $hitung_diskon;
                // $total = 
                if (intval($data->diskon) > 0) {
                ?>
                    <h5>Rp. <?= number_format($diskon, 0, '.', '.') ?></h5>
                    <h5><?= $data->jumlah_pembelian ?></h5>
                    <h5><?= $data->diskon ?></h5>
                    <h5>Rp. <?= number_format($diskon * $data->jumlah_pembelian, 0, '.', '.') ?></h5>
                <?php
                } else {
                ?>
                    <h5>Rp. <?= number_format($diskon, 0, '.', '.') ?></h5>
                    <h5><?= $data->jumlah_pembelian ?></h5>
                    <h5><?= $data->diskon ?></h5>
                    <h5>Rp. <?= number_format($diskon * $data->jumlah_pembelian, 0, '.', '.') ?></h5>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <button id="print" onclick="myFunction()">Print Invoice</button>
</div>
<script>
function myFunction() {
  window.print();
}
</script>