
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>asset/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>asset/dist/css/adminlte.min.css">
  <!-- Data table -->
  <link rel="stylesheet" href="<?=base_url()?>asset/plugins/datatables/dataTables.bootstrap4.css">
  <script type="text/javascript" src="<?=base_url()?>asset/dist/js/jquery-print.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="<?=base_url()?>asset/plugins/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>asset/plugins/jquery/jquerymask.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 4 -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?=base_url()?>asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url()?>asset/dist/js/simple.money.format.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<style type="text/css" media="print">
  @media print {  
    body {
    margin-top: 3cm;
    margin-bottom: 3cm;
    margin-right: 3cm;
    margin-left: 3cm;
}
}
</style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 519px;">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?=base_url()?>asset/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="
          <?php
           if($this->fungsi->user_login()->jenis_kelamin == 1) {
             echo  base_url().'asset/dist/img/avatar5.png';
           }
           else{
            echo base_url().'asset/dist/img/avatar2.png';
           } 
           ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$this->fungsi->user_login()->nama_lengkap?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item ">
            <a href="<?=site_url('dashboard')?>" class="nav-link <?=$this->uri->segment(1)== 'dashboard' || $this->uri->segment(1)== '' ? 'active' :'' ?> ">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=site_url('supplier')?>" class="nav-link <?=$this->uri->segment(1)== 'supplier'  ? 'active' :'' ?>">
              <i class="nav-icon fa fa-truck"></i>
                Supplier
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=site_url('pelanggan')?>" class="nav-link <?=$this->uri->segment(1)== 'pelanggan'  ? 'active' :'' ?>">
              <i class="nav-icon fa fa-users"></i>
               Pelanggan
            </a>
          </li>
           <li class="nav-item has-treeview <?=$this->uri->segment(1)== 'barang' || $this->uri->segment(1)== 'merk' ? 'menu-open' :'' ?>">
            <a href="#" class="nav-link <?=$this->uri->segment(1)== 'barang' || $this->uri->segment(1)== 'merk'  ? 'active' :'' ?>">
              <i class="nav-icon fa fa-archive"></i>
              <p>
               Produk
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=site_url('barang')?>" class="nav-link <?=$this->uri->segment(1)== 'barang'  ? 'active' :'' ?>">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('merk')?>" class="nav-link <?=$this->uri->segment(1)== 'merk'  ? 'active' :'' ?>">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Merk</p>
                </a>
              </li>
            </ul>
          </li>

           <li class="nav-item has-treeview <?=$this->uri->segment(1)== 'penjualan' || $this->uri->segment(1)== 'stokin' || $this->uri->segment(1)== 'stokout' ? 'menu-open' :'' ?>">
            <a href="#" class="nav-link <?=$this->uri->segment(1)== 'penjualan' || $this->uri->segment(1)== 'stokin' || $this->uri->segment(1)== 'stokout'   ? 'active' :'' ?>">
              <i class="nav-icon fa fa-shopping-cart"></i>
              <p>
              Transaksi
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                <a href="<?=site_url('penjualan')?>" class="nav-link <?=$this->uri->segment(1)== 'penjualan'  ? 'active' :'' ?>">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('stokin')?>" class="nav-link <?=$this->uri->segment(1)== 'stokin'  ? 'active' :'' ?>">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Stok Masuk</p>
                </a>
              </li>
            </ul>
          </li>
         <li class="nav-header">Pengaturan</li>
         <?php  if($this->fungsi->user_login()->level ==1)
         {
          ?>
           <li class="nav-item">
            <a href="<?=site_url('user')?>" class="nav-link <?=$this->uri->segment(1)== 'user'  ? 'active' :'' ?>">
              <i class="nav-icon fa fa-user"></i>
               User
            </a>
        </li>
        <?php
         }
         ?>
       
          <li class="nav-item">
            <a href="<?=site_url('gantiprofile')?>" class="nav-link <?=$this->uri->segment(1)== 'gantiprofile'  ? 'active' :'' ?>">
              <i class="nav-icon fa fa-edit"></i>
              Ganti Profile
            </a>
        </li>
            <li class="nav-item">
            <a href="<?=site_url('auth/logout')?>" class="nav-link">
              <i class="nav-icon fa fa-sign-out"></i>
               Logout
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <?=$content ?>
   </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url()?>asset/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=base_url()?>asset/plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>asset/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>asset/dist/js/demo.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript">
  $('#table-data').dataTable({
  });
  $("#table-datas").DataTable({
              "order": [[ 0, "desc" ]]
  })
  $('.btn-delete').click(function(){
        let link=$(this).attr('data-link');
        let id=$(this).attr('id');
        swal({
              title: "Yakin?",
              text: "hapus data dengan nama "+id+"??",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                window.location=link;
              } else {
                swal("Anda membatalkan hapus data");
              }
            });
    });
   $('.btn-deleteStok').click(function(){
        let link=$(this).attr('data-link');
        let id=$(this).attr('id');
        swal({
              title: "Yakin?",
              text: "hapus data dengan id "+id+"??",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                window.location=link;
              } else {
                swal("Anda membatalkan hapus data");
              }
            });
    });
  <?php if($this->session->has_userdata('success')){?>
   toastr.success("<?=$this->session->flashdata('success')?>", "Berhasil");
  <?php
  }
  ?>
 
</script>
</body>
</html>
