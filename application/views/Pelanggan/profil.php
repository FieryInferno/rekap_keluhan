<!-- Begin Page Content -->

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 ">
            <?= $this->session->flashdata('message') ?>
        </div>
    </div>
    <br style="padding-top: 50px;">





    <!-- Bar Chart -->
    <div class="card shadow mb-4 col-lg-5">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">About me</h6>
        </div>
        <div class="card-body">
            <strong><i class="fas fa-book mr-1"></i> Nama</strong>
            <p class="text-muted">
                <?= $userpelanggan['nama']; ?>
            </p>
            <strong><i class="fas fa-book mr-1"></i> Email</strong>
            <p class="text-muted">
                <?= $userpelanggan['email']; ?>
            </p>
            <hr>
        </div>
    </div>

    <!-- Donut Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">My profile</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/profile/') . $userpelanggan['image']; ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $userpelanggan['nama']; ?></h5>
                            <p class="card-text"><?= $userpelanggan['email']; ?></p>
                            <p class="card-text"><small class="text-muted"><?= date('d F Y'); ?></small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


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