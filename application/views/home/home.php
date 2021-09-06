<section id="hero" style="padding-top: 0%;padding-bottom: 0%;">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

        <ol class="carousel-indicators">
            <li data-target=" #carouselExampleIndicators" data-slide-to="0" class="active">
            </li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?= base_url('assets/img/jargas/w.jpg'); ?>" width="400" height="450" alt="First slide">
                <div class="carousel-caption d-md-block">

                    <div class="slider_title">
                        <div id="latar">
                            <div class="tembus">
                                <div class="teks">
                                    <h1 style="color: greenyellow">Keselamatan yang utama</h1>
                                    <h3 style="color: white">PT SEA selalu mengutamakan keselamatan</h3>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?= base_url('assets/img/jargas/q.jpg'); ?>" width="400" height="450" alt="Second slide">
                <div class="carousel-caption d-md-block">
                    <div class="slider_title">
                        <div id="latar">
                            <div class="tembus">
                                <div class="teks">
                                    <h2 style="font-size: 30px;color: greenyellow"><b>PRAKTIS, AMAN, TEKANAN RENDAH, DAN GAS SELALU TERSEDIA</b></h2>
                                    <h3 style="color: white">Merupakan Keuntungan Menggunakan Jaringan Gas</h3>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?= base_url('assets/img/jargas/0.png'); ?>" width="400" height="450" alt="Third slide">
                <div class="carousel-caption d-md-block">
                    <div class="slider_title">
                        <div id="latar">
                            <div class="tembus">
                                <div class="teks">
                                    <h2 style="font-size: 30px;color: greenyellow">JARGAS (JARINGAN GAS) KOTA</h2>
                                    <h3 style="color: white">Jaringan Distribusi Gas Bumi Untuk Rumah Tangga dan pedagang kecil<br>
                                        Yang Wilayahnya Terdapat Sumber Gas Dan Telah Memiliki Infrastruktur Pipa Gas</h3>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</section><!-- End Hero -->

<!-- ======= Cta Section ======= -->
<section id="cta" class="cta">
    <div class="container" style="padding-bottom: 30px;">
        <div class="row" data-aos="zoom-in">
            <div class="col-lg-9 text-center text-lg-left">
                <h3 style="color: blue;">Membutuhkan teknisi atau Tercium Bau Gas?! <br>Segera hubungi Call Center!</h3>
                <p>jangan ragu untuk menghubungi Call Center apabila terjadi masalah seputar gas. </p>
            </div>
            <div class="row cta-btn-container">
                <a class="cta-btn" href=tel:"085211223200"> <img class="float-left" style="width: 100px; padding-right:20px" src="<?= base_url('assets/img/telpp.png'); ?>">
                    <b style="font-size: 12px;">Klik Disini Untuk <br> Menelepon Call Center</b></a>
            </div>
        </div>
    </div>

    <div data-aos="fade-up" style="background-color:darkred;text-align: center;">
        <h2 style="color:white;">News</h2>
    </div>

    <div class="container">

        <div class="row text-center">
            <?php foreach ($konten as $k) : ?>
                <div class="col-sm-4 " data-aos="zoom-in" style="padding-top:20px">
                    <img src="<?= base_url('./assets/img/profile/') . $k['image']; ?>" class="card-img" width="300px" height="200px" alt="">
                </div>
                <div class="col-lg-6 d-flex flex-column justify-contents-center" data-aos="fade-right">
                    <div class="content pt-4 pt-lg-0">
                        <h3 style="padding-top: 20px;"><?php echo $k['judul']; ?></h3>
                        <p style="color: grey"><?php echo $k['keterangan']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section><!-- End Cta Section -->



<!-- ======= Services Section ======= -->
<section id="services" class="services cta">
    <div data-aos="fade-up" style="background-color:darkred;text-align: center;">
        <h2 style="color:white;">Tips Keselamatan Menggunakan Jargas</h2>
    </div>

    <div class="container" style="padding-top: 20px;">
        <div class="row">
            <div class="align-items-center" data-aos="zoom-in" style="width: 400px;padding-left:100px">
                <div class=" icon-box ">
                    <img src=" <?= base_url() . 'assets/img/g1.png'; ?>" class="img-fluid"></img>
                    <h4 class="title"><a>Pemasangan peralatan gas dianjurkan di tempat yang berventilasi baik.</a></h4>
                </div>
            </div>

            <div class=" align-items-center" data-aos="zoom-in" style="width: 400px;padding-left: 30px; padding-right: 30px">
                <div class="icon-box ">
                    <img src="<?= base_url() . 'assets/img/g2.png'; ?>" class="img-fluid"></img>
                    <h4 class="title"><a>Jangan letakkan barang-barang mudah terbakar di dekat peralatan gas.</a></h4>
                </div>
            </div>

            <div class=" d-flex align-items-center" data-aos="zoom-in" style="width: 300px;">
                <div class="icon-box ">
                    <img src="<?= base_url() . 'assets/img/g3.png'; ?>" class="img-fluid"></img>
                    <h4 class="title"><a>Pastikan tidak ada bau gas sebelum menyalakan kompor.</a></h4>
                </div>
            </div>
        </div>
        <div class="row" style="padding-left: 200px; padding-top:30px;">
            <div class=" d-flex align-items-center" data-aos="zoom-in" style="width: 400px; padding-right:70px">
                <div class="icon-box ">
                    <img src="<?= base_url() . 'assets/img/g4.png'; ?>" class="img-fluid"></img>
                    <h4 class="title"><a>Saat memasak jangan tinggalkan kompor tanpa pengawasan.
                            <br>
                        </a></h4>
                </div>
            </div>
            <div class="d-flex align-items-center" data-aos="zoom-in" style="width: 350px;">
                <div class="icon-box ">
                    <img src="<?= base_url() . 'assets/img/g5.png'; ?>" class="img-fluid"></img>
                    <h4 class="title"><a href="">Tidak diizinkan mengubah instalasi pipa gas. Harap hubungi call center.</a></h4>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Services Section -->

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio cta">
    <div data-aos="fade-up" style="background-color:darkred;text-align: center;">
        <h2 style="color:white;">Galeri</h2>
    </div>
    <div class="container" style="padding-top:20px">

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

            <div class="portfolio-item filter-app">
                <img src="<?= base_url('assets/img/jargas/a.png'); ?>" width="430" class="img-fluid" alt="">
            </div>

            <div class=" portfolio-item filter-web" style="padding-right: 10px;padding-left: 10px;">
                <img src="<?= base_url('assets/img/jargas/b.png'); ?>" width="274" class="img-fluid" alt="">
            </div>

            <div class="portfolio-item filter-app">
                <img src="<?= base_url('assets/img/jargas/0.png'); ?>" width="400" class="img-fluid" alt="">
            </div>
        </div>
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            <div class="portfolio-item filter-app">
                <img src="<?= base_url('assets/img/jargas/d.png'); ?>" width="370" class="img-fluid" alt="">
            </div>

            <div class="portfolio-item filter-app" style="padding-right: 90px;padding-left: 90px;">
                <img src="<?= base_url('assets/img/jargas/c.png'); ?>" width="276" class="img-fluid" alt="">
            </div>

            <div class="portfolio-item filter-app">
                <img src="<?= base_url('assets/img/jargas/6.png'); ?>" width="300" class="img-fluid" alt="">
            </div>

        </div>

    </div>
</section><!-- End Portfolio Section -->

<!-- ======= Cta Section ======= -->

<!-- End Cta Section -->




<!-- ======= Contact Section ======= -->
<section id="contact" class="contact cta">
    <div data-aos="fade-up" style="background-color:darkred;text-align: center;">
        <h2 style="color:white;">Contact Us</h2>
    </div>
    <div class="container" style="padding-top: 20px;">

        <div class="row">

            <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-right">
                <div class="info">
                    <div class="address">
                        <i class="icofont-google-map"></i>
                        <h4>Location:</h4>
                        <p>Jl. Pulau Timor No.03, RT.31/RW.10, Pasirkareumbi, Kec. Subang, Kabupaten Subang, Jawa Barat 41211</p>
                    </div>

                    <div class="email">
                        <i class="icofont-envelope"></i>
                        <h4>Email:</h4>
                        <p>subang_energiabadi@yahoo.com</p>
                    </div>

                    <div class="phone">
                        <i class="icofont-phone"></i>
                        <h4>Telp/Fax</h4>
                        <p>(0260) 412112</p>
                    </div>

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d990.8913626022303!2d107.76760148811053!3d-6.576394967420846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e693b8251d3c039%3A0x273a47e4664043aa!2sPT.%20Subang%20Energi%20Abadi%20(BUMD%20Migas)!5e0!3m2!1sen!2sid!4v1605584806418!5m2!1sen!2sid" width="375" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" allowfullscreen></iframe>
                </div>

            </div>

            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-left">
                <form action="<?php echo base_url('Home/addpesan'); ?>" method="post" role="form" class="php-email-form">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" data-rule="required" data-msg="Please enter your name" />
                            <div class="validate"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Please enter a valid email" />
                            <div class="validate"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telepon</label>
                        <input type="text" class="form-control" name="phone" id="phone" data-rule="required" data-msg="Please enter your phone" />
                        <div class="validate"></div>
                    </div>
                    <div class="form-group">
                        <label for="pesan">Pesan</label>
                        <textarea class="form-control" name="pesan" id="pesan" rows="10" data-rule="required" data-msg="Please write something for us"></textarea>
                        <div class="validate"></div>
                    </div>
                    <div class="text-center"><button type="submit">Send Message </button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</section><!-- End Contact Section -->

</main><!-- End #main -->