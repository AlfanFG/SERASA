<?php
$this->load->view('parts_barista/header');
$this->load->view('parts_barista/navigation');
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Kategori Menu
        </h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li><a href="#">Tambah Data</a></li>
            <li class="active">Data User</li>
        </ol> -->
    </section>

    <section class="content">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus">
            </i>Tambah Data Kategori Menu</button>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <?php $no = 1;
            foreach ($kategoriMenu as $kategori) { ?>
                <tbody>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $kategori['namaKategori']; ?></td>
                        <td>
                            <a href="<?php echo base_url(); ?>datauser/lihat/<?= $kategori['id_kategoriMenu']; ?>"><button type="submit" class="btn btn-warning"><i class="fa fa-eye"></i></button></a>

                            <a href="<?php echo base_url(); ?>datauser/delete/<?= $kategori['id_kategoriMenu']; ?>"><button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>

                            <a href="<?php echo site_url('datauser/update/' . $kategori['id_kategoriMenu']); ?>"><button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i></button></a>
                        </td>
                    </tr>
                </tbody>
            <?php
            } ?>
        </table>
    </section>
    <? php endforeach ?>

    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="datakategorimenu" aria-hidden="true">
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
                            <input type="text" name="idKategori" class="form-control" id="idKategori" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="namaKategori">Nama Kategori</label>
                            <input type="text" name="namaKategori" class="form-control" id="namaKategori" required>
                        </div>
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                        <input type="submit" class="btn btn-success" name="tambah" value="Simpan">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->load->view('parts_barista/footer');
?>