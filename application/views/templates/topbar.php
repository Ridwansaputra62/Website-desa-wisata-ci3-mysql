<!-- ============================================================== -->
<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
 
<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
            <!-- Sidebar toggle for mobile -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                <i class="ti-menu ti-close"></i>
            </a>

            <!-- ============================================================== -->
            <!-- Dynamic Logo and Nama from user.id = 1 -->
            <!-- ============================================================== -->
            <?php
            if (!isset($user)) {
                $CI =& get_instance();
                $CI->load->model('M_User');
                $user = $CI->M_User->getUserById(9);
            }
            $logo = !empty($user['image']) ? $user['image'] : 'default.jpg';
            $nama = !empty($user['nama']) ? $user['nama'] : 'Nama Wisata';
            ?>

            <a class="navbar-brand d-flex align-items-center" href="<?= base_url('admin'); ?>">
                <!-- Logo icon -->
                <b class="logo-icon" style="margin-left: 5px;">
    <img src="<?= base_url('assets/images/users/' . $logo); ?>" alt="logo" class="light-logo rounded-circle" width="40" height="40" style="object-fit: cover;">
</b>

                <!-- Logo text -->
                <span class="logo-text text-white font-weight-bold ml-2" style="font-size: 14px;">
                    <?= $nama; ?>
                </span>
            </a>

            <!-- Toggle for mobile nav -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
               data-toggle="collapse" data-target="#navbarSupportedContent"
               aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="ti-more"></i>
            </a>
        </div>

        <!-- ============================================================== -->
        <!-- Navbar Right -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <!-- Left nav toggle -->
            <ul class="navbar-nav float-left mr-auto">
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                       data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a>
                </li>
            </ul>

            <!-- Right user profile -->
            <ul class="navbar-nav float-right">
                <li class="nav-item dropdown">
                    <!-- ✅ INI YANG DIUBAH: gambar profil pojok kanan atas -->
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic"
                       href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?= base_url('assets/images/users/user.png'); ?>" alt="user"
                             class="rounded-circle" width="31" height="31" style="object-fit: cover;">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated">
                        <div class="d-flex no-block align-items-center p-3 bg-info text-white">
                            <div class="">
                                <!-- ✅ INI TIDAK DIUBAH: gambar profil di dalam dropdown -->
                                <img src="<?= base_url('assets/images/users/' . $logo); ?>" alt="user"
                                     class="img-circle" width="60" height="60" style="object-fit: cover;">
                            </div>
                            <div class="ml-3">
                                <h5 class="mb-0 text-white"><?= $nama; ?></h5>
                                <p class="mb-0 text-white font-12"><?= $user['email']; ?></p>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('admin/profil'); ?>">
                            <i class="ti-user m-r-5 m-l-5"></i> Profile Saya
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>">
                            <i class="fa fa-power-off m-r-5 m-l-5"></i> Keluar
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->
