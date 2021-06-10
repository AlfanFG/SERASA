<?php

$this->load->view('parts_barista/header');
$this->load->view('parts_barista/navigation');
?>

<div class="content-wrapper" style="background-color: #fff;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Antrian Pemesanan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- small box -->
                    <table id="mytable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Pesanan</th>
                                <th>Tanggal Pesanan</th>
                                <th>Nama Customer</th>
                                <th>Bayar</th>
                                <th>Total</th>
                                <th>Tools</th>
                            </tr>
                        </thead>
                        <tbody class="show_antrian">
                            <?php
                            $no = 1;
                            foreach ($antrian as $data) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['id_pesanan']; ?></td>
                                    <td><?= $data['tgl_pesan']; ?></td>
                                    <td><?= $data['nama_Customer']; ?></td>
                                    <td><?= $data['bayar']; ?></td>
                                    <td><?= $data['total']; ?></td>
                                    <td><a href="<?php echo base_url('Pemesanan/detailOrder/' . $data['id_pesanan']); ?>" class="btn btn-sm btn-info" data-id="' + data[i].id_pesanan + '"><i class="fas fa-eye"></i></a> <a href="javascript:void(0);" class="btn btn-sm btn-primary item_edit" data-id="' + data[i].id_pesanan + '"><i class="fas fa-check"></i></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">

                    </div>
                    <!-- /.card -->

                    <!-- DIRECT CHAT -->

                    <!--/.direct-chat -->

                    <!-- TO DO List -->

                    <!-- /.card -->
                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">

                    <!-- Map card -->

                    <!-- /.card -->

                    <!-- solid sales graph -->

                    <!-- /.card -->

                    <!-- Calendar -->

                    <!-- /.card -->
                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- Modal Delete Product -->
<div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    Anda yakin mau menghapus data ini?
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="product_id" class="product_id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary btn-edit">Yes</button>
            </div>
        </div>
    </div>
</div>
<!-- /.c !-->
<?php
$this->load->view('parts_barista/footer');
?>
<script>
    $(document).ready(function() {
        $('#mytable').DataTable();
        show_antrian();

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('aed177da11863896091b', {
            cluster: 'ap1',
            forceTLS: true
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            if (data.message === 'success') {
                show_antrian();
            }
        });
        // FUNCTION SHOW PRODUCT
        function show_antrian() {
            $.ajax({
                url: '<?php echo site_url("Pemesanan/get_antrianPesanan"); ?>',
                type: 'GET',
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var count = 1;
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + count++ + '</td>' +
                            '<td>' + data[i].id_pesanan + '</td>' +
                            '<td>' + data[i].tgl_pesan + '</td>' +
                            '<td>' + data[i].nama_Customer + '</td>' +
                            '<td>' + data[i].bayar + '</td>' +
                            '<td>' + data[i].total + '</td>' +
                            '<td>' +
                            '<a href="<?php echo base_url() ?>Pemesanan/detailOrder/' + data[i].id_pesanan + '" class="btn btn-sm btn-info" data-id="' + data[i].id_pesanan + '"><i class="fas fa-eye"></i></a> <a href="javascript:void(0);" class="btn btn-sm btn-primary item_edit" data-id="' + data[i].id_pesanan + '"><i class="fas fa-check"></i></a>' +

                            '</td>' +
                            '</tr>';
                    }
                    $('.show_antrian').html(html);
                }

            });
        }

        $('#mytable').on('click', '.item_edit', function() {

            var product_id = $(this).data('id');
            alert(product_id);
            // $('#modalConfirm').modal('show');
            $('.product_id').val(product_id);
            // alert($('.product_id').val());
            swal({
                    title: "Are you sure?",
                    text: "Status pesanan akan berubah menjadi selesai",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-primary",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: '<?php echo site_url("Pemesanan/updateAntrian/"); ?>' + product_id,
                            type: 'POST',
                            error: function() {
                                alert('Something is wrong!');
                            },
                            success: function(data) {

                                swal("Pesanan Telah Selesai!", "Pesanan telah diantarkan", "success");
                            }
                        });
                    } else {
                        swal("Cancelled", "Pemesanan Failed)", "error");
                    }
                });

        });


        $('.btn-edit').on('click', function() {
            var product_id = $('.product_id').val();

            $.ajax({
                url: '<?php echo site_url("Pemesanan/updateAntrian"); ?>',
                method: 'POST',
                data: {
                    product_id: product_id,
                    status: 'selesai',
                },
                success: function() {
                    $('#modalConfirm').modal('hide');
                }
            });
        });


    });
</script>