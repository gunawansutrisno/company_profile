<?php foreach ($data as $row) { ?>
<div class="row">
        <div class="col-xs-12">
<!--            <h6 class="lockscreen-logo"> <b>MALANG EYE CENTER</b></h6>
            <p class="lockscreen-logo">Kota Malang</p>-->
            <table width="100%">
                <tr>
                    <td align="center"><strong><u>MALANG EYE CENTER</u></strong></td>
                </tr>
                <tr>
                    <td align="center"><strong>Kota Malang</strong></td>
                </tr>
            </table>
        </div>
        <!-- /.col -->
</div><br>
<div class="row invoice-info">
        <div class="col-sm-6 invoice-col">
         
         <table width="100%">
                <tr>
                    <td><strong>Nama</strong></td>
                    <td>:</td>
                    <td> <?= $row->nama;?></td>
                </tr>
                <tr>
                    <td><strong>No. Rekam Medis</strong></td>
                    <td>:</td>
                    <td> <?= $row->kode_pasien;?></td>
                </tr>
                <tr>
                    <td><strong>Alamat</strong></td>
                    <td>:</td>
                    <td> <?= $row->alamat ? $row->alamat : '-';?> </td>
                </tr>
               
            </table>
        </div>
        <!-- /.col -->
        
        <!-- /.col -->
        <div class="col-sm-6 invoice-col">
          <b>Invoice #007612</b><br>
          <br>
          <b>Order ID:</b> 4F3S8J<br>
          <b>Payment Due:</b> 2/22/2014<br>
          <b>Account:</b> 968-34567
        </div>
        <!-- /.col -->
      </div>
        <div class="clearfix"></div>
        <div class="modal-footer ">
            <!--<button class="btn btn-info" type="submit"> Simpan</button>-->
            <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
        </div>
    <!--</form>-->
<!--</div>-->
    <?php
}
?>