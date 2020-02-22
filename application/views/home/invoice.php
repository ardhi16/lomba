<h3 class="mt-3 ml-3">Invoice</h3>
<hr>
<div class="container">

    <?php
    // debug($query);
    if (empty($query == 0)) {
        # code...?>
        <h6 class="display-4">Riwayat transaksi anda kosong</h6>
        <?php
    }
    else{
foreach ($query as $data) {
    $diskon = intval($data->harga_produk) * intval($data->diskon) / 100;
    $hasil_diskon = intval($data->harga_produk) - $diskon;
    ?>
    <div class="card my-3">
        <div class="row no-gutters">
            <div class="col-3">
                <img class="card-img" height="250px" style="object-fit: cover" src="<?= base_url('assets/img/' . $data->foto) ?>" alt="">
            </div>
            <div class="col">
                <div class="card-body">
                    <p>Kode Invoice</p>
                    <p>Nama Produk</p>
                    <p>Tanggal Transaksi</p>
                    <p>Jasa kurir</p>
                    <p>Tujuan Pengiriman</p>
                </div>
            </div>
            <div class="col-5">
                <div class="card-body">
                    <p><?= $data->id_invoice ?></p>
                    <p><?= $data->nama_produk ?></p>
                    <p><?= date('H:i:s / l,d F Y', strtotime($data->tanggal_transaksi)) ?></p>
                    <img src="<?= base_url('assets/img/kurir/'.$data->jasa_kurir) ?>" width="15%" alt=""><div class="pt-3"></div>
                    <p><?= $data->tujuan_pengiriman ?></p>
                </div>
            </div>
            <div class="col">
                <div class="my-5"></div>
                <a class="btn btn-info btn-sm"  href="<?= base_url('home/print/' . $data->id_invoice) ?>"><i class="fa fa-file" aria-hidden="true"></i> Lihat detail</a>
                <a class="btn btn-danger" onclick="confirm('ingin menghapus?')" href="<?= base_url('home/delete_invoice/' . $data->id_invoice) ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <?php
}}
?>
</div>