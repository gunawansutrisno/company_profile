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
        <form action="<?php echo $base_url; ?>save" method="post" id="formTransaksi" class="form-horizontal">
            <!-- Agen -->
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="box box-success">
                            <div class="box-header">
                                <h3 class="box-title" id="form-head">KOP SURAT</h3>
                            </div>
                            <div class="box-body">                  
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Jenis Surat</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" id="index_row" name="index_row" value="1" />
                                        <select id="id_surat" style="" name="jenis_surat" class="form-control select2" required >
                                            <option value="">Pilih Jenis Surat</option>

                                            <option value="surat masuk"> Surat Masuk </option>
                                            <option value="surat Keluar"> Surat Keluar </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nama KOP</label>
                                    <div class="col-sm-9">
                                        <select id="kop" style="" name="kepala_kop" class="form-control select2 pilih_barang" required disabled="disabled">
                                            <option value="0">Pilih Nama Perusahaan</option>
                                            <?php foreach ($perusahaan as $a): ?>
                                                <option value="<?= $a->in_bahasa ?>"><?= $a->code ?> - <?= $a->in_bahasa ?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tanggal Surat</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="<?= date("d-m-Y") ?>" style=""  class="form-control tanggal"  name="tanggal_terima" id="date1" required disabled="disabled">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-sm-3 control-label">&nbsp;</label>
                                    <div class="col-sm-9">
                                        <!--<input type="text" class="form-control isi_kop" placeholder="EX: FORMULIR KARTU KENDALI" name="isi_kop" required disabled="disabled">-->
                                    </div>
                                </div>
                            </div><!-- /.box-body -->
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="box box-success">
                            <div class="box-header">
                                <h3 class="box-title" id="form-head">Data Surat</h3>
                            </div>
                            <div class="box-body">                  
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Kategori</label>
                                    <div class="col-sm-9">
                                        <select id="id_perusahaan" style="" name="kategori" class="form-control select2 kategori" required disabled="disabled">
                                            <option value="0">Pilih Jenis Kategori</option>
                                            <?php foreach ($ind as $a): ?>
                                                <option value="<?= $a->name ?>"> <?= $a->name ?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
<!--                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tanggal Surat</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="<?= date("d-m-Y") ?>" style=""  class="form-control"  name="tanggal_masuk" id="date2" required>
                                    </div>
                                </div>-->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">No. Urut</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control nomor" placeholder="EX: 00001" name="nomor" value="<?= $no;?>" required disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">No. Surat</label>
                                    <div class="col-sm-9">
                                        <input type="text" required  class="form-control no_surat" placeholder="EX: ST-DINAS/IA-MMI/01/X/2000" name="nomor_surat" id="no_telpon" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" id="form-head">&nbsp;</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="formnomor" style="display: none;" required="required" class="form-control kode" placeholder="No. Surat masuk" name="nomasuk"  disabled="disabled">
                                    </div>
                                </div>
                       

                            </div><!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="box box-success">
                            <div class="box-header">
                                <h3 class="box-title" id="form-head">Isi Ringkasan</h3>
                            </div>
                            <div class="box-body">                  
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <textarea id="editor1" rows="10" cols="80" name="isi_ringkasan" rows="3" placeholder="isi ringkasan surat ..." required></textarea>
                                    </div>
                                </div>

                            </div> 

                        </div>
                    </div>
                </div>
            </div>  

            <!-- Barang -->
            <div class="col-md-12">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Data ISI Surat</h3>
                    </div>

                    <div class="box-body table-responsive ">
                        <table class="table table-hover table-striped" id="tabel_barang">
                            <tr>
                                <th style="width:30%">Dari</th>
                                <th>Kepada</th>
                                <th>Aksi</th>
                            </tr>
                            <tr id="barang_0" style="display: none;" data-id="0">
                                <td>
                                    <input type="text" value=""  class="form-control" placeholder="Dari" name="dari_0" id="dari_0">
                                </td>
                                <td>
                                    <input type="text" value=""  class="form-control" placeholder="kepada" name="kepada_0" id="kepada_0">
                                </td>
                                <td>
                                    <a href="javascript:void(0)" onclick="removeBarang('barang_0')" class="btn btn-danger" style="display: none;"  name="delete_0" id="delete_0"><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                            <tr id="barang_1" data-id="1">
                                <td>
                                    <input type="text" value=""  class="form-control" placeholder="Dari" name="dari_1" id="id_barang_1">
                                </td>
                                <td>
                                    <input type="text" value="" class="form-control maks" placeholder="kepada" name="kepada_1" id="diskon_1" required>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="box-footer clearfix">
                        <a href="javascript:void(0)" id="add_barang" style="display: none;" onclick="addBarang()" class="btn btn-success pull-right btn-flat"><span class="glyphicon glyphicon-plus"></span> Tambah Penerima</a>
                        <button type="submit" id="simpan" style="display: none;" class="btn btn-primary pull-right btn-flat"><span class="glyphicon glyphicon-save-file"></span> Simpan</button>
                    </div>
                </div>
        </form>
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
