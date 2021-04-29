<!-- Header -->
<?php
$this->load->view('parts_barista/header');
$this->load->view('parts_barista/navigation');
?>

<!-- Content Header -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 breadcrumb float-sm-left">Data Master Kategori Menu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Kategori Menu</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Body -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12" style="margin-top: 50px;">
                    <a class="btn btn-success" id="btn-tambah">Tambah Data</a>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Kategori Menu</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm-18" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap" id="tblKategoriMenu">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Kategori Menu</th>
                                        <th>Nama Kategori</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($kategoriMenu as $kategori) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $kategori['id_kategoriMenu']; ?></td>
                                            <td><?= $kategori['namaKategori']; ?></td>
                                            <td>

                                                <button class="btn btn-warning btn-edit"><i class="fa fa-pencil"></i></button>

                                                <button class="btn btn-danger btn-del"><i class="fa fa-trash"></i></button>

                                            </td>
                                        </tr>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Footer -->
<?php
$this->load->view('parts_barista/footer');
?>

<!-- Modal -->
<!-- Modal Add Data -->
<div class=" modal fade" id="modal-insert" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="datakategorimenu">Form Tambah Data Kategori Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <form method="POST" id="insert_form" action="<?= base_url(); ?>KategoriMenu/tambah" enctype='multipart/form-data'>
                    <div class="form-group">
                        <label class="control-label" for="idKategori">ID Kategori</label>
                        <input type="text" name="idKategori" class="form-control" id="idKategori" required readonly>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="namaKategori">Nama Kategori</label>
                        <input type="text" name="namaKategori" class="form-control" id="namaKategori" required>
                    </div>

                    <div class="modal-footer">
                        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <input type="button" class="btn btn-success btnModalInsert" name="tambah" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Tambah Data -->
<div class="modal fade" id="modal-konfirTambah" tabindex="-1" role="dialog" aria-hidden="true">
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
                <button type="submit" class="btn btn-danger" id="btn-simpan">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update Data -->
<div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="updateDataKategoriMenu" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="datakategorimenu">Form Update Data Kategori Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <form method="post" id="update_form" action="<?= base_url(); ?>KategoriMenu/update/">
                    <div class="form-group">
                        <label class="control-label" for="idKategori">ID Kategori</label>
                        <input type="text" name="idKategori" class="form-control" id="updateIdKategori" required readonly>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="namaKategori">Nama Kategori</label>
                        <input type="text" name="namaKategori" class="form-control" id="updateNamaKategori" required>
                    </div>

                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <input type="button" class="btn btn-success btnModalUpdate" name="tambah" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Update Data -->
<div class="modal fade" id="modal-confirmUpdate" tabindex="-1" role="dialog" aria-hidden="true">
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
                <button type="submit" class="btn btn-danger" id="btn-update">Ubah</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Data -->
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
<!-- Script -->
<script type="text/javascript">
    // Show Modal Tambah Data
    $('#btn-tambah').click(function() {
        $('#modal-insert').modal('show');
    });

    // Show Modal Konfirmasi Tambah Data
    $('.btnModalInsert').click(function() {
        $('#modal-konfirTambah').modal('show');
    });

    // Save Data
    $('#btn-simpan').click(function() {
        $('#insert_form').submit();
    });


    //Set ID Kategori Menu
    $(document).ready(function() {
        $.post("<?php echo base_url() . "KategoriMenu/getId"; ?>",
            function(data) {
                var data1 = new Array();
                data1 = JSON.parse(data);
                $('#idKategori').val(data1);
            });
    });

    // Modal Ubah Data
    $('#tblKategoriMenu').on('click', '.btn-edit', function() {

        // Get Data from Current Row
        var currentRow = $(this).closest("tr");
        var idKategoriMenu = currentRow.find("td:eq(1)").text(); // Get data from current Row first column
        var namaKategori = currentRow.find("td:eq(2)").text(); // Get data from current Row second column
        $('#modal-update').modal('show');
        $('#updateIdKategori').val(idKategoriMenu);
        $('#updateNamaKategori').val(namaKategori);

    });

    //Show Modal Konfirmasi Ubah Data
    $('.btnModalUpdate').click(function() {
        $('#modal-confirmUpdate').modal('show');
    });
    // Update Data
    $('#btn-update').click(function() {
        $('#update_form').submit();
    });

    // Modal Hapus Data 
    $("#tblKategoriMenu").on('click', '.btn-del', function() {
        // get the current row
        $('#modal-delete').modal('show');
        var currentRow = $(this).closest("tr");
        var idKategoriMenu = currentRow.find("td:eq(1)").text(); // get id pegawai

        var url = "<?php echo base_url() ?>KategoriMenu/delete/" + idKategoriMenu;

        $('#btn-delete').click(function() {
            $.get(url, function() {
                location.reload();
            });
        })
    });
</script>