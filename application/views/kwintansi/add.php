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
                            <form class="form-horizontal" action="<?= base_url('kwintansi/save'); ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">No. SEP</label>
                                    <div class="col-sm-5">
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" name="nosep" id="nosep" placeholder="No SEP">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-info btn-flat" id="btnFilter"><span class="glyphicon glyphicon-search"></span> Cari</button>
                                            </span>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_pasien" value="" id="id" >
                                    <input type="hidden" name="namapasien" value="" id="name" >
                                     <div class="col-sm-3">
                                          <input type="text" class="form-control"  name="rm" id="kode_pasien" placeholder="Remak Medik"  required="">
                                     </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Sudah Terima Dari</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Pasien" readonly="" required="">
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="input-group date">
                                            <input type="text" class="form-control pull-left" name="noka" id="noka"  placeholder="Noka Pasien" readonly="">
                                        </div>
                                    </div>
                                    <div class="col-sm-0">
                                        <div class="input-group date">
                                            <input  class="form-control pull-left" name="tgl_periksa" id="tgl_periksa" type="text" placeholder="TGL Priksa" readonly="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Pembayaran</label>
                                    <div class="col-sm-6">
                                        <select name="jenis" class="form-control select2" required="">
                                            <option value="">-- Pilih Jenis Tindakan --</option>
                                            <?php foreach ($jenis as $row) { ?>
                                                <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">FKTP</label>

                                    <div class="col-sm-4">
                                        <input type="text" name="ppk" class="form-control" id="title" placeholder="PPK1 / Faskes" style="width:500px;">
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="input-group date">
                                            <input  class="form-control pull-left" name="kodePKK" id="code" placeholder="Kode FKTP" type="text" readonly="">
                                        </div>
                                    </div>

                                </div>
<!--                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Dengan / Operator</label>
                                    <div class="col-sm-6">
                                        <select id="status_pembayaran" style="" name="dokter" class="form-control select2" required="">
                                            <option value="">-- Pilih Dokter --</option>
                                            <?php foreach ($dokter as $row) { ?>
                                                <option value="<?= $row->id; ?>"><?= $row->kode_dokter; ?> ( <?= $row->nama_siswa; ?> )</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>-->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Dokter</label>
                                    <div class="col-sm-4">
                                        <select id="status_pembayaran" style="" name="dokter" class="form-control select2" required="">
                                            <option value="">-- Pilih Dokter --</option>
                                            <?php foreach ($dokter as $row) { ?>
                                                <option value="<?= $row->id; ?>"><?= $row->kode_dokter; ?> ( <?= $row->nama_siswa; ?> )</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                       <label class="control-label form-label"> Operator</label>
                                    </div>
                                    <div class="col-sm-0">
                                        <div class="input-group date">
                                           <select id="status_pembayaran" style="" name="dokter_operator" class="form-control select2" required="">
                                                <option value="">-- Pilih Dokter --</option>
                                                <?php foreach ($dokter as $row) { ?>
                                                    <option value="<?= $row->kode_dokter; ?>"><?= $row->kode_dokter; ?> ( <?= $row->nama_siswa; ?> )</option>
                                                <?php } ?>
                                            </select>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tarif Rumah Sakit</label>
                                    <div class="col-sm-3">
                                        <div class="input-group date">
                                            <input type="text" class="form-control money-input" maxlength="11" name="nominal" placeholder="Nominal" required="">
                                        </div>
                                    </div>
                                    <div class="col-sm-3 text-center">
                                        <label class="control-label form-label"> Tarif INACBG</label>
                                    </div>
                                    <div class="col-sm-0">
                                        <div class="input-group date">
                                            <input type="text" class="form-control money-input" maxlength="11" name="nominalINACBG" placeholder="Nominal" required="">

                                        </div>
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
