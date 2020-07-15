<?php
$id = 0;
?>
<div class="container-fluid">
    <!--Section: Main panel-->
    <section class="p-b--100">
        <div class="row">
            <div class="col-sm-8">
                <h4 style="margin-bottom: 0;"><strong><?= $judul_content ?></strong></h4>
                <p class="text-muted"><?= $detail_content ?></p>
            </div>
            <div class="col-sm-4 ">
                <div class="float-right">
                    <a href="<?= base_url(); ?>"><i class="fas fa-home"> </i> E-Kinerja</a>
                    <span> / <?= $judul_content ?></span>
                </div>
            </div>
        </div>
    </section>
    <section id="list" class="card card-cascade narrower mb-5">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <!-- Card content -->
                    <div class="card-body">
                        <!-- Title -->
                        <div class="col-lg-12" style="overflow-x: auto;">
                            <h5 class="card-title"><a><?= $content; ?> </a>
                            </h5>
                            <hr>
                        </div>

                        <div class="col-lg-12" style="overflow-x: auto;">
                            <table id="datable_2" class="table table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th width='5%'>No.</th>
                                        <th width='10%'>Nama Pegawai</th>
                                        <th width='10%'>Agenda</th>
                                        <th width='10%'>Tanggal</th>
                                        <th width='10%'>Deskripsi</th>
                                        <th width='10%'>Status</th>
                                        <th width='10%'>File</th>
                                        <th width='10%'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>

</div>

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
    $(document).ready(function() {
        tabel();
        $(".button-collapse").sideNav();
        // SideNav Scrollbar Initialization
        var sideNavScrollbar = document.querySelector('.custom-scrollbar');
        var ps = new PerfectScrollbar(sideNavScrollbar);

        $('.mdb-select').materialSelect();

        $('.datepicker').pickadate({
            min: true
        });
        // $('.file-upload').file_upload();
    })

    function tabel() {
        $('#input').hide();
        $('#datable_2').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "get-approve",
                "dataType": "json",
                "type": "POST",
                "data": {
                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                }
            },
            "columns": [{
                    "data": "no",
                    "className": "text-center"
                },
                {
                    "data": "nama_pegawai",
                    "className": "text-left"
                },
                {
                    "data": "agenda",
                    "className": "text-left"
                },
                {
                    "data": "tanggal",
                    "className": "text-left"
                },
                {
                    "data": "deskripsi",
                    "className": "text-left"
                },
                {
                    "data": "status",
                    "className": "text-center"
                },
                {
                    "data": "file",
                    "className": "text-center"
                },
                {
                    "data": "action",
                    "className": "text-center"
                },
            ],
            "columnDefs": [{
                "targets": [0, 5, 6, 7], //first column / numbering column
                "orderable": false, //set not orderable
            }, ],
        });
        var table = $('#datable_2').DataTable();
        $('#datable_2 tbody').on('click', 'tr', function() {
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
            } else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
                var idx = table.cell('.selected', 0).index();
                var data = table.row(idx.row).data();
                kd_form = data.kd_form;
            }
        });
    }

    function approve(kd_form) {
        swal({
            title: "Peringatan..",
            text: "Apakah Anda Yakin Ingin Menyetujui Agenda Ini?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "Approve!",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    data: ({
                        tabel: 't_agenda',
                        kd_form,
                        where: 'id_agenda'
                    }),
                    url: "approve-agenda.html",
                    success: function(data) {
                        $('#datable_2').DataTable().ajax.reload();
                        swal(
                            'Approve!',
                            'Agenda Berhasil Disetujui..',
                            'success'
                        )
                    }
                })
            }
        })
    }

    function decline(kd_form) {
        swal({
            title: "Peringatan..",
            text: "Apakah Anda Yakin Menolak Agenda Ini?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "Decline!",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    data: ({
                        tabel: 't_agenda',
                        kd_form,
                        where: 'id_agenda'
                    }),
                    url: "decline-agenda.html",
                    success: function(data) {
                        $('#datable_2').DataTable().ajax.reload();
                        swal(
                            'Decline!',
                            'Agenda Berhasil Ditolak..',
                            'success'
                        )
                    }
                })
            }
        })
    }
</script>