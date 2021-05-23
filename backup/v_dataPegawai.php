<?php

$this->load->view('parts/header');
$this->load->view('parts/navigationManajer');

?>



<!-- Delete !-->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Warning</h4>

            </div>
            <div class="modal-body">
                <h4>Apakah anda Yakin?</h4>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok" id="btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 breadcrumb float-sm-left"><b>Data Master Pegawai</b></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Pegawai</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <?php echo $this->session->userdata('success'); ?>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12" style="margin-top: 50px;">
                    <a class="btn btn-success" id="btn-tambah">Tambah Data</a>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Responsive Hover Table</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap" id="tablePegawai">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>ID Pegawai</th>
                                        <th>ID Jabatan</th>
                                        <th>Nama Pegawai</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>Nomor Telepon</th>
                                        <th>Foto</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($dataPegawai as $data) {
                                        echo "<tr>";
                                        echo "<td>" . $i . "</td>";
                                        echo "<td class='idPeg'>" . $data['id_pegawai'] . "</td>";
                                        echo "<td class='idJabat'>" . $data['id_jabatan'] . "</td>";
                                        echo "<td class='namaPeg'>" . $data['namaPegawai'] . "</td>";
                                        echo "<td class='tgl'>" . $data['tgl_lahir'] . "</td>";
                                        echo "<td class='alm'>" . $data['alamat'] . "</td>";
                                        echo "<td class='phone'>" . $data['no_telp'] . "</td>";
                                        echo "<td class='img'><img src= " . base_url('assets/images/' . $data['foto']) . " class='img-circle elevation-2' alt='User Image' width='50'></td>";
                                        echo "<td class='namaPoto' hidden>" . $data['foto'] . "</td>";
                                    ?>

                                        <td align='left'>


                                            <button class="btn btn-warning btn-edit"><i class="fa fa-pencil"></i></button>


                                            <button class="btn btn-danger btn-del"><i class="fa fa-trash"></i></button>



                                        </td>
                                    <?php
                                        echo "</tr>";
                                        $i++;
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">

                    </div>

                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">

                </section>
                <!-- right col -->
            </div>

    </section>
    <!-- /modal -->
    <!-- Add data modal!-->

    <div class="modal fade" id="modal-insert" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Input Data Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                </div>

                <div class="modal-body">
                    <?php echo validation_errors(); ?>
                    <form method="POST" id="insert_form" enctype='multipart/form-data'>

                        <div class="row">
                            <div class="form-group">

                                <div class="col-md-6">
                                    <label for="field-2" class="control-label">User Role</label>
                                    <select class="form-select form-select-sm" id="userRole" aria-label=".form-select-sm example" name="userRole">
                                        <option selected>Pilih Role Pegawai</option>
                                        <option value="1">Manajer</option>
                                        <option value="2">Barista</option>
                                    </select>

                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="field-2" class="control-label">ID Pegawai</label>

                                    <input type="text" class="form-control" id="idPegawai" name="idPegawai" value="" readonly required>
                                    <?php echo form_error('idPegawai'); ?>
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="field-2" class="control-label">ID Jabatan</label><br>
                                    <input type="text" class="form-control" id="idJabatan" name="idJabatan" value="" readonly required>
                                    <?php echo form_error('idJabatan'); ?>
                                </div>

                            </div>


                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="field-3" class="control-label">Nama Pegawai</label>

                                    <input type="text" class="form-control" id="namaPegawai" value="" name="namaPegawai" placeholder="Nama Pegawai" required>
                                    <?php echo form_error('namaPegawai'); ?>
                                </div>

                            </div>



                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="field-4" class="control-label">Tanggal Lahir</label>

                                    <input type="date" class="form-control" id="tglLahir" value="" name="tglLahir" placeholder="" required>
                                    <?php echo form_error('tglLahir'); ?>
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="field-4" class="control-label">Alamat</label>

                                    <input type="text" class="form-control" id="alamat" value="" name="alamat" placeholder="Alamat" required>
                                    <?php echo form_error('alamat'); ?>
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="field-4" class="control-label">No Telp</label>

                                    <input type="text" class="form-control" id="noTelp" name="noTelp" placeholder="Nomor Telepon" required>
                                    <?php echo form_error('noTelp'); ?>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-4" class="control-label">Foto</label>
                                    <div id="img"></div>

                                    <input type="hidden" id="old_image" name="old_image" value="">
                                    <input type="hidden" id="status" name="status" value="">
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="modal-confirm" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Warning</h5>

                                    </div>
                                    <div class="modal-body">
                                        <h4>Apakah anda Yakin?</h4>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <input type="submit" id="btn-save" class="btn btn-primary" value="Save" id="btn-save">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" onclick="showModal()" value="" class="btn btn-success btnModalInsert">Kirim</button>

                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- edit data modal!-->

    <!-- <div class="modal fade" id="modal-edit" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Input Data Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                </div>

                <div class="modal-body">
                    <form method="POST" id="edit_form" action="<?php echo site_url('Pegawai/editPegawai'); ?>" enctype='multipart/form-data'>
                        <div class="row">
                            <div class="form-group">

                                <div class="col-md-6">
                                    <label for="field-2" class="control-label">User Role</label>
                                    <select class="form-select form-select-sm" id="userRole" aria-label=".form-select-sm example" name="userRole">
                                        <option selected>Pilih Role Pegawai</option>
                                        <option value="1">Manajer</option>
                                        <option value="2">Barista</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="field-2" class="control-label">ID Pegawai</label>

                                    <input type="text" class="form-control" id="idPegawaiEdit" name="idPegawai" value="" readonly>
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="field-2" class="control-label">ID Jabatan</label><br>
                                    <input type="text" class="form-control" id="idJabatanEdit" name="idJabatan" value="" readonly>

                                </div>

                            </div>


                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="field-3" class="control-label">Nama Pegawai</label>

                                    <input type="text" class="form-control" id="namaPegawai" name="namaPegawai" placeholder="Nama Pegawai">
                                </div>

                            </div>



                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="field-4" class="control-label">Tanggal Lahir</label>

                                    <input type="date" class="form-control" id="tglLahir" name="tglLahir" placeholder="" required>
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="field-4" class="control-label">Alamat</label>

                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="field-4" class="control-label">No Telp</label>

                                    <input type="text" class="form-control" id="noTelp" name="noTelp" placeholder="Nomor Telepon" required>
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="field-4" class="control-label">Foto</label>
                                    <div id="img"></div>
                                    <input type="file" class="form-control-fileho" id="image" name="image" value="" placeholder="Add image">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="old_image" name="old_image" value="">


                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button id="btnModalInsert" value="" class="btn btn-success btnModalInsert">Kirim</button>

                        </div>


                </div>
            </div>
        </div>
    </div>

    </form> -->

    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Warning</h5>

                </div>
                <div class="modal-body">
                    <h4>Apakah anda Yakin?</h4>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" id="btn-delete">Delete</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-info" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Information</h5>

                </div>
                <div class="modal-body">
                    <h4>Data telah disimpan</h4>

                </div>
                <div class="modal-footer">
                    <a href="<?php echo site_url('Pegawai'); ?>" class="btn btn-default">Oke</a>

                </div>
            </div>
        </div>
    </div>






</div>

<!-- /.c !-->
<?php
$this->load->view('parts/footer');
?>
<script type="text/javascript">
    var status = '';
    $('#btn-tambah').click(function() {
        $('#img').append(`<input type="file" class="form-control" id="image" name="image" value="" placeholder="Add image">
                                    <?php echo form_error('image'); ?>`);
        $('#insert_form')[0].reset();
        $('#btn-save').val('Save');
        $('#modal-insert').modal('show');
    });

    $(document).ready(function() {
        $("select#userRole").change(function() {
            var selectedValue = $(this).children("option:selected").val();
            // $('#idPegawai').val(selectedValue);
            $.post("<?php echo base_url() . "Pegawai/getId"; ?>", {
                // id: $("#barang optionConfusedelected").val()
            }, function(data) {
                var data1 = new Array();
                data1 = JSON.parse(data);
                if (selectedValue == 1) {

                    $('#idPegawai').val(data1[0]);
                    $('#idJabatan').val(1);
                } else {
                    $('#idJabatan').val(2);
                    $('#idPegawai').val(data1[1]);
                }


            });
        });
    });



    $("#tablePegawai").on('click', '.btn-edit', function() {
        // get the current row
        $('#btn-save').val('Update');
        var currentRow = $(this).closest("tr");
        var idPegawai = currentRow.find("td:eq(1)").text(); // get current row 2nd TD
        var idJabatan = currentRow.find("td:eq(2)").text(); // get current row 3rd TD
        var namaPegawai = currentRow.find("td:eq(3)").text();
        var tglLahir = currentRow.find("td:eq(4)").text();
        var alamat = currentRow.find("td:eq(5)").text();
        var nomorTelepon = currentRow.find("td:eq(6)").text();
        var image = currentRow.find("td:eq(8)").text();
        $('#modal-insert').modal('show');
        $('#idPegawai').val(idPegawai);
        $('#idJabatan').val(idJabatan);
        $('#namaPegawai').val(namaPegawai);
        $('#tglLahir').val(tglLahir);
        $('#alamat').val(alamat);
        $('#noTelp').val(nomorTelepon);
        $('#namaPoto').val(image);
        $('#old_image').val(image);

        $('#img').html('<img src=http://localhost:8080/SERASA/assets/images/' + image + ' class="img-circle elevation-2" alt="User Image" width="50">');
        $('#img').append('<br><br><button type="button" id="btn-muncul">Change Foto</button>');
        let i = 0;
        $('#btn-muncul').click(function() {
            i++;
            status = 'change';
            if (i > 1) {
                $('input[type="file"]').prop("focus", true);
            } else {
                $('#img').append(`<input type="file" class="form-control" id="image" name="image" value="" placeholder="Add image">
                                    <?php echo form_error('image'); ?>`);
            }



        })



        $('#old_image').val(image);

    });



    function showModal() {
        $('input[type=text]').filter('[required]').each(function() {
            if ($(this).val() === '') {


            } else
                $('#modal-confirm').modal('show');
        });

    }
    $(document).ready(function() {
        $('#insert_form').on('submit', function(event) {
            alert($('#status').val());
            console.log($('#status').val());
            event.preventDefault();
            var fd;
            var files;
            var URL;
            if ($('#btn-save').val() == 'Save') {

                URL = "<?php echo site_url('Pegawai/addPegawai'); ?>";
                fd = new FormData(this);
                files = $('#image')[0].files;
                fd.append('image', files[0]);
            } else if ($('#btn-save').val() == 'Update') {
                alert($('#status').val());
                if ($('#status').val() == 'change') {
                    fd = new FormData(this);
                    files = $('#image')[0].files;
                    fd.append('image', files[0]);
                } else {
                    fd = new FormData(this);
                }
                URL = "<?php echo site_url('Pegawai/editPegawai'); ?>";
            }
            // Check file selected or not
            alert(status);

            $.ajax({
                ///nambah url
                url: URL,
                method: "POST",
                contentType: false,
                processData: false,
                data: fd,
                success: function(data) {
                    console.log(data.namaPegawai);
                    $('#modal-confirm').modal('hide');
                    $('#modal-info').modal('show');
                }
            });

        });
    });

    $("#tablePegawai").on('click', '.btn-del', function() {
        // get the current row
        $('#modal-delete').modal('show');
        var currentRow = $(this).closest("tr");
        var idPegawai = currentRow.find("td:eq(1)").text(); // get id pegawai

        var url = "<?php echo base_url() ?>Pegawai/deletePegawai/" + idPegawai;

        $('#btn-delete').click(function() {
            $.get(url, function() {
                location.reload();
            });
        })
    });
</script>