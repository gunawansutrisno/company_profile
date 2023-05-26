<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?= $title ?>
    </h1>
    <?php echo $breadcrumbs; ?>
</section>
<!-- Main content -->
<section class="invoice">
      <!-- title row -->
      <div class="user-panel">
                      <img src="<?=ASSETS_IMAGE_URL?>logkwintansi.png" height="89"/>
    </div>
      <p>
          &nbsp;
      </p>
      <!-- /.row -->

      <!-- Table row -->
     
      <!-- /.row -->

      <div class="row">
        <div class="col-xs-10">
            <?php $uang = $data['price']==false ? 0 : ucwords(number_to_words($data['price']));?>
         <div class="table-responsive">
            <table class="table">
              <tbody>
               <tr>
                <th>Sudah Terima Dari</th>
                <!--<th>:</th>-->
                <td><?= isset($data['pasien']) ? $data['pasien'] :'' ;?></td>
              </tr>
               <tr>
                <th>Uang Sebesar</th>
                <!--<th>:</th>-->
                <td><?= isset($uang) ? $uang : 0;?></td>
              </tr>
              
              <tr>
                <th>Untuk Pembayaran</th>
                <!--<th>:</th>-->
                <td><?= isset($data['kategori']) ? $data['kategori']: '';?></td>
              </tr>
              <tr>
                <th>Dengan</th>
                <!--<th>:</th>-->
                <td><?= isset($data['dokter']) ? $data['dokter'] :'';?></td>
              </tr>
              <tr>
                  <th>&nbsp;</th>
                <!--<th>:</th>-->
                <td>&nbsp;</td>
              </tr>
              <tr>
                  <th>&nbsp;</th>
                <!--<th>:</th>-->
                <td>Malang, <?= isset($data['tanggal']) ? $data['tanggal'] :'';?></td>
              </tr>
              <tr>
                  <th>&nbsp;</th>
                <!--<th>:</th>-->
                <td>&nbsp;</td>
              </tr>
              <tr>
                  <?php $rp = number_format($data['price'],2,",",".") ;?>
                  <th>Rp. <?= isset($rp) ? $rp : 0 ;?></th>
                <!--<th>:</th>-->
                  <td><?= $username;?></td>
              </tr>
            </tbody>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
         <a href="<?= $base_url;?>" class="btn btn-primary pull-right btn-flat"><i class="fa fa-print"></i> Tambah kwintansi </a>
          <input type="button"  value="Print" onclick="cetak()"><i class="fa fa-print"></i>
         <!--       
<button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>-->
        </div>
      </div>
    </section>

<!-- alert -->
<?php
$alert = $this->session->flashdata("alert_kwintansi");
if (isset($alert) && !empty($alert)):
    $message = $alert['message'];
    $status = ucwords($alert['status']);
    $class_status = ($alert['status'] == "success") ? 'success' : 'danger';
    $icon = ($alert['status'] == "success") ? 'check' : 'ban';
    ?>
    <div class="modal modal-<?php echo $class_status ?> fade" id="myModal" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                    <h4 class="modal-title"><span class="icon fa fa-<?php echo $icon ?>"></span> <?php echo $status ?></h4>
                </div>
                <div class="modal-body">
                    <p><?php echo $message ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline" data-dismiss="modal">OK</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<?php endif; ?>
