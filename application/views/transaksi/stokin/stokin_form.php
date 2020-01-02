        <div class="content">
            <div class="animated fadeIn">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card mt-5">
                            <div class="card-header">
                                <strong class="card-title"><?=ucfirst($page)?> stok</strong>
                                <div class="pull-right">
                                    <a href="<?=site_url('stokin')?>" class="btn-primary btn btn-md"><i class="fa fa-undo"></i> BACK</a>
                                </div>
                            </div>
                            <div class="card-body">
        
                                <div id="pay-invoice">
                                    <div class="card-body">
                                 <?php echo form_open_multipart('stokin/prosesTambah')?>
                                        <div class="form-group ">
                                            <label for="merk" class="form-control-label">Nama merk*</label>
                                            <input type="hidden" class="merk" name="merk" value="<?=$merk->idmerk?>">
                                            <input type="text" class="form-control" value="<?=$merk->nama_merk?>" readonly> 
                                            <?=form_error('nama')?>
                                        </div>
                                        <div class="form-group">
                                            <label for="Pilih Supplier">
                                                Supplier*
                                            </label>
                                            <select class="supplierClass form-control" required="" style="width: 100%" name="supplier" ></select>
                                        </div>
                                        <div class="form-group">
                                            <label for="pilih barang">
                                                Barang*
                                            </label>
                                            <div class="input-group input-group-sm">
                                                <input type="hidden" name="barang" id="barang">
                                              <input type="text" class="form-control" readonly="" id="namabarang" required="">
                                              <span class="input-group-append">
                                                <button type="button" class="btn-cariBarang btn btn-info btn-flat"><i class="fa fa-search"></i></button>
                                              </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="penjelasan">Penjelasan</label>
                                            <textarea class="form-control" name="penjelasan"></textarea>
                                        </div>
                                        <div class="form-group">
                                          <label class="harga">Harga Supplier</label>
                                          <input type="text" id="harga" name="harga" class="form-control" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="stok">Jumlah Tambah Stok</label>
                                            <input type="number" name="stok" class="form-control" required="">
                                        </div>
                                        <button type="reset" class="btn btn-md btn-warning">Reset</button>
                                        <button type="submit" name="<?=$page?>" class="btn btn-md btn-primary">Submit</button>
                                   <?=form_close()?>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- .card -->

                    </div><!--/.col-->

        </div><!-- .animated -->
    </div>
</div>
<div class="modal fade" id="pilihBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="table-responsive">
              <table id="table-data" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>nomor</th>
                  <th>Kode Barang</th>
                  <th>type Barang</th>
                  <th>nama Barang</th>
                  <th>merk</th>
                  <th>Harga</th>
                  <th>Stok</th> 
                  <th>action</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($barang as $barang) {
                 ?>
                <tr>
                  <td><?=$no++?></td>
                  <td><?=$barang->kode_barang?></td>
                  <td><?=$barang->type?></td>
                  <td><?=$barang->nama_barang?></td>
                  <td><?=$barang->nama_merk?></td>
                  <td><?php echo "Rp ".number_format($barang->harga,2,',','.')?></td>
                  <td><?=$barang->stok." Stok "?></td>
                  <td class="text-center">
                    <button data-nama="<?=$barang->nama_barang?>" data-id="<?=$barang->idbarang?>" class="btn btn-success btn-pilihBarang">
                        <i class="fa fa-check"></i> Select
                    </button>          
                 </td>
                </tr>
                <?php
                 } ?>
                </tbody>
              </table>
            </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
      $('#harga').mask('0.000.000.000', {reverse: true});
        $('.btn-cariBarang').click(function(){
            $('#pilihBarang').modal('show');
        });
        $(document).on('click','.btn-pilihBarang',function(){
            let id=$(this).data('id');
            let nama=$(this).data('nama');
            $('#barang').val(id);
            $('#namabarang').val(nama);
            $('#pilihBarang').modal('hide');
        });

    });
    $('.supplierClass').select2({
        ajax:{
            url:'<?=base_url()?>/stokin/livesupplier',
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
                        id:item.idsupplier,
                        text:item.nama_supplier,
                    });
                })
                return {
                    results:results
                }
            }
        }
    });
</script>