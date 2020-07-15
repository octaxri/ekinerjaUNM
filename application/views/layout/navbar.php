<nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">

    <!-- SideNav slide-out button -->
    <div class="float-left">
        <a href="#" data-activates="slide-out" class="button-collapse">
            <i class="fas fa-bars"></i>
        </a>
    </div>
    <div class="breadcrumb-dn mr-auto">
        <p><?= $this->config->item("nama_sistem"); ?></p>
    </div>
    <!-- Links -->
    <ul class="nav navbar-nav nav-flex-icons ml-auto">
        <!-- <li class="nav-item">
        <a class="nav-link">
            <i class="fas fa-envelope"></i>
            <span class="clearfix d-none d-sm-inline-block">Contact</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link">
            <i class="fas fa-cog"></i>
            <span class="clearfix d-none d-sm-inline-block">Settings</span>
        </a>
    </li> -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i>
                <span class="clearfix d-none d-sm-inline-block"><?= $this->session->userdata('nama'); ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="password.html"><i class="fas fa-key"></i> Ubah Password</a>
                <a onclick="logout();return false;" class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </li>
    </ul>
</nav>

<script>
    function logout() {
        Swal({
            title: "Success..",
            text: 'Anda Berhasil Logout..',
            type: 'success',
            position: 'top',
            showConfirmButton: false,
        })
        location.href = "logout.html";
    }
</script>