<!-- Begin Page Content -->
<div class="container-fluid">

     <!-- Page Heading -->

     <!-- Content Wrapper. Contains page content -->

     <section class="content">
          <div class="row justify-content-center">
               <div class="col-6">
                    <div class="card card-primary">
                         <form action="<?php echo base_url('pelanggan/ubahpelanggan/' . $pelanggan['id_pelanggan']) ?>" method="POST" role="form" enctype="multipart/form-data">
                              <input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan']; ?>">
                              <div class="card-body">
                                   <div class="form-group">
                                        <label for="id">NIK</label>
                                        <input type="text" name="nik" class="form-control" id="nik" placeholder="nik" value="<?= $pelanggan['nik']; ?>">
                                        <small class=" text-danger"><?php echo form_error('nik'); ?></small>
                                   </div>
                                   <div class="form-group">
                                        <label for="keterangan">Nama</label>
                                        <input type="text" name="nama" class="form-control" id="nama" placeholder="nama" value="<?= $pelanggan['nama']; ?>">
                                        <small class=" text-danger"><?php echo form_error('nama'); ?></small>
                                   </div>
                                   <div class="form-group">
                                        <label for="keterangan">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="alamat" value="<?= $pelanggan['alamat']; ?>">
                                        <small class=" text-danger"><?php echo form_error('alamat'); ?></small>
                                   </div>
                                   <div class="form-group">
                                        <label for="keterangan">Kampung</label>
                                        <input type="text" name="kampung" class="form-control" id="kampung" placeholder="kampung" value="<?= $pelanggan['kampung']; ?>">
                                        <small class=" text-danger"><?php echo form_error('kampung'); ?></small>
                                   </div>
                                   <div class="form-group">
                                        <label for="keterangan">RT</label>
                                        <input type="text" name="rt" class="form-control" id="rt" placeholder="rt" value="<?= $pelanggan['rt']; ?>">
                                        <small class=" text-danger"><?php echo form_error('rt'); ?></small>
                                   </div>
                                   <div class="form-group">
                                        <label for="keterangan">RW</label>
                                        <input type="text" name="rw" class="form-control" id="rw" placeholder="rw" value="<?= $pelanggan['rw']; ?>">
                                        <small class=" text-danger"><?php echo form_error('rw'); ?></small>
                                   </div>
                                   <div class="form-group">
                                        <label for="keterangan">No HP</label>
                                        <input type="text" name="nohp" class="form-control" id="nohp" placeholder="nohp" value="<?= $pelanggan['nohp']; ?>">
                                        <small class=" text-danger"><?php echo form_error('keterangan'); ?></small>
                                   </div>
                                   <div class="form-group">
                                        <label for="keterangan">Status</label>
                                        <select type="input" name="status" class="form-control" id="" placeholder="status" value="<?= $pelanggan['status']; ?>">
                                             <option value="Aktif">Aktif</option>
                                             <option value="Tidak Aktif">Tidak Aktif </option>
                                        </select>
                                        <small class=" text-danger"><?php echo form_error('status'); ?></small>
                                   </div>
                                   <label for=" ">Image</label>
                                   <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Pilih Gambar</label>
                                        <small class="text-danger"><?php echo form_error('image'); ?></small>
                                   </div>

                              </div>


                              <!-- /.card-body -->

                              <div class="card-footer">
                                   <button type="submit" class="btn btn-primary">Simpan <i class="far fa-paper-plane"></i></button>
                                   <a href="<?php echo base_url('pelanggan/datapelanggan'); ?>" class="btn btn-outline-danger">Batal <i class="fas fa-window-close"></i></a>
                              </div>
                         </form>
                         <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- /.col -->
                    <!-- /.row -->
     </section>
</div>
</div>



<!-- End of Main Content -->