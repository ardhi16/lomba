<nav class="navbar navbar-expand-sm  navbar-dark bg-dark">
    <a class="navbar-brand " href="<?= base_url('home') ?>">Home</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
    <form class="form-inline mx-5 my-lg-0" method="post" action="<?= base_url('home/search/') ?>">
            <input class="form-control mr-sm-2" type="text" name="kriteria" placeholder="Search">
            <button class="btn btn-light my-2 my-sm-0" type="submit">Search</button>
        </form>
        <ul class="navbar-nav ml-auto mx-3">
            <?php
            $titles['Invoice'] = 'home/invoice';
            $titles['Keranjang'] = 'home/keranjang';
            $titles['Product'] = 'home/product';
            $basename = $_SERVER['REQUEST_URI'];
            // unset($basename[0]);
            $explodes = explode('/', $basename);
            $server = $explodes[2];

            // debug($server);
            // debug($explodes);
            // $contoh = basename('fgfg/fggfgf/gfgf/gfg/fg/fg/fgfg');
            foreach ($titles as $title => $link) {
                $explode = explode('/', $link);
                $page = $explode[1];
                // debug ($explode);
                if ($page == $server) {
                    # code...
            ?>
                    <li class="nav-item active">
                        <a class="nav-link " href="<?= base_url($link) ?>"><?= $title ?> <span class="sr-only">(current)</span></a>
                    </li>
                <?php
                } else {
                ?>

                    <li class="nav-item">
                        <a class="nav-link " href="<?= base_url($link) ?>"><?= $title ?></a>
                    </li>
                <?php
                }
            }
            if ($_SESSION == null || $_SESSION == "") {
                ?>
                <li class="nav-item ">
                    <a class="nav-link " href="<?= base_url('home/login') ?>">Login</a>
                </li>
            <?php
            } else {
            ?>
                <li class="nav-item dropdown">
                    <a class="nav-link  dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="#">Action 1</a>
                        <a class="dropdown-item" href="#">Action 2</a>
                    </div>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</nav>
