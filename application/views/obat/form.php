<?php foreach ($data as $row) { ?>
<!--<div style="padding: 20px;">-->
    <form action="<?= base_url('obat/');?>save" method="post">
        <input type="hidden" name="id" value="<?php echo (isset($row->id)) ? $row->id : '' ?>">
        
         <div class="col-md-6">
            <div class="form-group">
                <label>Kode Obat</label>
                <input type="text" class="form-control" name="kode_obat" value="<?= (isset($row->kode_obat)) ? $row->kode_obat : ''; ?>">
            </div>
         </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Nama Obat</label>
                <input type="text" required="" class="form-control" name="nama_obat" value="<?= (isset($row->nama_obat)) ? $row->nama_obat: ''; ?>">
            </div>
        </div>
         <div class="col-md-4">
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control money-input" name="price" value="<?= (isset($row->price)) ? $row->price: ''; ?>" >
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Stock</label>
                    <input type="number" required="" class="form-control" name="stock" value="<?= (isset($row->stock)) ? $row->stock: ''; ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Jenis Obat</label>
                    <select id="agama" required=""  name="id_jenis_obat" class="form-control">
                        <option value="">-- Jenis Obat --</option>
                        <?php foreach($jenis_obat as $rows){?>
                            <option value="<?= $rows['id'];?>" <?= (isset($rows['id']) && $rows['id']==$row->id_jenis_obat)  ? 'selected' :''; ?>><?= $rows['nama_jenis'];?></option>
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
            <button class="btn btn-info" type="submit"> Simpan</button>
            <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
        </div>
    </form>
<!--</div>-->
    <?php
}
?>