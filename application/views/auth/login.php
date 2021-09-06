    <div class="container">

        <!-- <div style="background-image: url('assets/img/jargas/w.jpg'); "> -->
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9" style="padding-top:6%">
                <div class="card o-hidden border-0 shadow-lg my-5" style="background-color: maroon;font-family: Arial, Helvetica, sans-serif;">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block ">
                                <img src="<?= base_url('assets/img/w.jpg'); ?>" style="width:480px;height:380px; padding-top : 20px;padding-left: 20px;padding-bottom: 10px;padding-right:5px ">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-4">
                                    <div class="text-center">
                                        <h1 class="h4 text mb-4-0" style="color: greenyellow;"><b>Login Karyawan</b></h1>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                                            <small class="text-danger"> <?= form_error('email'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                            <small class="text-danger"> <?= form_error('password'); ?></small>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block" style="font-family: Arial, Helvetica, sans-serif;color: greenyellow;"> Login
                                        </button>
                                    </form>
                                    </br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="<?php echo base_url('Home'); ?>" class="btn btn-primary btn-user btn-block" style="font-family: Arial, Helvetica, sans-serif;color: greenyellow;">Home </a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="<?php echo base_url('Auth/loginpelanggan'); ?>" class="btn btn-primary btn-user btn-block" style="font-family: Arial, Helvetica, sans-serif;color: greenyellow;">Login Pelanggan</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html" style="color:greenyellow;font-family: Arial, Helvetica, sans-serif;"><b>Forgot Password?</b></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>