<?php foreach ($data as $row) { ?>
<!--<div style="padding: 20px;">-->
    <form action="<?= base_url('pasien/');?>save" method="post">
        <input type="hidden" name="id" value="<?php echo (isset($row->id)) ? $row->id : '' ?>">
        <div class="col-md-6">
            <div class="form-group">
                <label>Kode Pasien</label>
                <input type="text" class="form-control" name="" value="<?= (isset($row->id)) ? date('m').date('y').$row->id : ''; ?>" readonly="">
            </div>
        </div>
         <div class="col-md-6">
            <div class="form-group">
                <label>No.RM Pasien</label>
                <input type="text" class="form-control" name="kode_pasien" value="<?= (isset($row->kode_pasien)) ? $row->kode_pasien : ''; ?>">
                <!--<input type="text" class="form-control" name="nik" value="<?= (isset($row->nik)) ? $row->nik : ''; ?>">-->
            </div>
         </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Nama Pasien</label>
                <input type="text" required="" class="form-control" name="nama_pasien" value="<?= (isset($row->nama)) ? $row->nama : ''; ?>">
            </div>
        </div>
         <div class="col-md-6">
            <div class="form-group">
                <label>Jenis Kelamin</label><br>
                    <input type="radio" required="" value="laki-laki" name="jk" <?= $row->jk =="laki-laki" ? 'checked':'';?>> Laki-laki
                    &nbsp;
                    <input type="radio" required="" name="jk" value="perempuan" <?= $row->jk =="perempuan" ? 'checked':'';?>> Perempuan
            
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" required="" rows="2" name="alamat" ><?= (isset($row->alamat)) ? $row->alamat : ''; ?> </textarea>
            </div>
        </div>
       
          
<!--        <div class="col-md-6">
            <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" required="" class="form-control" name="tempat_lahir" value="<?= (isset($row->tempat_lahir)) ? $row->tempat_lahir :''; ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Agama</label>
                <select id="agama" required=""  name="agama" class="form-control select2">
                    <option value="">-- Agama --</option>
                            <option value="islam" <?= (isset($row->agama) && $row->agama=='islam')  ? 'selected' :''; ?>>Islam</option>
                            <option value="hindu" <?= (isset($row->agama) && $row->agama=='hindu')  ? 'selected' :''; ?>>Hindu</option>
                            <option value="budha" <?= (isset($row->agama) && $row->agama=='budha')  ? 'selected' :''; ?>>Budha</option>
                            <option value="katholik" <?= (isset($row->agama) && $row->agama=='katholik')  ? 'selected' :''; ?>>Katholik</option>
                            <option value="kristen" <?= (isset($row->agama) && $row->agama=='kristen')  ? 'selected' :''; ?>>Kristen</option>
                        
                </select>
            </div>
        </div>
      <div class="col-md-6">
            <div class="form-group">
                <label>Pekerjaan</label>
                <input type="text" required="" class="form-control" name="pekerjaan" value="<?= (isset($row->pekerjaan)) ? $row->pekerjaan :''; ?>">
            </div>
        </div>-->
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
                             <?php for($i=1;$i<=31;$i++){?>
                                <option value="<?= $i;?>" <?= date('d', strtotime($row->tanggal_lahir)) == $i ? 'selected' : ''; ?>><?= $i;?></option>
                             <?php }?>
                   </select>
                </td>
                    <td>
                   <select class="form-control" required="" name="bulan">
                        <option>--Bulan--</option>
                    <?php $data = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'); 
                       foreach($data as $key=>$tanggal){?>
                      <option value="<?= $key+1;?>" <?= date('m', strtotime($row->tanggal_lahir)) == $key + 1 ? 'selected' : ''; ?>><?= $tanggal;?></option>
                   <?php }?>

                 </select>
                </td>
                    <td>
                        <select class="form-control" required="" name="tahun">
                            <option>--Tahun--</option>
                            <?php $date= date('Y');
                            for($i=1904;$i<=$date;$i++){?>

                               <option value="<?= $i;?>" <?= date('Y', strtotime($row->tanggal_lahir)) == $i ? 'selected' : ''; ?>><?= $i;?></option>
                            <?php }?>

                         </select>
                    </td>
                </tr>
                </thead>
                
            </table>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>No Telp</label>
                <input type="text" required="" class="form-control" name="telp" value="<?= (isset($row->telp)) ? $row->telp :''; ?>">
            </div>
        </div>
         <div class="col-md-3">
                <div class="form-group">
                    <label>Umur</label>
                    <input type="text" class="form-control" name="umur" placeholder="Umur"  id="age" readonly="" value="<?= (isset($row->umur)) ? $row->umur :''; ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nama Dokter</label>
                    <select required=""  name="id_dokter" class="form-control">
                        <option value="">-- Pilih Dokter --</option>
                        <?php foreach($dokter as $rows){?>
                            <option value="<?= $rows->kode_dokter;?>" <?= (isset($row->kode_dokter) && $row->kode_dokter== $rows->kode_dokter)  ? 'selected' :''; ?>><?= $rows->nama_siswa;?></option>
                        <?php }?>
                    </select>
                    <!--<input type="text" class="form-control" name="pendidikan" placeholder="Pendidikan">-->
                </div>
            </div>
<!--        <div class="col-md-6">
            <div class="form-group">
                <label>Pendidikan</label>
                <select id="agama" required=""  name="pendidikan" class="form-control select2">
                    <option value="">-- Pilih Pendidikan --</option>
                            <option value="islam" >Islam</option>
                           <option value="sd" <?= (isset($row->pendidikan) && $row->pendidikan=='sd')  ? 'selected' :''; ?>>SD</option>
                        <option value="smp" <?= (isset($row->pendidikan) && $row->pendidikan=='smp')  ? 'selected' :''; ?>>SMP</option>
                        <option value="sma" <?= (isset($row->pendidikan) && $row->pendidikan=='sma')  ? 'selected' :''; ?>>SMA</option>
                        <option value="s1" <?= (isset($row->pendidikan) && $row->pendidikan=='s1')  ? 'selected' :''; ?>>S1</option>
                        <option value="s2" <?= (isset($row->pendidikan) && $row->pendidikan=='s2')  ? 'selected' :''; ?>>S2</option>
                        <option value="s3" <?= (isset($row->pendidikan) && $row->pendidikan=='s3')  ? 'selected' :''; ?>>S3</option>
                </select>
            </div>
        </div>
        
            <div class="col-md-3">
                <div class="form-group">
                    <label>Kode Pos</label>
                    <input type="text" class="form-control" name="kodepos" value="<?= (isset($row->kodepos)) ? $row->kodepos :''; ?>" maxlength="5">
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label>Keluhan</label>
                    <input type="text" class="form-control" name="keluhan" id="keluhan" value="<?= (isset($row->keluhan)) ? $row->keluhan :''; ?>">
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
                            <td><input type="checkbox" name="diabetes" value="ya" <?= (isset($row->diabetes) && $row->diabetes=='ya')  ? 'checked' :''; ?>> Ya</td>
                            <td><input type="checkbox" name="Hipertensi" value="ya" <?= (isset($row->hipertensi) && $row->hipertensi=='ya')  ? 'checked' :''; ?>> Ya</td>
                            <td><input type="checkbox" name="sakit_jantung" value="Ya" <?= (isset($row->sakit_jantung) && $row->sakit_jantung=='ya')  ? 'checked' :''; ?>> Ya</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="diabetes" value="tidak" <?= (isset($row->diabetes) && $row->diabetes=='tidak')  ? 'checked' :''; ?>> Tidak</td>
                            <td><input type="checkbox" name="Hipertensi"  value="tidak" <?= (isset($row->hipertensi) && $row->hipertensi=='tidak')  ? 'checked' :''; ?>> Tidak</td>
                            <td><input type="checkbox" name="sakit_jantung" value="tidak" <?= (isset($row->sakit_jantung) && $row->sakit_jantung=='tidak')  ? 'checked' :''; ?>> Tidak</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="diabetes" value="t_tahu" <?= (isset($row->diabetes) && $row->diabetes=='t_tahu')  ? 'checked' :''; ?>> Tidak Tahu</td>
                            <td><input type="checkbox" name="Hipertensi"  value="t_tahu" <?= (isset($row->hipertensi) && $row->hipertensi=='t_tahu')  ? 'checked' :''; ?>> Tidak Tahu</td>
                            <td><input type="checkbox" name="sakit_jantung" value="t_tahu" <?= (isset($row->sakit_jantung) && $row->sakit_jantung=='t_tahu')  ? 'checked' :''; ?>> Tidak Tahu</td>
                        </tr>
                    </thead>
                </table>
            </div>
         <div class="col-md-12">
            <div class="form-group">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>&nbsp;</label>
            </div>
        </div>-->
        <div class="clearfix"></div>
        <div class="modal-footer ">
            <button class="btn btn-info" type="submit"> Simpan</button>
            <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
        </div>
    </form>
<!--</div>-->
    <?php
}
?>