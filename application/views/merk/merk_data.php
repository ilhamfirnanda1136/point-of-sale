  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card mt-5">
            <div class="card-header">
              <h3 class="card-title">Table merk</h3>
              <div class="pull-right">
                <a href="<?=site_url('merk/add')?>" class="btn-success btn-md btn"><i class="fa fa-plus"></i> Tambah merk</a>
              </div>
            </div>
            <div class="card-body ">
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
                <?php $no=1; foreach ($baris as $merk) {
                 ?>
                <tr>
                  <td><?=$no++?></td>
                  <td><?=$merk->kode_merk?></td>
                  <td><?=$merk->nama_merk?></td>
                  <td class="text-center">
                    <a href="<?=site_url('merk/edit/'.$merk->idmerk)?>" class="btn btn-sm btn-primary">
                        <i class="fa fa-pencil"></i> EDIT
                      </a>
                      
                        <a href="#" data-link="<?=site_url('merk/delete/'.$merk->idmerk)?>" id="<?=$merk->nama_merk?>"
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
                  <th>Kode merk</th>
                  <th>nama merk</th>
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
