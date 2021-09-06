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
                                   <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newKontenModal">Add New Konten</a>
                              </h3>
                         </div>
                         <div class="card-body">
                              <div class="table-responsive">
                                   <table class="table" id="datatablekonten">
                                        <thead>
                                             <th style="min-width: 130px;">Aksi</th>
                                             <th>Judul</th>
                                             <th>Keterangan</th>
                                             <th>image</th>
                                        </thead>
                                        <tbody>
                                             <!-- <?php $no = 1;
                                                  foreach ($konten as $k) :
                                                  ?>
                                                       <tr>
                                                            <td><?php echo $no++; ?></td>
                                                            <td><?php echo $k['judul']; ?></td>
                                                            <td>
                                                                 <?php echo $k['keterangan']; ?> <br>
                                                            </td>
                                                            <td>
                                                                 <?php echo $k['image']; ?> <br>
                                                                 <img class="img-thumbnail" width="100px" height="80px" src="<?php echo base_url('./assets/img/profile/' . $k['image']) ?>">
                                                            </td>
                                                            <td>
                                                                 <a href="<?php base_url(); ?> ubah/<?= $k['id']; ?>" class="btn btn-primary btn-sm">edit</a>
                                                                 <a href="<?php base_url(); ?> hapus/<?= $k['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ?');">delete</a>
                                                            </td>
                                                       </tr>
                                                  <?php endforeach; ?> -->
                                        </tbody>
                                   </table>
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
<div class="modal fade" id="newKontenModal" tabindex="-1" aria-labelledby="newKontenModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="newKontenLabel">Add New Konten</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>
               <form action="<?= base_url('menu/addKonten'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                         <div class="form-group">
                              <label for="">Judul</label>
                              <input type="text" class="form-control" id="judul" name="judul">
                         </div>
                         <div class="form-group">
                              <label for="">Keterangan</label>
                              <textarea name="keterangan" id="keterangan" cols="10" class="form-control" placeholder=""></textarea>
                         </div>
                         <label for=" ">Image</label>
                         <div class="custom-file">
                              <input type="file" class="custom-file-input" id="image" name="image">
                              <label class="custom-file-label" for="image">Pilih Gambar</label>
                         </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Add</button>
                    </div>
               </form>
          </div>
     </div>
</div>


<script>
     $(document).ready(function() {
          $('#datatablekonten').DataTable({
               "ajax": {
                    "url": "<?= base_url(); ?>Menu/getKonten",
               },
               "columns": [{
                         "data": "id",
                         "render": function(data, type, row) {
                              return `<a href="<?php base_url(); ?> ubah/${data}" class="btn btn-primary btn-sm">edit</a>
                                      <a href="<?php base_url(); ?> hapus/${data}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ?');">delete</a>`;
                         }
                    },
                    {
                         "data": "judul"
                    },
                    {
                         "data": "keterangan"
                    },
                    {
                         "data": "image",
                         "render": function(data, type, row) {
                              return `<img class="img-thumbnail" width="100px" height="80px" src="<?php echo base_url('./assets/img/profile/') ?>${data}">`;
                         }
                    },
               ]
          });
     });
</script>