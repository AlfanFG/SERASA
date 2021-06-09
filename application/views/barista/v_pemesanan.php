<!-- Header -->
<?php
$this->load->view('parts_barista/header');
$this->load->view('parts_barista/navigation');
?>
<style>
    .detail {

        width: 350px;
        position: -webkit-sticky;
        /* position: sticky; */
        z-index: 1;
        top: 188px !important;
        height: 700px !important;
        background: #fff;
        overflow-x: hidden;
        padding: 8px 0;
        text-decoration: none;

    }


    .nav-item-link {
        text-decoration: none;
        color: #000;
    }

    .nav-item-link:hover {
        text-decoration: none;
        color: #fff;
        background-color: cornflowerblue;
    }

    .visit {
        background-color: #ddd !important;
        color: rgb(0, 0, 0);
        opacity: 90%;
    }

    .link {
        /* text-decoration: none; */
        color: rgb(0, 0, 0);
    }

    button.link {
        text-decoration: none;
        padding: 0;
        border: none;
        background: none;
    }

    button.link:hover {
        background-color: #ddd;
        color: rgb(0, 0, 0);
        opacity: 90%;
    }

    a.remove:hover {
        background-color: #ddd;
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

                        <td><a class="nav-item-link nav-link nav-menu active" href="#" id="<?php echo $row['id_kategoriMenu'] ?>"><?php echo $row['namaKategori']; ?></a></td>


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

                                <div class="row">
                                    <?php
                                    $i = 1;

                                    foreach ($pemesanan as $data) {
                                        if ($i % 3 == 0) { ?>
                                            <div class="row">
                                            <?php } ?>


                                            <div class="col-md-3 link-item" style="margin-left: 40px;">
                                                <button class="<?php echo 'card link link-' . $i ?>" id="<?php echo 'link-' . $i ?>" style="width: 11rem; margin-right:50px; height:400px">

                                                    <img src="<?php echo base_url('assets/images/menu_kategori/' . $data['fotoMenu']); ?>" class="card-img-top" style="height: 200px;" alt="...">
                                                    <div class="card-body">
                                                        <p class="idMenu" hidden><?php echo $data['id_menu'] ?></p>
                                                        <p class="noUrut" hidden><?php echo $i ?></p>
                                                        <p class="card-title text-center nameMenu"><?php echo "<b>" . $data['namaMenu'] . "</b>" ?></p>
                                                        <p class="card-text text-justify harga"><?php echo "Harga : Rp. " . $data['harga'] ?></p>
                                                        <p class="badge bg-info text-dark" style="margin-right: 60px;">Tersedia</p>
                                                    </div>

                                                </button>
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
                        <div class="container-fluid">
                            <div class="row py-5 add">

                            </div>
                            <div class="row">
                                <div class="col-md-12" style="margin-left: 0px; position:relative; float:right;">
                                    <div class="hitung"></div>


                                    <hr>

                                    <div class="tot" style="float: right; margin-right:20px"></div>
                                </div>

                                <div class="col">
                                    <hr>
                                    <div class="bayar"></div>
                                </div>

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
                    <label class="control-label" for="idMenu">ID Menu</label>
                    <input type="text" name="f-idMenu" class="form-control" id="f-idMenu" required readonly>
                </div>
                <div class="form-group">

                    <input type="hidden" class="form-control" id="f-noUrut" required readonly>
                </div>
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

<div class=" modal fade" id="formNamaCustomer" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="datakategorimenu">Form Tambah Data Kategori Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <?php $id = $this->Pemesanan_m->getIdPesanan(); ?>
            <div class="modal-body">
                <form action="" id="f-pesanan" method="POST">
                    <div class="form-group">
                        <label class="control-label">ID Pesanan</label>
                        <input type="text" name="f-idPesanan" class="form-control" value="<?php echo $id; ?>" id="f-idPesanan" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Nama Customer</label>
                        <input type="text" name="f-namaCustomer" class="form-control" id="f-namaCustomer" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Total</label>
                        <input type="text" name="f-total" class="form-control" id="f-total" readonly required>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Bayar</label>
                        <input type="text" name="f-bayar" class="form-control" id="f-bayar" required>
                    </div>


                    <div class="modal-footer">
                        <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success" id="btn-addNama" name="tambah">Add</button>
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
                <input type="submit" class="btn btn-danger" id="btn-simpan" value="Simpan">
            </div>
        </div>
    </div>
</div>
</form>
<div class="modal fade" id="modal-info" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Information</h5>

            </div>
            <div class="modal-body">
                <h4>Data telah disimpan</h4>

            </div>
            <div class="modal-footer">
                <!-- direct ke table pesanan -->
                <a href="<?= base_url(); ?>Pemesanan/cetak/<?= $id; ?>" target="_blank" style="float:left; margin-right: 10px" id="btn-cetak" class="btn btn-info"><i class="fas fa-print"> Cetak</i></a>
                <a style="float:left; margin-right: 270px" href=" <?php echo site_url('HistoryPesanan'); ?>" class="btn btn-primary">Lihat Data</a>
                <a href=" <?php echo site_url('Pemesanan'); ?>" class="btn btn-default">Oke</a>

                <!-- direct ke fungsi cetak -->


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
    var total = 0;
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

            $('.data').html(`<div class="row isi">`);

            $.each(obj, function(i, data) {


                $(` <div class="col-md-3 link-item" style="margin-left: 40px;">
                                        <button class="card link link-` + i + `" id="link-` + i + `" style="width: 11rem; margin-right:40px; height:400px">
                                        <img src="<?php echo base_url(); ?>assets/images/menu_kategori/` + obj[i].fotoMenu + `" class="card-img-top" style="height: 200px;" alt="...">
                <div class="card-body">
                <p class="idMenu" hidden>` + obj[i].id_menu + `</p>
                                                        <p class="noUrut" hidden>` + i + `</p>
                <p class="card-title text-center namaMenu">` + "<b>" + obj[i].namaMenu + "</b>" +
                    `</p>
                 <p class="card-text text-justify harga">` + "Harga : Rp. " + obj[i].harga + `</p>
                <p class="badge bg-info text-dark" style="margin-right:65px">Tersedia</p>
                </div>
                
                                        </button>
                                   </div> `).appendTo('.isi');

            });
            $('.data').append('</div>');

        })
    });

    $('div').on('click', '.link', function() {

        $('#tambah-pesanan').modal('show');
        $('#f-qty').val(1);
        var idMenu = $(this).find("p:nth-child(1)").text();
        $('#f-idMenu').val(idMenu);
        var no = $(this).find("p:nth-child(2)").text();
        $('#f-noUrut').val(no);
        var nama = $(this).find("p:nth-child(3)").text();
        $('#f-namaMenu').val(nama);
        var harga = $(this).find("p:nth-child(4)").text();
        var res = harga.substring(8, 17);
        $('#f-harga').val(res);


    })
    $('.add').html("");
    let i = 0;
    let a = 0;
    var pesanan = [];
    var status = "unremove";
    var idItem;

    var k = 0;

    $('#btn-add').click(function() {

        var nama = $('#f-namaMenu').val();
        var harga = $('#f-harga').val();
        var oldQty = $('#f-qty').val();
        var idMenu = $('#f-idMenu').val();
        var index = $('#f-noUrut').val();
        var newQty = 0;
        // total = 0;
        var oldSubtot = 0;
        var subTot = harga.substring(4, 9) * oldQty;
        var sameQty = false;
        var initialData = false;
        var oldIndex = 0;

        if (pesanan.length == 0) {
            pesanan.push([nama, harga.substring(4, 9), oldQty, subTot, idMenu]);
            idItem = 0;
            status = "unremove";
            initialData = true;

        }

        if (sameQty == false && pesanan.length != 0 && initialData != true) {
            for (var j = 0; j < pesanan.length; j++) {

                if (pesanan[j][0] == nama) {
                    newQty = parseInt(pesanan[j][2]) + parseInt(oldQty);
                    pesanan[j][2] = newQty;
                    pesanan[j][3] = newQty * parseInt(pesanan[j][1]);

                    $('#item-qty' + j).html(" : " + pesanan[j][2]);
                    $('#item-harga' + j).html(" Rp. " + pesanan[j][3]);
                    // total = total + (pesanan[j][2] - 1) * pesanan[j][3];
                    // alert(total);
                    sameQty = true;
                }
            }
        }

        if ((sameQty == false) && (pesanan.length != 0) && (initialData != true)) {
            // variable i nya ga ketambahin

            if (status != "unremove") {
                pesanan.splice(index, 0, [nama, harga.substring(4, 9), oldQty, subTot, idMenu]);
                status = "unremove";
                idItem = 0;
            } else if (status != "remove") {
                pesanan.push([nama, harga.substring(4, 9), oldQty, subTot, idMenu]);
                i++;
            }




        }
        console.log(pesanan);

        var urut = $('#f-noUrut').val();
        if (sameQty == false) {
            $('.link-' + urut).addClass('visit');
            $(`<div class="row item itemNo-` + i + `" style="width:400px">
            <div class="col-md-6"><span for="" id="item-nama"> <a class="btn remove ` + urut + `" id="remove` + i + `" style="margin-bottom='20px'"><i class="fas fa-minus-circle"></i></a>` + pesanan[i][0] + ` </span></div>
            <div class="col-sm-2" style="top:5px; position:relative"><span style="margin-right:10px" for="" id="item-qty` + i + `">` + " : " + pesanan[i][2] + `</span></div>
            <div class="col" style="top:5px; position:relative"><span for="" id="item-harga` + i + `" style="margin-left:10px;">` + "Rp. " + pesanan[i][3] + `</span></div></div>`).appendTo('.add');
        }

        if ((i == 0) && (sameQty == false) && (initialData == true)) {
            hitungTotal();
            // $('.hitung').append(`<button id="hitung" onclick="hitungTotal()" class="btn btn-info" style="left:250px;position:relative">Hitung</button>`);
            $('.bayar').append(`<a href="#" id="bayar" class="btn btn-primary" style="left:250px; position:relative">Bayar</a>`);
            $('.bayar').append(`<a href="#" id="reset" class="btn btn-warning" style="left:120px; position:relative">Reset</a>`);

        } else {
            hitungTotal();
        }
        $('#tambah-pesanan').modal('hide');




    });

    function hitungTotal() {
        total = 0;
        for (var l = 0; l < pesanan.length; l++) {
            total = total + pesanan[l][3];
        }
        $('.tot').html('Total : Rp. ' + total);
        // return total;
    }
    // $('div').on('click', '.hitung', function() {
    //     total = 0;
    //     for (var l = 0; l < pesanan.length; l++) {
    //         total = total + pesanan[l][3];
    //     }
    //     $('.tot').html('Rp. ' + total);
    // })
    var count;
    var sts = "";
    var stsAwal = "";
    $('div').on('click', '.remove', function() {
        status = "remove";
        index = $(this).attr('id');

        if (pesanan.length == 1) {
            pesanan.splice(0, 1);
            i--;

            stsAwal = "";
        }

        // if ((parseInt(index.substring(6, 7)) - 1) == -1) {
        //     pesanan.splice(0, 1);
        //     i--;
        //     // sts = 'middle';
        //     alert('wef');

        // }


        var ind = parseInt(index.substring(6, 7));

        if (pesanan[ind + 1] == null) {
            pesanan.splice(pesanan.length - 1, 1);
            // i--;
            // alert(index.substring(6, 7));
            sts = 'middle';

        }

        if ((pesanan[ind + 1] != null) && (sts == 'middle')) {
            pesanan.splice(ind, 1);
            i--;
            // alert('mid');

            stsAwal = "";
        }



        if ((pesanan[ind + 1] != null) && (sts == "")) {
            pesanan.splice(ind, 1);
            i--;
            sts = 'middle';
            stsAwal = "";
            // alert('as');
        }


        $('.itemNo-' + index.substring(6, 7)).remove();
        hitungTotal();
        var totRemove = 0;
        // for (var l = 0; l < pesanan.length; l++) {
        //     totRemove = totRemove + pesanan[l][3];
        // }
        // total = totRemove;
        // $('.tot').html('<p style="float:right; margin-right:20px">Total : Rp.' + totRemove + '</p>');

        if (pesanan.length == 0) {
            $('#bayar').remove();
            $('#reset').remove();
            i = 0;
        }

        // var link = $('.link').attr('id');
        // alert(link);
        // $('.' + link).removeClass('visit');

        var link = $(this).attr('class');
        $('.link-' + link.substring(11, 12)).removeClass('visit');

        console.log(pesanan);
    })

    $('div').on('click', '#reset', function() {
        pesanan.splice(0);
        i = 0;
        $('.link').removeClass('visit');
        $('.add').html("");
        $('.tot').html("");
        $('#bayar').remove();
        $('#reset').remove();

    })

    $('div').on('click', '#bayar', function() {
        $('#formNamaCustomer').modal('show');
        $('#f-total').val(total);

    })
    $('#btn-addNama').click(function() {
        $('#formNamaCustomer').modal('hide');
        $('#modal-konfirTambah').modal('show');

    })
    $('#f-pesanan').on('submit', function(e) {
        e.preventDefault();
        var total = $('#f-total').val();
        var fd = new FormData(this);
        var nama = $('#f-namaCustomer').val();
        var idPesanan = $('#f-idPesanan').val();
        var byr = $('#f-bayar').val();
        if (byr < total) {
            alert('Pembayaran kurang!');
        } else {

            $.ajax({
                url: '<?php echo base_url() ?>Pemesanan/insertPemesanan',
                type: 'post',
                data: {
                    arr: pesanan,
                    nama: nama,
                    id: idPesanan,
                    bayar: byr,
                    tot: total
                },
                datatype: 'json',
                success: function() {
                    $('#modal-konfirTambah').modal('hide');
                    $('#modal-info').modal('show');
                }
            });
        }
    })
</script>