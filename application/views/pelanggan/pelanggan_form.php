        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mt-5">
                            <div class="card-header">
                                <strong class="card-title"><?=ucfirst($page)?> pelanggan</strong>
                                <div class="pull-right">
                                    <a href="<?=site_url('pelanggan')?>" class="btn-primary btn btn-md"><i class="fa fa-undo"></i> BACK</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                 <?php echo form_open_multipart('pelanggan/proses')?>
                                        <div class="form-group ">
                                            <label for="nama" class="form-control-label">Nama * (tidak boleh kosong)</label>
                                            <input type="hidden" name="id" value="<?=$baris->idpelanggan?>"> 
                                            <input type="text" id="nama" name="nama" placeholder="Masukkan nama Lengkap" class="form-control <?=form_error('nama') ? 'is-invalid':null ?>" value="<?= $baris->nama_pelanggan ?>">
                                            <?=form_error('nama')?>
                                        </div>
                                        <div class="form-group">
                                            <label for="nomor" class="form-control-label">nomor telpon * (tidak boleh kosong)</label>
                                            <input type="text" id="nomor" name="nomor" value="<?=$baris->notelp?>" placeholder="Masukkan Nomor telepon anda" class="form-control   <?=form_error('nomor') ? 'is-invalid':null ?>">
                                             <?=form_error('nomor')?>
                                        </div>
                                          <div class="form-group  ">
                                            <label for="alamat" class="form-control-label">alamat * (tidak boleh kosong)</label>
                                           <textarea class="form-control <?=form_error('alamat') ? 'is-invalid':null ?>" name="alamat"><?=$baris->alamat?></textarea>
                                             <?=form_error('alamat')?>
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