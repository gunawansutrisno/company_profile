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
                    <h3 class="box-title">Filter</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
               <form role="form" class="form-horizontal" action="<?php echo $base_url; ?>" method="post" id="formAgenr">
                    <div class="box-body">
                        <label for="inputEmail3" class="col-sm-2 control-label">No. Peserta</label>

                  <div class="col-sm-6">
                    <input type="text" placeholder="No Peserta Pasien" class="form-control pull-right" name="no_rm" value="<?= (isset($kode_pasien)) ? $kode_pasien : ''; ?>" id="no_rm">
                            
                  </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="clearfix"></div>
                    <div class="box-footer">
                        <a type="button" id="btnFilter"class="btn btn-primary btn-flat">Cari</a><a><button type="reset" id="reset"class="btn bg-orange btn-flat">Reset</button></a>
                        <a href="<?= base_url('oprasi');?>"><button type="submit" class="btn btn-default btn-flat pull-right">Cancel</button></a>
                    </div>
                </form>
            </div>
            <!-- /.box -->

        </div>
        <!-- Barang -->
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header">
                    <h3 class="box-title">List Data Pasien Oprasi</h3>
                    <button type="button" data-toggle="modal" data-target="#tambah-data" class="btn bg-maroon btn-flat margin pull-right">Tambah Pasien</button>
                    <!--<a data-toggle="modal" data-target="#tambah-data" class="btn btn-primary "></a>-->
                     <!--<a href="<?php echo $base_url; ?>add/" class="btn btn-primary pull-right">Tambah siswa</a>-->
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-hover table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>No. Pasien</th>
                                <th>Nama Pasien</th>
                                <th>Jenis Tindakan</th>
                                <th>Dokter / Operator</th>
                                <th>Tgl Tindakan</th>
                                <th>Keterangan</th>
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
                        <h4 class="modal-title" style="color:white;"><b>Tambah Data Pasien Oprasi</b></h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('oprasi/'); ?>save" method="post" id="pasien">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>No. Pasien</label>
                                    <input type="text" class="form-control" name="kode_pasien" placeholder="Nomor Pasien" id="noka" required="">
                                </div>
                                   <!--<span id="pesa" style="color:red"></span>-->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Pasien</label>
                                    <input type="text" required="" class="form-control" id="nama" name="nama_pasien" placeholder="Nama Pasien">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label><br>
                                    <input type="radio" value="laki-laki" name="jk"> Laki-laki
                                    &nbsp;
                                    <input type="radio" name="jk" value="perempuan"> Perempuan

                                </div>
                            </div>

                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tgl Jadwal Tindakan</label>
                                    <input type="text" value="<?= date("d/m/Y")?>" style="" class="form-control" name="tanggal" id="tanggal">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis Tindakan</label>
                                    <select required=""  name="jenis" id="jenis" class="form-control">
                                        <option value="">-- Pilih Jenis Tindakan --</option>
                                         <?php foreach ($jenis as $row) { ?>
                                            <option value="<?= $row->id; ?>"> <?= $row->name;?> </option>
<?php } ?>
                                    </select>
                                    <!--<input type="text" class="form-control" name="pendidikan" placeholder="Pendidikan">-->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Dokter / Operator</label>
                                    <select required=""  name="id_dokter" id="id_dokter" class="form-control">
                                        <option value="">-- Pilih Dokter --</option>
                                        <?php foreach ($dokter as $row) { ?>
                                            <option value="<?= $row->id; ?>"><?= $row->kode_dokter; ?> ( <?= $row->nama_siswa;?> )</option>
<?php } ?>
                                    </select>
                                    <!--<input type="text" class="form-control" name="pendidikan" placeholder="Pendidikan">-->
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea class="form-control" required="" rows="2" name="notes" placeholder="Keterangan"></textarea>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="modal-footer ">
                                <button class="btn btn-info btn-flat btn-sm" type="submit">Simpan</button>
                                <button type="button" class="btn btn-warning btn-flat btn-sm" data-dismiss="modal"> Batal</button>
                                <button type="reset" class="btn btn-danger btn-flat btn-sm" data-dismiss="modal"> Reset</button>
                            </div>
                        </form>
                    </div>
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
                        <h4 class="modal-title" style="color:white;"><b>Ubah Data Pasien</b></h4>
                    </div>
                    <div class="modal-body">
                        <div class="fetched-data"></div>

                    </div>

                </div>
            </div>
        </div>
        <div id="update-data" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header"  style="background-color: #00a65a;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" style="color:white;"><b>Konfirmasi</b></h4>
                    </div>
                    <div class="modal-body">
                        <h4><b> Apakah Anda yakin ingin mengupdate data Pasien ini ? </b></h4>
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-success" id="update-true-data">Konfirmasi</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
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
                        <h4><b> Apakah Anda yakin ingin menghapus data Pasien ini ? </b></h4>
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-danger" id="hapus-true-data">Hapus</a>
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
$alert = $this->session->flashdata("alert_diagnostik");
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
