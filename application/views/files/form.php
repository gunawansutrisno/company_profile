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
            <div class="box box-warning">
                <div class="box-header">
                    <h3 class="box-title">Preview Data</h3>
                </div>
                <div class="box-body">
                      <form class="form-horizontal" action="<?= base_url('import/save');?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                  <div class="box-body ">
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Surat</label>
                            <div class="col-sm-6">
                                <select required=""  name="surat" id="surat" class="form-control select2">
                                    <option value="">-- Pilih Jenis Surat --</option>
                                        <option value="surat masuk">Surat Masuk</option>
                                        <option value="surat Keluar">Surat Keluar</option>
                                </select>
                              <!--<textarea class="form-control" name="isi_ringkasan" rows="3" id="isi_ringkasan" placeholder="isi ringkasan surat ..." required><?= (isset($isi)) ? $isi : ''; ?></textarea>-->
                            </div>
                        </div>
                        </div>
                          <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>INDEX</th>
                                <th>TGL</th>
                                <th>NO URUT</th>
                                <th>KODE</th>
                                <th>ISI</th>
                                <th>DARI</th>
                                <th>DARI1</th>
                                <th>DARI2</th>
                                <th>KEPADA</th>
                                <th>KEPADA1</th>
                                <th>KEPADA2</th>
                                <th>TGL3</th>
                                <th>NOMOR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $numrow = 1;
		$kosong = 0;
               $no="";
                            foreach($sheet as $row)  { 
                                if($numrow > 1){
                                   $no++;
                                   $A = $row['A']; 
			$B = $row['B']; 
			$C = $row['C']; 
			$D = $row['D']; 
			$E = $row['E'] .$row['F']. $row['G']. $row['H'] ; 
//			$H = $row['H']; 
//			$I = $row['I']; 
			$J = $row['J']; 
			$K = $row['K']; 
			$L = $row['L']; 
			$M = $row['M']; 
			$N = $row['N']; 
			$O = $row['O']; 
			$P = $row['P']; 
			$Q = $row['Q']; 
			$R = $row['R']; 
			
			// Cek jika semua data tidak diisi
//			if(empty($A) && empty($B) && empty($C) && empty($D))
//				continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
			
                                ?>
                                <tr role="row" class="odd">
                                    <td class="sorting_1"><?= $A;?></td>
                                    <td class="sorting_1"><?= $B;?></th>
                                    <td class="sorting_1"><?= $C;?></td>
                                    <td class="sorting_1"><?= $D;?></td>
                                    <td class="sorting_1"><?= $E;?></td>
                                    <td class="sorting_1"><?= $J;?></td>
                                    <td class="sorting_1"><?= $K;?></td>
                                    <td class="sorting_1"><?= $L;?></td>
                                    <td class="sorting_1"><?= $M;?></td>
                                    <td class="sorting_1"><?= $N;?></td>
                                    <td class="sorting_1"><?= $O;?></td>
                                    <td class="sorting_1"><?= $P;?></td>
                                    <!--<td class="sorting_1"><?= $R;?></td>-->
                                    <td class="sorting_1"><?= $Q;?></td>
                                </tr>
                            <?php
                            
                            }
			
			$numrow++; 
                                }?>
                        </tbody>
                    </table>
                  </div>
                          <div class="modal-footer ">
                              <button class="btn btn-info btn-flat btn-sm" type="submit">Simpan</button><a href="<?= $base_url;?>">
                                  <button type="button" class="btn btn-warning btn-flat btn-sm" data-dismiss="modal"> Batal</button></a>
                            </div>
                      </form>
                </div>
                <div class="box-footer clearfix">

                </div>
            </div>

        </div> 
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
