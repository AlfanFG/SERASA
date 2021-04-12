<?php

$this->load->view('parts/header');
$this->load->view('parts/navigationManajer');

?>






<!-- Edit -->
<div aria-hidden="true" class="modal fade" id="edit-data" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Data User</h4>
            </div>

            <form method="POST" id="edit-d" action="<?php echo base_url('index.php/Customer/edit') ?>" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Customer ID</label>

                                <input type="text" class="form-control" id="cust" name="cust" value="" readonly>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="field-2" class="control-label">Nama</label>
                                <input type="hidden" class="form-control" id="id" name="id">
                                <input type="text" class="form-control" id="Nama" autofocus="autofocus" name=Nama placeholder="Nama">
                            </div>

                        </div>



                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="field-3" class="control-label">Alamat</label>

                                <input type="text" class="form-control" id="address" name=address placeholder="Alamat">
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="field-4" class="control-label">No Telp.</label>

                                <input type="number" class="form-control" id="phone" name=phone placeholder="No Telp.">
                            </div>

                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Gender</label>

                                <select class="form-control" name="gender" id="gender">
                                    <option>-------------Select-------------</option>
                                    <option value="L">L</option>
                                    <option value="P">P</option>

                                </select>
                            </div>
                        </div>


                    </div>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btnModalEdit">Kirim</button>
            </form>
        </div>
    </div>
</div>
</div>

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
                            <table class="table table-hover text-nowrap" id="tableKategoriMenu">
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
                                        echo "<td class='kode'>" . $data['id_pegawai'] . "</td>";
                                        echo "<td>" . $data['id_jabatan'] . "</td>";
                                        echo "<td>" . $data['namaPegawai'] . "</td>";
                                        echo "<td>" . $data['tgl_lahir'] . "</td>";
                                        echo "<td>" . $data['alamat'] . "</td>";
                                        echo "<td>" . $data['no_telp'] . "</td>";
                                        echo "<td><img src= 'data:image;base64, " . base64_encode($data['foto']) . "' class='img-circle elevation-2' alt='User Image' width='50'></td>";
                                    ?>

                                        <td align='left'>

                                            <button data-toggle="modal" data-target="#edit" id="btn-edit" class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                                            <button class="btn btn-danger" id="btnDel"><i class="fa fa-trash"></i></button>



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
                    <form method="POST" id="insert_form" action="<?php echo site_url('DataMasterManajer/addPegawai'); ?>">
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

                                    <input type="text" class="form-control" id="idPegawai" name="idPegawai" value="" readonly>
                                </div>

                            </div>


                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="field-2" class="control-label">ID Jabatan</label><br>


                                    <select class="form-select form-select-sm" id="idJabatan" aria-label=".form-select-sm example" name="idJabatan">
                                        <option selected>Pilih Role Pegawai</option>
                                        <option value=1>Manajer</option>
                                        <option value=2>Barista</option>

                                    </select>

                                </div>

                            </div>


                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="field-3" class="control-label">Nama Pegawai</label>

                                    <input type="text" class="form-control" id="namaPegawai" name=namaPegawai placeholder="Nama Pegawai">
                                </div>

                            </div>



                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="field-4" class="control-label">Tanggal Lahir</label>

                                    <input type="date" class="form-control" id="tglLahir" name=tglLahir placeholder="" required>
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

                                    <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto" required>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success btnModalInsert">Kirim</button>
                        </div>
                    </form>
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
    $(document).ready(function() {

        $('#btn-tambah').click(function() {
            $('#modal-insert').modal('show');
        });

        $(document).ready(function() {
            $("select#userRole").change(function() {
                var selectedValue = $(this).children("option:selected").val();
                // $('#idPegawai').val(selectedValue);
                $.post("<?php echo base_url() . "DataMasterManajer/getId"; ?>", {
                    // id: $("#barang optionConfusedelected").val()
                }, function(data) {
                    var data1 = new Array();
                    data1 = JSON.parse(data);
                    if (selectedValue == 1) {
                        $('#idPegawai').val(data1[0]);
                    } else
                        $('#idPegawai').val(data1[1]);

                });
            });
        });

        //DELETE
        //----------
        // $('#dataPegawai').on('click', '.sweet-14', function() {
        //     var idPegawai = $(this).closest('tr').find('td:eq(1)').text();
        //     var url = '<?php echo base_url() ?>index.php/Customer/Delete/' + idPegawai;

        //     // $('form').attr('action');


        //     swal({
        //         title: "Apakah Anda Yakin?",
        //         text: "Anda Akan Mendelete Data " + idPegawai,
        //         type: "error",
        //         showCancelButton: true,
        //         confirmButtonClass: 'btn-danger delete',
        //         confirmButtonText: 'Delete'
        //     });

        //     $('.delete').click(function() {
        //         $.get(url, function() {
        //             location.reload();
        //         });
        //     });

        // });



    });



    // $(document).ready(function() {
    //     $('#edit-data').on('show.bs.modal', function(event) {
    //         var div = $(event.relatedTarget)
    //         var modal = $(this)
    //         modal.find('#idPegawai').attr("value", div.data('id'));
    //         modal.find('#namaPegawai').attr("value", div.data('nama'));
    //         modal.find('#tglLahir').attr("value", div.data('tglLahir'));
    //         modal.find('#alamat').attr("value", div.data('alamat'));
    //         modal.find('#noTelp').val(div.data('noTelp'));

    //     });
    // });
</script>