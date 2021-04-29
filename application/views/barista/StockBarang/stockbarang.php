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

        <table class="table" id="tblStockBarang">
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
                            <button type="button" class="btn btn-primary btn-Update"><i class="fa fa-edit"></i></button>
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
    <!-- Modal Konfirmasi Tambah Data -->
    <div class="modal fade" id="modal-ConfirmTambah" tabindex="-1" role="dialog" aria-hidden="true">
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
                    <h6 class="modal-title" id="databarang">Apakah anda yakin akan menghapus data ini <span id="idDeleteText"></span> </h6>
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
    <div class="modal fade" id="modal-updateStock" tabindex="-1" aria-labelledby="updateDataKategoriMenu" aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="datakategorimenu">Form Update Data Stock Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body">
                    <form method="post" id="form-UpdateStock" action="<?= base_url(); ?>StockBarang/editBarang/">
                        <div class=" form-group">
                            <label class="control-label" for="idKategori">ID Barang</label>
                            <input type="text" name="idBarang" class="form-control" id="updateIdBarang" required readonly>
                        </div>

                        <div class=" form-group">
                            <label class="control-label" for="idKategori">ID Menu</label>
                            <input type="text" name="idMenu" class="form-control" id="updateIdMenu" required readonly>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="namaKategori">Nama Barang</label>
                            <input type="text" name="namaBarang" class="form-control" id="updateNamaBarang" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="namaKategori">Quantity</label>
                            <input type="text" name="Qty" class="form-control" id="updateQty" required>
                        </div>

                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <input type="button" class="btn btn-success btnModalUpdateStock" name="tambah" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- <div class="modal fade" id="modal-UpdateStock" tabindex="-1" aria-labelledby="databarang" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="databarang">Form Edit Data Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="form-UpdateStock" action="<?= base_url(); ?>StockBarang/editBarang/">
                        <div class="form-group">
                            <label class="control-label" for="idBarang">ID Barang</label>
                            <input type="text" name="idBarang" class="form-control" id="updateIDBarang" disabled>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="idMenu">ID Menu</label>
                            <input type="text" name="idMenu" class="form-control" id="updateIdMenu" disabled>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="namaBarang">Nama Barang</label>
                            <input type="text" name="namaBarang" class="form-control" id="updateNamaBarang">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="qty">Quantity</label>
                            <input type="text" name="qty" class="form-control" id="updateQty">
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                            <input type="button" class="btn btn-success btn-ModalUpdate" name="tambah" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Modal Konfirmasi Ubah Data -->
    <div class="modal fade" id="modal-ConfirmUbah" tabindex="-1" role="dialog" aria-hidden="true">
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
                    <button type="submit" class="btn btn-danger" id="btn-Ubah">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->load->view('parts_barista/footer');
?>
<script type="text/javascript">
    // Show Modal Konfirmasi Tambah Data Stock
    $('.btn-ModalInsert').click(function() {
        $('#modal-ConfirmTambah').modal('show');
    });

    // Save Data Stock
    $('#btn-simpan').click(function() {
        $('#form-tambahStock').submit();
    });


    // Modal Ubah Data
    $('#tblStockBarang').on('click', '.btn-Update', function() {

        // Get Data from Current Row
        var currentRow = $(this).closest("tr");
        var idBarang = currentRow.find("td:eq(1)").text(); // Get data from current Row first column
        var idMenu = currentRow.find("td:eq(2)").text(); // Get data from current Row second column
        var namaBarang = currentRow.find("td:eq(3)").text(); // Get data from current Row second column
        var Quantity = currentRow.find("td:eq(4)").text(); // Get data from current Row second column
        $('#modal-updateStock').modal('show');
        $('#updateIdBarang').val(idBarang);
        $('#updateIdMenu').val(idMenu);
        $('#updateNamaBarang').val(namaBarang);
        $('#updateQty').val(Quantity);


    });

    // Show Modal Konfirmasi Ubah Data Stock
    $('.btnModalUpdateStock').click(function() {
        $('#modal-ConfirmUbah').modal('show');
    });

    // Update Data Stock
    $('#btn-Ubah').click(function() {
        $('#form-UpdateStock').submit();
    });
</script>