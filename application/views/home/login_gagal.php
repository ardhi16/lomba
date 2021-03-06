<form action="<?= base_url('home/loginku') ?>" method="post">

    <body style="background-color: hsl(0,0%,95%);">
        <div class="d-flex align-items-end justify-content-center py-5">
            <div class="w-50">
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-4">
                            <img src="<?= base_url('assets/logo.png') ?>" class="card-img h-100" style="object-fit: cover" alt="...">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <a href="<?= base_url('/') ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i>Kembali</a>
                                <h4 class="text-center">Login</h4>
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <strong>Username Atau Password Anda Salah!</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                </div>
                                <form action="<?= base_url() ?>home/loginku" method="post">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Username</label>
                                        <input type="text" placeholder="masukkan username anda.." class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" placeholder="masukkan password anda.." class="form-control" name="password" id="exampleInputPassword1">
                                    </div>
                                </form>
                                <div class="row no-gutters">
                                    <div class="col">
                                        <a class="text-right" href="<?= base_url('home/register') ?>">Belom punya akun??</a> <br>
                                    </div>
                                    <div class="col-2">
                                        <button type="submit" id="button" class="btn btn-info">Login</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</form>