<!-- Header -->
<?php
$this->load->view('parts_barista/header');
$this->load->view('parts_barista/navigation');
?>
<!-- Content Header -->
<div class="content-wrapper" style="background-color: #fff;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 breadcrumb float-sm-left">Data Pesanan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Pesanan</li>
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
                    <!-- <a class="btn btn-success" id="btn-tambah">Tambah Data</a> -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap" id="tblPesanan">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id Pesanan</th>
                                    <th>Nama Pegawai</th>
                                    <th>Tanggal Pemesanan</th>
                                    <th>Nama Customer</th>
                                    <th>Bayar</th>
                                    <th>total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($Orders as $Order) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $Order['id_pesanan']; ?></td>
                                        <td><?= $Order['namaPegawai']; ?></td>
                                        <td><?= $Order['tgl_pesan']; ?></td>
                                        <td><?= $Order['nama_Customer']; ?></td>
                                        <td><?= $Order['bayar']; ?></td>
                                        <td><?= $Order['total']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>Pemesanan/detailOrder/<?= $Order['id_pesanan']; ?>"><button type="submit" class="btn btn-primary"><i class="fa fa-eye"></i></button></a>
                                            <a href="<?php echo base_url(); ?>Pemesanan/editPemesanan/<?= $Order['id_pesanan']; ?>" class="btn btn-warning btn-edit"><i class="fa fa-pencil"></i></a>
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
    </section>
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
<!-- Footer -->
<?php
$this->load->view('parts_barista/footer');
?>


<script type="text/javascript">
    $("#tblPesanan").DataTable();
    // Modal Hapus Data 
    $("#tblPesanan").on('click', '.btn-del', function() {
        // get the current row
        $('#modal-delete').modal('show');
        var currentRow = $(this).closest("tr");
        var idPesanan = currentRow.find("td:eq(1)").text(); // get id pesanan

        var url = "<?php echo base_url() ?>Pemesanan/delete/" + idPesanan;

        $('#btn-delete').click(function() {
            $.get(url, function() {
                location.reload();
            });
        })
    });
</script>