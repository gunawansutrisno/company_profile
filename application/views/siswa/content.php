    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=$title?>
      </h1>
      <?php echo $breadcrumbs;?>
      <?=$breadcrumbs?>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-9">
            <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title" id="form-head">Tambah / Edit Agen Baru</h3>
                </div>
                <div class="box-body">
                  <form action="<?php echo $base_url; ?>save" method="post" id="formAgen">
                    <input type="hidden" id="id" name="id" value="<?php echo (isset($data['id_agen'])) ? $data['id_agen'] : '' ?>" />
                        
                   <div class="form-group">
                        <label>Kode Agen</label>
                        <input type="text"  value="<?php echo (isset($data['kode_agen'])) ? $data['kode_agen'] : '' ?>" class="form-control" placeholder="Kode Agen" name="kode_agen" id="kode_agen" >
                        <p class="help-block">Kode unik agen</p>
                    </div>
                    <div class="form-group">
                        <label>Nama Agen</label>
                        <input type="text" class="form-control" placeholder="Nama Agen" value="<?php echo (isset($data['nama_agen'])) ? $data['nama_agen'] : '' ?>" name="nama_agen" id="nama_agen" >
                        <p class="help-block">Nama Lengkap Agen</p>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" placeholder="Alamat, Jalan, Kecamatan, Kota" value="<?php echo (isset($data['alamat'])) ? $data['alamat'] : '' ?>" name="alamat" id="alamat" >
                        <p class="help-block">Alamat lengkap agen, jalan, kecamatan, kota</p>
                    </div>
                    <div class="form-group">
                        <label>Provinsi</label>
                            <select id="IDprovinsi"  name="id_provinsi" class="form-control select2">
                                <option >Pilih Provinsi</option>
                                        <?php foreach($kota as $key=>$r){ ?>
                                            <option value="<?=$r['intIDProvinsi']?>" <?php echo  (isset($id_provinsi['intIDProvinsi'])) && $r['intIDProvinsi'] == $id_provinsi['intIDProvinsi'] ? 'selected' :'' ;?>><?= $r['txtProvinsi']?></option>
                                        <?php } ?>
                                    </select>
                            </select>
                        <p class="help-block">Provinsi</p>
                    </div>
                    <div class="form-group">
                        <label> Kota</label>
                        <select id="id_kota" style="" name="id_kota" class="form-control select2" data-selected="<?php echo  isset($data['id_kota']) ? $data['id_kota'] : '' ;?>">
                            <option value="">Pilih Kota</option> 

                            </select>
                        <p class="help-block">Kota</p>
                    </div>
                    <div class="form-group">
                        <label>Kelas Harga</label>
                        <select id="id_kelas_harga" name="id_kelas_harga" class="form-control">
                            <?php $idxKH = array();?>
                            <?php foreach($kelas_harga as $k):?>
                            <option value="<?=$k->id_kelas_harga?>" <?php echo (isset($data['id_kelas_harga'])) && $k->id_kelas_harga == $data['id_kelas_harga'] ? 'selected' : '' ?>>
                                <?=$k->kelas_harga?>
                            </option>
                            <?php $idxKH[$k->id_kelas_harga] = $k->kelas_harga?>
                            <?php endforeach; ?>
                        </select>
                        <p class="help-block">Kelas harga agen</p>
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" class="form-control" placeholder="Nomor Telepon" value="<?php echo (isset($data['no_telpon'])) ? $data['no_telpon'] : '' ?>" name="no_telpon" id="no_telpon" >
                        <p class="help-block">Nomor telepon agen</p>
                    </div>
                    <div class="form-group">
                        <label>Nama Pemilik</label>
                        <input type="text" class="form-control" placeholder="Nama Pemilik" value="<?php echo (isset($data['nama_pemilik'])) ? $data['nama_pemilik'] : '' ?>" name="nama_pemilik" id="nama_pemilik">
                        <p class="help-block">Nomor Pemilik Agen</p>
                    </div>
                    <div class="form-group">
                        <label>Nama Bank</label>
                        <input type="text" class="form-control" placeholder="Nama Bank" value="<?php echo (isset($data['nama_bank'])) ? $data['nama_bank'] : '' ?>" name="nama_bank" id="nama_bank" >
                        <p class="help-block">Nama Bank</p>
                    </div>
                    <div class="form-group">
                        <label>No Rekening</label>
                        <input type="text" class="form-control" placeholder="Nomor Rekening" value="<?php echo (isset($data['no_rekening_bank'])) ? $data['no_rekening_bank'] : '' ?>" name="no_rekening_bank" id="no_rekening_bank" >
                        <p class="help-block">Nomor Rekening bank</p>
                    </div>
                    <div class="form-group">
                        <label>Nama Pemlik Rekening</label>
                        <input type="text" class="form-control" placeholder="Nama Pemilik Rekening" name="nama_pemilik_rekening" value="<?php echo (isset($data['nama_pemilik_rekening'])) ? $data['nama_pemilik_rekening'] : '' ?>" id="nama_pemilik_rekening" >
                        <p class="help-block">Nama Pemilik Rekening Bank</p>
                    </div>
                    <div class="box-footer">
                        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                        <?=anchor(base_url()."agen/" , "Batal" , 'id="btnCancel" class="btn btn-warning btn-flat" style="display:none;"')?>
                    </div>
                  </form>
                </div><!-- /.box-body -->
              </div>
        </div>
        
    </section><!-- /.content -->
    
    <!-- alert -->
    <?php
      $alert = $this->session->flashdata("alert_agen");
      if(isset($alert) && !empty($alert)):
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
            <h4 class="modal-title"><span class="icon fa fa-<?php echo $icon ?>"></span> <?php echo $status?></h4>
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
