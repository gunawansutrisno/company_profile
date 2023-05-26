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
                <form role="form" action="<?php echo $base_url; ?>" method="post" id="formAgenr">
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Pasien</label>
                                 <input type="text" placeholder="Nama Pasien" class="form-control pull-right" name="nama_pasien" value="<?= (isset($nama)) ? $nama : ''; ?>" id="nama_pasien">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nomer Telphone</label>
                                <input type="text" placeholder="No Telp Pasien" class="form-control pull-right" name="telp" value="<?= (isset($telp)) ? $telp : ''; ?>" id="telp">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">No.RM Pasien</label>
                                 <input type="text" placeholder="No RekamMedis Pasien" class="form-control pull-right" name="kode_pasien" value="<?= (isset($kode_pasien)) ? $kode_pasien : ''; ?>" id="kode_pasien">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat </label>
                                 <input type="text" placeholder="Alamat Pasien" class="form-control pull-right" name="alamat" value="<?= (isset($alamat)) ? $alamat: ''; ?>" id="alamat">
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
                        <a type="button" id="btnFilter"class="btn btn-primary btn-flat">Cari</a><a><button type="reset" id="reset"class="btn bg-orange btn-flat">Reset</button></a>
                    </div>
                </form>
            </div>
            <!-- /.box -->

        </div>
        <!-- Barang -->
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header">
                    <h3 class="box-title">List Data Pasien</h3>
                    <button type="button" data-toggle="modal" data-target="#tambah-data" class="btn bg-maroon btn-flat margin pull-right">Tambah Pasien</button>
                    <!--<a data-toggle="modal" data-target="#tambah-data" class="btn btn-primary "></a>-->
                     <!--<a href="<?php echo $base_url; ?>add/" class="btn btn-primary pull-right">Tambah siswa</a>-->
                </div>
                <div class="box-body">
                    <table class="table table-hover table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>NOSEP</th>
                                <th>Noka</th>
                                <th>Nama Pasien</th>
                                <th>Jenis Rawat</th>
                                <th>Tanggal Periksa</th>
                                <th>Action
                                </th>
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
                        <h4 class="modal-title" style="color:white;"><b>Tambah Data Pasien</b></h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('pasien/'); ?>save" method="post" id="pasien">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kode Pasien</label>
                                    <input type="text" class="form-control" name="" value="<?= $kode; ?>" readonly="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>No. RM Pasien</label>
                                    <input type="text" class="form-control" name="kode_pasien" placeholder="Nomor RekamMedis Pasien" required="">
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

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" required="" id="alamat" rows="2" name="alamat" placeholder="alamat Pasien"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <label>Tanggal Lahir</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <table class="col-md-12">
                                    <thead>
                                        <tr>
                                            <td>
                                                <select class="form-control" required="" name="tanggal">
                                                    <option>--Tanggal--</option>
                                                    <?php for ($i = 1; $i <= 31; $i++) { ?>
                                                        <option value="<?= $i; ?>"><?= $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control" required="" name="bulan">
                                                    <option>--Bulan--</option>
                                                    <?php
                                                    $data = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                                                    foreach ($data as $key => $tanggal) {
                                                        ?>
                                                        <option value="<?= $key + 1; ?>"><?= $tanggal; ?></option>
<?php } ?>

                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control" required="" name="tahun" id="tahun">
                                                    <option>--Tahun--</option>
                                                    <?php
                                                    $date = date('Y');
                                                    for ($i = 1904; $i <= $date; $i++) {
                                                        ?>

                                                        <option value="<?= $i; ?>"><?= $i; ?></option>
<?php } ?>

                                                </select>
                                            </td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>No Telp</label>
                                    <input type="text" class="form-control" id="ni" name="telp" placeholder="No telphone" maxlength="12">
                                </div>
                                <span id="pesan" style="color:red"></span>
                            </div>
                            <!--                            <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Tempat Lahir</label>
                                                                <input type="text" required="" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Agama</label>
                                                                <select id="agama" required=""  name="agama" class="form-control">
                                                                    <option value="">-- Agama --</option>
                                                                    <option value="islam">Islam</option>
                                                                    <option value="hindu">Hindu</option>
                                                                    <option value="budha">Budha</option>
                                                                    <option value="katholik">Katholik</option>
                                                                    <option value="kristen">Kristen</option>
                            
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Pekerjaan</label>
                                                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan">
                                                            </div>
                                                        </div>-->



                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Umur</label>
                                    <input type="text" class="form-control" name="umur" placeholder="Umur" id="age" readonly="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Dokter</label>
                                    <select required=""  name="id_dokter" class="form-control">
                                        <option value="">-- Pilih Dokter --</option>
                                        <?php foreach ($dokter as $row) { ?>
                                            <option value="<?= $row->kode_dokter; ?>"><?= $row->nama_siswa; ?></option>
<?php } ?>
                                    </select>
                                    <!--<input type="text" class="form-control" name="pendidikan" placeholder="Pendidikan">-->
                                </div>
                            </div>
                            <!--                            <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Kode Pos</label>
                                                                <input type="text" class="form-control" name="kodepos" placeholder="Kode Pos" maxlength="5">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="form-group">
                                                                <label>Keluhan</label>
                                                                <input type="text" class="form-control" name="keluhan" id="keluhan" placeholder="keluhan">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Riwayat Penyakit</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <table class="col-md-12">
                                                                <thead>
                                                                    <tr>
                                                                        <td>Diabetes</td>
                                                                        <td>Hipertensi</td>
                                                                        <td>Sakit Jantung</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="diabetes" value="ya"> Ya</td>
                                                                        <td><input type="checkbox" name="Hipertensi" value="ya"> Ya</td>
                                                                        <td><input type="checkbox" name="sakit_jantung" value="Ya"> Ya</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="diabetes" value="tidak"> Tidak</td>
                                                                        <td><input type="checkbox" name="Hipertensi"  value="tidak"> Tidak</td>
                                                                        <td><input type="checkbox" name="sakit_jantung" value="tidak"> Tidak</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" name="diabetes" value="t_tahu"> Tidak Tahu</td>
                                                                        <td><input type="checkbox" name="Hipertensi"  value="t_tahu"> Tidak Tahu</td>
                                                                        <td><input type="checkbox" name="sakit_jantung" value="t_tahu"> Tidak Tahu</td>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>-->
                            <!--                            <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Kecamatan</label>
                                                                <input type="text" class="form-control" name="provinsi" placeholder="Umur">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Kelurahan</label>
                                                                <input type="text" class="form-control" name="provinsi" placeholder="Umur">
                                                            </div>
                                                        </div>-->
                            <!--                            <div class="col-md-12">
                                                            <div class="form-group">
                                                            </div>
                                                        </div>-->
                            <!--                            <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>&nbsp;</label>
                                                            </div>
                                                        </div>-->
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
                        <h4 class="modal-title" style="color:white;"><b>Ubah Data Pasien</b></h4>
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
                        <h4 class="modal-title" style="color:white;"><b>Detail Data Pasien</b></h4>
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
