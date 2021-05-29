<!-- Header -->
<?php
$this->load->view('parts/header');
$this->load->view('parts/navigationManajer');
?>

<<!-- Content Header -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 breadcrumb float-sm-left">Detail Pesanan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url(); ?>historypesanan">History Pesanan</a></li>
                            <li class="breadcrumb-item active">Detail Pesanan</li>
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
                                <h3 class="card-title"> Detail Pesanan atas Nama: <?php echo $Nama ?></h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap" id="tblDetailOrder">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id Pesanan</th>
                                            <th>Nama menu</th>
                                            <th>Harga menu</th>
                                            <th>Qty</th>
                                            <th>Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $subtotal = 0;
                                        $total = 0;
                                        foreach ($Details as $Detail) {
                                            $subtotal += $Detail['Qty'] * $Detail['harga'];
                                            $total += $subtotal;
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $Detail['id_pesanan']; ?></td>
                                                <td><?= $Detail['namaMenu']; ?></td>
                                                <td><?= $Detail['harga']; ?></td>
                                                <td><?= $Detail['Qty']; ?></td>
                                                <td><?= $subtotal; ?></td>
                                            </tr>
                                        <?php
                                            $subtotal = 0;
                                        } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5" align="right">Total: </td>
                                            <td><?= $total; ?></td>
                                        </tr>
                                    </tfoot>

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
    $this->load->view('parts/footer');
    ?>