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
                        <td><?= $brg['namaBarang']; ?></td>
                        <td><?= $brg['qty']; ?></td>
                        <td>
                            <a href="<?php echo base_url(); ?>datauser/lihat/<?= $brg['id_barang']; ?>"><button type="submit" class="btn btn-warning"><i class="fa fa-eye"></i></button></a>

                            <a href="<?php echo base_url(); ?>StockBarang/hapusBarang/<?= $brg['id_barang']; ?>" class="badge badge-danger pl-2 pr-2" onclick="return confirm('Apakah kamu ingin menghapus data ini?');"><button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>

                            <a href="<?php echo site_url('datauser/update/' . $brg['id_barang']); ?>"><button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i></button></a>
                        </td>
                    </tr>
                </tbody>
            <?php
            } ?>
        </table>
    </section>

    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="datakategorimenu" aria-hidden="true">
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