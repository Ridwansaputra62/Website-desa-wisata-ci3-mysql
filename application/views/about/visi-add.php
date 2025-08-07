<!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <?= $this->session->flashdata('pesan'); ?>
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
                    <div class="col-md-9">
                        <div class="card">
                            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>
                            <form class="form-horizontal" action="<?=base_url('visi/simpan_visi'); ?>" method="post">
                                <div class="card-body">
                                    <h4 class="card-title">Visi Info</h4>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Visi</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="fname" name="visi" placeholder="Tuliskan Visi Desa" rows=5></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Misi</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="fname" name="misi" placeholder="Tuliskan Misi Desa" rows=15></textarea>
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