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
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe center"></i> KLINIK UTAMA MALANG EYE CENTER 
            <small class="pull-right">Date: <?= date('d/m/Y');?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <!--From-->
          <address>
            <strong><?= $username;?>. MEC</strong><br>
            Malang Eye Center<br>
            Jl. Dr. Cipto No.3 Malang - Indonesia<br>
            Phone: (+62) 341-341 666 | Fax: (+62) 341-341 777<br>
            Email: malangeyecenter_2012@yahoo.co.id
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <!--To-->
          <address>
            <strong>No.SEP</strong>  : <?= $data['nosep'];?><br>
            <strong>TGL.SEP</strong>  : <?= date('Y-m-d',  strtotime($data['tanggal']));?><br>
            <strong>Noka</strong>  : <?= $data['noka'];?><br>
            <strong>Pasien</strong>  : <?= $data['pasien'];?><br>
            
          </address>
        </div>
        <!-- /.col -->
        <?php $status = $data['status']== 0 ? '<span class="label label-warning">Pending</span>' : '<span class="label label-success">Accepted</span>';?>
        <div class="col-sm-4 invoice-col">
          <b>Invoice :</b><br> <?= $data['faktur'];?>
          <br>
          <b>TGL. Invoice :</b> <?= date('Y-m-d', strtotime($data['createddate']));?><br>
          <b>Dokter :</b> <?= $data['dokter'];?><br>
          <b>Status :</b> <?= $status;?><br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
                <th colspan="4">Description</th>
<!--              <th>Product</th>
              <th>Serial #</th>
              <th>Description</th>-->
              <th>Total</th>
            </tr>
            </thead>
            <tbody>
            
            <tr>
                <td colspan="3"><?= $data['kategori'];?></td>
                <td><strong>Dengan  &nbsp;&nbsp;: &nbsp;&nbsp;</strong> <?= $data['dokter'];?></td>
                <td><?= number_format($data['price'],2,",",".");?></td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
<!--          <p class="lead">Payment Methods:</p>
          <img src="../../dist/img/credit/visa.png" alt="Visa">
          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="../../dist/img/credit/american-express.png" alt="American Express">
          <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
          </p>-->
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
         <div class="table-responsive">
            <table class="table">
              <tbody><tr>
                <th style="width:50%">Terbilang:</th>
                <td><?= ucwords(number_to_words($data['price']));?></td>
              </tr>
              
              <tr>
                <th>Total:</th>
                <td>Rp. <?= number_format($data['price'],2,",",".");?></td>
              </tr>
            </tbody></table>
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
$alert = $this->session->flashdata("alert_transaksi");
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
