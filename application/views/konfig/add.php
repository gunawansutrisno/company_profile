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
                        <div class="col-md-6">
                            <h3>Basic information:</h3><hr>
                            <div class="form-group">
                                <label>Company name</label>
                                <input name="namaweb" class="form-control" required="" type="text" placeholder="Nama organisasi/perusahaan" value="<?= $data['namaweb'] ? $data['namaweb'] : '' ?>">
                            </div>

                            <div class="form-group">
                                <label>Company tagline/motto</label>
                                <input name="tagline" class="form-control" type="text" placeholder="Company tagline/motto" value="<?= $data['tagline'] ? $data['tagline'] : '' ?>">
                            </div>

                            <div class="form-group">
                                <label>Summary of the company</label>
                                <textarea name="tentang" class="form-control" placeholder="Summary of the company" rows="3"><?= $data['tentang'] ? $data['tentang'] : '' ?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Website address</label>
                                <input name="website" class="form-control" type="url" placeholder="http://localhost/APPISO/" value="<?= $data['website'] ? $data['website'] : '' ?>">
                            </div>

                            <div class="form-group">
                                <label>Official email</label>
                                <input name="email" class="form-control" required="" type="email" placeholder="youremail@address.com" value="<?= $data['email'] ? $data['email'] : '' ?>">
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="alamat" class="form-control" placeholder="Alamat perusahaan/organisasi" rows="3"><?= $data['alamat'] ? $data['alamat'] : '' ?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Phone number</label>
                                <input name="telepon" class="form-control" type="text" placeholder="+62341-000000" value="<?= $data['telepon'] ? $data['telepon'] : '' ?>">
                            </div>

                            <div class="form-group">
                                <label>Fax</label>
                                <input name="fax" class="form-control" type="text" placeholder="021-000000" value="<?= $data['fax'] ? $data['fax'] : ''; ?>">
                            </div>

                            <div class="form-group">
                                <label>Mobile / Celluler</label>
                                <input name="hp" class="form-control" type="text" placeholder="021-000000" value="<?= $data['hp'] ? $data['hp'] : ''; ?>">
                            </div>

                            <h3>Social network</h3><hr>

                            <div class="form-group">
                                <label>Facebook <i class="fa fa-facebook"></i></label>
                                <input name="facebook" class="form-control" type="url" placeholder="http://facebook.com/namakamu" value="<?= $data['facebook'] ? $data['facebook'] : ''; ?>">
                            </div>

                            <div class="form-group">
                                <label>Twitter <i class="fa fa-twitter"></i></label>
                                <input name="twitter" class="form-control" type="url" placeholder="http://twitter.com/namakamu" value="<?= $data['twitter'] ? $data['twitter'] : ''; ?>">
                            </div>

                            <div class="form-group">
                                <label>Instagram <i class="fa fa-instagram"></i></label>
                                <input name="instagram" class="form-control" type="url" placeholder="http://instagram.com/namakamu" value="<?= $data['instagram'] ? $data['instagram'] : ''; ?>">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <h3>Modul SEO (Search Engine Optimization)</h3><hr>
                            <div class="form-group">
                                <label>Keywords (Keyword search for Google, Bing, etc)</label>
                                <textarea name="keywords" class="form-control" placeholder="Kata kunci / keywords" rows="3"><?= $data['keywords'] ? $data['keywords'] : ''; ?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Metatext</label>
                                <textarea name="metatext" class="form-control" placeholder="Kode metatext" rows="5"></textarea>
                            </div>

                            <h3>Google Map</h3><hr>
                            <div class="form-group">
                                <label>Google Map</label>
                                <textarea name="google_map" class="form-control" placeholder="Kode dari Google Map" rows="5"><?= $data['google_map'] ? $data['google_map'] : ''; ?></textarea>
                            </div>

                            <div class="form-group map">
                                <?= $data['google_map'] ? $data['google_map'] : ''; ?>
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
