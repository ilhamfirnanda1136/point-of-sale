  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card mt-5">
            <div class="card-header">
              <h3 class="card-title">Tabel Stok Masuk</h3>
              <div class="pull-right">
                <button data-toggle="modal" data-target="#pilihMerk"  class="btn-success btn-md btn"><i class="fa fa-plus"></i> Tambah stok</button>
              </div>
            </div>
            <div class="card-body ">
             <div class="table-responsive">
              <table id="table-data" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>nomor</th>
                  <th>Kode Supplier</th>
                  <th>Kode Merk</th>
                  <th>Kode Barang</th>
                  <th>Penjelasan</th>
                  <th>Harga Supplier</th>
                  <th>Total</th>
                  <th>Tanggal masuk</th>
                  <th>action</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($baris as $stokin) {
                 ?>
                <tr>
                  <td><?=$no++?></td>
                  <td><?=$stokin->nama_supplier?></td>
                  <td><?=$stokin->kode_merk?></td>
                  <td><?=$stokin->kode_barang?></td>
                  <td><?=$stokin->penjelasan?></td>
                  <td><?= "Rp ".number_format($stokin->harga_supplier,2,',','.')?></td>
                  <td><?=$stokin->total." Barang"?></td>
                  <td><?=$stokin->created_at?></td>
                  <td class="text-center">
                    <button data-barang="<?= $stokin->barang ?>" data-id="<?= $stokin->idstokin?>" data-stok="<?=$stokin->total?>" data-harga="<?=$stokin->harga_supplier?>" class="btn btn-sm btn-primary btn-edit">
                        <i class="fa fa-pencil"></i> EDIT 
                      </button>
                        <a href="#" data-link="<?=site_url('stokin/delete/'.$stokin->idstokin.'/'.$stokin->barang)?>" id="<?=$stokin->idstokin?>" class="btn btn-sm btn-danger btn-deleteStok">
                        <i class="fa fa-trash"></i> HAPUS
                      </a>
                      
                    </td>
                </tr>
                <?php
                 } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>nomor</th>
                  <th>Kode Supplier</th>
                  <th>Kode Merk</th>
                  <th>Kode Barang</th>
                  <th>Penjelasan</th>
                   <th>Harga Supplier</th>
                  <th>Total</th>
                  <th>Tanggal masuk</th>
                  <th>action</th>
                </tr>
                </tfoot>
              </table>
            </div>
          </div>
            <!-- /.card-body -->
          </div>
      </div>
        
    </div>
  </section>

<!-- Modal -->
<div class="modal fade" id="pilihMerk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Merk</h5>
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
                  <th>Kode merk</th>
                  <th>nama merk</th>
                  <th>action</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($merk as $merk) {
                 ?>
                <tr>
                  <td><?=$no++?></td>
                  <td><?=$merk->kode_merk?></td>
                  <td><?=$merk->nama_merk?></td>
                  <td class="text-center">
                    <form method="post" action="<?=site_url('stokin/add')?>" >
                      <input type="hidden" name="id" value="<?=$merk->idmerk?>">
                      <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i>Select</button>
                    </form>
                 </td>
                </tr>
                <?php
                 } ?>
                </tbody>
                <tfoot>
                <tr>
                   <th>nomor</th>
                  <th>Kode merk</th>
                  <th>nama merk</th>
                  <th>action</th>
                </tr>
                </tfoot>
              </table>
            </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="editStok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah data stok</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
           <form action="<?=base_url('stokin/prosesEdit')?>" method="post">

            <div class="form-group">
              <input type="hidden" name="id" id="id">
              <input type="hidden" name="barang" id="barang">
              <label for="harga">harga_supplier</label>
              <input type="text" name="harga" class="form-control" id="harga">
              <label for="stok">Jumlah Stok</label>
              <input id="stok" name="stok" class="form-control">

            </div>
            <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp; Simpan Perubahan</button>
           </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('.btn-edit').click(function(){
      let id = $(this).data('id');
      let stok = $(this).data('stok');
      let barang = $(this).data('barang');
      let harga=$(this).data('harga');
      var harga_supplier=0;
      harga_supplier=harga/stok;
      $("#id").val(id);
      $('#harga').val(harga_supplier);
      $('#harga').mask('0.000.000.000', {reverse: true});
      $("#barang").val(barang);
      $("#stok").val(stok);
      $("#editStok").modal('show');
    })
  })
</script>