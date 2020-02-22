<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>E-Commerce | <?= $judul ?></title>
</head>

<body>
  <!-- <nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu" aria-labelledby="dropdownId">
            <a class="dropdown-item" href="#">Action 1</a>
            <a class="dropdown-item" href="#">Action 2</a>
          </div>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav> -->
  <nav class="navbar navbar-dark  bg-dark flex-md-nowrap p-1 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="">
      <img src="https://image.shutterstock.com/image-vector/home-electronics-appliances-circle-infographics-260nw-277027100.jpg" alt="" style=" height: 40px">
      E-Commerce</a>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <?php
        if (isset($_GET['logout'])) {
          session_unset();
          session_destroy();
          redirect('admin/login');
        }
        ?>
        <a class="nav-link" href="?logout">Sign out</a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">

      <?php
      $this->load->view('admin/sidebar');
      // debug($tampil);
      ?>
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-3">
        <?php
        isset($main) ? $this->load->view($main) : null
        ?>
      </main>
    </div>
  </div>
</body>

</html>