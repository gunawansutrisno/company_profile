<?php foreach ($data as $row) { ?>
<!--<div style="padding: 20px;">-->
    <form action="<?= base_url('dokter/');?>save" enctype="multipart/form-data" method="post">
        <input type="hidden" name="id" value="<?php echo (isset($row->id)) ? $row->id : '' ?>">
        
         <div class="col-md-6">
            <div class="form-group">
                <label>Code</label>
                <input type="text" class="form-control" name="code" value="<?php echo (isset($row->code)) ? $row->code : '' ?>" required="">
            </div>
        </div>
         <div class="col-md-6">
            <div class="form-group">
                <label>Judul</label>
                <input type="text" class="form-control" name="judul" value="<?php echo (isset($row->judul)) ? $row->judul : '' ?>" required="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Jenis</label>
                <input type="text" required="" class="form-control" name="jenis" value="<?php echo (isset($row->jenis)) ? $row->jenis : '' ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>File</label><br>
               <input type="file" name="file">
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