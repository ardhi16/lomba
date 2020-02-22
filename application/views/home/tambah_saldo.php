<h3 class="mt-3 ml-3"><?= $title ?></h3>
<hr>
<div class="container">
    <h5>Saldo Anda Sebelumnya</h5>
    <h4>Rp <?= number_format($data->wallet, 0, '.', '.') ?></h4>
    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('home/top_up') ?>" method="POST">
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Tambah Saldo</label>
                            <input type="number" class="form-control" name="wallet" id="" aria-describedby="helpId" placeholder="" autofocus>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <button class="btn btn-info mt-4">Tambah</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>