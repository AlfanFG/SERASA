<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <table border="3" align="center">
        <thead align="center">
            <tr>
                <th>No</th>
                <th>ID Pesanan</th>
                <th>Tanggal Pemesanan</th>
                <th>Nama Customer</th>
                <th>Bayar</th>
                <th>Total</th>
            </tr>
        </thead>
        <?php
        $no = 1;
        foreach ($transaksi as $trk) { ?>
            <tbody align="center">
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $trk['id_pesanan']; ?> </td>
                    <td><?= $trk['tgl_pesan']; ?> </td>
                    <td><?= $trk['nama_Customer']; ?></td>
                    <td><?= $trk['bayar']; ?></td>
                    <td><?= $trk['total']; ?></td>
                </tr>
            </tbody>
        <?php
        } ?>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>