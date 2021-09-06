<!-- Begin Page Content -->
<div class="container-fluid">

     <!-- Page Heading -->

     <!-- Content Wrapper. Contains page content -->

     <section class="content">
          <div class="row justify-content-center">
               <div class="col-8">
                    <div class="card card-primary">
                         <form action="<?php echo base_url('kuisioner/ubahPertanyaan/' . $kelolakuis['id_kuis']) ?>" method="POST" role="form" enctype="multipart/form-data">
                              <input type="hidden" name="id" value="<?= $kelolakuis['id_kuis']; ?>">
                              <div class="card-body row">
                                   <div class="form-group col-sm-2">
                                        <label for="id_kuis">Id kuis</label>
                                        <input type="text" name="id_kuis" class="form-control" id="id_kuis" value="<?= $kelolakuis['id_kuis']; ?>" readonly>
                                        <small class="text-danger"><?php echo form_error('id_kuis'); ?></small>
                                   </div>
                                   <div class="form-group col-lg-8">
                                        <label for="pertanyaan">pertanyaan</label>
                                        <input type="text" name="pertanyaan" id="pertanyaan" class="form-control" value="<?php echo $kelolakuis['pertanyaan']; ?>">
                                        <small class="text-danger"><?php echo form_error('pertanyaan'); ?></small>
                                   </div>
                                   <div class="col-sm-2">
                                        <label for="status">status</label>
                                        <select type="input" class="form-control" id="status" name="status">
                                             <option value="terupdate">terupdate</option>
                                             <option value="hapus">hapus</option>
                                        </select>
                                   </div>

                              </div>

                              <!-- /.card-body -->

                              <div class="card-footer">
                                   <button type="submit" class="btn btn-primary">Simpan<i class="far fa-paper-plane"></i></button>
                                   <a href="<?php echo base_url('kuisioner'); ?>" class="btn btn-outline-danger">Batal <i class="fas fa-window-close"></i></a>
                              </div>
                         </form>
                         <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
               </div>
               <!-- /.col -->
          </div>
          <!-- /.row -->
     </section>
</div>
</div>

<!-- End of Main Content -->