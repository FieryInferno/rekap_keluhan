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
                              <h3 class="card-title">
                                   <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newitemModal">Add item/pertanyaan</a>
                         </div>

                         <div class="card-body">
                              <div class="table-responsive">
                                   <table class="table" id="dataTablekuis">
                                        <thead>
                                             <th style="min-width: 100px;">Aksi</th>
                                             <th>Id Pertanyaan</th>
                                             <th>Pertanyaan</th>
                                             <th>Saran Keputusan</th>
                                             <th>Status</th>
                                        </thead>
                                        <tbody>

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

<div class="modal fade" id="newitemModal" tabindex="-1" aria-labelledby="newitemModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="newitemLabel">Tambah Pertanyaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>
               <form action="<?= base_url('kuisioner/tambahpertanyaan'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                         <div class="form-group">
                              <div class="col-sm-2 mb-3 mb-sm-0">
                                   <label for="">ID Kuis</label>
                                   <input type="text" class="form-control form-control-user" id="id_kuis" name="id_kuis" value="<?= set_value('id_kuis'); ?>" required>
                                   <small class="text-danger"> <?= form_error('id_kuis'); ?></small>
                              </div>
                              <div class="col-md-12 mb-3 mb-sm-0">
                                   <label for="">Pertanyaan</label>
                                   <input type="text" class="form-control form-control-user" id="pertanyaan" name="pertanyaan" placeholder="Pertanyaan Baru" value="<?= set_value('pertanyaan'); ?>" required>
                                   <small class="text-danger"> <?= form_error('pertanyaan'); ?></small>
                              </div>
                              <div class="col-md-12 mb-3 mb-sm-0">
                                   <label for="">Saran Keputusan</label>
                                   <input type="text" class="form-control form-control-user" id="saran" name="saran" placeholder="saran Baru" value="<?= set_value('saran'); ?>" required>
                                   <small class="text-danger"> <?= form_error('saran'); ?></small>
                              </div>
                              <div class="col-sm-4">
                                   <label for="saran">Status</label>
                                   <select type="input" class="form-control" id="status" name="status">
                                        <option value="terupdate">terupdate</option>
                                        <option value="hapus">hapus</option>
                                   </select>
                                   <small class="text-danger"> <?= form_error('status'); ?></small>
                              </div>
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
          $('#dataTablekuis').DataTable({
               "ajax": {
                    "url": "<?= base_url(); ?>Kuisioner/getKuis",
               },
               "columns": [{
                         "data": "id_kuis",
                         "render": function(data, type, row) {
                              return `<a href="<?php base_url(); ?> kuisioner/ubahPertanyaan/${data}" class="btn btn-primary btn-sm">edit</a>
                                   <a href="<?php base_url(); ?> kuisioner/hapusPertanyaan/${data}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ?');">delete</a>`;
                         }
                    },
                    {
                         "data": "id_kuis",
                    },
                    {
                         "data": "pertanyaan",
                    },
                    {
                         "data": "saran",
                    },
                    {
                         "data": "status",
                    },
               ]
          });
     });
</script>