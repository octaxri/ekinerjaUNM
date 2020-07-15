<!DOCTYPE html>
<html lang="en">
<!-- head -->
<?php $this->load->view("layout/head.php"); ?>
<!-- head -->

<body class="fixed-sn black-skin">
  <!--Main Navigation-->
  <header>

    <!-- navbar -->
    <?php $this->load->view("layout/navbar.php"); ?>
    <!-- navbar -->
    <!-- sideNav -->
    <?php $this->load->view("layout/sidenav.php"); ?>
    <!-- sideNav -->

  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main>
    <?php $this->load->view($page); ?>
  </main>
  <!--Main layout-->


  <!--Footer-->
  <?php $this->load->view("layout/footer.php"); ?>
  <!--Footer-->
  <div class="modal2">
    <!-- Place at bottom of page -->
  </div>
  <!-- js -->
  <?php $this->load->view("layout/js.php"); ?>
  <!-- js -->
</body>

</html>