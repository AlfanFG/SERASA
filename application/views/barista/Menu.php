<?php

$this->load->view('parts_barista/header');
$this->load->view('parts_barista/navigation');

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

<div class="content-wrapper" style="background-color: #fff;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 breadcrumb float-sm-left"><b>Data Master Menu</b></h1>
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
                    <a class="btn btn-success" id="btn-tambah">Tambah Data</a><br><br>

                    <!-- /.card-header -->

                    <table class="table table-hover text-nowrap" id="tableMenu">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Menu</th>
                                <th>ID Kategori</th>
                                <th>Nama Menu</th>
                                <th>Harga</th>
                                <th>Ketersediaan</th>
                                <th>Foto</th>
                                <th hidden>Deskripsi</th>

                                <th>Tools</th>
                                <th hidden>foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($dataMenu as $menu) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $menu['id_menu']; ?></td>
                                    <td><?= $menu['id_kategoriMenu']; ?></td>
                                    <td><?= $menu['namaMenu']; ?></td>
                                    <td><?= $menu['harga']; ?></td>
                                    <td><?= $menu['ketersediaan']; ?></td>
                                    <td hidden><?= $menu['Deskripsi']; ?></td>
                                    <td><img src="<?php echo base_url('assets/images/menu_kategori/' . $menu['fotoMenu']); ?>" class="img-circle elevation-2" style="width: 50px; height:50px"></td>
                                    <td>

                                        <button class="btn btn-warning btn-edit"><i class="fa fa-pencil"></i></button>


                                        <button class="btn btn-danger btn-del"><i class="fa fa-trash"></i></button>
                                    </td>
                                    <td class='namaPoto' hidden><?php echo $menu['fotoMenu']; ?></td>
                                </tr>
                            <?php
                            } ?>


                        </tbody>
                    </table>

                    <!-- /.card-body -->

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

                    <form method="POST" id="insert_form" enctype='multipart/form-data'>
                        <?php echo validation_errors(); ?>


                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="field-2" class="control-label">ID Menu</label>

                                    <input type="text" class="form-control" id="idMenu" name="idMenu" value="" readonly>
                                    <div class="error"></div>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <?php $kategori = $this->KategoriMenu_m->getAllKategoriMenu(); ?>
                                <div class="form-group">
                                    <label for="field-2" class="control-label">ID Kategori</label>
                                    <select class="form-select form-select-lg mb-3 col-md-12" aria-label=".form-select-lg example" name="idKategori" id="idKategori" class="col-md-8">
                                        <?php foreach ($kategori as $row) { ?>
                                            <option value=<?php echo $row['id_kategoriMenu'] ?>><?php echo $row['namaKategori'] ?></option>

                                        <?php } ?>
                                    </select>
                                    <div class="error"></div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="control-label" for="namaMenu">Nama Menu</label>
                                    <input type="text" name="namaMenu" class="form-control" id="namaMenu">
                                    <div class="error"></div>
                                </div>

                            </div>



                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="control-label" for="harga">Harga</label>
                                    <input type="text" name="harga" class="form-control" id="harga">
                                    <div class="error"></div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">

                            <label class="control-label" for="ketersediaan">Ketersediaan</label>
                            <input type="text" name="ketersediaan" class="form-control" id="ketersediaan">
                            <div class="error"></div>
                        </div>



                        <div class="col-md-12">

                            <div class="form-group">
                                <label class="control-label" for="deskripsi">Deskripsi</label>
                                <textarea type="textarea" name="deskripsi" class="form-control" id="deskripsi"></textarea>
                                <div class="error"></div>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-4" class="control-label">Foto</label>
                                <div id="img"></div>

                                <input type="hidden" id="old_image" name="old_image" value="">
                            </div>
                        </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" onclick="showModal()" value="" class="btn btn-success btnModalInsert">Kirim</button>

                </div>


            </div>
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
                <a href="<?php echo site_url('Menu_c'); ?>" class="btn btn-default">Oke</a>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-failed" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Information</h5>

            </div>
            <div class="modal-body">
                <h4>Data Gagal Disimapn</h4>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Oke</button>

            </div>
        </div>
    </div>
</div>






</div>

<!-- /.c !-->
<?php
$this->load->view('parts_barista/footer');
?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tableMenu').DataTable();

        $.post("<?php echo base_url() . "Menu_c/getId"; ?>",
            function(data) {
                var data1 = new Array();
                data1 = JSON.parse(data);
                $('#idMenu').val(data1);
            });
    });
    var status;
    $('#btn-tambah').click(function() {
        $('#img').html(`<input type="file" class="form-control" id="image" name="image" value="" placeholder="Add image">
                                    <?php echo form_error('image'); ?>`);
        // $('#insert_form')[0].reset();
        $('#btn-save').val('Save');
        $('#modal-insert').modal('show');
    });

    $("#tableMenu").on('click', '.btn-edit', function() {
        // get the current row
        status = '';
        $('#btn-save').val('Update');
        var currentRow = $(this).closest("tr");
        var idMenu = currentRow.find("td:eq(1)").text(); // get current row 2nd TD
        var idKategori = currentRow.find("td:eq(2)").text(); // get current row 3rd TD
        var namaMenu = currentRow.find("td:eq(3)").text();
        var harga = currentRow.find("td:eq(4)").text();
        var ketersediaan = currentRow.find("td:eq(5)").text();
        var deskripsi = currentRow.find("td:eq(6)").text();
        var image = currentRow.find("td:eq(9)").text();
        $('#modal-insert').modal('show');
        $('#idMenu').val(idMenu);
        $('#idKategori').val(idKategori);
        $('#namaMenu').val(namaMenu);
        $('#harga').val(harga);
        $('#ketersediaan').val(ketersediaan);
        $('#deskripsi').val(deskripsi);
        // $('#namaPoto').val(image);
        $('#old_image').val(image);
        $('#img').html('<img src=http://localhost:8080/SERASA/assets/images/menu_kategori/' + image + ' class="img-circle elevation-2" alt="User Image" width="50">');
        $('#img').append('<br><br><button type="button" id="btn-muncul">Change Foto</button>');
        let i = 0;
        $('#btn-muncul').click(function() {
            i++;
            status = "change";
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

        $('#modal-insert').modal('hide');
        $('#modal-confirm').modal('show');

    }

    $(document).ready(function() {
        $('#insert_form').on('submit', function(event) {
            event.preventDefault();
            var fd;
            var files;
            var URL;
            if ($('#btn-save').val() == 'Save') {
                URL = "<?php echo site_url('Menu_c/addMenu'); ?>";
                fd = new FormData(this);
                files = $('#image')[0].files;
                fd.append('image', files[0]);
            } else {

                if (status == 'change') {
                    fd = new FormData(this);
                    files = $('#image')[0].files;
                    fd.append('image', files[0]);

                } else {
                    fd = new FormData(this);
                }
                URL = "<?php echo site_url('Menu_c/update'); ?>";
            }

            $.ajax({
                ///nambah url
                url: URL,
                method: "POST",
                contentType: false,
                processData: false,
                data: fd,
                success: function(data) {
                    var status = false;
                    if (data.status == 'invalid') {
                        $('#confirmModal').modal('hide');
                        alert('wef');
                        $.each(data, function(key, value) {
                            if ($('#modal-confirm').is(':visible')) {
                                $('#' + key).parents('.form-group').find('.error').html(value);
                            }
                        });
                        $('#modal-confirm').modal('hide');
                        $('#modal-failed').modal('show');
                    } else {
                        $('#modal-confirm').modal('hide');
                        $('#modal-info').modal('show');
                    }
                }
            });

        });


    });

    $("#tableMenu").on('click', '.btn-del', function() {
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