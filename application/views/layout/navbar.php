<header id="header" class="fixed-top" style="padding-top: 0%;background-color:maroon">
  <div class="row">
    <img src="<?= base_url('assets/img/seaa.jpg'); ?>" style="padding-left: 15px;" width="200" height="72" alt="sea">
    <nav class="navbar navbar-expand-lg navbar-dark col-md-10" width="200" height="100">

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a style="color: greenyellow;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 20px">
              About
            </a>
            <div style="background-color:maroon;color: greenyellow;" class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a style="color: greenyellow;" class="dropdown-item" href="<?php echo site_url('about'); ?>">About Us</a>
              <a style="color: greenyellow;" class="dropdown-item" href="<?php echo site_url('team'); ?>">Komisaris & Direksi</a>
              <a style="color: greenyellow;" class="dropdown-item" href="<?php echo site_url('client'); ?>">Clients & Partners</a>
              <a style="color: greenyellow;" class="dropdown-item" href="<?php echo site_url('usaha'); ?>">Kegiatan Usaha</a>
            </div>
          </li>
          <li class="nav-item active">
            <a style="color: greenyellow;" class="nav-link" href="<?php echo site_url('home'); ?>" style="font-size: 20px">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a style="color: greenyellow;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 20px">
              Login
            </a>
            <div style="background-color:maroon;color: greenyellow;" class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a style="color: greenyellow;" class="nav-link" href="<?php echo base_url('auth'); ?>" style="font-size: 20px">Karyawan</a>
              <a style="color: greenyellow;" class="nav-link" href="<?php echo base_url('auth/loginpelanggan'); ?>" style="font-size: 20px">Pelanggan</a>
            </div>
          </li>
          <li class="nav-item">
            <a style="color: greenyellow;" class="nav-link" href="<?php echo base_url('Home/index/#services'); ?>" style="font-size: 20px">Services</a>
          </li>
          <li class="nav-item">
            <a style="color: greenyellow;" class="nav-link" href="<?php echo base_url('Home/index/'); ?>#portfolio" style="font-size: 20px">Galeri</a>
          </li>
          <li class="nav-item">
            <a style="color: greenyellow;" class="nav-link" href="<?php echo base_url('Home/index/#contact'); ?>" style="font-size: 20px">Contact</a>
          </li>
        </ul>
      </div>
      <div class="header-social-links">
        <a style="color:greenyellow" href="https://www.facebook.com/subangenergi.abadi.7" class="facebook"><i class="icofont-facebook"></i></a>
        <a style="color:greenyellow" href="https://www.instagram.com/jargas_subang" class="instagram"><i class="icofont-instagram"></i></a>
      </div>
    </nav>
  </div>



</header><!-- End Header -->