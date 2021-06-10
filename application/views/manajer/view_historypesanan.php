<!-- Header -->
<?php
$this->load->view('parts/header');
$this->load->view('parts/navigationManajer');

?>

<!-- Content Header -->
<div class="content-wrapper" style="background-color: #fff;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 breadcrumb float-sm-left">History Pesanan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Data History Pesanan</li>
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

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap" id="tbl_transaksi">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Pesanan</th>
                                    <th>Nama Pegawai</th>
                                    <th>Tanggal Pemesanan</th>
                                    <th>Nama Customer</th>
                                    <th>Tools</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($HistoryPesanan as $data) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $data['id_pesanan']; ?></td>
                                        <td><?= $data['namaPegawai']; ?></td>
                                        <td><?= $data['tgl_pesan']; ?></td>
                                        <td><?= $data['nama_Customer']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>HistoryPesanan/detail/<?= $data['id_pesanan']; ?>"><button type="submit" class="btn btn-primary"><i class="fa fa-eye"></i></button></a>

                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>


<!-- Footer -->
<?php
$this->load->view('parts/footer');
?>


<script>
    $('#tbl_transaksi').DataTable();
</script>