<?php
if (isset($_SESSION)) {
    $query = @$this->db->query("SELECT * FROM user where id_user='" . $_SESSION['id_user'] . "'")->row();
}
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    redirect('home');
}
?>
<nav class="navbar navbar-expand-sm bg-info navbar-dark no-gutters">
    <a class="navbar-brand " style="" href="<?= base_url('home') ?>"> <i class="fa fa-home" aria-hidden="true"></i> Home</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <!-- <form class="form-inline mx-5 my-lg-0" method="get" action="<?= base_url('home/search') ?>">
            <input class="form-control mr-sm-2" type="text" name="keyword" placeholder="Search">
            <button class="btn btn-info" type="submit" id="autocomplete">Search</button>
        </form> -->
        <a class="nav-item nav-link text-white" href="<?= base_url('home/etalase') ?>"> <i class="fas fa-store    "></i> Etalase</a>
        <ul class="navbar-nav ml-auto">
            <?php
            if ($_SESSION == null || $_SESSION == "" || empty($_SESSION)) {
            ?>
                <a class="nav-item nav-link " href="<?= base_url('home/login') ?>"><i class="fas fa-sign-in-alt    "></i>&nbsp; Login</a>
            <?php
            } else {
            ?>
            <a class="nav-item nav-link active" href="<?= base_url('home/tambah_saldo') ?>"><i class="mr-1 fa fa-coins"></i>Tambah Saldo</a>
                <a class="nav-item nav-link active" href="<?= base_url('home/keranjang') ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i></i> Keranjang</a>
                <a class="nav-item nav-link active" href="<?= base_url('home/invoice') ?>"><i class="fa fa-file" aria-hidden="true"></i> Invoice</a>
                <a class="nav-item nav-link active" href="<?= base_url('home/profile') ?>"> <img src="<?= base_url('assets/img/user/'.$query->foto_user) ?>" width="30px" class="rounded rounded-circle" alt=""> <?= $query->display ?></a>
                <a class="nav-item nav-link active" href="?logout"><i class="fas fa-sign-out-alt    "></i> Logout</a>
            <?php
            }
            ?>
        </ul>

        
    </div>
</nav>


<?php isset($main) ? $this->load->view($main) : NULL; ?>



<!-- <script>
    // $(function(){
    //     $("#produk")
    // })

    $('#autocomplete').autocomplete({
        serviceUrl: '/autocomplete/countries',
        onSelect: function(suggestion) {
            alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
        }
    });
</script> -->