<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <?= $this->session->flashdata('pesan'); ?>
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Data Kontak</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                            <div class="card-body">
                               <p><a href="<?=base_url('sejarah/add_sejarah'); ?>"><button type="button" class="btn btn-success"><i class="mdi mdi-account-plus"></i> Tambah </button></a></p> 
                                <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Keterangan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $i = 1;
                                        foreach ($sejarah as $s) { ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $s['keterangan']; ?></td>
                                                <td> 
                                                 <a href="<?= base_url('sejarah/ubahSejarah/') . $s['id']; ?>"class="btn btn-primary btn-sm"><i class="mdi mdi-lead-pencil"></i> Ubah</a>
                                <a class="btn btn-danger btn-sm" href="<?= base_url('sejarah/hapusSejarah/') . $s['id']; ?>" onclick="return confirm('Kamu yakin akan menghapus Data <?= $s['id']; ?> ?');"><i class="fas fa-trash"></i> Hapus</a>
                            
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
</div>