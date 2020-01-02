<div class="content">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-6 connectedSortable ui-sortable">
                        <div class="card mt-5">
                            <div class="card-header">
                                <strong class="card-title">Total Harga</strong>
                            </div>
                            <div class="card-body">
                                <h1>
                                    Rp. <span id="total"></span>
                                </h1>
                            </div>
                        </div>
                </div>
                <div class="col-lg-6 connectedSortable ui-sortable">
                        <div class="card mt-5">
                            <div class="card-header">
                                <strong class="card-title">Data Kelengkapan</strong>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="pilih_barang">Pilih Barang</label>
                                    <select class="barangClass form-control" id="pilih_barang" name="barang" style="width:100%;" required>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_beli">Jumlah Beli</label>
                                    <input type="text" id="jumlah_beli" name="jumlah_beli" style="width:100%;" required>
                                </div>
                                <div class="form-group">
                                    <label for="imei">Imei</label>
                                    <input type="text" id="imei" name="imei" style="width:100%;" required>
                                </div>
                                <button id="tambah" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah</button>
                                <script type="text/javascript">
                                    $('.barangClass').select2({
                                        ajax:{
                                            url:'<?=base_url()?>/penjualan/livebarang',
                                            dataType:'JSON',
                                            delay:250,
                                            data:function(params){
                                                return{
                                                    supplier:params.term
                                                };
                                            },
                                            processResults:function(data)
                                            {
                                                
                                                let results=[];
                                                $.each(data,function(index,item){
                                                    results.push({
                                                        id:item.kode_barang + '|' + item.harga + '|' + item.nama_barang + '|'+ item.idbarang + '|' + item.stok,
                                                        text:item.nama_barang,
                                                    });
                                                })
                                                console.log(results);
                                                return {
                                                    
                                                    results:results
                                                }
                                            }

                                        }
                                  });
                                  $('.pelangganClass').select2({
                                      ajax:{
                                            url:'<?=base_url()?>/penjualan/livecustomer',
                                            dataType:'JSON',
                                            delay:250,
                                            data:function(params){
                                                return{
                                                    customer:params.term
                                                }
                                            },
                                            processResults:function(data)
                                            {
                                                let results=[];
                                                $.each(data,function(index,item){
                                                    results.push({
                                                        id:item.kode_pelanggan,
                                                        text:item.nama_pelanggan,
                                                    });
                                                })
                                                return {
                                                    results:results
                                                }
                                            }
                                      }
                                  })
                                </script>
                            </div>
                        </div>
                    </div>                    
                    <div class="col-lg-12">
                        <div class="card mt-5">
                            <div class="card-header">
                                <strong class="card-title">List Pilihan Barang</strong>
                                <div class="pull-right">
                                    <button class="btn btn-sm" id="hapusdata" style="background-color:red; border-color:red; color:white;"><i class="fa fa-trash"></i>Hapus Semua</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">    
                                                <thead>
                                                    <th>Kode Barang</th>
                                                    <th>Nama Barang</th>
                                                    <th>Imei</th>
                                                    <th>Jumlah beli</th>
                                                    <th>Harga</th>
                                                    <th>Total Harga</th>
                                                    <th>Opsi</th>
                                                </thead>
                                                <tbody id="tampil_data">

                                                </tbody>
                                                <tfoot>
                                                    <th>Kode Barang</th>
                                                    <th>Nama Barang</th>
                                                    <th>Imei</th>
                                                    <th>Jumlah beli</th>
                                                    <th>Harga</th>
                                                    <th>Total Harga</th>
                                                    <th>Opsi</th>
                                                </tfoot>
                                            </table>
                                        </div>                                   
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary" style="background-color:green; border-color:green; color:white; text-align:right;" data-toggle="modal" data-target="#myModal"><i class="fa fa-plane"></i>&nbsp; Checkout</button>
                            </div>
                        </div> <!-- .card -->
                        <br>
                        <br>

                        <!-- The Modal -->
                        <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Pilih Customer</h4>
                                <button type="button" class="close" data-dismiss="m<th>Imei</th>al">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="table-responsive" id="data">
                                    <table id="table-data" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Kode Pelanggan</th>
                                                <th>Nama pelanggan</th>
                                                <th>Alamat</th>
                                                <th>No Telp</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($pelanggan as $data){
                                                ?>
                                                <tr>
                                                    <td><?=$data->kode_pelanggan?></td>
                                                    <td><?=$data->nama_pelanggan?></td>
                                                    <td><?=$data->alamat?></td>
                                                    <td><?=$data->notelp?></td>
                                                    <td><a href="<?=base_url("penjualan/action_tambah_database/".$data->idpelanggan."")?>" class="btn btn-primary"><i class="fa fa-check"></i>&nbsp; Pilih</a></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Kode Pelanggan</th>
                                                <th>Nama pelanggan</th>
                                                <th>Alamat</th>
                                                <th>No Telp</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <script type="text/javascript">
                                    $("#status_member").on('change', function(){
                                        select = $(this).children("option:selected").val();
                                        if (select == "Member"){
                                            $("#kosong").hide();
                                            $("#data").show();
                                        }else{
                                            $("#kosong").show();
                                            $("#data").hide();
                                        }
                                    })
                                </script>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <a id="kosong" href="<?=base_url("penjualan/action_tambah_database/0");?>" class="btn btn-primary" style="display:none;"><i class="fa fa-check"></i>&nbsp; Checkout</a>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                            </div>
                        </div>
                        </div>

                    </div><!--/.col-->
                    <script type="text/javascript">
                        $(document).ready(function(){
                            showProduk();
                            function showProduk(){
                                $.ajax({
                                    url : '<?=base_url('penjualan/listpembelian')?>',
                                    dataType: 'JSON',
                                    success: function(data){
                                        if (data.length == 0){
                                            var html = '';
                                            var i ;
                                            total = 0;
                                            html += '<tr>'+
                                            '<td colspan="6" style="text-align:center;">Maaf tidak ada data</td>'+
                                            '</tr>'
                                            $("#tampil_data").html(html);
                                            $("#total").html(total);
                                        }else{
                                            var html = '';
                                            var i;
                                            total = 0;
                                            for (i = 0; i<data.length; i++){
                                                html += '<tr>'+
                                                '<td>'+data[i].kode_barang+'</td>'+
                                                '<td>'+data[i].nama_barang+'</td>'+
                                                '<td>'+data[i].imei+'</td>'+
                                                '<td>'+data[i].jumlah_beli+'</td>'+
                                                '<td>'+data[i].harga+'</td>'+
                                                '<td>'+data[i].total_harga+'</td>'+
                                                '<td><button id="btn-hapus'+i+'" class="btn btn-sm btn-hapus" data-kuncis="'+i+'" style="background-color:red; border-color:red; color:white;"><i class="fa fa-trash"></i></button></td>'
                                                '</tr>';
                                                total += data[i].total_harga;
                                            }   
                                            $("#tampil_data").html(html);
                                            $("#total").html(total).simpleMoneyFormat();
                                            for(i = 0; i<data.length; i++){
                                                $("#btn-hapus"+i).on('click', function(){
                                                    let button = $(this).data('kuncis');
                                                    console.log(button);
                                                    $.ajax({
                                                        type:"POST",
                                                        url:"<?=base_url('penjualan/hapus/')?>"+button,
                                                        dataType:'JSON',
                                                        data:{key:i},
                                                        success:function(data){
                                                            showProduk();
                                                        }
                                                    });
                                                });
                                            }
                                        }
                                    }
                                })
                            }
                            
                            $("#pilih_barang").change(function(){
                                    selects = $(this).children("option:selected").val();
                                    var split = selects.split('|');
                                    if (split[4] == "0"){                                                        
                                        swal({
                                            title: "Maaf :(",
                                            text: "Stok barang '"+split[2]+"' telah habis",
                                            icon: "info",
                                        }).then((willDelete) => {
                                            if(willDelete){
                                                var newOption = new Option(data.text, data.id, true, true);
                                                $('#pilih_barang').append(newOption).trigger('change');
                                            }
                                        })
                                    }else{
                                        return select = $(this).children("option:selected").val();
                                    }
                            });
                            $("#tambah").on('click', function(){
                                var kode_produk = select;
                                var split = kode_produk.split('|');
                                var jumlah_beli = $("#jumlah_beli").val();
                                var imei = $("#imei").val();
                                $.ajax({
                                    url: "<?=base_url()?>penjualan/listpembelian",
                                    dataType:'JSON',
                                    success: function(data){
                                        var a = data;
                                        x = 0;
                                        if (data.length == 0){
                                                $.ajax({
                                                    type:"POST",
                                                    url: '<?=base_url('penjualan/action_tambah')?>',
                                                    dataType:'JSON',
                                                    data: {kode_produk:split[0], jumlah_beli:jumlah_belis, harga:split[1], nama_barang:split[2], idbarang:split[3], imei:imei},
                                                    success:function(data){
                                                        var newOption = new Option(data.text, data.id, true, true);
                                                        $('#pilih_barang').append(newOption).trigger('change');
                                                        $("#jumlah_beli").val("");
                                                        $("#imei").val("");
                                                        showProduk();
                                                    }
                                                });
                                                return false;
                                        }else{
                                            var check = data.filter(function (datas) { return datas.imei == imei });
                                            if(check.length > 0){
                                                swal({
                                                        title: "Maaf :(",
                                                        text: "Imei tidak boleh sama",
                                                        icon: 'info'
                                                    }).then((result) => {
                                                        if (result){
                                                            $("#imei").val("");
                                                        }
                                                })
                                            }else{
                                                $.ajax({
                                                        type:"POST",
                                                        url: '<?=base_url('penjualan/action_tambah')?>',
                                                        dataType:'JSON',
                                                        data: {kode_produk:split[0], jumlah_beli:jumlah_belis, harga:split[1], nama_barang:split[2], idbarang:split[3], imei:imei},
                                                        success:function(data){
                                                            var newOption = new Option(data.text, data.id, true, true);
                                                            $('#pilih_barang').append(newOption).trigger('change');
                                                            $("#jumlah_beli").val("");
                                                            $("#imei").val("");
                                                            showProduk();
                                                        }
                                                    });
                                            }
                                        }
                                    }
                                });
                                
                                if (jumlah_beli == ""){
                                    var jumlah_belis = 0;
                                }else{
                                    var jumlah_belis = $("#jumlah_beli").val();
                                }
                                
                            });
                            $("#hapusdata").click(function(){
                                $.ajax({
                                    type:"POST",
                                    url:'<?=base_url('penjualan/hapus_semua')?>',
                                    dataType:'JSON',
                                    success: function(data){
                                        showProduk();
                                    }
                                })
                            });
                        });
                    </script>
        </div><!-- .animated -->
    </div>
</div>