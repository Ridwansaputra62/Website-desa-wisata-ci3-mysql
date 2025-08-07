<!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title"><?=$judul; ?></h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                     <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>
                    <div class="col-md-9">
                        <div class="card">
                            <form class="form-horizontal" action="<?=base_url('user/simpan'); ?>" method="post">
                                <div class="card-body">
                                    <h4 class="card-title">Personal Info</h4>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" name="nama" placeholder="Nama Lengkap">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="lname" name="email"placeholder="Alamat Email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                    <label class="col-sm-3 text-right control-label col-form-label">Role</label>
                                    <div class="col-sm-9">
                                        <select class="select2 form-control custom-select" name="role">
                                            <option>Select</option>
                                                <option value="1">Super Admin</option>
                                                <option value="2">Admin</option>
                                        </select>
                                    </div>
                                </div>

                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control"  name="password1" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Konfirmasi Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="password2" placeholder="Konfirmasi Password">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <input type="submit" class="btn btn-primary" value="Simpan">
                                        <input type="button" class="btn btn-secondary" value="Kembali" onclick="window.history.go(-1)">
                                    </div>
                                </div>
                            </form>
                        </div>
</div>
</div>
</div>