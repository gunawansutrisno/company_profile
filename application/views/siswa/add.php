<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?= $title ?>
    </h1>
    <?= $breadcrumbs ?>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
<!--            <div class="col-md-12">
           general form elements 
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Filter</h3>
            </div>
             /.box-header 
             form start 
            <form action="<?php echo $base_url; ?>" method="post" id="formAgenr" role="form">
              <div class="box-body">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">NIP</label>
                      <input type="text" placeholder="NIP" class="form-control pull-right" name="nis" value="<?= (isset($nis)) ? $nis : ''; ?>" id="nis">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Nama Dokter</label>
                      <input type="text" placeholder="Nama Dokter" class="form-control pull-right" name="id_siswa" value="<?= (isset($id_siswa)) ? $id_siswa : ''; ?>" id="id_siswa">
                    </div>
                  </div>
              </div>
                <div class="col-md-6">
                    <div class="form-group">
                    </div>
                  </div>
               /.box-body 
              <div class="clearfix"></div>
 <div class="box-footer">
                                    <button type="submit" id="btnFilter"class="btn btn-primary btn-flat">Cari<button type="reset" id="reset"class="btn bg-orange btn-flat">Reset</button>
                                    <button type="reset" id="btnFilter"class="btn btn-primary">Cari</button>
                                </div>
            </form>
          </div>
           /.box 

        </div>-->
        <!-- Barang -->
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header">
                    <h3 class="box-title">List Data</h3>
                    <?php if($user == 1){ ?>
                    <button type="button" data-toggle="modal" data-target="#tambah-data" class="btn bg-maroon btn-flat margin pull-right"><span class="glyphicon glyphicon-plus"></span></button>
                      
                    <?php } ?></div>
                <div class="box-body">
                    <table class="table table-hover table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Judul</th>
                                <th>Jenis</th>
                                <th>Revisi</th>
                                <th>Status</th>
                                <th>Last Create</th>
                                <th>Last Update</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="box-footer clearfix">

                </div>
            </div>

        </div> 
        <!-- Modal Tambah -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #00a65a;">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title" style="color:white;"><b>Tambah Data</b></h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('iso/'); ?>save" enctype="multipart/form-data" method="post">
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label>Code</label>
                                    <input type="text" class="form-control" name="code" placeholder="Kode Document Iso" required="">
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" class="form-control" name="judul" placeholder="Judul Document" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis</label>
                                    <input type="text" required="" class="form-control" name="jenis" placeholder="Jenis Document">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>File</label><br>
                                   <input type="file" name="file">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>&nbsp;</label>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="modal-footer ">
                                <button class="btn btn-info btn-flat btn-sm" type="submit">Simpan</button><button type="button" class="btn btn-warning btn-flat btn-sm" data-dismiss="modal"> Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Ubah -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #00a65a;">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title" style="color:white;"><b>Ubah Data Dokter</b></h4>
                    </div>
                    <div class="modal-body">
                        <div class="fetched-data"></div>

                    </div>

                </div>
            </div>
        </div>
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="detail-data" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #00a65a;">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title" style="color:white;"><b>preview</b></h4>
                    </div>
                    <div class="modal-body">
                        <div class="fetched-data"></div>

                    </div>

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
                    <h4><b> Apakah Anda yakin ingin menghapus data Document ini ? </b></h4>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-danger" id="hapus-true-data">Hapus</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                </div>
                 
                </div>
            </div>
        </div>
        <div id="active-data" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header"  style="background-color: #00a65a;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" style="color:white;"><b>Konfirmasi</b></h4>
                </div>
                <div class="modal-body">
                    <h4><b> Apakah Anda yakin ingin Mengaktifkan data Document ini ? </b></h4>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-success" id="simpan-true-data">Simpan</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                </div>
                </div>
            </div>
        </div>
        <div id="deactive-data" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header"  style="background-color: #00a65a;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" style="color:white;"><b>Konfirmasi</b></h4>
                </div>
                <div class="modal-body">
                    <h4><b> Apakah Anda yakin ingin Mengnon aktifkan data Document ini ? </b></h4>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-success" id="simpan-true-data">Simpan</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                </div>
                </div>
            </div>
        </div>
        <!-- END Modal Ubah -->
    </div>
</section><!-- /.content -->

<!-- alert -->
<?php
$alert = $this->session->flashdata("alert_siswa");
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
