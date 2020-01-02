        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mt-5">
                            <div class="card-header">
                                <strong class="card-title"><?=ucfirst($page)?> Barang</strong>
                                <div class="pull-right">
                                    <a href="<?=site_url('barang')?>" class="btn-primary btn btn-md"><i class="fa fa-undo"></i> BACK</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                 <?php echo form_open_multipart('barang/proses')?>
                                        <div class="form-group ">
                                            <label for="nama" class="form-control-label">Nama Barang * (tidak boleh kosong)</label>
                                            <input type="hidden" name="id" value="<?=$baris->idbarang?>"> 
                                            <input type="text" id="nama" name="nama" placeholder="Masukkan nama Barang" class="form-control <?=form_error('nama') ? 'is-invalid':null ?>" value="<?= $baris->nama_barang ?>">
                                            <?=form_error('nama')?>
                                        </div>
                                        <div class="form-group ">
                                            <label for="merk" class="form-control-label">merek </label>
                                            <select class="form-control" name="merk">
                                                <?php foreach ($merk as $merk ) {
                                                    ?>
                                                    <option value="<?=$merk->idmerk?>" <?= $merk->idmerk==$baris->merk ? 'selected':null?>><?=$merk->nama_merk?></option>
                                                    <?php
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="form-group ">
                                            <label for="barangname" class="form-control-label">type * (tidak boleh kosong)</label>
                                            <input type="text" id="type" name="type" placeholder="Masukkan type barang" class="form-control <?=form_error('type') ? 'is-invalid':null ?>"  value="<?=$baris->type?>">
                                             <?=form_error('type')?>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga" class="form-control-label">Harga Barang * (tidak boleh kosong)</label>
                                            <input type="text" id="harga" name="harga" value="<?=$baris->harga?>" placeholder="Masukkan Harga barang anda" class="form-control   <?=form_error('harga') ? 'is-invalid':null ?>">
                                             <?=form_error('harga')?>
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
<script type="text/javascript">
	$(document).ready(function(){
		$('#harga').mask('0.000.000.000', {reverse: true});
	});
	
</script>