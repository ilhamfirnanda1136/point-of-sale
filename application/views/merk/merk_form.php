        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mt-5">
                            <div class="card-header">
                                <strong class="card-title"><?=ucfirst($page)?> merk</strong>
                                <div class="pull-right">
                                    <a href="<?=site_url('merk')?>" class="btn-primary btn btn-md"><i class="fa fa-undo"></i> BACK</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                 <?php echo form_open_multipart('merk/proses')?>
                                        <div class="form-group ">
                                            <label for="nama" class="form-control-label">Nama merk * (tidak boleh kosong)</label>
                                            <input type="hidden" name="id" value="<?=$baris->idmerk?>"> 
                                            <input type="text" id="nama" name="nama" placeholder="Masukkan nama merk" class="form-control <?=form_error('nama') ? 'is-invalid':null ?>" value="<?= $baris->nama_merk ?>">
                                            <?=form_error('nama')?>
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