<!-- Begin Page Content -->
<div class="container-fluid">

     <!-- Page Heading -->

     <!-- Content Wrapper. Contains page content -->

     <section class="content">
          <div class="row justify-content-center">
               <div class="col-10">
                    <div class="card card-primary">
                         <form action="<?php echo base_url('kuisioner/ubahPertanyaan/' . $konten['id']) ?>" method="POST" role="form" enctype="multipart/form-data">
                              <input type="hidden" name="id" value="<?= $konten['id']; ?>">
                              <div class="card-body">
                                   <div class="form-group">
                                        <label for="rek">Judul</label>
                                        <input type="text" name="judul" class="form-control" id="judul" placeholder="judul" value="<?= $konten['judul']; ?>">
                                        <small class="text-danger"><?php echo form_error('judul'); ?></small>
                                   </div>
                                   <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea name="keterangan" id="keterangan" cols="10" class="form-control"><?php echo $konten['keterangan']; ?></textarea>
                                        <small class="text-danger"><?php echo form_error('keterangan'); ?></small>
                                   </div>
                                   <div class="">
                                        <label for="">Gambar</label>
                                        <div class="col-sm-9">
                                             <div class="custom-file">
                                                  <input type="file" class="custom-file-input" id="image" name="image">
                                                  <label class="custom-file-label">Choose file</label>
                                             </div>
                                        </div>
                                   </div>
                              </div>

                              <!-- /.card-body -->

                              <div class="card-footer">
                                   <button type="submit" class="btn btn-primary">Simpan<i class="far fa-paper-plane"></i></button>
                                   <a href="<?php echo base_url('menu/konten'); ?>" class="btn btn-outline-danger">Batal <i class="fas fa-window-close"></i></a>
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