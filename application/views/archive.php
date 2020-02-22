5">
    <div class="form-row">
        <div class="col-2">
            <div class="card p-2">
                <img src="<?= base_url('assets/img/user/' . $data->foto_user) ?>" class="card-img rounded rounded-circle" alt="">
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center mb-3">Profile</h4>
                    <form action="<?= base_url() ?>home/registerku" method="post">

                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control" value="<?= $data->username ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" value="<?= $data->password ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" value="<?= $data->email ?>">
                        </div>
                        <div class="form-group">
                            <label for="">No Telpon</label>
                            <input type="number" name="no_telpon" class="form-control" value="<?= $data->no_telpon ?>">
                        </div>
                        <button type="submit" class="btn btn-info btn-block">Edit</button>
                        <a href="<?= base_url('home') ?>" class="btn btn-secondary btn-block">Kembali</a>
                </div>

            </div>

            </form>
        </div>
    </div>
</div>