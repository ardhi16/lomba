<body style="background-color: hsl(0,0%,80%);">
  <div class="d-flex align-items-end justify-content-center py-5">
    <div class="card w-50 p-3">

      <h3 class="text-center">Login</h3>
      <hr>
      <form action="<?= base_url() ?>admin/loginku" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
          <input type="text" autofocus placeholder="masukkan username anda.." class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" autofocus>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" placeholder="masukkan password anda.." class="form-control" name="password" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-dark btn-block">Login</button>
        <a href="<?= base_url('/') ?>" class="btn btn-danger btn-block">Kembali</a>
      </form>
      <div class="form-row">
        <div class="col">
          Belum memiliki akun?
          <a href="<?= base_url('admin/register') ?>">silahkan register</a>
        </div>
        
      </div>
    </div>
  </div>
</body>