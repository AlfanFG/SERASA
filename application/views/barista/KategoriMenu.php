<?php
$this->load->view('parts_barista/header');
$this->load->view('parts_barista/navigation');
?>

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


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12" style="margin-top: 50px;">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus">
                        </i>Tambah Data</button>
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
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($kategoriMenu as $kategori) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $kategori['namaKategori']; ?></td>
                                            <td>

                                                <a href="<?php echo base_url(); ?>KategoriMenu/delete/<?= $kategori['id_kategoriMenu']; ?>"><button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus data ini? ')"><i class="fa fa-trash"></i></button></a>

                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#update<?php echo $kategori['id_kategoriMenu']; ?>"><i class="fa fa-pencil">
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
    <div class=" modal fade" id="tambah" tabindex="-1" aria-labelledby="datakategorimenu" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="datakategorimenu">Form Tambah Data Kategori Menu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="post" action="<?= base_url(); ?>KategoriMenu/tambah">
                        <div class="form-group">
                            <label class="control-label" for="idKategori">ID Kategori</label>
                            <input type="text" name="idKategori" class="form-control" id="idKategori" required readonly>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="namaKategori">Nama Kategori</label>
                            <input type="text" name="namaKategori" class="form-control" id="namaKategori" required>
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
    foreach ($kategoriMenu as $kategori) { ?>
        <div class="modal fade" id="update<?php echo $kategori['id_kategoriMenu']; ?>" tabindex="-1" aria-labelledby="updateDataKategoriMenu" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="datakategorimenu">Form Update Data Kategori Menu</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form method="post" action="<?= base_url(); ?>KategoriMenu/update/<?= $kategori['id_kategoriMenu']; ?>">
                            <div class="form-group">
                                <label class="control-label" for="idKategori">ID Kategori</label>
                                <input type="text" name="idKategori" class="form-control" id="idKategori" value="<?php echo $kategori['id_kategoriMenu'] ?>" required readonly>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="namaKategori">Nama Kategori</label>
                                <input type="text" name="namaKategori" class="form-control" id="namaKategori" value="<?php echo $kategori['namaKategori'] ?>" required>
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
        $.post("<?php echo base_url() . "KategoriMenu/getId"; ?>",
            function(data) {
                var data1 = new Array();
                data1 = JSON.parse(data);
                $('#idKategori').val(data1);
            });
    });
</script>