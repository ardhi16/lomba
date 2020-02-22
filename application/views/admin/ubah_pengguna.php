<div class="container-fluid">

    <div class="card shadow mx-auto mt-5" style="width: 55rem;">
        <div class="card-body">
            <h2 class="text-center">Edit</h2>
            <hr>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" name="username" value="<?= $user['username'] ?>">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" value="<?= $user['password'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" class="form-control" id="inputPassword4" value="<?= $user['password'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" name="username" value="<?= $user['username'] ?>">
                </div>
                <button type="submit" class="btn btn-success btn-block">Edit</button>
                <a href="<?= base_url('admin/pengguna/') ?>" class="btn btn-secondary btn-block">Kembali</a>
            </form>
            <div class="card">

            </div>
        </div>
    </div>
</div>