<section class="content">
	<div class="container-fluid mt-5">
	<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=$barang?></h3>

                <p>Total barang</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?=site_url('barang')?>" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?=$supplier?></h3>

                <p>Total Supplier</p>
              </div>
              <div class="icon">
                <i class="fa fa-truck"></i>
              </div>
              <a href="<?=site_url('supplier')?>" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light">
              <div class="inner">
                <h3><?=$pelanggan?></h3>

                <p>Total Pelanggan</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="<?=site_url('pelanggan')?>" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?=$merk?></h3>

                <p>Total Merk</p>
              </div>
              <div class="icon">
                <i class="fa fa-archive"></i>
              </div>
              <a href="<?=site_url('merk')?>" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        </div>
</section>