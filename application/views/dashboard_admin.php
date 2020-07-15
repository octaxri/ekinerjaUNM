<div class="container-fluid">
  <section class="card card-cascade narrower mb-5">
    <div style="height: 70vh">
      <div class="flex-center flex-column">
        <h1 class="text-hide animated fadeIn mb-4" style="background-image: url('https://mdbootstrap.com/img/logo/mdb-transparent-250px.png'); width: 250px; height: 90px;">MDBootstrap</h1>
        <h5 class="animated fadeIn mb-3">Thank you for using our product. We're glad you're with us.</h5>
        <p class="animated fadeIn text-muted">MDB Team</p>
      </div>
    </div>
  </section>
</div>

<!-- jQuery -->
<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
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
<!-- toast -->
<script src="<?php echo base_url(); ?>assets/toast-master/js/jquery.toast.js"></script>
<!-- sweetalert2 -->
<script src="<?php echo base_url(); ?>assets/sweetalert/sweetalert2.all.min.js"></script>
<!-- Your custom scripts (optional) -->
<script type="text/javascript"></script>

<script>
  $(document).ready(function() {
    // SideNav Button Initialization
    $(".button-collapse").sideNav();
    // SideNav Scrollbar Initialization
    var sideNavScrollbar = document.querySelector('.custom-scrollbar');
    var ps = new PerfectScrollbar(sideNavScrollbar);

  });
</script>