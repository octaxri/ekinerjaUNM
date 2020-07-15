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
                    <a href="<?= base_url(); ?>"><i class="fas fa-home"> </i> BKD</a>
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
                                <button onclick="tambah();return false;" class=" btn btn-default btn-sm float-right" style="margin-top: 0px;"><i class="fas fa-plus-circle" style="margin-right: 5px; margin-left: -10px;"></i> Tambah Data</button>
                            </h5>
                            <hr>
                        </div>

                        <div class="col-lg-12" style="overflow-x: auto;">
                            <table id="datable_2" class="table table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th width='5%'>No.</th>
                                        <th width='10%'>Rubrik Kegiatan</th>
                                        <th width='10%'>SKS</th>
                                        <th width='10%'>Rumus</th>
                                        <th width='10%'>Keterangan</th>
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
    <section id="input" class="card card-cascade narrower mb-5">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <!-- Card content -->
                    <div class="card-body">
                        <div class="col-lg-12" style="overflow-x: auto;">
                            <h5 class="card-title"><a><span id="judul">Tambah</span> <?= $content; ?> </a>
                            </h5>
                            <hr>
                        </div>
                        <form id="form">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Material input -->
                                    <div class="md-form form-group">
                                        <input type="hidden" class="form-control" id="id_rubrik" name="id_rubrik" value=<?= $id; ?>>
                                        <input type="text" class="form-control" id="rubrik" name="rubrik" placeholder="Rubrik Kegiatan">
                                        <label for="rubrik">Rubrik Kegiatan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <!-- Material input -->
                                    <div class="md-form form-group">
                                        <select class="mdb-select md-form" id="kategori" name="kategori" searchable="Search here..">
                                            <option id="opsi" value="" selected disabled>Pilih Jenis Rubrik</option>
                                            <?php
                                            $query = $this->db->get("mst_kategori_rubrik");
                                            foreach ($query->result() as $list) { ?>
                                                <option value="<?= $list->id_kategori_rubrik; ?>"><?= $list->kategori_rubrik; ?> </option>;
                                            <?php }
                                            ?>
                                        </select>
                                        <label class="mdb-main-label">Jenis Rubrik</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Material input -->
                                    <div class="md-form form-group">
                                        <input type="text" class="form-control" id="sks" name="sks" placeholder="SKS">
                                        <label for="sks">SKS</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Material input -->
                                    <div class="md-form form-group">
                                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan">
                                        <label for="keterangan">Keterangan</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <!-- Material input -->
                                    <div class="md-form form-group">
                                        <input type="text" class="form-control" id="rumus" name="rumus" placeholder="Rumus Perhitungan">
                                        <label for="rumus">Rumus Perhitungan</label>
                                    </div>
                                </div>
                            </div>
                            <button onclick="simpan1();return false;" id="simpan" class="btn btn-default btn-md " style="margin-right: -5px">Simpan</button>
                            <button onclick="batal1();return false;" id="batal" class="btn btn-warning btn-md">Batal</button>
                        </form>
                        <!-- Extended material form grid -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

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
                "url": "get-rubrik-pengajaran",
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
                    "data": "rubrik",
                    "className": "text-left"
                },
                {
                    "data": "sks",
                    "className": "text-left"
                },
                // {
                //     "data": "maksimal",
                //     "className": "text-center"
                // },
                {
                    "data": "rumus",
                    "className": "text-center"
                },
                {
                    "data": "keterangan",
                    "className": "text-center"
                },
                {
                    "data": "action",
                    "className": "text-center"
                },
            ],
            "columnDefs": [{
                "targets": [0, 5], //first column / numbering column
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

    function edit(kd_form) {
        $('#judul').html('Edit');
        $('#simpan').html('Simpan Perubahan');
        $('#id_rubrik').val(kd_form);

        $.ajax({
            type: "POST",
            dataType: "json",
            data: ({
                tabel: 'mst_rubrik_pengajaran',
                kd_form,
                where: 'id_rubrik'
            }),
            url: "master-pengajaran-detail.html",
            success: function(data) {
                $('#rubrik').val(data.rubrik);
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
            url: 'simpan-rubrik-pengajaran',
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
                        tabel: 'mst_rubrik_pengajaran',
                        kd_form,
                        where: 'id_rubrik'
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