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
                                <button onclick="tambah();return false;" class=" btn btn-default btn-sm float-right" style="margin-top: 0px;"><i class="fas fa-plus-circle" style="margin-right: 5px; margin-left: -10px;"></i> Tambah Data</button>
                            </h5>
                            <hr>
                        </div>

                        <div class="col-lg-12" style="overflow-x: auto;">
                            <table id="datable_2" class="table table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th width='5%'>No.</th>
                                        <th width='10%'>Laporan</th>
                                        <th width='10%'>Tanggal</th>
                                        <th width='10%'>Agenda</th>
                                        <th width='10%'>Deskripsi</th>
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
    <section id="input" class="card card-cascade narrower mb-5">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-12" style="overflow-x: auto;">
                            <h5 class="card-title"><a><span id="judul">Tambah</span> <?= $content; ?> </a>
                            </h5>
                            <hr>
                        </div>
                        <form id="form">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="md-form form-group">
                                        <input type="hidden" class="form-control" id="id_laporan" name="id_laporan" value=<?= $id; ?>>
                                        <input type="text" class="form-control" id="laporan" name="laporan" placeholder="Laporan">
                                        <label for="laporan">Laporan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="md-form form-group">
                                        <select class="mdb-select md-form" id="agenda" name="agenda" searchable="Search here..">
                                            <option id="agenda" value="" selected disabled>Pilih Agenda</option>
                                            <?php
                                            $nip = $this->session->userdata('nip');
                                            $query = $this->db->query("SELECT * FROM t_agenda WHERE nip = $nip AND approval = 1");
                                            foreach ($query->result() as $list) { ?>
                                                <option value="<?= $list->id_agenda; ?>"><?= $list->agenda . " - Tanggal: " . date("d-m-Y", strtotime($list->tanggal)); ?> </option>;
                                            <?php }
                                            ?>
                                        </select>
                                        <label class="mdb-main-label">Pilih Agenda <span style="color: red"> (*Hanya untuk agenda yang telah distujui)</span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Material input -->
                                    <div class="md-form">
                                        <input placeholder="Tanggal" type="text" id="tgl" name="tgl" class="form-control datepicker">
                                        <label for="tgl">Tanggal</label>
                                    </div>
                                    <!-- <div class="md-form form-group">
                                        <input type="text" class="form-control" id="tgl" name="tgl" placeholder="Tanggal">
                                        <label for="tanggal">Tanggal</label>
                                    </div> -->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Material input -->
                                    <div class="md-form form-group">
                                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi">
                                        <label for="deskripsi">Deskripsi</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <!-- Material input -->
                                    <!-- <div class="md-form form-group">
                                        <input type="file" class="form-control" id="file" name="file" onchange="return fileValidation()">
                                        <label for="file">File</label>
                                    </div> -->
                                    <div class="file-upload-wrapper">
                                        <label for="file">Upload File</label><br>
                                        <input type="file" id="file" name="file" onchange="return fileValidation()" class="file-upload">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mt-4" id="imagePreview" style='width:350px;'></div>
                                </div>
                            </div>
                            <br>
                            <button onclick="simpan1();return false;" id="simpan" class="btn btn-default btn-md " style="margin-right: -5px">Simpan</button>
                            <button onclick="batal1();return false;" id="batal" class="btn btn-warning btn-md">Batal</button>
                    </div>
                    </form>
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
    })

    function tabel() {
        $('#input').hide();
        $('#datable_2').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "get-data-laporan",
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
                    "data": "laporan",
                    "className": "text-left"
                },
                {
                    "data": "tanggal",
                    "className": "text-left"
                },
                {
                    "data": "agenda",
                    "className": "text-left"
                },
                {
                    "data": "deskripsi",
                    "className": "text-left"
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
                "targets": [0, 5, 6], //first column / numbering column
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
        $('#id_laporan').val(kd_form);

        $.ajax({
            type: "POST",
            dataType: "json",
            data: ({
                tabel: 't_laporan',
                kd_form,
                where: 'id_laporan'
            }),
            url: "laporan-detail.html",

            success: function(data) {
                $('#laporan').val(data.laporan);
                $('#deskripsi').val(data.deskripsi);
                $('#tgl').val(data.tanggal);
                $('#agenda').val(data.id_agenda);

                if (data.file != '' && data.file != null) {
                    $('#imagePreview').html("<img src='<?= base_url() ?>assets/file/" + data.file + "' style='width:250px;'>");
                } else {
                    $('#file').val('');
                    $('#imagePreview').html("");
                    $('#info').hide();
                }
                $('#input').show(300);
                $('#list').hide(300);
            }
        })
    }

    function simpan1() {

        if ($('#laporan').val() == "") {
            swal('Gagal', 'Laporan masih kosong', "error");
            return false;
        }
        if ($('#agenda :selected').val() == "") {
            swal('Gagal', 'Agenda Masih Kosong', "error");
            return false;
        }
        if ($('#tgl').val() == "") {
            swal('Gagal', 'Tanggal masih kosong', "error");
            return false;
        }
        if ($('#imagePreview').html() == "") {
            swal('Gagal', 'File masih kosong', "error");
            return false;
        }

        var formData = new FormData($('#form')[0]);
        $.ajax({
            type: "POST",
            url: 'simpan-laporan',
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
        $('#file').val('');
        $('#imagePreview').html("");
        $('#info').hide();
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
                        tabel: 't_laporan',
                        kd_form,
                        where: 'id_laporan'
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

    function fileValidation() {
        var fileInput = document.getElementById('file');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.pdf)$/i;
        var imageExtensions = /(\.jpg|\.jpeg|\.png)$/i;
        var fu = $('#file');
        var lengths = fu[0].files.length;
        var items = fu[0].files;
        var frag = "";

        if (lengths > 0) {
            for (var i = 0; i < lengths; i++) {
                var fileSize = items[0].size;
            }

            //alert(fileSize);
            if (!allowedExtensions.exec(filePath)) {
                swal('Gagal', 'File yang bisa diupload hanya file dengan ekstensi .jpeg/.jpg/.png/.pdf saja', "error");
                // alert('File yang bisa diupload hanya file dengan ekstensi .jpeg/.jpg/.png/.pdf saja');
                fileInput.value = '';
                return false;
            } else if (fileSize > 524000) {
                swal('Gagal', 'Ukuran file maksimal 500KB, Mohon kecilkan file anda!', "error");
                // alert('Ukuran file maksimal 1 MB, Mohon kecilkan file anda!');
                fileInput.value = '';
                fu.value = '';
                document.getElementById('imagePreview').innerHTML = ' ';
                return false;
            } else {
                //Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        if (!imageExtensions.exec(filePath))
                            document.getElementById('imagePreview').innerHTML = '<embed src="' + e.target.result + '" type="application/pdf" width="50%" height="500px" /> ';
                        else
                            document.getElementById('imagePreview').innerHTML = '<img src="' + e.target.result + '" style="max-height: 250px;"/> ';
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }
    }
</script>