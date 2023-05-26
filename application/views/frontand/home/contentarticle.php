<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('<?= BASE_URL();?>assets/frontend/images/img_3.jpg');"
    data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-12 text-center" data-aos="fade-up" data-aos-delay="400">
             <h1 class="text-white"><?= $sub ?></h1>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover table-striped dataTable no-footer" id="datatable" role="grid" aria-describedby="datatable_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Judul: activate to sort column descending" aria-sort="ascending" style="width: 243px;">Judul</th>
                           
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 151px;">Action</th>
								
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Revisi: activate to sort column ascending" style="width: 81px;">Jumlah File</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($data)){ foreach($data as $row){ ?>
                                <tr role="row" class="odd">
                                    <td class="sorting_1"><?= $row['submenu'];?></td>
                                    <td>
									
									<a href="<?= BASE_URL();?>Article/Url/<?=  $row['submenu'] ? url_title($row['submenu']) : $row['submenu']?>" data-id="3" class="btn btn-flat btn-warning btn-sm"  title="Preview">Preview</a></td>
							
									
                                    <td class="sorting_1"><?= $row['jumlah'];?></td>
                                </tr>
                            <?php } } else { ?>
                                <tr role="row" class="odd">
                                    <td class="sorting_1" colspan="5"><h3>Sorry, Content is Empty!</h3></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
        </div>
  
  
      </div>
    </div>
  </div>