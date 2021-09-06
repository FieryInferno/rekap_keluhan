<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-6" style="max-width: 650px;">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Edit profile</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
                <div class="row no-gutters">
                    <div class="col-md">
                        <div class="card-body">
                            <form action="<?php echo base_url('menu/edituser/' . $kelolauser['id_karyawan']) ?>" method="POST" role="form" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $kelolauser['id_karyawan']; ?>">

                                <div class="form-group row">
                                    <label for="emaid_karyawanil" class="col-sm-2 col-form-label">id karyawan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="id_karyawan" name="id_karyawan" value="<?= $kelolauser['id_karyawan']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="email" name="email" value="<?= $kelolauser['email']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Full name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name" value="<?= $kelolauser['name']; ?>">
                                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $kelolauser['jabatan']; ?>">
                                        <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">Picture</div>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="<?= base_url('assets/img/profile/') . $kelolauser['image']; ?>" class="img-thumbnail">
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="image" name="image">
                                                    <label class="custom-file-label" for="image">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->