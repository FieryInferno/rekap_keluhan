<!-- Begin Page Content -->
<div class="container-fluid">
     <!-- Page Heading -->

     <section class="content">
          <!-- Default box -->
          <div class="row justify-content-center">
               <div class="col-md-12">
                    <?php echo $this->session->flashdata('warning'); ?>
                    <?php if ($this->session->flashdata("pesan")) { ?>
                         <div class="alert alert-success alert-dismissable">
                              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                              <?php
                              echo strtoupper($this->session->flashdata("pesan"));
                              unset($_SESSION["pesan"]);
                              ?>
                         </div>
                    <?php } ?>
                    <div class="card card-primary">
                         <div class="card-header">
                              <h3 class="card-title">
                                   <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPelangganModal">Tambah Pelanggan Baru</a>
                              </h3>
                              <!--  <div class="row">
                                   
                                   <div class="" style="padding-left: 650px;">
                                        <?php echo form_open('pelanggan/datapelanggan') ?>
                                        <div id="dataTable_filter" class="dataTables_filter">
                                             <label>
                                                  <input type="text" name="keyword" class="form-control" placeholder="Ketik kata yang dicari">
                                             </label>
                                             <input type="submit" name="submit" class="btn btn-success">
                                        </div>
                                        <?php echo form_close() ?>
                                   </div>
                              </div>
                              <?php if (empty($keyword)) : ?>
                                   <tr>
                                        <td>
                                             <div>
                                                  <h5>jumlah data : <?= $total_rows; ?></h5>
                                             </div>
                                        </td>
                                   </tr>
                              <?php else : ?>
                                   <tr>
                                        <td>
                                             <div>
                                                  <h5>jumlah data yang mengandung kata "<?= $keyword; ?>" : <?= $total_rows; ?></h5>
                                             </div>
                                        </td>
                                   </tr>
                              <?php endif; ?> -->

                         </div>
                         <div class="card-body">
                              <div class="table-responsive">
                                   <table class="table" id="dataTable">
                                        <thead>
                                             <th>id sementara</th>
                                             <th>NIK</th>
                                             <th>Nama</th>
                                             <th>Alamat</th>
                                             <th>Sektor</th>
                                             <th>kampung/dusun</th>
                                             <th>Rt</th>
                                             <th>Rw</th>
                                             <th>No. Telepon</th>
                                             <th>Status</th>
                                             <th>Gambar</th>
                                             <th>Aksi</th>

                                        </thead>
                                        <tbody>
                                             <!-- <?php
                                                  foreach ($pelanggan as $p) :
                                                  ?>
                                                  <tr>
                                                       <td><?php echo $p['idp']; ?></td>
                                                       <td>
                                                            <?php echo $p['nik']; ?> <br>
                                                       </td>
                                                       <td>
                                                            <?php echo $p['nama']; ?> <br>
                                                       </td>
                                                       <td>
                                                            <?php echo $p['alamat']; ?> <br>
                                                       </td>
                                                       <td>
                                                            <?php echo $p['kampung']; ?> <br>
                                                       </td>
                                                       <td>
                                                            <?php echo $p['rt']; ?> <br>
                                                       </td>
                                                       <td>
                                                            <?php echo $p['rw']; ?> <br>
                                                       </td>
                                                       <td>
                                                            <?php echo $p['nohp']; ?> <br>
                                                       </td>
                                                       <td>
                                                            <?php echo $p['status']; ?> <br>
                                                       </td>
                                                       <td>
                                                            <!-- <?php echo $p['image']; ?> <br> -->
                                             <img class="img-thumbnail" width="100px" height="80px" src="<?php echo base_url('./assets/img/profile/' . $p['image']) ?>">
                                             </td>
                                             <td>
                                                  <a href="<?php base_url(); ?> ubahpelanggan/<?= $p['id_pelanggan']; ?>" class="btn btn-primary btn-sm">edit</a>
                                                  <a href="<?php base_url(); ?> hapuspelanggan/<?= $p['id_pelanggan']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ?');">delete</a>
                                             </td>
                                             </tr>
                                        <?php endforeach; ?> -->
                                        </tbody>
                                        <!-- <?php if (empty($pelanggan)) : ?>
                                             <tr>
                                                  <td>
                                                       <div class="alert alert-danger" role="alert">
                                                            Data Not Found!
                                                       </div>
                                                  </td>
                                             </tr>
                                        <?php endif; ?> -->
                                   </table>
                                   <!-- <div class="card-footer">
                                             <?= $this->pagination->create_links(); ?>
                                        </div> -->
                              </div>
                         </div>
                         <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
               </div>
          </div>

     </section>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newPelangganModal" tabindex="-1" aria-labelledby="newPelangganModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="newPelangganLabel">Tambah Pelanggan Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>
               <form action="<?= base_url('Pelanggan/addPelanggan'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                         <div class="form-group">
                              <label for="">NIK</label>
                              <input type="text" class="form-control" id="nik" name="nik">
                         </div>
                         <label for=" ">Nama Pelanggan</label>
                         <div class="form-group">
                              <input type="text" class="form-control" id="nama" name="nama">
                         </div>
                         <label for=" ">Alamat</label>
                         <div class="form-group">
                              <input type="text" class="form-control" id="alamat" name="alamat">
                         </div>
                         <label for=" ">Kampung</label>
                         <div class="form-group">
                              <input type="text" class="form-control" id="kampung" name="kampung">
                         </div>
                         <label for=" ">Rt</label>
                         <div class="form-group">
                              <input type="text" class="form-control" id="rt" name="rt">
                         </div>
                         <label for=" ">Rw</label>
                         <div class="form-group">
                              <input type="text" class="form-control" id="rw" name="rw">
                         </div>
                         <label for=" ">No. Telepon</label>
                         <div class="form-group">
                              <input type="text" class="form-control" id="nohp" name="nohp">
                         </div>
                         <div class="form-group">
                              <label for="status">Status</label>
                              <select type="input" class="form-control" id="" name="status">
                                   <option value="Aktif">Aktif</option>
                                   <option value="Tidak Aktif">Tidak Aktif </option>
                              </select>
                         </div>
                         <label for=" ">Gambar</label>
                         <div class="custom-file">
                              <input type="file" class="custom-file-input" id="image" name="image">
                              <label class="custom-file-label" for="image">Pilih Gambar</label>
                         </div>
                         <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Add</button>
                         </div>
                    </div>
               </form>
          </div>
     </div>
</div>

<script>
     $(document).ready(function() {
          $('#dataTable').DataTable({
               "ajax": {
                    "url": "<?= base_url(); ?>Pelanggan/getPelanggan",
               },
               "columns": [{
                         "data": "idp"
                    },
                    {
                         "data": "nik"
                    },
                    {
                         "data": "nama"
                    },
                    {
                         "data": "alamat"
                    },
                    {
                         "data": "sektor"
                    },
                    {
                         "data": "kampung"
                    },
                    {
                         "data": "rt"
                    },
                    {
                         "data": "rw"
                    },
                    {
                         "data": "nohp"
                    },
                    {
                         "data": "status"
                    },
                    {
                         "data": "image",
                         "render": function(data, type, row) {
                              return `<img class="img-thumbnail" width="100px" height="80px" src="<?php echo base_url('./assets/img/profile/') ?>${data}">`;
                         }
                    },
                    {
                         "data": "id_pelanggan",
                         "render": function(data, type, row) {
                              return `<a href="<?php base_url(); ?> ubahpelanggan/${data}" class="btn btn-primary btn-sm">edit</a>
                                        <a href="<?php base_url(); ?> hapuspelanggan/${data}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ?');">delete</a>`;
                         }
                    },
               ]
          });
     });
</script>