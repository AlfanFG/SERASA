<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SERASA | Cetak Struk Pesanan</title>
</head>

<body>
    <div class="container" style="width: 500px; margin:auto">
        <div class="Title">
            <img src="<?= base_url('/assets/images/logo.png'); ?>" alt="logo" width="130" height="130" style="margin-left: auto; margin-right:auto; display:block">
            <h4 style="text-align: center;">KURASA COFEE AND MEAL</h4>
            <h5 style="text-align: center;">JL. Kuningan Raya No.100 Antapani Bandung</h5>
            <p style="text-align: center;">========================================</p>
            <p style="text-align: center;">========================================</p>
            <h5 style="text-align: left; margin-left:20%">Tanggal: <span style="padding-left: 5px;"><?php date_default_timezone_set("Asia/Bangkok");
                                                                                                    echo date("Y/m/d") ?></span>
                <span style="padding-left: 5px;"><?php echo date("h:i:sa") ?></span>
            </h5>
            <h5 style="text-align: left;margin-left:20%">ID Pesanan: <span><?= $Id; ?></span></h5>
            <h5 style="text-align: left;margin-left:20%">Nama: <span><?= $Nama; ?></span></h5>
            <p style="text-align: center;">========================================</p>
            <p style="text-align: center;">========================================</p>

        </div>
        <table class="table table-borderless" style="margin-left: auto; margin-right:auto;">
            <thead>
                <tr>
                    <th style="padding: 10px;" scope="col">Item</th>
                    <th style="padding: 10px;" scope="col">Harga</th>
                    <th style="padding: 10px;" scope="col">Qty</th>
                    <th style="padding: 10px;" scope="col">Sub Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $subtotal = 0;
                $total = 0;
                $kembali = 0;
                foreach ($Orders as $Data) {
                    $subtotal += $Data['Qty'] * $Data['harga'];
                    $total += $subtotal;
                ?>
                    <tr>
                        <td style="padding: 10px; text-align:left;"><?= $Data['namaMenu']; ?></td>
                        <td style="padding: 10px; text-align:center;"><?= $Data['harga']; ?></td>
                        <td style="padding: 10px; text-align:center;"><?= $Data['Qty']; ?></td>
                        <td style="padding: 10px; text-align:center;"><?= $subtotal; ?></td>

                    </tr>
                <?php
                    $subtotal = 0;
                } ?>
            </tbody>
            <tfoot>
                <!-- <tr>
                <td style="padding-top: 20px;" colspan="3" align="right">Total</td>
                <td style="padding-top: 20px; padding-left:24px"><?= $total; ?></td>
            </tr>
            <tr>
                <td style="padding-top: 20px;" colspan="3" align="right">Bayar</td>
                <td style="padding-top: 20px; padding-left:24px"><?= $Data['bayar']; ?></td>
            </tr>
            <tr>
                <td style="padding-top: 20px;" colspan="3" align="right">Kembali</td>
                <td style="padding-top: 20px; padding-left:24px"><?= $kembali = $Data['bayar'] - $total; ?></td>
            </tr> -->
            </tfoot>
        </table>
        <p style="text-align: center;">========================================</p>
        <p style="text-align: center;">========================================</p>
        <div class="container" style="width: auto; height:auto">
            <p style="text-align: center; margin-left:35%;">Total <span style="padding-left: 25px;"><?= $total; ?></span></p>
            <p style="text-align: center; margin-left:35%;">Bayar <span style="padding-left: 20px;"><?= $Data['bayar']; ?></span></p>
            <p style="text-align: center; margin-left:31%;">Kembali <span style="padding-left: 25px;"><?= $kembali = $Data['bayar'] - $total; ?></span></p>
        </div>
    </div>


    <!-- <script type="text/javascript">
        window.print();
    </script> -->
</body>

</html>