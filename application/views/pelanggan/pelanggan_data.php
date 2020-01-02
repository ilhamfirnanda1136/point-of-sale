  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card mt-5">
            <div class="card-header">
              <h3 class="card-title">Table pelanggan</h3>
              <div class="pull-right">
                <a href="<?=site_url('pelanggan/add')?>" class="btn-success btn-md btn"><i class="fa fa-plus"></i> Tambah pelanggan</a>
              </div>
            </div>
            <div class="card-body ">
              <div class="table-responsive">
              <table id="table-data" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>nomor</th>
                  <th>Kode pelanggan</th>
                  <th>nama pelanggan</th>
                  <th>alamat</th>
                  <th>notelp</th>
                  <th>action</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($baris as $pelanggan) {
                 ?>
                <tr>
                  <td><?=$no++?></td>
                  <td><?=$pelanggan->kode_pelanggan?></td>
                  <td><?=$pelanggan->nama_pelanggan?></td>
                  <td><?=$pelanggan->alamat?></td>
                  <td><?=$pelanggan->notelp?></td>
                  <td class="text-center">
                    <a href="<?=site_url('pelanggan/edit/'.$pelanggan->idpelanggan)?>" class="btn btn-sm btn-primary">
                        <i class="fa fa-pencil"></i> EDIT
                      </a>
                      
                        <a href="#" data-link="<?=site_url('pelanggan/delete/'.$pelanggan->idpelanggan)?>" id="<?=$pelanggan->nama_pelanggan?>" class="btn btn-sm btn-danger btn-delete">
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
                  <th>Kode pelanggan</th>
                  <th>nama pelanggan</th>
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
