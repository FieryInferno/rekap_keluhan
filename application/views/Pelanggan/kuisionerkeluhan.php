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
                    <div class="card card-body" style="width: 40%;">
                         <div class="">
                              <table class="" border="" id="">
                                   <thead>
                                        <th style="width: 3rem;">NILAI</th>
                                        <th>Kinerja</th>
                                        <th>Kepentingan</th>
                                   </thead>
                                   <tbody>
                                        <tr>
                                             <td>1</td>
                                             <td>Sangat Tidak Baik (STB)</td>
                                             <td>Sangat Tidak Penting (STP)</td>
                                        </tr>
                                        <tr>
                                             <td>2</td>
                                             <td>Kurang Baik (KB)</td>
                                             <td>Kurang Penting (KP)</td>
                                        </tr>
                                        <tr>
                                             <td>3</td>
                                             <td>Cukup Baik (CB)</td>
                                             <td>Cukup Penting (CP)</td>
                                        </tr>
                                        <tr>
                                             <td>4</td>
                                             <td>Baik (B)</td>
                                             <td>Penting (P)</td>
                                        </tr>
                                        <tr>
                                             <td>5</td>
                                             <td>Sangat Baik (SB)</td>
                                             <td>Sangat Penting (SP)</td>
                                        </tr>

                                   </tbody>
                              </table>
                         </div>
                    </div>

                    <div class="card card-primary">
                         <form action="<?= base_url(); ?>Konsumen/Pelanggan/kuisionerkeluhan" method="post">
                              <div class="card-body">
                                   <div class="table-responsive">
                                        <table class="table" id="dataTablekuis">
                                             <thead style="text-align: center;">
                                                  <th rowspan="2">Pertanyaan</th>
                                                  <th colspan="6">Kinerja</th>
                                                  <th colspan="6">Kepentingan</th>
                                             </thead>
                                             <thead>
                                                  <th></th>
                                                  <th>(STB)1</th>
                                                  <th>(KB)2</th>
                                                  <th>(CB)3</th>
                                                  <th>(B)4</th>
                                                  <th>(SB)5</th>
                                                  <th></th>
                                                  <th>(STB)1</th>
                                                  <th>(KB)2</th>
                                                  <th>(CB)3</th>
                                                  <th>(B)4</th>
                                                  <th>(SB)5</th>
                                             </thead>
                                             <tbody>
                                                  <?php
                                                  if ($kuisioner) {

                                                       $no  = 0;
                                                       foreach ($kuisioner as $k) { ?>
                                                            <tr>
                                                                 <td><?= $k->pertanyaan; ?></td>
                                                                 <td>
                                                                      <div class="form-check">
                                                                           <input type="radio" name="kinerja<?= $k->id_kuis; ?>" id="customCheckkinerja<?= $k->id_kuis; ?>" value="1" required <?= $isi_kuisioner; ?> <?php
                                                                                                                                                                                                                       if ($hasil) {
                                                                                                                                                                                                                            if ($hasil[$no]['kinerja'] == '1') {
                                                                                                                                                                                                                                 echo 'checked';
                                                                                                                                                                                                                            }
                                                                                                                                                                                                                       }
                                                                                                                                                                                                                       ?>>
                                                                           <label for="customCheckkinerja<?= $k->id_kuis; ?>"></label>
                                                                      </div>
                                                                 </td>
                                                                 <td>
                                                                      <div class="form-check">
                                                                           <input type="radio" name="kinerja<?= $k->id_kuis; ?>" id="customCheckkinerja<?= $k->id_kuis; ?>" value="2" required <?= $isi_kuisioner; ?> <?php
                                                                                                                                                                                                                       if ($hasil) {
                                                                                                                                                                                                                            if ($hasil[$no]['kinerja'] == '2') {
                                                                                                                                                                                                                                 echo 'checked';
                                                                                                                                                                                                                            }
                                                                                                                                                                                                                       }
                                                                                                                                                                                                                       ?>>
                                                                           <label for="customCheckkinerja<?= $k->id_kuis; ?>"></label>
                                                                      </div>
                                                                 </td>
                                                                 <td>
                                                                      <div class="form-check">
                                                                           <input type="radio" name="kinerja<?= $k->id_kuis; ?>" id="customCheckkinerja<?= $k->id_kuis; ?>" value="3" required <?= $isi_kuisioner; ?> <?php
                                                                                                                                                                                                                       if ($hasil) {
                                                                                                                                                                                                                            if ($hasil[$no]['kinerja'] == '3') {
                                                                                                                                                                                                                                 echo 'checked';
                                                                                                                                                                                                                            }
                                                                                                                                                                                                                       }
                                                                                                                                                                                                                       ?>>
                                                                           <label for="customCheckkinerja<?= $k->id_kuis; ?>"></label>
                                                                      </div>
                                                                 </td>
                                                                 <td>
                                                                      <div class="form-check">
                                                                           <input type="radio" name="kinerja<?= $k->id_kuis; ?>" id="customCheckkinerja<?= $k->id_kuis; ?>" value="4" required <?= $isi_kuisioner; ?> <?php
                                                                                                                                                                                                                       if ($hasil) {
                                                                                                                                                                                                                            if ($hasil[$no]['kinerja'] == '4') {
                                                                                                                                                                                                                                 echo 'checked';
                                                                                                                                                                                                                            }
                                                                                                                                                                                                                       }
                                                                                                                                                                                                                       ?>>
                                                                           <label for="customCheckkinerja<?= $k->id_kuis; ?>"></label>
                                                                      </div>
                                                                 </td>
                                                                 <td>
                                                                      <div class="form-check">
                                                                           <input type="radio" name="kinerja<?= $k->id_kuis; ?>" id="customCheckkinerja<?= $k->id_kuis; ?>" value="5" required <?= $isi_kuisioner; ?> <?php
                                                                                                                                                                                                                       if ($hasil) {
                                                                                                                                                                                                                            if ($hasil[$no]['kinerja'] == '5') {
                                                                                                                                                                                                                                 echo 'checked';
                                                                                                                                                                                                                            }
                                                                                                                                                                                                                       }
                                                                                                                                                                                                                       ?>>
                                                                           <label for="customCheckkinerja<?= $k->id_kuis; ?>"></label>
                                                                      </div>
                                                                 </td>
                                                                 <td></td>
                                                                 <td>
                                                                      <div class="form-check">
                                                                           <input type="radio" name="harapan<?= $k->id_kuis; ?>" id="customCheckharapan<?= $k->id_kuis; ?>" value="1" required <?= $isi_kuisioner; ?> <?php
                                                                                                                                                                                                                       if ($hasil) {
                                                                                                                                                                                                                            if ($hasil[$no]['harapan'] == '1') {
                                                                                                                                                                                                                                 echo 'checked';
                                                                                                                                                                                                                            }
                                                                                                                                                                                                                       }
                                                                                                                                                                                                                       ?>>
                                                                           <label for="customCheckharapan<?= $k->id_kuis; ?>"></label>
                                                                      </div>
                                                                 </td>
                                                                 <td>
                                                                      <div class="form-check">
                                                                           <input type="radio" name="harapan<?= $k->id_kuis; ?>" id="customCheckharapan<?= $k->id_kuis; ?>" value="2" required <?= $isi_kuisioner; ?> <?php
                                                                                                                                                                                                                       if ($hasil) {
                                                                                                                                                                                                                            if ($hasil[$no]['harapan'] == '2') {
                                                                                                                                                                                                                                 echo 'checked';
                                                                                                                                                                                                                            }
                                                                                                                                                                                                                       }
                                                                                                                                                                                                                       ?>>
                                                                           <label for="customCheckharapan<?= $k->id_kuis; ?>"></label>
                                                                      </div>
                                                                 </td>
                                                                 <td>
                                                                      <div class="form-check">
                                                                           <input type="radio" name="harapan<?= $k->id_kuis; ?>" id="customCheckharapan<?= $k->id_kuis; ?>" value="3" required <?= $isi_kuisioner; ?> <?php
                                                                                                                                                                                                                       if ($hasil) {
                                                                                                                                                                                                                            if ($hasil[$no]['harapan'] == '3') {
                                                                                                                                                                                                                                 echo 'checked';
                                                                                                                                                                                                                            }
                                                                                                                                                                                                                       }
                                                                                                                                                                                                                       ?>>
                                                                           <label for="customCheckharapan<?= $k->id_kuis; ?>"></label>
                                                                      </div>
                                                                 </td>
                                                                 <td>
                                                                      <div class="form-check">
                                                                           <input type="radio" name="harapan<?= $k->id_kuis; ?>" id="customCheckharapan<?= $k->id_kuis; ?>" value="4" required <?= $isi_kuisioner; ?> <?php
                                                                                                                                                                                                                       if ($hasil) {
                                                                                                                                                                                                                            if ($hasil[$no]['harapan'] == '4') {
                                                                                                                                                                                                                                 echo 'checked';
                                                                                                                                                                                                                            }
                                                                                                                                                                                                                       }
                                                                                                                                                                                                                       ?>>
                                                                           <label for="customCheckharapan<?= $k->id_kuis; ?>"></label>
                                                                      </div>
                                                                 </td>
                                                                 <td>
                                                                      <div class="form-check">
                                                                           <input type="radio" name="harapan<?= $k->id_kuis; ?>" id="customCheckharapan<?= $k->id_kuis; ?>" value="5" required <?= $isi_kuisioner; ?> <?php
                                                                                                                                                                                                                       if ($hasil) {
                                                                                                                                                                                                                            if ($hasil[$no]['harapan'] == '5') {
                                                                                                                                                                                                                                 echo 'checked';
                                                                                                                                                                                                                            }
                                                                                                                                                                                                                       }
                                                                                                                                                                                                                       ?>>
                                                                           <label for="customCheckharapan<?= $k->id_kuis; ?>"></label>
                                                                      </div>
                                                                 </td>
                                                            </tr>
                                                  <?php
                                                            $no++;
                                                       }
                                                  } else {
                                                       echo "<h2 style='background-color:green;text-align:center;color:white'>Sesi Kuisioner Belum Tersedia</h2>";
                                                  }
                                                  ?>
                                             </tbody>
                                        </table>
                                   </div>
                              </div>
                              <!-- /.card-body -->
                              <div class="card-footer">
                                   <button type="submit" class="btn btn-primary" <?= $isi_kuisioner; ?>>Submit</button>
                              </div>
                         </form>

                    </div>
                    <!-- /.card -->
               </div>
          </div>
     </section>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->