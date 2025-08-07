
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('assets/');?>images/iconadmin.png">
    <title>Desa Wisata</title>
    <!-- Custom CSS -->
      <link rel="stylesheet" type="text/css" href="<?=base_url('assets/');?>libs/select2/dist/css/select2.min.css">
    <link href="<?=base_url('assets/');?>libs/flot/css/float-chart.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?=base_url('assets/');?>dist/css/style.min.css" rel="stylesheet">
     <link href="<?=base_url('assets/');?>libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
     

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
    /* Sticky Topbar */
    
    .topbar {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1040;
        height: 56px;
        background: linear-gradient(90deg, #0f172a, #1e293b);
    }

    /* Sticky Sidebar */
    .left-sidebar {
        position: fixed;
        top: 15px; /* tinggi topbar */
        left: 0;
        height: calc(100% - 56px);
        width: 250px;
        overflow-y: auto;
        background-color: #1e293b;
        z-index: 1030;
    }

    /* Main Page Wrapper */
    .page-wrapper {
        margin-left: 250px;
        padding-top: 70px;
        background-color: #f8fafc;
        min-height: 100vh;
    }

    /* Mini Sidebar Support */
    .mini-sidebar .left-sidebar {
        width: 80px;
    }

    .mini-sidebar .page-wrapper {
        margin-left: 80px;
    }

    /* Topbar Link Adjustments */
    .navbar .nav-link {
        color: #fff !important;
    }

    .navbar .dropdown-menu {
        border-radius: 8px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }
    
</style>

</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">