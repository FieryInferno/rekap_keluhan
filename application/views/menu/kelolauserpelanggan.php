<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
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
                            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newUserModal">Add New User</a>
                    </div>
                    <!-- <div class="row" style="padding-left: 50px; padding-top: 20px ; position: right ;">
                              <div class="col-sm-12 col-md-6" style="text-align: right; padding-right: 50px;">
                                   <?php echo form_open('menu/kelolauserpelanggan') ?>
                                   <div id="dataTable_filter" class="dataTables_filter">
                                        <label>
                                             <input type="text" name="keyword" class="form-control" placeholder="Ketik kata yang dicari">
                                        </label>
                                        <button type="submit" class="btn btn-success"><i class="fas fa-fw fa-search"></i>Cari</button>
                                   </div>
                                   <?php echo form_close() ?>
                              </div>
                         </div> -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="dataTableuserpelanggan">
                                <thead>
                                    <th style="min-width: 100px;">Aksi</th>
                                    <th>Id Pelanggan</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>No. meter</th>
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

<div class="modal fade" id="newUserModal" tabindex="-1" aria-labelledby="newUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newUserLabel">Add New User Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/adduserpelanggan'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">ID Pelanggan</label>
                            <input type="text" class="form-control form-control-user" id="id_pelanggan" name="id_pelanggan" placeholder="ID Pelanggan aktif" value="<?= set_value('id_pelanggan'); ?>" required>
                            <small class="text-danger"> <?= form_error('id_pelanggan'); ?></small>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">No Meter</label>
                            <input type="text" class="form-control form-control-user" id="nometer" name="nometer" placeholder="nometer aktif" value="<?= set_value('nometer'); ?>">
                            <small class="text-danger"> <?= form_error('nometer'); ?></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Fullname</label>
                        <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Full name" value="<?= set_value('nama'); ?>">
                        <small class="text-danger"> <?= form_error('nama'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="">Email Address</label>
                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                            <small class="text-danger"> <?= form_error('password1'); ?></small>
                        </div>
                        <div class="col-sm-6">
                            <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                            <small class="text-danger"> <?= form_error('password2'); ?></small>
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
        $('#dataTableuserpelanggan').DataTable({
            "ajax": {
                "url": "<?= base_url(); ?>Menu/getUserpelanggan",
            },
            "columns": [{
                    "data": "id_pelanggan",
                    "render": function(data, type, row) {
                        return `<a href="<?php base_url(); ?> edituserpelanggan/${data}" class="btn btn-primary btn-sm">edit</a>
                                        <a href="<?php base_url(); ?> hapususerpelanggan/${data}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ?');">delete</a>`;
                    }
                },
                {
                    "data": "id_pelanggan"
                },
                {
                    "data": "nama",
                }, {
                    "data": "email",
                },
                {
                    "data": "image",
                    "render": function(data, type, row) {
                        return `<img class="img-thumbnail" width="100px" height="80px" src="<?php echo base_url('./assets/img/profile/') ?>${data}">`;
                    }
                },
                {
                    "data": "nometer"
                },
            ]
        });
    });
</script>