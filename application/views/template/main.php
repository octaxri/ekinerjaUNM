<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title ?></title>

    <!-- MDB icon -->
    <link rel="icon" href="<?= base_url() ?>assets/admin/img/logo.png" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/style.css">
    <!-- MDBootstrap Datatables  -->
    <link href="<?= base_url() ?>assets/admin/css/addons/datatables.min.css" rel="stylesheet">
    <!-- text editor css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/html5-editor/bootstrap-wysihtml5.css" />

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
            background: rgba(255, 255, 255, .8) url('<?= base_url(); ?>assets/admin/loading/loading.gif') 50% 50% no-repeat;
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

        .trigger {
            padding: 1px 10px;
            font-size: 12px;
            font-weight: 400;
            border-radius: 10px;
            background-color: #eee;
            color: #212121;
            display: inline-block;
            margin: 2px 5px;
        }

        .hoverable,
        .trigger {
            transition: box-shadow 0.55s;
            box-shadow: 0;
        }

        img.admin {
            height: auto;
            width: 100%;
        }

        .hoverable:hover,
        .trigger:hover {
            transition: box-shadow 0.45s;
            box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        /* loading */
        .side-nav .logo-sn {
            padding-bottom: 1rem;
            padding-top: 1rem;
        }

        .side-nav .logo-sn img {
            height: 38px;
        }

        .side-nav .search-form input[type=text] {
            margin-top: 0;
            padding-top: 12px;
            padding-bottom: 12px;
            border-top: 1px solid rgba(255, 255, 255, 0.3);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }

        body {
            background-color: #eee;
        }

        .accordion .card {
            margin-bottom: 1.2rem;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
        }

        .accordion .card .card-body {
            border-top: 1px solid #eee;
        }
    </style>
    <!-- jQuery -->
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/js/jquery.min.js"></script>
    <!-- text editor script -->
    <script src="<?= base_url() ?>assets/html5-editor/wysihtml5-0.3.0.js"></script>
    <script src="<?= base_url() ?>assets/html5-editor/bootstrap-wysihtml5.js"></script>



</head>

<body class="fixed-sn light-blue-skin">

    <!--Main Navigation-->
    <header>

        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar double-nav">

            <!-- SideNav slide-out button -->
            <div class="float-left">
                <a href="#" data-activates="slide-out" class="button-collapse">
                    <i class="fa fa-bars"></i>
                </a>
            </div>

            <!-- Breadcrumb-->
            <div class="breadcrumb-dn mr-auto">
                <p>SAPRAS UNM</p>
            </div>

            <!-- Links -->
            <ul class="nav navbar-nav nav-flex-icons ml-auto">
                <!-- <li class="nav-item">
                        <a class="nav-link">
                            <i class="fa fa-envelope"></i>
                            <span class="clearfix d-none d-sm-inline-block">Contact</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                            <i class="fa fa-gear"></i>
                            <span class="clearfix d-none d-sm-inline-block">Settings</span>
                        </a>
                    </li> -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i>
                        <span class="clearfix d-none d-sm-inline-block">Admin</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <!-- <a class="dropdown-item" href="#"></a> -->
                        <a class="dropdown-item" href="#">Ubah Password</a>
                        <hr>
                        <a class="dropdown-item" onclick="logout(); return false">Logout</a>
                    </div>
                </li>
            </ul>

        </nav>
        <!--/.Navbar-->

        <?php $this->load->view('admin/template/sidebar'); ?>

    </header>
    <!--Main Navigation-->

    <?php $this->load->view($page); ?>


    <br>
    <br>
    <!-- Footer -->
    <footer class="page-footer font-small fixed-bottom">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© <?= date('Y') ?> Copyright:
            <a href="https://mdbootstrap.com/bootstrap-tutorial/">ICT UNM</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->


    <div class="modal2">
        <!-- Place at bottom of page -->
    </div>





    <script>
        var resizefunc = [];
    </script>


    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/js/popper.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/js/mdb.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/js/bootstrap.min.js"></script>
    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="<?= base_url() ?>assets/admin/js/addons/datatables.min.js"></script>
    <!-- Sweetalert -->
    <script src="<?= base_url() ?>assets/sweertalert/sweetalert2.all.min.js"></script>
    <!-- Your custom scripts (optional) -->
    <script type="text/javascript">
        //loading
        $body = $("body");
        $(document).on({
            ajaxStart: function() {
                $body.addClass("loading");

            },
            ajaxStop: function() {
                $body.removeClass("loading");
            }

        });
        $(document).ready(function() {
            // admin
            // SideNav Button Initialization
            $(".button-collapse").sideNav();
            // SideNav Scrollbar Initialization
            var sideNavScrollbar = document.querySelector('.custom-scrollbar');
            var ps = new PerfectScrollbar(sideNavScrollbar);

        });

        // logout
        function logout() {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#f00',
                cancelButtonText: 'Batal',
                cancelButtonColor: '#D0D0D0',
                confirmButtonText: 'Ya'
            }).then((result) => {
                if (result.value) {
                    if (result.value) {
                        location.href = "<?= base_url(); ?>login/logout";
                    }
                }


            })

        }
    </script>

</body>

</html>