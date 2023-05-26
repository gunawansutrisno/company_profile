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
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Action</h3>
                </div>
                <!--<div class="col-md-9">-->
                <div class="nav-tabs-custom" id="tabs">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true"><span class="glyphicon glyphicon-file text-aquao"></span> Input Kwintansi</a></li>
                        <li><a href="#timeline" data-toggle="tab" aria-expanded="false"><span class="glyphicon glyphicon-stats text-aquao"> History Kwintansi</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="activity">
                            <form class="form-horizontal" action="<?= base_url('peserta/save'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                
                                

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Noka</label>

                                    <div class="col-sm-4">
                                        <input type="text" name="id" class="form-control" id="id" placeholder="Noka" style="width:500px;">
                                    </div>

                                </div>
                                

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <!--<button type="submit"  name="import" value="Import" class="btn btn-danger">Submit</button>-->
                                        <button type="submit"  name="preview" value="Preview" class="btn btn-primary btn-flat" >Submit</button>
                                        <button type="reset"  name="reset" value="reset" class="btn btn-warning btn-flat">Reset</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="tab-pane" id="timeline">
                            <form class="form-horizontal" action="<?= base_url('kwintansi/searching'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nama Pasien</label>
                                    <div class="col-sm-5">
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pasien">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-info btn-flat" id="btnFilterPasien"><span class="glyphicon glyphicon-search"></span> Cari</button>
                                            </span>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_pasien" value="" id="id" >
                                </div>
                                
                            </form>

                        </div>
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
        </div>
        <!-- Barang -->

        <!-- END Modal Ubah -->
    </div>
</section><!-- /.content -->

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
                    <button type="submit" class="btn btn-outline" data-dismiss="modal" onclick="myFunction()">OK</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<?php endif; ?>
