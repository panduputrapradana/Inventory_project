<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Transaksi</title>
     <!-- Koneksi Bootstrap -->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

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
                        <h1 class="h3 mb-0 text-gray-800">Data Transaksi</h1>
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


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a class="btn btn-primary" href="<?= base_url('admin/transaksi/tambah'); ?>">Tambah</a>
                        </div>
                        <div class="container">
                            <?= $this->session->flashdata('pelanggan'); ?>
                        </div>
                        <div class="container">
                            <?= $this->session->flashdata('epelanggan'); ?>
                        </div>
                        <div class="container">
                            <?= $this->session->flashdata('hpelanggan'); ?>
                        </div>
                        <div class="container">
                            <?= $this->session->flashdata('gtransaksi'); ?>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered border-dark" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="table-secondary">
                                        <tr>
                                            <th>No</th>
                                            <th hidden>Id</th>
                                            <th>Pelanggan</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Total Bayar</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-primary text-dark">
                                        <?php 
                                        $no=1;
                                        foreach ($transaksi as $row) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td hidden><?= $row->idt; ?></td>
                                            <td><?= "@" . $row->instagram; ?></td>
                                            <td><?= $row->tgl_masuk; ?></td>
                                            <td><?= "Rp." . number_format($row->total, 0,'.','.'); ?></td>
                                            <td>
                                                <?php
                                                    if ($row->status == "belum_lunas") { ?>
                                                        <select name="status" class="badge badge-danger status">
                                                            <option value="<?= $row->idt ?>belum_lunas" selected> Belum Lunas</option>
                                                            <option value="<?= $row->idt ?>lunas"> Lunas</option>
                                                        </select>
                                                    <?php } else { ?>
                                                        <button class="btn btn-sm btn-success dropdown-toggle"> Lunas</button>
                                                    <?php } ?>
                                            </td>
                                            <td>
                                                <div class="tombol">
                                                    <a class="btn btn-danger" onclick="return confirm('Yakin Akan Menghapus Data?')" href="<?= base_url('admin/transaksi/hapus/') . $row->idt; ?>">
                                                        <ion-icon><i class="far fa-trash-alt"></i></ion-icon>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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

     <!-- Bootstrap -->
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>

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

    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.tabelkaryawan').DataTable();
        });
    </script>

    <script>
        $('.status').change(function() {
            var status = $(this).val();
            var idt = status.substr(0, 10);
            var stt = status.substr(10, 15);

            $.ajax({
                url: "<?= base_url('admin/transaksi/update_status'); ?>",
                method: "post",
                data: {
                    idt: idt,
                    stt: stt
                }
            });

            location.reload();
        });
    </script>

</body>

</html>