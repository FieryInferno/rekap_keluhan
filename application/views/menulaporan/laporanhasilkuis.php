<div class="container-fluid">


     <!-- Page Heading -->

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


                         <div class="card-header">
                              <div class="row">
                                   <div class="col-sm-2">
                                        <h3 class="card-title">
                                             <a href="<?php base_url(); ?>simpanresetdatalaporan" class="btn btn-danger btn-sm" onclick="return confirm('Yakin untuk menyimpan data dan mereset data kuisioner?');">Simpan dan reset data!</a>
                                        </h3>
                                   </div>
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
                                             <th>Edit Keputusan</th>
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
                                                       <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editkeputusanModal<?= $h['id_kuis'] ?>">edit</button></td>
                                                  </tr>
                                             <?php
                                             }
                                             ?>
                                        </tbody>
                                   </table>
                              </div>
                         </div>
                         <!-- /.card-body -->

                    </div>
                    <!-- /.card -->
               </div>

     </section>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php foreach ($hasilkuisioner as $h) { ?>
     <!-- Modal edit keputusan diretur -->
     <div class="modal fade" id="editkeputusanModal<?= $h['id_kuis'] ?>" tabindex="-1" aria-labelledby="editkeputusanModalLabel" aria-hidden="true">
          <div class="modal-dialog">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="editkeputusanModalLabel">Keputusan Direktur</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    <form action="<?= base_url('kuisioner/editkeputusan/' . $h['id_kuis']); ?>" method="post" enctype="multipart/form-data">
                         <div class="modal-body">

                              <div class="form-group">
                                   <label for="">Pertanyaan</label>
                                   <textarea type="text" class="form-control" id="pertanyaan" name="pertanyaan" value="" readonly><?= $h['pertanyaan'] ?></textarea>
                              </div>
                              <div class="form-group">
                                   <label for="">Keputusan Direktur</label>
                                   <textarea name="keputusan" id="keputusan" cols="10" class="form-control" placeholder="ketik keputusan"><?= $h['keputusan'] ?></textarea>
                              </div>
                         </div>
                         <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">simpan</button>
                         </div>
                    </form>
               </div>
          </div>
     </div>
<?php
}
?>