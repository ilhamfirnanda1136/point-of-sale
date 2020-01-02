  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card mt-5">
            <div class="card-header">
              <h3 class="card-title">Table User</h3>
              <div class="pull-right">
                <a href="<?=site_url('user/add')?>" class="btn-success btn-md btn"><i class="fa fa-plus"></i> Tambah User</a>
              </div>
            </div>
            <div class="card-body ">
              <div class="table-responsive">
               
              <table id="table-data" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>nomor</th>
                  <th>username</th>
                  <th>nama lengkap</th>
                  <th>alamat</th>
                  <th>nomor telpon</th> 
                  <th>Level</th>
                  <th>action</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($row as $user) {
                 ?>
                <tr>
                  <td><?=$no++?></td>
                  <td><?=$user->username?></td>
                  <td><?=$user->nama_lengkap?></td>
                  <td><?=$user->alamat?></td>
                  <td><?=$user->notelp?></td>
                  <td><?=$user->level==1? 'admin':'kasir'?></td>
                  <td class="text-center">
                    <a href="<?=site_url('user/edit/'.$user->iduser)?>" class="btn btn-sm btn-primary">
                        <i class="fa fa-pencil"></i> EDIT
                      </a>
                      <?php if ($user->level!=1) {
                        ?>
                        <a href="#" id="<?=$user->username?>" class="btn btn-sm btn-danger btn-delete" data-link="<?=site_url('user/delete/'.$user->iduser)?>">
                        <i class="fa fa-trash"></i> HAPUS
                      </a>
                      <?php  
                      } ?>
                      
                    </td>
                </tr>
                <?php
                 } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>nomor</th>
                  <th>username</th>
                  <th>nama lengkap</th>
                  <th>alamat</th>
                  <th>nomor telpon</th>
                  <th>Level</th> 
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
