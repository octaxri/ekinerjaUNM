<!DOCTYPE html>
<html lang="en">
<!-- head -->
<?php $this->load->view("layout_admin/head.php"); ?>
<!-- head -->

<body class="fixed-sn black-skin">
  <!--Main Navigation-->
  <header>

    <!-- navbar -->
    <?php $this->load->view("layout_admin/navbar.php"); ?>
    <!-- navbar -->
    <!-- sideNav -->
    <?php $this->load->view("layout_admin/sidenav.php"); ?>
    <!-- sideNav -->

  </header>
  <!--Main Navigation-->

  <!--Main layout_admin-->
  <main>
    <?php $this->load->view($page); ?>
  </main>
  <!--Main layout_admin-->


  <!--Footer-->
  <?php $this->load->view("layout_admin/footer.php"); ?>
  <!--Footer-->
  <div class="modal2">
    <!-- Place at bottom of page -->
  </div>
  <!-- js -->
  <?php $this->load->view("layout_admin/js.php"); ?>
  <!-- js -->
</body>

</html>