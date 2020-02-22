<div class="p-5">
    <div class="form-row">
        <div class="col-2">
            <div class="card p-2">
                <img src="<?= base_url('assets/img/user/' . $data->foto_user) ?>" class="card-img rounded rounded-circle" style="object-fit: cover" alt="">
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-3">
                            <h4>Username</h4>
                            <h4>Display</h4>
                            <h4>Nomor Telpon</h4>
                            <h4>Email</h4>
                        </div>
                        <div class="col">
                            <h4><?= $data->username ?></h4>
                            <h4><?= $data->display ?></h4>
                            <h4><?= $data->no_telpon ?></h4>
                            <h4><?= $data->email ?></h4>
                        </div>

                    </div>
                    <!-- Button trigger modal --> <br>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modelId">
                        Edit Profil
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="p- -->
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= $data->username ?> || <?= $data->display ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>home/update_profile" enctype="multipart/form-data" method="post">
                    <div class="form-row">
                        <div class="col-2">
                            <div class="card p-2">
                                <h6 class="text-center">Foto profil sebelumnya</h6>
                                <img src="<?= base_url('assets/img/user/' . $data->foto_user) ?>" class="card-img rounded rounded-circle" style="object-fit: cover" alt="">
                                <br><input type="file" name="foto" id="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <h5 for="exampleInputEmail1">Username</h5>
                                                <input value="<?= $data->username ?>" required="true" type="text" autofocus class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <h5 for="exampleInputEmail1">Display</h5>
                                                <input value="<?= $data->display ?>" required="true" type="text" class="form-control" name="display" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <h5 for="exampleInputEmail1">Password</h5>
                                                <input value="<?= $data->password ?>" required="true" type="password" onkeyup="password()" class="form-control" name="password" id="password" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <h5 for="exampleInputEmail1">Confirm</h5>
                                                <input value="<?= $data->password ?>" required="true" type="password" onkeyup="password()" class="form-control" name="confirm" id="confirm" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <span id="alert"></span>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <h5 for="exampleInputEmail1">Nomor Telpon</h5>
                                                <input value="<?= $data->no_telpon ?>" type="text" onkeyup="password()" class="form-control" name="no_telpon" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <h5 for="exampleInputEmail1">email</h5>
                                                <input value="<?= $data->email ?>" type="email" class="form-control" name="email" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <span id="alert"></span>
                                    </div>
                                    <button type="submit" class="btn btn-info">Update</button>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>