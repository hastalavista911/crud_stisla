<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?php echo $this->config->item('site_name'); ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/health.png') ?>" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="<?= base_url('assets/sweetalert/sweetalert.css'); ?>">
    <script src="<?php echo base_url('assets/sweetalert/sweetalert.min.js') ?>"></script>
    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <!-- Clock picker -->
    <link href="<?php echo base_url('assets/css/plugins/clockpicker/clockpicker.css') ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/js/plugins/clockpicker/clockpicker.js') ?>"></script>
    <!-- Date picker -->
    <link href="<?php echo base_url('assets/css/plugins/datepicker/datepicker3.css') ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/js/plugins/datepicker/bootstrap-datepicker.js') ?>"></script>
    <!-- Select2 -->
    <link href="<?php echo base_url('assets/css/plugins/select2/select2.min.css') ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/js/plugins/select2/select2.min.js') ?>"></script>
    <!-- Ionicons -->
    <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/components.css'); ?>">
    <!-- Datatable print -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

</head>

<body>
    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata("success") ?>"></div>
    <div class="flash-data_error" data-flashdata="<?php echo $this->session->flashdata("error") ?>"></div>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?php echo base_url('./assets/img/avatar/avatar-1.png'); ?>"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi,
                                <?php echo $this->session->userdata('username') ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title text-center">
                                <a href="<?php echo base_url("login/doLogout"); ?>"
                                    class="btn btn-sm btn-primary">Logout <i class="fas fa-sign-out-alt"></i></a>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <img width="90" alt="image" src="<?php echo base_url('assets/img/logoipsum.png'); ?>"
                            class="rounded-circle">
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="#">APP</a>
                    </div>
                    <ul class="sidebar-menu" style="margin-top: 30px;">
                        <?php $menu = $this->uri->segment('1'); $submenu = $this->uri->segment('2');?>
                        <li class="menu-header">Dashboard</li>
                        <li <?php if($menu == "dashboard"){ echo "class='active'";} ?>>
                            <a class="nav-link" href="<?php echo base_url('dashboard') ?>"><i
                                    class="fas fa-chart-line"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <?php if($this->session->userdata('role')){ ?>
                        <li class="menu-header">Master</li>
                        <?php
                            $class = "nav-item dropdown";
                            if($menu == "user"){
                            $class = "nav-item dropdown active";
                            }
                        ?>
                        <li class="<?php echo $class ?>">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-database"></i>
                                <span>Master</span></a>
                            <ul class="dropdown-menu">
                                <?php if($this->session->userdata('role') == 1){ ?>
                                <li <?php if($menu == "user"){ echo "class='active'";} ?>>
                                    <a class="nav-link" href="<?php echo base_url('user') ?>">
                                        <span>User Management</span>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
                    </ul>
                </aside>
            </div>

            <!-- content in here -->
            <?php echo $contents; ?>
            <!-- /content in here -->
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; YOUR APP 2022
                </div>
                <div class="footer-right">
                    V1.0
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="<?php echo base_url('assets/js/stisla.js'); ?>"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="<?php echo base_url('assets/js/scripts.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>

    <!-- Page Specific JS File -->
    <script>
    $(document).ready(function() {
        const flashData = $('.flash-data').data('flashdata');
        // alert(flashData);
        if (flashData != "") {
            swal({
                title: '' + flashData,
                text: 'Success',
                type: 'success'
            });
        } else {

        }
    });
    </script>

    <script>
    $(document).ready(function() {
        const flashData = $('.flash-data_error').data('flashdata');
        // alert(flashData);
        if (flashData != "") {
            swal({
                title: '' + flashData,
                text: 'Failed',
                type: 'error'
            });
        } else {

        }
    });
    </script>

    <script>
    function checkPasswordMatch() {
        var password = $("#new_pwd").val();
        var confirmPassword = $("#conf_pwd").val();
        if (password != confirmPassword)
            $("#CheckPasswordMatch").html("Passwords does not match!");
        else
            $("#CheckPasswordMatch").html("Passwords match.");
    }
    $(document).ready(function() {
        $("#conf_pwd").keyup(checkPasswordMatch);
    });
    </script>

<script>
    function convertDateindo(string) {
        bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober',
            'November', 'Desember'
        ];

        date = string.split(" ")[0];
        time = string.split(" ")[1];

        tanggal = date.split("-")[2];
        bulan = date.split("-")[1];
        tahun = date.split("-")[0];

        // return tanggal + " " + bulanIndo[Math.abs(bulan)] + " " + tahun + " - " + time.split(":")[0] + ":" + time.split(
        //     ":")[1];
        return tanggal + " " + bulanIndo[Math.abs(bulan)] + " " + tahun;
    }
</script>
</body>

</html>