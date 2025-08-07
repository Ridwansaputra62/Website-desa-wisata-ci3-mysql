<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <?= $this->session->flashdata('pesan'); ?>
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Data Pesan</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Subjek</th>
                                                <th>Pesan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $i = 1;
                                        foreach ($pesan as $p) { ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $p['nama']; ?></td>
                                                <td><?= $p['email']; ?></td>
                                                <td><?= $p['subjek']; ?></td>
                                                <td><?= $p['pesan']; ?></td>
                                                <td> 
                                                <a href="mailto:<?= $p['email']; ?>?subject=Balasan%20dari%20Admin%20Desa%20Wisata&body=Halo%20<?= $p['nama']; ?>%2C%0D%0A%0D%0AMenjawab%20pesan%20Anda%20tentang%3A%20<?= rawurlencode($p['pesan']); ?>%0D%0A%0D%0A"class="btn btn-success btn-sm"><i class="mdi mdi-email-outline"></i> </a>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
</div>