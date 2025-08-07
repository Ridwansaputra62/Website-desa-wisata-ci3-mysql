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
                        <h4 class="page-title">Update User</h4>
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
                    <div class="col-md-9">
                        <div class="card">
                             <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
                            <?= $this->session->flashdata('pesan'); ?>
            <?php foreach ($pengguna as $p) { ?>
                            <form class="form-horizontal" action="<?=base_url('user/ubahUser'); ?>" method="post">
                                <div class="card-body">
                                    <h4 class="card-title">Personal Info</h4>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-9">
                                            <input type="hidden" name="id" id="id" value="<?php echo $p['id']; ?>">
                                            <input type="text" class="form-control" id="fname" name="nama" placeholder="Nama Lengkap" value="<?= $p['nama']; ?>">
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
                                        <input type="submit" class="btn btn-primary" value="Update">
                                        <input type="button" class="btn btn-secondary" value="Kembali" onclick="window.history.go(-1)">
                                    </div>
                                </div>
                            </form>
                            <?php } ?>
                        </div>
</div>
</div>
</div>