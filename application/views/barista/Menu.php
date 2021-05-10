<?php
$this->load->view('parts_barista/header');
$this->load->view('parts_barista/navigation');
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 breadcrumb float-sm-left">Data Master Menu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Menu</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12" style="margin-top: 50px;">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus">
                        </i>Tambah Data</button>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Menu</h3>

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
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Menu</th>
                                        <th>ID Kategori</th>
                                        <th>Nama Menu</th>
                                        <th>Harga</th>
                                        <th>Ketersediaan</th>
                                        <th>Foto</th>
                                        <!-- <th>Deskripsi</th> -->
                                        <th>Tools</th>
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
                                            <!-- <td><?= $menu['Deskripsi']; ?></td> -->
                                            <td><img src="<?php echo base_url('assets/images/menu_kategori/' . $menu['fotoMenu']); ?>" class="img-circle elevation-2" style="width: 50px; height:50px"></td>
                                            <td>

                                                <a href="<?php echo base_url(); ?>Menu_c/delete/<?= $menu['id_menu']; ?>"><button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus data ini? ')"><i class="fa fa-trash"></i></button></a>

                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#update<?php echo $menu['id_menu']; ?>"><i class="fa fa-pencil">
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

    <!-- Modal Add Data -->
    <div class=" modal fade" id="tambah" tabindex="-1" aria-labelledby="datamenu" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="datamenu">Form Tambah Data Menu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="post" action="<?= base_url(); ?>Menu/tambah">
                        <div class="form-group">
                            <label class="control-label" for="idMenu">ID Menu</label>
                            <input type="text" name="idMenu" class="form-control" id="idMenu" required readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="idKategori">ID Kategori</label>
                            <input type="text" name="idKategori" class="form-control" id="idKategori" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="namaMenu">Nama Menu</label>
                            <input type="text" name="namaMenu" class="form-control" id="namaMenu" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="harga">Harga</label>
                            <input type="text" name="harga" class="form-control" id="harga" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="ketersediaan">Ketersediaan</label>
                            <input type="text" name="ketersediaan" class="form-control" id="ketersediaan" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="deskripsi">Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" id="deskripsi" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="fotoMenu">Foto Menu</label>
                            <input type="file" class="form-control" id="fotoMenu" name="fotoMenu" value="" placeholder="Add image" required>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <input type="submit" class="btn btn-success" name="tambah" value="Simpan" onclick="return confirm('Apakah anda yakin untuk menambahkan data ini? ')">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Sending data with certain Id to a Modal Form -->
    <?php
    foreach ($dataMenu as $menu) { ?>
        <div class="modal fade" id="update<?php echo $menu['id_menu']; ?>" tabindex="-1" aria-labelledby="updateDataMenu" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="datamenu">Form Update Data Menu</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form method="post" action="<?= base_url(); ?>Menu/update/<?= $menu['id_menu']; ?>">
                            <div class="form-group">
                                <label class="control-label" for="idMenu">ID Menu</label>
                                <input type="text" name="idMenu" class="form-control" id="idMenu" value="<?php echo $menu['id_menu'] ?>" required readonly>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="idMenu">ID Kategori</label>
                                <input type="text" name="idKategori" class="form-control" id="idKategori" value="<?php echo $menu['id_KategoriMenu'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="namaKategori">Nama Menu</label>
                                <input type="text" name="namaMenu" class="form-control" id="namaMenu" value="<?php echo $menu['namaMenu'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="harga">Harga</label>
                                <input type="text" name="harga" class="form-control" id="harga" value="<?php echo $menu['harga'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="ketersediaan">Ketersediaan</label>
                                <input type="text" name="ketersediaan" class="form-control" id="ketersediaan" value="<?php echo $menu['ketersediaan'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="deskripsi">Deskripsi</label>
                                <input type="text" name="deskripsi" class="form-control" id="deskripsi" value="<?php echo $menu['Deskripsi'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="fotoMenu">Foto Menu</label>
                                <input type="file" class="form-control" id="fotoMenu" name="fotoMenu" value="<?php echo $menu['fotoMenu'] ?>" placeholder="Add image" required>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-success" name="tambah" value="Update" onclick="return confirm('Apakah anda yakin untuk mengubah data ini? ')">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php }
    ?>
    <!-- Modal Update Data -->

</div>
<?php
$this->load->view('parts_barista/footer');
?>
<script type="text/javascript">
    $(document).ready(function() {
        $.post("<?php echo base_url() . "Menu_c/getId"; ?>",
            function(data) {
                var data1 = new Array();
                data1 = JSON.parse(data);
                $('#idMenu').val(data1);
            });
    });

    // Modal Ubah Data
    $('#tblMenu').on('click', '.btn-edit', function() {

        // Get Data from Current Row
        var currentRow = $(this).closest("tr");
        var idMenu = currentRow.find("td:eq(1)").text(); // Get data from current Row first column
        var idKategori = currentRow.find("td:eq(2)").text(); // Get data from current Row second column
        var namaMenu = currentRow.find("td:eq(3)").text(); // Get data from current Row third column
        var harga = currentRow.find("td:eq(4)").text(); // Get data from current Row fourth column
        var ketersediaan = currentRow.find("td:eq(5)").text(); // Get data from current Row fifth column
        var deskripsi = currentRow.find("td:eq(6)").text(); // Get data from current Row sixth column
        var fotoMenu = currentRow.find("td:eq(7)").text(); // Get data from current Row seventh column
        $('#modal-update').modal('show');
        $('#updateIdMenu').val(idMenu);
        $('#updateIdKategori').val(idKategoriMenu);
        $('#updateNamaMenu').val(namaMenu);
        $('#updateHarga').val(harga);
        $('#updateKetersediaan').val(ketersediaan);
        $('#updateDeskripsi').val(deskripsi);
        $('#updateFotoMenu').val(fotoMenu);

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
    $("#tblMenu").on('click', '.btn-del', function() {
        // get the current row
        $('#modal-delete').modal('show');
        var currentRow = $(this).closest("tr");
        var idMenu = currentRow.find("td:eq(1)").text(); // get id menu

        var url = "<?php echo base_url() ?>Menu_c/delete/" + idMenu;

        $('#btn-delete').click(function() {
            $.get(url, function() {
                location.reload();
            });
        })
    });
</script>