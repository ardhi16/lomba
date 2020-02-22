<body style="background-color: hsl(0,0%,80%);">
<div class="d-flex align-items-end justify-content-center py-5">
<div class="card w-50 p-3" >
	<h4 class="text-center">Login</h4>
  <form action="<?= base_url() ?>home/loginku" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="text" class="form-control" name="password" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-dark">Submit</button>
</form>
</div>
</div>
</body>