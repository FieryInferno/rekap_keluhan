<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- Main content -->
    <section class="content">


        <div class="container" style="padding-bottom: 30px;">
            <div class="row" data-aos="zoom-in">
                <div class="col-lg-9 text-center text-lg-left">
                    <h3 style="color: blue;">Membutuhkan teknisi atau Tercium Bau Gas?! <br>Segera hubungi Call Center!</h3>
                    <p>jangan ragu untuk menghubungi Call Center apabila terjadi masalah seputar gas. </p>
                </div>
                <div class="row cta-btn-container p-md-2" style="background-color: yellow;">
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
        </br>
    </section>
</div>
</div>
<!-- End of Main Content -->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
<script src="<?= base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script>
<script src="<?= base_url('assets/'); ?>js/demo/chart-bar-demo.js"></script>