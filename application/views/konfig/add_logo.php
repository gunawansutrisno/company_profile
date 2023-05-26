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
                <form role="form" action="<?php echo $base_url; ?>save" method="post" id="formAgenr" enctype="multipart/form-data" method="post">
                    <div class="box-body">
                        <input type="hidden" name="id" value="<?= $data['id_konfigurasi']; ?>"/>
                        <input type="hidden" name="code" value="logo"/>
                        <div class="col-md-6">
                            <h3>New Logo:</h3><hr>
                            <div class="form-group">
                                <label>Upload New Logo</label>
                                <input name="file" class="form-control" type="file" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3>Your current icon</h3><hr>
                            <div class="form-group">
                                
                                <img src="<?= BASE_URL();?>assets/frontend/images/<?= $data['logo'];?>" height="" width=""/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="clearfix"></div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat"><span class="glyphicon glyphicon-save-file"></span> Simpan</button> 
                        <a><button type="reset" id="reset"class="btn bg-orange btn-flat">Reset</button></a>
                    </div>
                </form>
            </div>
            <!-- /.box -->

        </div>
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
                    <button type="button" class="btn btn-outline" data-dismiss="modal">OK</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<?php endif; ?>
