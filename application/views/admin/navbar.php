<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <?php
      $pages = array(
        'admin/login' => 'Login',
        'admin/home' => 'Home',
        'admin/profile' => 'Profile',
      );


      ?>


      <?php foreach ($pages as $filename => $pageTitle) {
        // if ($filename == $currentPage) {
      ?>
        <?php
        // } 
        //   else { 
        ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= $filename ?>"><?php echo $pageTitle; ?></a>
        </li>
      <?php

      }
      ?>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown link
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

<?php isset($main) ? $this->load->view($main) : NULL; ?>