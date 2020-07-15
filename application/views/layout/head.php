<head>
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