<!-- Begin Page Content -->
<div class="container-fluid">

     <!-- Page Heading -->

     <section class="content">
          <!-- Default box -->
          <div class="row justify-content-center">
               <div class="col-md-12">
                    <?php echo $this->session->flashdata('warning'); ?>
                    <?= $this->session->flashdata('message'); ?>
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
                                   <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newKendalajaringanModal">Add Data Kendala</a>
                              </h3>
                         </div>
                         <div class="card-body">
                              <div class="table-responsive">
                                   <table class="table" id="datatablejaringan">
                                        <thead>
                                             <th style="min-width: 100px;">Aksi</th>
                                             <th>No</th>
                                             <th>Tanggal input</th>
                                             <th>NIK</th>
                                             <th>Id_pelanggan</th>
                                             <th>Nama</th>
                                             <th>No Meter</th>
                                             <th>Sektor</th>
                                             <th>Masalah</th>
                                             <th>Keterangan</th>
                                             <th>Solusi</th>
                                             <th>Tanggal Kunjungan</th>
                                             <th>Tanggal Terakhir</th>
                                             <th>Status</th>
                                             <th>Teknisi</th>
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

<!-- Modal -->
<div class="modal fade" id="newKendalajaringanModal" tabindex="-1" aria-labelledby="newKendalajaringanLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="newKendalajaringanLabel">Add New Kendala jaringan </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>
               <form action="<?= base_url('Kendala/addKendalajaringan'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                         <div class="row">
                              <div class="form-group col-md-6">
                                   <label for="">Tanggal input</label>
                                   <input type="date" class="form-control" id="tgl" name="tgl">
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
                                   <label for="">ID Pelanggan</label>
                                   <input readonly type="text" class="form-control" id="id_pelanggan" name="id_pelanggan">
                              </div>
                              <div class="form-group col-md-6">
                                   <label for="">NIK</label>
                                   <input readonly type="text" class="form-control" id="nik" name="nik">
                              </div>
                         </div>
                         <div class="row">
                              <div class="form-group col-md-6">
                                   <label for="">Sektor</label>
                                   <input readonly type="text" class="form-control" id="sektor" name="sektor">
                              </div>
                              <div class="form-group col-md-6">
                                   <label for="">Nomor Meter</label>
                                   <input readonly type="text" class="form-control" id="nometer" name="nometer">
                              </div>
                         </div>
                         <div class="row">
                              <div class="form-group col-md-6">
                                   <label for="">Tanggal Kunjungan</label>
                                   <input type="date" class="form-control" id="tanggalkunjungan" name="tanggalkunjungan">
                              </div>
                              <div class="form-group col-md-6">
                                   <label for="">Tanggal Terakhir</label>
                                   <input type="date" class="form-control" id="tanggalterakhir" name="tanggalterakhir">
                              </div>
                         </div>
                         <div class="row">
                              <div class="form-group col-md-6">
                                   <label for="">Masalah</label>
                                   <div class="row">
                                        <div class="col-sm-6">
                                             <select type="input" class="form-control" id="masalah" name="masalah">
                                                  <option value="Kebocoran Pipa">Kebocoran Pipa</option>
                                                  <option value="Kerusakan Material">Kerusakan Material </option>
                                                  <option value="Kehilangan Material">Kehilangan Material</option>
                                                  <option value="Ganti Matering">Ganti Matering</option>
                                                  <option value="No Gas">No Gas</option>
                                                  <option value="Lain-Lain">Lain-lain</option>
                                             </select>
                                        </div>
                                        <div class="col-sm-6 ">
                                             <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan">
                                        </div>
                                   </div>
                              </div>
                              <div class="form-group col-md-6">
                                   <label for="">Solusi</label>
                                   <input type="text" class="form-control" id="solusi" name="solusi">
                              </div>
                         </div>
                         <div class="row">
                              <div class="form-group col-md-6">
                                   <label for="status">Status</label>
                                   <select type="input" class="form-control" id="" name="status">
                                        <option value="closed">Closed</option>
                                        <option value="pending">Pending </option>
                                   </select>
                              </div>
                              <div class="form-group col-md-6">
                                   <label for="">Teknisi</label>
                                   <input type="text" class="form-control" id="teknisi" name="teknisi">
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

<div class="modal fade" id="caripelanggan" tabindex="-1" aria-labelledby="caripelangganlabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="caripelangganlabel">Cari Data Pelanggan Meter </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>
               <form action="<?= base_url('Kendala/addKendalajaringan/newKendalajaringanModal'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                         <div class="card-body">
                              <div class="table-responsive">
                                   <table class="table" id="datatablepelangganmeter">
                                        <thead>
                                             <th></th>
                                             <th>No</th>
                                             <th>ID Pelanggan</th>
                                             <th>NIK</th>
                                             <th>Nama</th>
                                             <th>Nomor Meter</th>
                                             <th>Sektor</th>
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
          $('#datatablejaringan').DataTable({
               "ajax": {
                    "url": "<?= base_url(); ?>Kendala/getJaringan",
               },
               "columns": [{
                         "data": "id",
                         "render": function(data, type, row) {
                              return `<a href="<?php base_url(); ?> ubahjaringan/${data}" class="btn btn-primary btn-sm">edit</a>
                                      <a href="<?php base_url(); ?> hapuskendalajaringan/${data}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ?');">delete</a>`;
                         }
                    },
                    {
                         "data": "id"
                    }, {
                         "data": "tgl"
                    }, {
                         "data": "id_pelanggan"
                    },
                    {
                         "data": "nik"
                    },
                    {
                         "data": "nama"
                    },
                    {
                         "data": "nometer"
                    },
                    {
                         "data": "sektor"
                    },
                    {
                         "data": "masalah"
                    },
                    {
                         "data": "keterangan"
                    },
                    {
                         "data": "solusi"
                    },
                    {
                         "data": "status"
                    },
                    {
                         "data": "tanggalkunjungan"
                    },
                    {
                         "data": "tanggalterakhir"
                    },
                    {
                         "data": "teknisi"
                    },
               ]
          });
     });
</script>
<script>
     $(document).ready(function() {
          $('#datatablepelangganmeter').DataTable({
               "ajax": {
                    "url": "<?= base_url(); ?>menu/getpelangganmeter",
               },
               "columns": [{
                         "data": "no",
                         "render": function(data, type, row) {
                              return `<div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="customCheck${data}" value="${data}" onchange="pilihPelanggan(this)" nik="${row.nik}" id_pelanggan="${row.id_pelanggan}" nama="${row.nama}" nometer="${row.nometer}" sektor="${row.sektor}">
                                        <label class="form-check-label" for="customCheck${data}"></label>
                                   </div>`;
                         }
                    },
                    {
                         "data": "no"
                    },
                    {
                         "data": "id_pelanggan"
                    },
                    {
                         "data": "nik"
                    },
                    {
                         "data": "nama"
                    },
                    {
                         "data": "nometer"
                    },
                    {
                         "data": "sektor"
                    },
               ]
          });
     });

     function pilihPelanggan(elem) {
          let nik = $(elem).attr('nik');
          let id_pelanggan = $(elem).attr('id_pelanggan');
          let nama = $(elem).attr('nama');
          let noMeter = $(elem).attr('noMeter');
          let sektor = $(elem).attr('sektor');
          $('#nik').val(nik);
          $('#id_pelanggan').val(id_pelanggan);
          $('#nama').val(nama);
          $('#sektor').val(sektor);
          $('#nometer').val(noMeter);
     }
</script>