<?php foreach ($data as $row) { ?>
<!--<div style="padding: 20px;">-->
    <form action="<?= base_url('oprasi/');?>save" method="post">
        <input type="hidden" name="id" value="<?php echo (isset($row->id)) ? $row->id : '' ?>">
        <input type="hidden" name="kode_pasien" value="<?php echo (isset($row->noka)) ? $row->noka: '' ?>">
        
         <div class="col-md-6">
            <div class="form-group">
                <label>No. Peserta</label>
                <input type="text" class="form-control" name="kode_pasien" id="noka" value="<?= (isset($row->noka)) ? $row->noka : ''; ?>" disabled="">
                <!--<input type="text" class="form-control" name="nik" value="<?= (isset($row->nik)) ? $row->nik : ''; ?>">-->
            </div>
         </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Nama Pasien</label>
                <input type="text" required="" class="form-control" name="nama_pasien" value="<?= (isset($row->nama)) ? $row->nama : ''; ?>" id="nama" disabled="">
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
        <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tgl Jadwal Tindakan</label>
                                    <input type="text" style="" class="form-control tanggal"  value="<?= (isset($row->pasien_id)) ? date('d/m/Y h:i:s', strtotime($row->tgl_tindakan)) : ''; ?>" name="tanggal" id="tanggal">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jenis Tindakan</label>
                                    <select required=""  name="jenis" id="jenis" class="form-control">
                                        <option value="">-- Pilih Jenis Tindakan --</option>
                                     <?php foreach($jenis as $rows){?>
                            <option value="<?= $rows->id;?>" <?= (isset($row->jenis_tindakan) && $row->jenis_tindakan== $rows->id)  ? 'selected' :''; ?>><?= $rows->name;?></option>
                        <?php }?>
                                    </select>
                                </div>
                            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nama Dokter / Operator</label>
                    <select required=""  name="id_dokter" class="form-control">
                        <option value="">-- Pilih Dokter --</option>
                        <?php foreach($dokter as $rows){?>
                            <option value="<?= $rows->id;?>" <?= (isset($row->dokter_id) && $row->dokter_id== $rows->id)  ? 'selected' :''; ?>><?= $rows->kode_dokter;?> ( <?= $rows->nama_siswa;?> )</option>
                        <?php }?>
                    </select>
                </div>
            </div>
        <div class="col-md-12">
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea class="form-control" required="" rows="2" name="notes" placeholder="Keterangan"><?= (isset($row->notes)) ? $row->notes : ''; ?></textarea>
                                </div>
                            </div>
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