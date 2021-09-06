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
                                   <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newKendalatidakaktifModal">Add Data Kendala</a>
                              </h3>
                         </div>
                         <div class="card-body">
                              <div class="table-responsive">
                                   <table class="table" id="datatabletidakaktif">
                                        <thead>
                                             <th style="min-width: 100px;">Aksi</th>
                                             <th>No</th>
                                             <th>NIK</th>
                                             <th>Nama</th>
                                             <th>Kampung</th>
                                             <th>RT</th>
                                             <th>RW</th>
                                             <th>Sektor</th>
                                             <th>No meter</th>
                                             <th>Status</th>
                                             <th>Tanggal Kunjungan</th>
                                             <th>Tanggal Eksekusi</th>
                                             <th>Kendala</th>
                                             <th>Keterangan</th>
                                        </thead>
                                        <tbody>
                                             <!-- <?php $no = 1;
                                                  foreach ($tidakaktif as $t) :
                                                  ?>
                                                  <tr>
                                                       <td><?php echo $no++; ?></td>
                                                       <td>
                                                            <?php echo $t['nik']; ?> <br>
                                                       </td>
                                                       <td><?php echo $t['kampung']; ?></td>
                                                       <td>
                                                            <?php echo $t['rt']; ?> <br>
                                                       </td>
                                                       <td>
                                                            <?php echo $t['rw']; ?> <br>
                                                       </td>
                                                       <td>
                                                            <?php echo $t['sektor']; ?> <br>
                                                       </td>
                                                       <td>
                                                            <?php echo $t['nometer']; ?> <br>
                                                       </td>
                                                       <td>
                                                            <?php echo $t['status']; ?> <br>
                                                       </td>
                                                       <td>
                                                            <?php echo $t['tglkunjungan']; ?> <br>
                                                       </td>
                                                       <td>
                                                            <?php echo $t['tgleksekusi']; ?> <br>
                                                       </td>
                                                       <td>
                                                            <?php echo $t['keterangan']; ?> <br>
                                                       </td>
                                                       <td>
                                                            <a href="<?php base_url(); ?> ubahtidakaktif/<?= $t['id']; ?>" class="btn btn-primary btn-sm">edit</a>
                                                            <a href="<?php base_url(); ?> hapustidakaktif/<?= $t['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ?');">delete</a>
                                                       </td>
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
<div class="modal fade" id="newKendalatidakaktifModal" tabindex="-1" aria-labelledby="newKendalatidakaktifLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="newKendalatidakaktifLabel">Add New Kendala </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>
               <form action="<?= base_url('Kendala/addKendalatidakaktif'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                         <div class="row">
                              <div class="form-group col-md-6">
                                   <label for="">NIK</label>
                                   <input type="text" class="form-control" id="nik" name="nik">
                              </div>
                              <div class="form-group col-md-6">
                                   <label for="">Nama</label>
                                   <div class=" row">
                                        <div class="col-sm-6 ">
                                             <input readonly type="text" class="form-control" id="nama" name="nama">
                                        </div>
                                        <div class="col-sm-6 ">
                                             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#caripelanggan">Cari Pelanggan</button>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="row">
                              <div class="form-group col-md-6">
                                   <label for="">Kampung</label>
                                   <input type="text" class="form-control" id="kampung" name="kampung">
                              </div>
                              <div class="form-group col-sm-1">
                                   <label for="">Rt</label>
                                   <input type="text" class="form-control" id="rt" name="rt">
                              </div>
                              <div class="form-group col-sm-1">
                                   <label for="">Rw</label>
                                   <input type="text" class="form-control" id="rw" name="rw">
                              </div>
                              <div class="form-group col-sm-1">
                                   <label for="">Sektor</label>
                                   <input type="text" class="form-control" id="sektor" name="sektor">
                              </div>
                              <div class="form-group col-sm-2">
                                   <label for="">No meter</label>
                                   <input type="text" class="form-control" id="nometer" name="nometer">
                              </div>
                         </div>
                         <div class="row">
                              <div class="form-group col-md-6">
                                   <label for="">Status</label>
                                   <input type="text" class="form-control" id="status" name="status">
                              </div>
                              <div class="form-group col-md-6">
                                   <label for="">Tanggal Kunjungan</label>
                                   <input type="date" class="form-control" id="tglkunjungan" name="tglkunjungan">
                              </div>
                         </div>
                         <div class="row">
                              <div class="form-group col-md-6">
                                   <label for="">Tanggal Eksekusi</label>
                                   <input type="date" class="form-control" id="tgleksekusi" name="tgleksekusi">
                              </div>
                              <div class="form-group col-sm-2">
                                   <label for="">kendala</label>
                                   <select type="input" class="form-control" id="kendala" name="kendala">
                                        <option value="Belum Siap">Belum Siap</option>
                                        <option value="Siap Pasang">Siap Pasang </option>
                                        <option value="Rumah Kosong">Rumah Kosong</option>
                                        <option value="Rumah Renovasi">Rumah Renovasi</option>
                                        <option value="Rumah Kontrakan">Rumah Kontrakan</option>
                                        <option value="Rumah belum ditemukan">Rumah belum ditemukan</option>
                                        <option value="Minta Dicabut">Minta Dicabut </option>
                                        <option value="Tidak Ada Gas">Tidak Ada Gas</option>
                                        <option value="Lain-lain">Lain-lain </option>
                                   </select>
                              </div>
                              <div class="form-group col-sm-4">
                                   <label for="">Keterangan</label>
                                   <textarea name="keterangan" id="keterangan" cols="10" class="form-control"></textarea>
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

<div class="modal fade" id="caripelanggan" tabindex="-1" aria-labelledby="caritidakaktiflabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="caritidakaktiflabel">Cari Data Pelanggan Meter </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>
               <form action="<?= base_url('Kendala/addKendalatidakaktif/newKendalatidakaktifModal'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                         <div class="card-body">
                              <div class="table-responsive">
                                   <table class="table" id="pelangganmetertidakaktif">
                                        <thead>
                                             <th></th>
                                             <th>No</th>
                                             <th>NIK</th>
                                             <th>Nama</th>
                                             <th>Kampung</th>
                                             <th>Rt</th>
                                             <th>Rw</th>
                                             <th>Sektor</th>
                                             <th>Nomor Meter</th>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                   </table>
                              </div>
                         </div>
                         <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary" data-dismiss="modal">Add</button>
                         </div>
                    </div>
               </form>
          </div>
     </div>
</div>


<script>
     $(document).ready(function() {
          $('#datatabletidakaktif').DataTable({
               "ajax": {
                    "url": "<?= base_url(); ?>Kendala/getTidakaktif",
               },
               "columns": [{
                         "data": "id",
                         "render": function(data, type, row) {
                              return `<a href="<?php base_url(); ?> ubahtidakaktif/${data}" class="btn btn-primary btn-sm">edit</>
                                        <a href="<?php base_url(); ?> hapustidakaktif/${data}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ?');">delete</a>`;
                         }
                    },
                    {
                         "data": "id"
                    },
                    {
                         "data": "nik"
                    },
                    {
                         "data": "nama"
                    },
                    {
                         "data": "kampung"
                    },
                    {
                         "data": "rt"
                    },
                    {
                         "data": "rt"
                    },
                    {
                         "data": "sektor"
                    },
                    {
                         "data": "nometer"
                    },
                    {
                         "data": "status"
                    },
                    {
                         "data": "tglkunjungan"
                    },
                    {
                         "data": "tgleksekusi"
                    },
                    {
                         "data": "kendala"
                    },
                    {
                         "data": "keterangan"
                    },
               ]
          });
     });
</script>

<script>
     $(document).ready(function() {
          $('#pelangganmetertidakaktif').DataTable({
               "ajax": {
                    "url": "<?= base_url(); ?>menu/getPelanggantidakaktif",
               },
               "columns": [{
                         "data": "idp",
                         "render": function(data, type, row) {
                              return `<div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="customCheck${data}" value="${data}" onchange="pilihPelanggan(this)" nik="${row.nik}" nama="${row.nama}" kampung="${row.kampung}" rt="${row.rt}"rw="${row.rw}" sektor="${row.sektor}" nometer="${row.nometer}">
                                        <label class="form-check-label" for="customCheck${data}"></label>
                                   </div>`;
                         }
                    },
                    {
                         "data": "idp"
                    },
                    {
                         "data": "nik"
                    },
                    {
                         "data": "nama"
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
                         "data": "sektor"
                    },
                    {
                         "data": "nometer"
                    },
               ]
          });
     });

     function pilihPelanggan(elem) {
          let idp = $(elem).attr('idp');
          let nik = $(elem).attr('nik');
          let nama = $(elem).attr('nama');
          let kampung = $(elem).attr('kampung');
          let rt = $(elem).attr('rt');
          let rw = $(elem).attr('rw');
          let sektor = $(elem).attr('sektor');
          let nometer = $(elem).attr('nometer');
          $('#idp').val(idp);
          $('#nik').val(nik);
          $('#nama').val(nama);
          $('#kampung').val(kampung);
          $('#rt').val(rt);
          $('#rw').val(rw);
          $('#sektor').val(sektor);
          $('#nometer').val(nometer);
     }
</script>