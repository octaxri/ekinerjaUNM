<!-- SideNav slide-out button -->
<!-- <a href="#" data-activates="slide-out" class="btn btn-primary p-3 button-collapse"><i
    class="fas fa-bars"></i></a> -->

<!-- Sidebar navigation -->
<div id="slide-out" class="side-nav fixed wide sn-bg-4">
  <ul class="custom-scrollbar">
    <!-- Logo -->
    <li>
      <div class="logo-wrapper waves-light">
        <a href="#"><img src="https://mdbootstrap.com/img/logo/mdb-transparent.png" class="img-fluid flex-center"></a>
      </div>
    </li>
    <!--/. Logo -->
    <!--Social-->
    <!-- <li>
      <ul class="social">
        <li><a href="#" class="icons-sm fb-ic"><i class="fab fa-facebook-f"> </i></a></li>
        <li><a href="#" class="icons-sm pin-ic"><i class="fab fa-pinterest"> </i></a></li>
        <li><a href="#" class="icons-sm gplus-ic"><i class="fab fa-google-plus-g"> </i></a></li>
        <li><a href="#" class="icons-sm tw-ic"><i class="fab fa-twitter"> </i></a></li>
      </ul>
    </li> -->
    <!--/Social-->
    <!--Search Form-->
    <!-- <li>
      <form class="search-form" role="search">
        <div class="form-group md-form mt-0 pt-1 waves-light">
          <input type="text" class="form-control" placeholder="Search">
        </div>
      </form>
    </li> -->
    <!--/.Search Form-->
    <!-- Side navigation links -->
    <li>
      <ul class="collapsible collapsible-accordion">
        <li><a href="dashboard.html" class="collapsible-header waves-effect arrow-r"><i class="fas fa-home"></i>Dashboard</a>
        </li>
        <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-users"></i></i></i>Pegawai<i class="fas fa-angle-down rotate-icon"></i></a>
          <div class="collapsible-body">
            <ul>
              <li><a href="pegawai.html" class="waves-effect">Data Pegawai</a>
              </li>
            </ul>
          </div>
        </li>

        <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-calendar-alt"></i></i></i> E-kinerja<i class="fas fa-angle-down rotate-icon"></i></a>
          <div class="collapsible-body">
            <ul>
              <li><a href="agenda.html" class="waves-effect">Agenda</a>
              </li>
              <li><a href="laporan-harian.html" class="waves-effect">Laporan Harian</a>
              </li>
            </ul>
          </div>
        </li>
        <?php
        $jabatan = $this->session->userdata('jns_jabatan');
          if ($jabatan == 'PENGAWAS' ||  $jabatan == 'JTP PRATAMA' ||  $jabatan == 'ADMINISTRATOR') { ?>
            <li><a href="approve.html" class="collapsible-header waves-effect arrow-r"><i class="far fa-calendar-check"></i> Approve Agenda</a>
          <?php } ?>
          <li><a href="password.html" class="collapsible-header waves-effect arrow-r"><i class="fas fa-key"></i>Ubah Password</a>

      </ul>
    </li>
    <!--/. Side navigation links -->
  </ul>
  <div class="sidenav-bg rgba-blue-strong"></div>
</div>
<!--/. Sidebar navigation -->