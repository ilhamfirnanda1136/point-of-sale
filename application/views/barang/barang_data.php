  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card mt-5">
            <div class="card-header">
              <h3 class="card-title">Table Barang</h3>
              <div class="pull-right">
                <a href="<?=site_url('barang/add')?>" class="btn-success btn-md btn"><i class="fa fa-plus"></i> Tambah Barang</a>
              </div>
            </div>
            <div class="card-body ">
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
                <?php $no=1; foreach ($baris as $barang) {
                 ?>
                <tr>
                  <td><?=$no++?></td>
                  <td><?=$barang->kode_barang?></td>
                  <td><?=$barang->type?></td>
                  <td><?=$barang->nama_barang?></td>
                  <td><?=$barang->nama_merk?></td>
                  <td><?php echo "Rp ".number_format($barang->harga,2,',','.')?></td>
                  <td><?=$barang->stok.' Unit' ?></td>
                  <td class="text-center">
                    <a href="<?=site_url('barang/edit/'.$barang->idbarang)?>" class="btn btn-sm btn-primary">
                        <i class="fa fa-pencil"></i> EDIT
                      </a>
                      
                        <a href="#" data-link="<?=site_url('barang/delete/'.$barang->idbarang)?>" id="<?=$barang->nama_barang?>"
                         class="btn btn-sm btn-danger btn-delete">
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
                  <th>Kode Barang</th>
                  <th>type Barang</th>
                  <th>nama Barang</th>
                  <th>merk</th>
                  <th>Harga</th>
                  <th>Stok</th> 
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
