<?php
// $nip = 0;
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
    <section id="input" class="card card-cascade narrower mb-5">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <!-- Card content -->
                    <div class="card-body">
                        <div class="col-lg-12" style="overflow-x: auto;">
                            <h5 class="card-title"><a><?= $content; ?> </a>
                            </h5>
                            <hr>
                        </div>
                        <form id="form">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Material input -->
                                    <div class="md-form form-group">
                                        <input type="hidden" class="form-control" id="nip" name="nip" value="<?= $nip; ?>">
                                        <input type="password" class="form-control" id="passwordLama" name="passwordLama" placeholder="Password Lama" onKeyUp="return checkPassword()">
                                        <label for="passwordLama">Password Lama</label>
                                    </div>
                                    <label id='notifPassLama' style="font-size:15px; color:red; font-size: 12px; display: none;"><strong>Password Lama Tidak Sesuai.</strong></label>
                                </div>

                                <div class="col-md-12">
                                    <!-- Material input -->
                                    <div class="md-form form-group">
                                        <input type="password" class="form-control" id="passwordBaru" name="passwordBaru" placeholder="Password Baru">
                                        <label for="passwordBaru">Password Baru</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <!-- Material input -->
                                    <div class="md-form form-group">
                                        <input type="password" class="form-control" id="konfirmasiPassword" name="konfirmasiPassword" placeholder="Konfirmasi Password" onKeyUp="return confirmPassword()">
                                        <label for="konfirmasiPassword">Konfirmasi Password</label>
                                    </div>
                                    <label id='notifPassBaru' style="font-size:15px; color:red; font-size: 12px; display: none;"><strong>Password Tidak Sesuai.</strong></label>
                                </div>
                            </div>
                            <br>
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
    var password = '<?= $password; ?>';

    function checkPassword() {
        var passwordLama = document.getElementById("passwordLama").value;
        var notifPassLamaa = document.getElementById("notifPassLama");
        if (passwordLama == password) {
            notifPassLamaa.innerHTML = 'Password Lama sesuai';
            notifPassLamaa.style.display = 'block';
            notifPassLamaa.style.color = 'green';
        } else {
            notifPassLamaa.innerHTML = 'Password Lama Tidak Sesuai';
            notifPassLamaa.style.display = 'block';
            notifPassLamaa.style.color = 'red';
        }
        return false;
    }

    function confirmPassword() {
        var passwordBaru = document.getElementById("passwordBaru").value;
        var konfirmasiPassword = document.getElementById("konfirmasiPassword").value;
        var notifPassBaru = document.getElementById("notifPassBaru");
        if (konfirmasiPassword == passwordBaru) {
            notifPassBaru.innerHTML = 'Password Sesuai';
            notifPassBaru.style.display = 'block';
            notifPassBaru.style.color = 'green';
        } else {
            notifPassBaru.innerHTML = 'Password Tidak Sesuai';
            notifPassBaru.style.display = 'block';
            notifPassBaru.style.color = 'red';
        }
        return false;
    }

    function batal() {
        document.getElementById("passwordBaru").value = '';
        document.getElementById("konfirmasiPassword").value = '';
        document.getElementById("passwordLama").value = '';
        return false;
    }

    // function simpan() {
    //     var form = document.getElementById("formPassword");
    //     var passwordBaru = document.getElementById("passwordBaru").value;
    //     var konfirmasiPassword = document.getElementById("konfirmasiPassword").value;
    //     var notifPassBaru = document.getElementById("notifPassBaru");
    //     if (konfirmasiPassword == passwordBaru) {
    //         form.submit();
    //     } else {
    //         alert(
    //             'Konfirmasi Password Salah',
    //         );
    //     }
    // }

    function simpan1() {

        if ($('#passwordLama').val() == "") {
            swal('Gagal', 'Password Lama masih kosong', "error");
            return false;
        }
        if ($('#passwordBaru').val() == "") {
            swal('Gagal', 'Password Baru masih kosong', "error");
            return false;
        }
        if ($('#konfirmasiPassword').val() == "") {
            swal('Gagal', 'Konfirmasi Password masih kosong', "error");
            return false;
        }


        var formData = new FormData($('#form')[0]);
        $.ajax({
            type: "POST",
            url: 'simpan-password',
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
                    });
                } else {
                    swal('Gagal', data.message, "error");
                }
            }
        });
    }
</script>