  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card mt-5">
            <div class="card-header">
              <h3 class="card-title">Table supplier</h3>
              <div class="pull-right">
                <a href="<?=site_url('supplier/add')?>" class="btn-success btn-md btn"><i class="fa fa-plus"></i> Tambah supplier</a>
              </div>
            </div>
            <div class="card-body ">
              <div class="table-responsive">
              <table id="table-data" class="table table-bordered table-hover">
                <thead>
                <tr>  
                  <th>nomor</th>
                  <th>nama supplier</th>
                  <th>alamat</th>
                  <th>notelp</th>
                  <th>action</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($baris as $supplier) {
                 ?>
                <tr>
                  <td><?=$no++?></td>
                  <td><?=$supplier->nama_supplier?></td>
                  <td><?=$supplier->alamat?></td>
                  <td><?=$supplier->notelp?></td>
                  <td class="text-center">
                    <a href="<?=site_url('supplier/edit/'.$supplier->idsupplier)?>" class="btn btn-sm btn-primary">
                        <i class="fa fa-pencil"></i> EDIT
                      </a>
                      
                        <a href="#" class="btn btn-sm btn-danger btn-delete" id="<?=$supplier->nama_supplier?>" data-link="<?=site_url('supplier/delete/'.$supplier->idsupplier)?>">
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
                  <th>nama supplier</th>
                  <th>alamat</th>
                  <th>notelp</th>
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
