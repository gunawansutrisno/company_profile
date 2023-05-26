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
        <!-- Barang -->
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header">
                    <h3 class="box-title">List Data</h3>
                    <?php if($user == 1){ ?>
                    <a href="<?= $base_url;?>"><button type="button"  class="btn bg-maroon btn-flat margin pull-right"><span class="glyphicon glyphicon-plus"></span> New Article</button>
                    </a>
                    <?php } ?></div>
                <div class="box-body">
                    <table class="table table-hover table-striped" id="datatable">
                        <thead>
                            <tr>
                                <!--<th>Kode</th>-->
                                <th>Kategori</th>
                                <th>Jenis</th>
                                <th>Judul</th>
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
        
        <!-- Modal Ubah -->
        <div id="edit-data" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header"  style="background-color: #00a65a;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" style="color:white;"><b>Konfirmasi</b></h4>
                    </div>
                    <div class="modal-body">
                        <h4><b> Apakah Anda yakin ingin mengedit data Article ini ? </b></h4>
                    </div>
                    <!--                    <div class="modal-body">
                                            <div class="fetched-data"></div>
                    
                                        </div>-->
                    <form action="<?= base_url('article/edit/'); ?>" method="post">
                        <input type="hidden" name="id" id="id" value="" >
                        <div class="modal-footer ">
                            <button class="btn btn-success btn-flat" type="submit"> Iya</button>
                            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"> TidaK</button>
                        </div>
                    </form>
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
