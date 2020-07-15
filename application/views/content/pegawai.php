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
                                <!-- <button onclick="tambah();return false;" class=" btn btn-default btn-sm float-right" style="margin-top: 0px;"><i class="fas fa-plus-circle" style="margin-right: 5px; margin-left: -10px;"></i> Tambah Data</button> -->
                            </h5>
                            <hr>
                        </div>

                        <div class="col-lg-12" style="overflow-x: auto;">
                            <table id="datable_2" class="table table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th width='5%'>No.</th>
                                        <th width='10%'>Nip</th>
                                        <th width='10%'>Nama</th>
                                        <th width='10%'>jabatan</th>
                                        <th width='10%'>unit</th>
                                        <!-- <th width='10%'>Agenda</th>
                                        <th width='10%'>File</th> -->
                                        <!-- <th width='10%'>Status</th> -->
                                        <!-- <th width='10%'>Action</th> -->
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

        $('.datepicker').pickadate();
    })

    function tabel() {
        $('#input').hide();
        $('#datable_2').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "get-data-pegawai",
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
                    "data": "nip",
                    "className": "text-left"
                },
                {
                    "data": "nama",
                    "className": "text-left"
                },
                {
                    "data": "jabatan",
                    "className": "text-left"
                },
                {
                    "data": "unit",
                    "className": "text-center"
                },
            ],
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

    function edit(kd_form) {
        // $('#opsi').remove();
        $('#judul').html('Edit');
        $('#simpan').html('Simpan Perubahan');
        $('#id_rubrik').val(kd_form);

        $.ajax({
            type: "POST",
            dataType: "json",
            data: ({
                tabel: 't_agenda',
                kd_form,
                where: 'id_agenda'
            }),
            url: "master-perkuliahan-detail.html",

            success: function(data) {
                $('#rubrik').val(data.rubrik);
                // console.log(data.kategori);
                // $('#kategori').val(data.kategori);
                $('#sks').val(data.sks);
                $('#keterangan').val(data.keterangan);
                $('#rumus').val(data.rumus);
                $('#input').show(300);
                $('#list').hide(300);
            }
        })
    }

    function simpan1() {

        if ($('#rubrik').val() == "") {
            swal('Gagal', 'Rubrik Kegiatan masih kosong', "error");
            return false;
        }
        if ($('#kategori :selected').val() == "") {
            swal('Gagal', 'Jenis Rubrik masih kosong', "error");
            return false;
        }
        if ($('#sks').val() == "") {
            swal('Gagal', 'SKS masih kosong', "error");
            return false;
        }
        if ($('#rumus').val() == "") {
            swal('Gagal', 'Rumus masih kosong', "error");
            return false;
        }


        var formData = new FormData($('#form')[0]);
        $.ajax({
            type: "POST",
            url: 'simpan-rubrik-perkuliahan',
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data) {
                if (data.status == true) {
                    $('#datable_2').DataTable().ajax.reload();
                    swal({
                        title: 'Tersimpan',
                        text: data.message,
                        confirmButtonColor: '#3085d6',
                        type: "success",
                        showConfirmButton: true,
                    }).then((result) => {
                        $('#form').each(function() {
                            this.reset();
                        });
                        $('#datable_2').DataTable().ajax.reload();
                        batal1();
                    });
                } else {
                    swal('Gagal', data.message, "error");
                }
            }
        });
    }


    function tambah(stat) {
        // $('#kategori').html('<option value="" selected disabled>Pilih Jenis Rubrik</option>');
        $('#input').show(300);
        $('#list').hide(300);
        $('#info').hide();
    }

    function batal1() {
        $('#input').hide(300);
        $('#list').show(300);
        $('#form').each(function() {
            this.reset();
        });
        $('#judul').html('Tambah');
        $('#simpan').html('Simpan');
    }

    function hapus(kd_form) {
        swal({
            title: "Peringatan..",
            text: "Apakah Anda Yakin Ingin Menghapus Data Ini?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "Hapus!",
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
                    url: "hapus.html",
                    success: function(data) {
                        $('#datable_2').DataTable().ajax.reload();
                        swal(
                            'Terhapus!',
                            'Data Berhasil Di hapus..',
                            'success'
                        )
                    }
                })
            }
        })
    }
</script>