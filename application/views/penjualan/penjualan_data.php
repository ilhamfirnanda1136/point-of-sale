<section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card mt-5">
            <div class="card-header">
              <h3 class="card-title"style="margin-top:10px;">Tabel Penjualan</h3>
              <div class="pull-right" >
                <a href="<?=site_url('penjualan/tambah')?>" class="btn-success btn-md btn"><i class="fa fa-plus"></i>Tambah Penjualan</a>
              </div>
            </div>
            <div class="card-body ">
              <div class="table-responsive">
              <table id="table-datas" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>No Nota</th>
                    <th>Tanggal Pembelian</th>
                    <th>Jam</th>
                    <th>Nama Pelanggan</th>
                    <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($penjualan as $data){
                        ?>
                        <tr>
                            <td><?=$data->idnota?></td>
                            <td><?=date('d-m-Y', strtotime($data->tanggal_pembelian))?></td>
                            <td><?=$data->jam?></td>
                            <td><?=$data->nama_pelanggan?></td>
                            <td>
                            <iframe src="<?=base_url()?>penjualan/print/<?=$data->idnota?>" name="frame" style="display:none;"></iframe>
                            <button name="detail" class="btn btn-primary btn-detail" data-id="<?=$data->idnota?>" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i>&nbsp; Detail</button>
                            <a href="#" class="btnPrint btn btn-primary" onclick="frames['frame'].print()"><i class="fa fa-print"></i>&nbsp; Print</a>
                            <a href="#" data-link="<?=base_url()?>penjualan/hapus_nota/<?=$data->idnota?>" data-id="<?=$data->idnota?>" class="btn btn-danger btn-delete-nota"><i class="fa fa-trash"></i>&nbsp; Hapus</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>No Nota</th>
                    <th>Tanggal Pembelian</th>
                    <th>Jam</th>
                    <th>Nama Pelanggan</th>
                    <th>Opsi</th>
                </tr>
                </tfoot>
              </table>
            </div>
          </div>
            <!-- /.card-body -->
            <!-- MODAL -->
          <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Nota No.<span id="no"></span></h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body table-responsive printable-area">
                  <table id="pritable" class="table table-hover">
                    <tr>
                      <td>Tanggal Pembelian</td>
                      <td>:</td>
                      <td id="tanggal_pembelian"></td>
                    </tr>
                    <tr>
                      <td>Jam</td>
                      <td>:</td>
                      <td id="jam"></td>
                    </tr>
                  </table>
                  <table id="table-data" class="table table-hover">
                    <thead>
                      <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Imei</th>
                        <th>Jumlah Beli</th>
                        <th>Total Harga</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody id="datatable">
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Imei</th>
                        <th>Jumlah Beli</th>
                        <th>Total Harga</th>
                        <th>Opsi</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                
              </div>
            </div>
          </div>
          <!-- END MODAL -->
          </div>
      </div>
      <script type="text/javascript" src="<?=base_url()?>asset/dist/js/jQuery.print.js"></script>
      <script type="text/javascript">
          $(document).ready(function(){
            
            $(".btn-delete-nota").click(function(){
              let id = $(this).data('id');
              let link = $(this).data('link');
              swal({
                  title: "Yakin?",
                text: "Hapus Nota Nomor "+id+"??",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    window.location=link;
                  } else {
                    swal("Anda membatalkan hapus data");
                  }
              })
            })
            var data = "<?=sizeof($penjualan2);?>";
            console.log(data);
            var i = 1;
            var nonota;
            $(".btn-detail").click(function(){
                  nonota = $(this).data('id');
                  $("#no").html(nonota);
                  tampil_pembelian();
                  tampil_identitas();
            });
              function tampil_pembelian(){
                $.ajax({
                  type:'ajax',
                  url:'<?=base_url('penjualan/listpembeliancurrent/')?>' + nonota,
                  dataType:'JSON',
                  success: function(data){
                    var html = '';
                    var x;
                    for (x=0; x<data.length; x++){
                      console.log(data[x].idnota);
                      html += '<tr>'+
                      '<td>'+data[x].kode_barang+'</td>'+
                      '<td>'+data[x].nama_barang+'</td>'+
                      '<td>'+data[x].imei+'</td>'+
                      '<td>'+data[x].jumlah_beli+'</td>'+
                      '<td>'+data[x].total_harga+'</td>'+
                      '<td><button id="hapus'+x+'" data-kodebarang="'+data[x].kode_barang+'" data-idnota="'+data[x].idnota_body+'" data-jumlahbeli="'+data[x].jumlah_beli+'" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>'+
                      '</tr>'
                    }
                    $("#datatable").html(html);
                    console.log(data.length);
                      for(z = 0; z<data.length; z++){
                        
                        $("#hapus"+z).click(function(){
                          swal({
                            title: "Yakin?",
                            text: "hapus data??",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                          })
                          .then((willDelete) => {
                            let idnota = $(this).data('idnota');
                            let kodebarang = $(this).data('kodebarang');
                            let jumlahbeli = $(this).data('jumlahbeli');
                            if (willDelete) {
                              $.ajax({
                                type:'POST',
                                url:'<?=base_url('penjualan/hapus_data/')?>'+idnota,
                                dataType:'JSON',
                                data: {kodebarang:kodebarang, jumlahbeli:jumlahbeli, idnotabody:idnota},
                                success:function(data){
                                  tampil_pembelian();
                                }
                              })
                            } else {
                              swal("Anda membatalkan hapus data");
                            }
                          });
                        })
                    }
                  }
                })
              }
              function tampil_identitas(){
                $.ajax({
                  type:'ajax',
                  url:'<?=base_url('penjualan/listpembeliancurrent/')?>' + nonota,
                  dataType:'JSON',
                  success: function(data){
                    var html = '';
                    for (var y =0; y<data.length; y++)
                    {
                      $("#tanggal_pembelian").html(data[y].tanggal_pembelian);
                      $("#jam").html(data[y].jam);
                    }
                  }
                })
              }
              let link=$(this).attr('data-link');
              let id=$(this).attr('id');
              
            
          });
      </script>
    </div>
  </section>
