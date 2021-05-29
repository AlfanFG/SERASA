<?php
$this->load->view('parts/header');
$this->load->view('parts/navigationManajer');
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Transaksi
        </h1>
    </section>
    <a href="<?= base_url('Transaksi/print') ?>" type="button" class="btn btn-success"><i class="fa fa-print"> Cetak</i></a>

    <section class="content">
        <table class="table" id="tblDataTransaksi">
            <thead align="center">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Pesanan</th>
                    <th scope="col">Tanggal Pemesanan</th>
                    <th scope="col">Nama Customer</th>
                    <th scope="col">Bayar</th>
                    <th scope="col">Total</th>
                    <!-- <th scope="col">Aksi</th> -->
                </tr>
            </thead>
            <?php $no = 1;
            foreach ($dataTransaksi as $dt) { ?>
                <tbody align="center">
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $dt['id_pesanan']; ?> </td>
                        <td><?= $dt['tgl_pesan']; ?> </td>
                        <td><?= $dt['nama_Customer']; ?></td>
                        <td><?= $dt['bayar']; ?></td>
                        <td><?= $dt['total']; ?></td>
                        <!-- <td>
                            <button type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>
                            <button type="button" class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </td> -->
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
                    <form method="post" id="form-tambahStock" action="<?= base_url(); ?>StockBarang/tambahBarang">
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
                            <input type="button" class="btn btn-success btn-ModalInsert" name="tambah" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->load->view('parts/footer');
?>