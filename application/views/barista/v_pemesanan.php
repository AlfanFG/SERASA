<!-- Header -->
<?php
$this->load->view('parts_barista/header');
$this->load->view('parts_barista/navigation');
?>
<style>
    .detail {

        width: 300px;
        position: -webkit-sticky;
        position: sticky;
        z-index: 1;
        top: 188px !important;
        height: 500px !important;
        background: #fff;
        overflow-x: hidden;
        padding: 8px 0;
        text-decoration: none;

    }


    a,
    a:visited,
    a:hover {
        text-decoration: none;
        color: #000;
    }

    .link {
        text-decoration: none;
        color: rgb(0, 0, 0);
    }

    .link:hover {
        background-color: #ececec;
        text-decoration: none;
        color: rgb(0, 0, 0);
        opacity: 90%;
    }
</style>
<!-- Content Header -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 breadcrumb float-sm-left">Data Master Kategori Menu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Pemesanan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Body -->
    <section class="content">
        <div class="container-fluid">
            <a class="btn btn-primary" data-toggle="collapse" href="#menu" role="button" aria-expanded="false" aria-controls="menu">
                Pilih Kategori Menu
            </a>

            <div class="collapse" id="menu">
                <?php $i = 0; ?>
                <div class="card card-body" id="pilih-kategori" style="width:44.3rem">
                    <table>
                        <tr>
                            <?php foreach ($kategori as $row) {
                                if (($i % 2) == 0) { ?>


                        <tr>
                        <?php } ?>

                        <td><a class="nav-item nav-link nav-menu active" href="#" id="<?php echo $row['id_kategoriMenu'] ?>"><?php echo $row['namaKategori']; ?></a></td>


                        <?php $i++; ?>
                    <?php } ?>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">

                <div class="col-8">
                    <div class="container menu elevation-1 border">

                        <div class="row">
                            <span class="data">
                                <p id="cb"></p>
                                <div class="row">
                                    <?php
                                    $i = 1;

                                    foreach ($pemesanan as $data) {
                                        if ($i % 3 == 0) { ?>
                                            <div class="row">
                                            <?php } ?>


                                            <div class="col" style="margin-left: 0px;">
                                                <a href="#" class="link">

                                                    <div class="card" style="width: 11rem; margin-right:50px; height:400px">

                                                        <img src="<?php echo base_url('assets/images/menu_kategori/' . $data['fotoMenu']); ?>" class="card-img-top" style="height: 200px;" alt="...">
                                                        <div class="card-body">
                                                            <span class="card-title text-center nameMenu"><?php echo "<b>" . $data['namaMenu'] . "</b>" ?></span>
                                                            <span class="card-text text-justify harga"><?php echo "Harga : Rp. " . $data['harga'] ?></span>
                                                            <span class="badge bg-info text-dark">Tersedia</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                            <?php if ($i % 3 == 0) { ?>
                                            </div>
                                        <?php } ?>

                                    <?php $i++;
                                    } ?>
                                </div>
                            </span>
                        </div>

                    </div>

                </div>
                <div class="col-md-4">
                    <div class="detail sidebar border elevation-1">
                        <h4 class="text-center" style="background-color: aquamarine;">Daftar Pesanan</h4>
                        <div class="container">
                            <div class="row py-5 add">

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>

<!-- Footer -->
<?php
$this->load->view('parts_barista/footer');
?>

<!-- Modal -->
<!-- Modal Add Data -->
<div class=" modal fade" id="tambah-pesanan" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="datakategorimenu">Form Tambah Data Kategori Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">

                <div class="form-group">
                    <label class="control-label" for="idKategori">Nama Menu</label>
                    <input type="text" name="f-namaMenu" class="form-control" id="f-namaMenu" required readonly>
                </div>

                <div class="form-group">
                    <label class="control-label" for="namaKategori">Harga</label>
                    <input type="text" name="f-harga" class="form-control" id="f-harga" required readonly>
                </div>

                <div class="form-group">
                    <label class="control-label" for="namaKategori">QTY</label>
                    <input type="number" name="f-qty" class="form-control" id="f-qty" required>
                </div>

                <div class="modal-footer">
                    <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" id="btn-add" name="tambah">Add</button>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Tambah Data -->
<div class="modal fade" id="modal-konfirTambah" tabindex="-1" role="dialog" aria-hidden="true">
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
                <button type="button" class="btn btn-danger" id="btn-simpan">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update Data -->
<div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="updateDataKategoriMenu" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="datakategorimenu">Form Update Data Kategori Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <form method="post" id="update_form" action="<?= base_url(); ?>KategoriMenu/update/">
                    <div class="form-group">
                        <label class="control-label" for="idKategori">ID Kategori</label>
                        <input type="text" name="idKategori" class="form-control" id="updateIdKategori" required readonly>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="namaKategori">Nama Kategori</label>
                        <input type="text" name="namaKategori" class="form-control" id="updateNamaKategori" required>
                    </div>

                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <input type="button" class="btn btn-success btnModalUpdate" name="tambah" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Update Data -->
<div class="modal fade" id="modal-confirmUpdate" tabindex="-1" role="dialog" aria-hidden="true">
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
                <button type="submit" class="btn btn-danger" id="btn-update">Ubah</button>
            </div>
        </div>
    </div>
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
<!-- Script -->
<script type="text/javascript">
    $('.nav-menu').on('click', function() {
        $('.nav-menu').removeClass('active');
        $(this).addClass('active');
        let kategori = $(this).html();
        var id = $(this).attr('id')

        $.get("<?php echo base_url() ?>Pemesanan/getMenuByid/" + id, {
            // id: $("#barang optionConfusedelected").val()
        }, function(data) {

            var obj = $.parseJSON(data);
            let count = Object.keys(obj).length;

            console.log(obj);
            $('.data').html('');

            $('.data').append(`<div class="row isi">`);
            var a;
            a = 1;
            $.each(obj, function(i, data) {

                if ((i + 1) % 3 == 0) {
                    $('.data').append(`<div class="row">`);

                }
                $(` <div class="col">
                                        <a href="#" class="link">
                                        <div class="card" style="width: 11rem; margin-right:50px; height:400px">

<img src="<?php echo base_url(); ?>assets/images/menu_kategori/ ` + obj[i].fotoMenu + `" class="card-img-top" style="height: 200px;" alt="...">
<div class="card-body">
    <h5 class="card-title text-center namaMenu">` + "<b>" + obj[i].namaMenu + "</b>" +
                    `</h5>
    <p class="card-text text-justify harga">` + obj[i].harga + `</p>
    <span class="badge bg-info text-dark">Tersedia</span>
</div>
</div>
                                        </a>
                                   </div> `).appendTo('.isi');

                if ((i + 1) % 3 == 0) {
                    $('.data').append('</div>');
                }

            });
            $('.data').append('</div>');



            // for (var i = 0; i <= count; i++) {
            //     if (i % 3 == 0) {
            //         $('.data').append('<div class="row"');
            //     }
            //     $('.data').append(` <div class="col">
            //                             <a href="" class="link">
            //                                 <div class="card" style="width: 11rem;">
            //                                     <img src="..." class="card-img-top" alt="...">
            //                                     <div class="card-body">
            //                                         <h5 class="card-title text-center">` + obj[i].namaMenu + `</h5>
            //                                         <p class="card-text text-justify">` + obj[i].Deskripsi + `</p>

            //                                     </div>
            //                                 </div>
            //                             </a>
            //                         </div>`);
            //     if (i % 3 == 0) {
            //         $('.data').append('</div>');
            //     }

            // }

        })
    });

    $('.link').on('click', function() {

        $('#tambah-pesanan').modal('show');
        var nama = $(this).find('span:nth-child(1)').text();
        $('#f-namaMenu').val(nama);
        var harga = $(this).find('span:nth-child(2)').text();
        var res = harga.substring(8, 17);
        $('#f-harga').val(res);

    })

    $('#btn-add').click(function() {
        var nama = $('#f-namaMenu').val();
        var harga = $('#f-harga').val();
        var qty = $('#f-qty').val();

        $('.add').append(`<div class="col" style="margin-left:20px; white-space:normal><span for="" id="item-nama">` + nama + ` : </span>
        <span for="" id="item-qty">` + qty + `</span>
                                    <span for="" id="item-harga" style="white-space:normal; margin-left:55px;">` + harga +
            `</span></div>`);
    })
</script>