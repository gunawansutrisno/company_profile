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
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Last Create: activate to sort column ascending" style="width: 170px;">Last Create</th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Last Update: activate to sort column ascending" style="width: 170px;">Last Update</th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 151px;">Action</th>
								<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Revisi: activate to sort column ascending" style="width: 81px;">Jumlah File</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $row){ ?>
                                <tr role="row" class="odd">
                                    <td class="sorting_1"><a href="<?= BASE_URL();?>Article/Url/Article/ISO/<?= url_title($row['mainmenu']);?>"><?= $row['mainmenu'];?></a></td>
                                    <td>2019-12-31 03:27:21</td>
                                    <td>2020-01-09 09:48:32</td>
                                    <td><a href="<?= BASE_URL();?>Article/Url/Article/ISO/<?= url_title($row['mainmenu']);?>" data-id="3" class="btn btn-flat btn-warning btn-sm"  title="Edit">preview</a></td>
									 <td class="sorting_1"><?= $row['jumlah'];?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
        </div>
        <!--</div>-->
  
  
<!--        <div class="col-md-3 ml-auto">
         <div class="mb-5">
            <h3 class="h5 text-white mb-3">Popular Posts</h3>
            <ul class="list-unstyled">
              <li class="mb-2"><a href="#">Lorem ipsum dolor sit amet</a></li>
              <li class="mb-2"><a href="#">Quaerat rerum voluptatibus veritatis</a></li>
              <li class="mb-2"><a href="#">Maiores sapiente veritatis reprehenderit</a></li>
              <li class="mb-2"><a href="#">Natus eligendi nobis</a></li>
            </ul>
          </div>
        </div>-->
  
      </div>
    </div>
  </div>