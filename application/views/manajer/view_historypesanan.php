<!-- Header -->
<?php
$this->load->view('parts/header');
$this->load->view('parts/navigationManajer');

?>

<!-- Content Header -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 breadcrumb float-sm-left">History Pesanan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabel History Pesanan</h3>

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
                            <table class="table table-hover text-nowrap" id="tbl_transaksi">
                                <thead>
                                    <tr>
                                        <th>ID transaksi</th>
                                        <th>ID Pesanan</th>
                                        <th>ID Menu</th>
                                        <th>ID Pegawai</th>
                                        <th>Nama Customer</th>
                                        <th>Tgl Pesan</th>
                                        <th>Jml Pesan</th>
                                        <th>Total Harga</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($HistoryPesanan as $data) { ?>
                                        <tr>
                                            <td><?php echo $data['id_transaksi'] ?></td>
                                            <td><?php echo $data['id_pesanan'] ?></td>
                                            <td><?php echo $data['id_menu'] ?></td>
                                            <td><?php echo $data['id_pegawai'] ?></td>
                                            <td><?php echo $data['namaCustomer'] ?></td>
                                            <td><?php echo $data['tgl_pesan'] ?></td>
                                            <td><?php echo $data['jml_pesan'] ?></td>
                                            <td><?php echo $data['totalHarga'] ?></td>

                                        </tr>
                                    <?php } ?>
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
$this->load->view('parts/navigationManajer');
?>


</script>