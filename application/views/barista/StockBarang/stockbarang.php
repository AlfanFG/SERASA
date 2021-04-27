<?php
$this->load->view('parts_barista/header');
$this->load->view('parts_barista/navigation');
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Stock Barang
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
            </i>Tambah Data Barang</button>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Barang</th>
                    <th scope="col">ID Menu</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <?php $no = 1;
            foreach ($stockBarang as $brg) { ?>
                <tbody>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $brg['id_barang']; ?> </td>
                        <td><?= $brg['id_menu']; ?> </td>
                        <td><?= $brg['namaBarang']; ?></td>
                        <td><?= $brg['qty']; ?></td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit<?= $brg['id_barang']; ?>"><i class="fa fa-edit"></i></button>
                            <a href="#modalDelete" class="btn btn-danger" data-target="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action', '<?= site_url('StockBarang/hapusBarang/' . $brg['id_barang']); ?>'); $('#idDeleteText').text(<?= $brg['id_barang']; ?>)"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            <?php
            } ?>
        </table>
    </section>

    <!-- modal tambah -->
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="databarang" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="databarang">Form Tambah Data Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url(); ?>StockBarang/tambahBarang">
                        <div class="form-group">
                            <label class="control-label" for="idBarang">ID Barang</label>
                            <input type="text" name="idBarang" class="form-control" id="idBarang" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="idMenu">ID Menu</label>
                            <input type="text" name="idMenu" class="form-control" id="idMenu" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="namaBarang">Nama Barang</label>
                            <input type="text" name="namaBarang" class="form-control" id="namaBarang" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="qty">Quantity</label>
                            <input type="text" name="qty" class="form-control" id="qty" required>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                            <input type="submit" class="btn btn-success" name="tambah" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- modal berhasil tambah -->
    <div class="modal fade" id="modalberhasiltmbah" tabindex="-1" aria-labelledby="databarang" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="databarang">Success</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6 class="modal-title" id="databarang">Data telah ditambahkan ke dalam table</h6>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal hapus  -->
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="databarang" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="databarang">Warning!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6 class="modal-title" id="databarang">Apakah anda yakin akan menghapus data dengan id : <span id="idDeleteText"></span> </h6>
                </div>
                <div class="modal-footer">
                    <form id="formDelete" action="" method="POST">
                        <button type="reset" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- modal edit -->
    <?php
    $no = 0;
    foreach ($stockBarang as $brg) : $no++; ?>
        <div class="modal fade" id="edit<?= $brg['id_barang']; ?>" tabindex="-1" aria-labelledby="databarang" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="databarang">Form Edit Data Barang</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?= base_url(); ?>StockBarang/editBarang/<?= $brg['id_barang']; ?>">
                            <div class="form-group">
                                <label class="control-label" for="idBarang">ID Barang</label>
                                <input type="text" name="idBarang" class="form-control" id="idBarang" value="<?= $brg['id_barang']; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="idMenu">ID Menu</label>
                                <input type="text" name="idMenu" class="form-control" id="idMenu" value="<?= $brg['id_menu']; ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="namaBarang">Nama Barang</label>
                                <input type="text" name="namaBarang" class="form-control" id="namaBarang" value="<?= $brg['namaBarang']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="qty">Quantity</label>
                                <input type="text" name="qty" class="form-control" id="qty" value="<?= $brg['qty']; ?>">
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                                <input type="submit" class="btn btn-success" name="tambah" value="Simpan">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php
$this->load->view('parts_barista/footer');
?>