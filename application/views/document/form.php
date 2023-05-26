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
                    <h3 class="box-title">Create Article</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="<?php echo $base_url; ?>" method="post" id="formAgenr" enctype="multipart/form-data" method="post">
                    <div class="box-body">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                 <input type="text" placeholder="Title Article" class="form-control pull-right" name="title" value="<?= (isset($nama)) ? $nama : ''; ?>" id="nama_pasien">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Status</label>
                                    <select required=""  name="status" id="status" class="form-control select2">
                                        <option value="">-- Pilih Jenis Status --</option>
                                        <option value="1"> Published    </option>
                                        <option value="0"> Unpublished  </option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kategori</label>
                                    <select required=""  name="kategori" id="kategori" class="form-control select2">
                                        <option value="0">-- Pilih Kategori --</option>
                                        <?php foreach ($kategori as $row){ ?>
                                        <option value="<?= $row->id;?>"> <?= strtoupper($row->name) ?>  </option>
                                        <?php } ?>
                                    </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sub Kategori </label>
                                    <select   name="subkategori" id="subkategori" class="form-control select2">
                                        <option value="">-- Pilih Sub Kategori --</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Child Menu Kategori</label>
                                    <select   name="jenis" id="jenis" class="form-control select2">
                                        <option value="">-- Pilih Kategori --</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Upload File </label>
                                <input type="file" name="file">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Deskripsi </label>
                                    <textarea id="editor1" rows="10" cols="80" name="deskripsi" rows="3" placeholder="isi Deskripsi ..." required></textarea>
                             
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
