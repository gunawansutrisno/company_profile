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
       
            <!-- Agen -->
            <div class="col-md-12">
                <div class="row">

                    <div class="col-md-12">
                        <div class="box box-success">
                            <div class="box-header">
                                <h3 class="box-title" id="form-head">Filter</h3>
                            </div>
                                <form action="<?php echo $base_url; ?>" method="post" id="formAgenr" class="form-horizontal">
                                    <div class="box-body">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Kode Obat</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control pull-right" name="kode" placeholder="Kode Obat" value="<?= (isset($kode_obat)) ? $kode_obat : ''; ?>" id="kode">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Nama Obat</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control pull-right" name="nama_obat" placeholder="Nama Obat" value="<?= (isset($nama_obat)) ? $nama_obat : ''; ?>" id="nama_obat">
                                        </div>
                                    </div>
        <!--                                <div class="form-group">
                                        <label class="col-sm-3 control-label">Program Keahlian</label>
                                        <div class="col-sm-4">
                                            <select id="id_pelajaran"  name="id_pelajaran" class="form-control select2">
                                                <option value="">Pilih Program Keahlian</option>
                                                <?php foreach ($pelajaran as $r) { ?>
                                                    <option value="<?= $r['id'] ?>"><?= $r['nama'] ?></option>
                                                <?php } ?>

                                            </select>
                                            </select>
                                        </div>
                                    </div>-->

                                    <div class="box-footer">
                                        <a type="button" id="btnFilter"class="btn btn-primary btn-flat">Cari</a><a><button type="reset" id="reset"class="btn bg-orange btn-flat">Reset</button></a>
                                    </div>
                                   </div>
                            </form><!-- /.box-body -->
                        </div>
                    </div>
                </div>
            </div>  
        <!-- Barang -->
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header">
                    <h3 class="box-title">List Data Obat</h3>
                    <button type="button" data-toggle="modal" data-target="#tambah-data" class="btn bg-maroon btn-flat margin pull-right">Tambah Dokter</button>
                    
                </div>
                <div class="box-body">
                    <table class="table table-hover table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>Kode Obat</th>
                                <th>Nama Obat</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Jenis Obat</th>
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
                        <h4 class="modal-title" style="color:white;"><b>Tambah Data Obat</b></h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('obat/'); ?>save" method="post">
                            
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kode Obat</label>
                                    <input type="text" class="form-control" name="kode_obat" placeholder="Kode Obat" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Obat</label>
                                    <input type="text" required="" class="form-control" name="nama_obat" placeholder="Nama Obat">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" id="tanpa-rupiah" value="0" class="form-control money-input" name="price" placeholder="Harga Obat" max="1000000000000">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Stock</label>
                                    <input type="number" required="" class="form-control" name="stock" placeholder="Stock Obat">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Jenis Obat</label>
                                    <select id="agama" required=""  name="id_jenis_obat" class="form-control">
                                        <option value="">-- Jenis Obat --</option>
                                        <?php foreach ($jenis_obat as $row) { ?>
                                            <option value="<?= $row['id'];?>"><?= $row['nama_jenis'];?></option>
                                        <?php }?>

                                    </select>
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
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #00a65a;">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title" style="color:white;"><b>Ubah Data Obat</b></h4>
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
                        <h4 class="modal-title" style="color:white;"><b>Detail Data Obat</b></h4>
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
                    <h4><b> Apakah Anda yakin ingin menghapus data Obat ini ? </b></h4>
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
$alert = $this->session->flashdata("alert_obat");
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
