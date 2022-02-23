<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tambah Pelanggan</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/admin/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/admin/') ?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/logo/dpn.png'); ?>" type="image/x-icon">

    <!-- Custom styles for this page -->
    <link href="<?= base_url('assets/admin/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->

        <?php $this->load->view('admin/sidebar/sidebar') ?>

        <!-- End Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline navbar-search">
                        <div class="input-group">
                           <div class="d-sm-flex align-items-center justify-content-between">
                        <h1 class="h3 mb-0 text-gray-800">Tambah Pelanggan</h1>
                    </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                       
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('nama'); ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?= base_url('assets/') ?>logo/pict.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" onclick="return confirm('Apakah Anda Akan Logout?');" href="<?= base_url('admin/home/keluar'); ?>">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    
                    <!-- Content --> <!-- Content --> <!-- Content --> <!-- Content --> <!-- Content -->


                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Silahkan Isi Form!</h1>
                                        </div>
                                        <form class="user" action="<?= base_url(); ?>admin/pelanggan/simpan" method="post" enctype="multipart/form-data">
                                            <div class="input-group mb-3" hidden>
                                                <input type="text" class="form-control form-control-user" name="id" id="exampleInputEmail"
                                                placeholder="ID">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fab fa-fw fa-instagram"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control form-control-user" name="instagram" id="exampleInputEmail"
                                                placeholder="Masukkan Username Instagram (Tanpa (@)) (Wajib diisi)" value="<?php echo set_value('instagram'); ?>">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fab fa-fw fa-instagram"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php echo form_error('instagram', '<small class="text-danger pl-1">', '</small>'); ?>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control form-control-user" name="facebook" id="exampleInputEmail"
                                                placeholder="Masukkan Nama Facebook (Opsional)" value="<?php echo set_value('facebook'); ?>">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fab fa-fw fa-facebook"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php echo form_error('facebook', '<small class="text-danger pl-1">', '</small>'); ?>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control form-control-user" name="nama" id="exampleInputEmail"
                                                placeholder="Masukkan Nama Lengkap (Wajib diisi)" value="<?php echo set_value('nama'); ?>">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-fw fa-user"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php echo form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control form-control-user" name="telepon" id="exampleInputEmail"
                                                placeholder="Masukkan Nomor Telepon/Whatsapp (Opsional)" value="<?php echo set_value('telepon'); ?>">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fab fa-fw fa-whatsapp"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php echo form_error('telepon', '<small class="text-danger pl-1">', '</small>'); ?>
                                            <div class="row justify-content-between">
                                                <div class="col-md-4">
                                                    <a href="<?= base_url('admin/pelanggan'); ?>" class="btn btn-danger btn-user btn-block">
                                                        Batal
                                                    </a>
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content --> <!-- Content --> <!-- Content --> <!-- Content --> <!-- Content -->


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            
            <?php $this->load->view('admin/footer/footer'); ?>

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/admin/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/admin/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/admin/') ?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/admin/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/admin/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/admin/') ?>js/demo/datatables-demo.js"></script>

</body>

</html>