    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=$title?>
      </h1>
      <?php echo $breadcrumbs;?>
      <?=$breadcrumbs?>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4">
            <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title" id="form-head">Tambah Pelajaran</h3>
                </div>
                <div class="box-body">
                  <form action="<?php echo $base_url; ?>save" method="post" id="formJenisbarang">
                    <input type="hidden" id="id" name="id" value="" />
                    <div class="form-group">
                        <label>Pelajaran</label>
                        <input type="text" class="form-control" placeholder="Mata Pelajaran" name="nama" id="pelajaran" required="required">
                        <p class="help-block">Nama Mata Pelajaran</p>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Jam</label>
                        <input type="text" class="form-control" placeholder="Jumlah Jam Mata Pelajaran" name="jumlah_jam" id="jumlah_jam" required="required">
                        <p class="help-block">Jumlah Jam Mata Pelajaran</p>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="<?php echo BASE_URL('pelajaran');?>"><button type="button" style="display: none;"  id="batal" class="btn btn-danger">Batal </button></a>
                    </div>
                  </form>
                </div><!-- /.box-body -->
              </div>
        </div>
        <div class="col-md-8">
            <div class="box box-warning">
                <div class="box-header">
                  <h3 class="box-title">Daftar Pelajaran</h3>
                </div>
                
                <div class="box-body table-responsive ">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Nama Mata Pelajaran</th>
                            <th>Jumlah Jam Pelajaran</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($data as $d):?>
                        <tr>
                            <td><a href="#" id="<?= $d->id?>" onclick="loadData('<?php echo $base_url; ?>edit/<?=$d->id?>')"><?=$d->nama?></a></td>
                            <td><?=$d->jumlah_jam?></td>
                            <td><a href="#" data-id="<?=$d->id?>" data-toggle="modal" data-target="#delete-data" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="box-footer clearfix">
                    <?=$pagination?>
                </div>
            </div>
        </div>
          <div id="delete-data" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                 
                <div class="modal-header"  style="background-color: #00a65a;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" style="color:white;"><b>Konfirmasi</b></h4>
                </div>
                <div class="modal-body">
                    <h4><b> Apakah Anda yakin ingin menghapus Master data Pelajaran  ini ? </b></h4>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-danger" id="hapus-true-data">Hapus</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                </div>
                 
                </div>
            </div>
        </div>
      </div>
    </section><!-- /.content -->
    
    <!-- alert -->
    <?php
      $alert = $this->session->flashdata("alert_pelajaran");
      if(isset($alert) && !empty($alert)):
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
            <h4 class="modal-title"><span class="icon fa fa-<?php echo $icon ?>"></span> <?php echo $status?></h4>
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
