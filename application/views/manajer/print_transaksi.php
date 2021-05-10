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
                <th>ID Transaksi</th>
                <th>ID Pesanan</th>
                <th>ID Menu</th>
                <th>ID Pegawai</th>
                <th>Nama Customer</th>
                <th>Tanggal Pesan</th>
                <th>Jumlah Pesan</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <?php
        $no = 1;
        foreach ($transaksi as $trk) { ?>
            <tbody align="center">
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $trk['id_transaksi']; ?> </td>
                    <td><?= $trk['id_pesanan']; ?> </td>
                    <td><?= $trk['id_menu']; ?> </td>
                    <td><?= $trk['id_pegawai']; ?> </td>
                    <td><?= $trk['namaCustomer']; ?></td>
                    <td><?= $trk['tgl_pesan']; ?></td>
                    <td><?= $trk['jml_pesan']; ?></td>
                    <td><?= $trk['totalHarga']; ?></td>
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