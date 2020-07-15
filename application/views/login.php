<html>

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $this->config->item("nama_sistem"); ?></title>
    <!-- MDB icon -->
    <link rel="icon" href="<?= base_url(); ?>assets/img/mdb-favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/mdb.min.css">
    <!-- DataTables CSS -->
    <link href="<?= base_url(); ?>assets/css/addons/datatables.min.css" rel="stylesheet">
    <!-- DataTables JS -->
    <script href="<?= base_url(); ?>assets/js/addons/datatables.min.js" rel="stylesheet"></script>

    <!-- DataTables Select CSS -->
    <link href="<?= base_url(); ?>assets/css/addons/datatables-select.min.css" rel="stylesheet">
    <style>
        /* loading */
        .modal2 {
            display: none;
            position: fixed;
            z-index: 1000;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: rgba(255, 255, 255, .8) url('<?= base_url(); ?>assets/loading/loadingmd.gif') 50% 50% no-repeat;
        }

        /* When the body has the loading class, we turn
             the scrollbar off with overflow:hidden */
        body.loading {
            overflow: hidden;
        }

        /* Anytime the body has the loading class, our
             modal element will be visible */
        body.loading .modal2 {
            display: block;
        }

        /* loading */
    </style>
    <script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.min.js"></script>

    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
</head>

<body class="fixed-sn black-skin">
    <header>
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark dark-color  mr-auto">

            <!-- Navbar brand -->
            <a class="navbar-brand" href="#"><strong>E-Kinerja</strong> - Universitas Negeri Makassar</a>

            <!-- Collapse button
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->

            <!-- Collapsible content -->
            <div class="nav navbar-nav nav-flex-icons ml-auto">

                <!-- Links -->
                <ul class="navbar-nav mr-auto">
                    <!-- <li class="nav-item active">
                        <a class="nav-link" href="#">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li> -->

                    <!-- Dropdown -->
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li> -->

                </ul>
                <!-- Links -->

                <div class="navbar-nav">
                    <div class="nav-item">
                        <a class="nav-link" href="" class="btn btn-default btn-rounded" data-toggle="modal" data-target="#fullHeightModalRight"><i class="fas fa-sign-in-alt"></i><strong>Login</strong></a>
                    </div>
                </div>
            </div>
            <!-- Collapsible content -->

        </nav>
        <!--/.Navbar-->
    </header>

    <!-- <main> -->
    <!-- <h1>hallo</h1> -->
    <div class="container-fluid">
        <section class="card card-cascade narrower mb-5">
            <div style="height: 75vh">
                <div class="flex-center flex-column">
                    <h1 class="text-hide animated fadeIn" style="background-image: url('https://mdbootstrap.com/img/logo/mdb-transparent-250px.png'); width: 250px; height: 90px;">MDBootstrap</h1>
                    <h5 class="animated fadeIn mb-3">Thank you for using our product. We're glad you're with us.</h5>
                    <p class="animated fadeIn text-muted">MDB Team</p>
                </div>
            </div>
        </section>
    </div>
    <!-- </main> -->
    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#fullHeightModalRight">
        Launch demo modal
    </button> -->

    <!-- Full Height Modal Right -->
    <div class="modal fade right" id="fullHeightModalRight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
        <div class="modal-dialog modal-full-height modal-right" role="document">


            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-90" id="myModalLabel">Login E-Kinerja</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-footer justify-content-center">
                        <img width="200px" src="<?= base_url(); ?>assets/img/unm.jpg" class="  justify-content-center rounded-circle img-responsive">
                    </div>
                    <hr>
                    <p class="mt-4">Silahkan Masukkan Username dan Password</p>
                    <div class="md-form ml-0 mr-0">
                        <input type="text" type="text" id="username" class="form-control form-control-sm">
                        <label for="username">Username</label>
                    </div>
                    <div class="md-form ml-0 mr-0">
                        <input type="password" type="text" id="password" class="form-control form-control-sm">
                        <label for="password">Password</label>
                    </div>
                    <!-- <div class="text-center mt-4">
                        <button class="btn btn-dark mt-1" onclick="cek_login();return false;">Login <i class="fas fa-sign-in ml-1"></i></button>
                    </div> -->
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-dark" onclick="cek_login();return false;">Login</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <!-- Full Height Modal Right -->

    <div class="modal fade right m-t-100" id="modalLoginAvatar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-side modal-top-right cascading-modal modal-avatar modal-sm" role="document">
            <!--Content-->
            <div class="modal-content">

                <!--Header-->
                <div class="modal-header">
                    <img width="5px" src="<?= base_url(); ?>assets/img/unm.jpg" alt="avatar" class="rounded-circle img-responsive">
                </div>
                <!--Body-->
                <div class="modal-body text-center mb-1">

                    <h5 class="mt-1 mb-2">Login BKD</h5>

                    <div class="md-form ml-0 mr-0">
                        <input type="text" type="text" id="username" class="form-control form-control-sm">
                        <label for="username">Username</label>
                    </div>
                    <div class="md-form ml-0 mr-0">
                        <input type="password" type="text" id="password" class="form-control form-control-sm">
                        <label for="password">Password</label>
                    </div>
                    <div class="text-center mt-4">
                        <button class="btn btn-dark mt-1" onclick="cek_login();return false;">Login <i class="fas fa-sign-in ml-1"></i></button>
                    </div>
                </div>

            </div>
            <!--/.Content-->
        </div>
    </div>
    <div class="modal2">
        <!-- Place at bottom of page -->
    </div>
    <!-- Copyright -->
    <div style="color:white;" class="footer-copyright text-center py-3 bg-dark">© <script>
            document.write(new Date().getFullYear())
        </script> Copyright:
        <a style="color:white;" href=" http://ict.unm.ac.id/"><?= $this->config->item("nama_lembaga"); ?></a>
    </div>
    <!-- Copyright -->
    <footer>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="<?= base_url(); ?>assets/js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="<?= base_url(); ?>assets/js/mdb.min.js"></script>
        <!-- MDBootstrap Datatables  -->
        <script type="text/javascript" src="<?= base_url(); ?>assets/js/addons/datatables.min.js"></script>
        <!-- DataTables Select JS -->
        <script href="<?= base_url(); ?>assets/js/addons/datatables-select.min.js" rel="stylesheet"></script>

        <script src="<?php echo base_url(); ?>assets/toast-master/js/jquery.toast.js"></script>
        <script src="<?php echo base_url(); ?>assets/sweetalert/sweetalert2.all.min.js"></script>
        <script type="text/javascript">
            function cek_login() {
                var username = $('#username').val();
                var password = $('#password').val();
                if (username == "") {
                    swal('Gagal', 'Username masih kosong', "error");
                    return false;
                }
                if (password == "") {
                    swal('Gagal', 'Password masih kosong', "error");
                    return false;
                }
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    data: ({
                        username,
                        password
                    }),
                    url: "login-action.html",
                    success: function(data) {
                        status = data['status'];
                        group = data['group'];
                        if (status == 1 && group == "admin") {
                            Swal({
                                title: "Success..",
                                text: 'Anda Berhasil Login..',
                                type: 'success',
                                position: 'top',
                                showConfirmButton: false,
                            })
                            window.location.href = "dashboard-admin.html"
                        } else if (status == 2 && group == "pegawai") {
                            Swal({
                                title: "Success..",
                                text: 'Anda Berhasil Login..',
                                type: 'success',
                                position: 'top',
                                showConfirmButton: false,
                            })
                            window.location.href = "dashboard.html"
                        } else {
                            swal('Gagal Login', 'Username / password salah', "error");
                        }
                    }
                })
            };
        </script>
        <script>
            $body = $("body");
            $(document).on({
                ajaxStart: function() {
                    $body.addClass("loading");

                },
                ajaxStop: function() {
                    $body.removeClass("loading");
                }

            });
        </script>
    </footer>
</body>

</html>