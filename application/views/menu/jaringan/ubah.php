<!-- Begin Page Content -->
<div class="container-fluid">

     <!-- Page Heading -->

     <!-- Content Wrapper. Contains page content -->

     <section class="content">
          <div class="row justify-content-center">
               <div class="col-5">
                    <div class="card card-primary">
                         <form action="<?php echo base_url('kendala/ubahjaringan/' . $jaringan['id']) ?>" method="POST" role="form" enctype="multipart/form-data">
                              <input type="hidden" name="id" value="<?= $jaringan['id']; ?>">
                              <div class="card-body">
                                   <div class="form-group">
                                        <label for="">Tanggal</label>
                                        <input type="date" name="tgl" class="form-control" id="tgl" value="<?= $jaringan['tgl']; ?>" required>
                                        <?php echo form_error('tgl'); ?>
                                   </div>
                                   <div class="form-group">
                                        <label for=" ">Nik</label>
                                        <input type="text" name="nik" class="form-control" id="nik" placeholder="nik" value="<?= $jaringan['nik']; ?>">
                                        <small class="text-danger"><?php echo form_error('nik'); ?></small>
                                   </div>
                                   <div class="form-group">
                                        <label for=" ">ID Pelanggan</label>
                                        <input type="text" name="id_pelanggan" class="form-control" id="id_pelanggan" placeholder="id_pelanggan" value="<?= $jaringan['id_pelanggan']; ?>" required>
                                        <small class="text-danger"><?php echo form_error('id_pelanggan'); ?></small>
                                   </div>
                                   <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" name="nama" class="form-control" id="nama" placeholder="nama" value="<?= $jaringan['nama']; ?>">
                                        <small class="text-danger"><?php echo form_error('nama'); ?></small>
                                   </div>
                                   <div class="form-group">
                                        <label for="">No meter</label>
                                        <input type="text" name="nometer" class="form-control" id="nometer" placeholder="nometer" value="<?= $jaringan['nometer']; ?>">
                                        <small class=" text-danger"><?php echo form_error('nometer'); ?></small>
                                   </div>
                                   <div class="form-group">
                                        <label for="n">Sektor</label>
                                        <input type="text" name="sektor" class="form-control" id="sektor" placeholder="sektor" value="<?= $jaringan['sektor']; ?>">
                                        <small class=" text-danger"><?php echo form_error('sektor'); ?></small>
                                   </div>
                                   <div class="form-group">
                                        <label for="">Masalah</label>
                                        <textarea name="masalah" id="masalah" cols="10" class="form-control" placeholder="masalah"><?php echo $jaringan['masalah']; ?></textarea>
                                        <small class=" text-danger"><?php echo form_error('masalah'); ?></small>
                                   </div>
                                   <div class="form-group">
                                        <label for="">Keterangan</label>
                                        <textarea name="keterangan" id="keterangan" cols="10" class="form-control" placeholder="keterangan"><?php echo $jaringan['keterangan']; ?></textarea>
                                        <small class=" text-danger"><?php echo form_error('keterangan'); ?></small>
                                   </div>

                                   <div class="form-group">
                                        <label for="keterangan">Solusi</label>
                                        <textarea name="solusi" id="solusi" cols="10" class="form-control" placeholder="solusi"><?php echo $jaringan['solusi']; ?></textarea>
                                        <small class=" text-danger"><?php echo form_error('solusi'); ?></small>
                                   </div>
                                   <div class="form-group">
                                        <label for=" ">Status</label>
                                        <select type="input" class="form-control" id="status" name="status">
                                             <option value="closed">Closed</option>
                                             <option value="pending">Pending </option>
                                        </select>
                                        <small class=" text-danger"><?php echo form_error('status'); ?></small>
                                   </div>
                                   <div class="form-group">
                                        <label for=" ">Tanggal Kunjungan</label>
                                        <input type="date" name="tanggalkunjungan" class="form-control" id="tanggalkunjungan" value="<?= $jaringan['tanggalkunjungan']; ?>">
                                        <small class=" text-danger"><?php echo form_error('tanggalkunjungan'); ?></small>
                                   </div>
                                   <div class="form-group">
                                        <label for=" ">Tanggal Terakhir</label>
                                        <input type="date" name="tanggalterakhir" class="form-control" id="tanggalterakhir" value="<?= $jaringan['tanggalterakhir']; ?>">
                                        <small class=" text-danger"><?php echo form_error('tanggalterakhir'); ?></small>
                                   </div>
                                   <div class="form-group">
                                        <label for=" ">Teknisi</label>
                                        <input type="text" name="teknisi" class="form-control" id="teknisi" placeholder="teknisi" value="<?= $jaringan['teknisi']; ?>">
                                        <small class=" text-danger"><?php echo form_error('teknisi'); ?></small>
                                   </div>
                              </div>
                    </div>

                    <!-- /.card-body -->

                    <div class="card-footer">
                         <button type="submit" class="btn btn-primary">Simpan <i class="far fa-paper-plane"></i></button>
                         <a href="<?php echo base_url('menu/kendalajaringan'); ?>" class="btn btn-outline-danger">Batal <i class="fas fa-window-close"></i></a>
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


<!-- End of Main Content -->