<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <form action="<?= base_url('kuisioner/historykuis'); ?>" method="get">
            <div class="col-md-12">
                <div class="form-group">
                    <select type="input" class="form-control" id="tahun" name="tahun" required>
                        <option value=""> Pilih tahun </option>
                        <?php foreach ($tahun as $t) { ?>
                            <option value="<?= substr($t['tanggal'], 0, 4) ?>"><?= substr($t['tanggal'], 0, 4) ?></option>

                        <?php
                        } ?>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit">tampilkan data</button>
            </div>
        </form>
    </div>

    <section class="content">
        <!-- Default box -->
        <div class="row justify-content-center">
            <div class="col-md-12">
                <?php echo $this->session->flashdata('warning'); ?>
                <?php if ($this->session->flashdata("message")) { ?>
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                        <?php
                        echo strtoupper($this->session->flashdata("message"));
                        unset($_SESSION["message"]);
                        ?>
                    </div>
                <?php } ?>
                <div class="card card-primary">
                    <form action="<?= base_url('Kuisioner/hapusdatahasil'); ?>" method="post" enctype="multipart/form-data">

                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h3> Pelanggan yang mengisi <?= $jumlahpelangganisi ?> dari <?= $jumlahuserpelanggan ?> pelanggan yang belum mengisi <?= $jumlahuserpelanggan - $jumlahpelangganisi ?> pelanggan</h3>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTablekuis">
                                    <thead>
                                        <th>Id Kuis</th>
                                        <th>Pertanyaan</th>
                                        <th>Harapan/ Kepentingan</th>
                                        <th>Kinerja/ Kenyataan</th>
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
                                                <td><?= $h['id_kuis']; ?></td>
                                                <td><?= $h['pertanyaan']; ?></td>
                                                <td><?= $h['harapan']; ?></td>
                                                <td><?= $h['kinerja']; ?></td>
                                                <?php $a = $h['kinerja'] / $h['harapan'] * 100;
                                                if ($a < 100) {
                                                    $a = $a;
                                                } else {
                                                    $a = 100;
                                                } ?>
                                                <td><?= $a ?>%</td>
                                                <td style="text-align:center;"> <?php
                                                                                if ($a > 85) {
                                                                                    echo "<div style='background-color:green;color:white;'>Pertahankan Prestasi</div>";
                                                                                } elseif ($a > 65) {
                                                                                    echo "<div style='background-color:blue;'>Prioritas Rendah</div>";
                                                                                } elseif ($a > 35) {
                                                                                    echo "<div style='background-color:yellow;color:black;'>Berlebihan</div>";
                                                                                } elseif ($a > -1) {
                                                                                    echo "<div style='background-color:red;color:white;'>Prioritas Utama</div>";
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
                        <!-- /.card-body -->
                    </form>
                </div>
                <!-- /.card -->
            </div>

    </section>


</div>
</div>