<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row justify-content-center">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data Konten</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $konten; ?></div>
                                    <a href="<?php echo base_url('menu/konten'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kendala Tidak Aktif</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $tidakaktif; ?></div>
                                    <a href="<?php echo base_url('menu/kendalatidakaktif'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-dark shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kendala Aktif</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jaringan; ?></div>
                                    <a href="<?php echo base_url('menu/kendalajaringan'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data User</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $kelolauser; ?></div>
                                    <a href="<?php echo base_url('menu/kelolauser'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data Pelanggan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pelanggan; ?></div>
                                    <a href="<?php echo base_url('Pelanggan/datapelanggan'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ./col -->
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div>
        <div class="container-fluid">

            <!-- Page Heading -->

            <div class="row">


                <diviv class="col-xl-12">
                    <!-- Content Row -->


                    <div class="col-xl-12 col-lg-5">
                        <!-- Bar Chart -->
                        <div class="card shadow mb-4">
                            <div class="card-header md-6">
                                <h1 class="h3 mb-2 text-primary" style="text-align: center;"><a href="<?php echo base_url('kuisioner/hasilkuis') ?>">Hasil Kuisioner Pelanggan</a></h1>
                                </br>
                                <h3> Pelanggan yang mengisi <?= $jumlahpelangganisi ?> dari <?= $jumlahuserpelanggan ?> pelanggan yang belum mengisi <?= $jumlahuserpelanggan - $jumlahpelangganisi ?> pelanggan</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="dataTablekuis">
                                        <thead>
                                            <th>Pertanyaan</th>
                                            <th>Tingkat Kesesuaian</th>
                                            <th>Kualitas Pelayanan</th>
                                            <th>Saran Keputusan</th>
                                            <th>Keputusan Direktur</th>
                                            <!-- <th>Kuadran</th> -->
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($hasilkuisioner as $h) { ?>
                                                <tr>
                                                    <td><?= $h['pertanyaan']; ?></td>
                                                    <?php $a = $h['kinerja'] / $h['harapan'] * 100;
                                                    if ($a < 100) {
                                                        $a = $a;
                                                    } else {
                                                        $a = 100;
                                                    } ?>
                                                    <td style="text-align: center;"><?= $a ?>%</td>
                                                    <td style="text-align:center;"><?php
                                                                                    if ($a > 85) {
                                                                                        echo "<div style='background-color:green;color:white;'>Pertahankan Prestasi</div>";
                                                                                    } elseif ($a > 65) {
                                                                                        echo "<div style='background-color:blue;'>Prioritas Rendah</div>";
                                                                                    } elseif ($a > 35) {
                                                                                        echo "<div style='background-color:yellow;color:black;'>Berlebihan</div>";
                                                                                    } elseif ($a > -1) {
                                                                                        echo "<div style='background-color:red;color:white;'>Priotitas Utama</div>";
                                                                                    }
                                                                                    ?></td>
                                                    <td><?= $a > -1 && $a < 65 ? $h['saran'] : '';  ?></td>
                                                    <td><?= $a > -1 && $a < 65 ? $h['keputusan'] : '';  ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div>
                        </div>
                    </div>
            </div>


            <!-- Donut Chart -->



        </div>
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