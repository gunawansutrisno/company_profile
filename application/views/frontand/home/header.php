<div class="site-wrap">

    <div class="site-navbar mt-4">
        <div class="container py-1">
            <div class="row align-items-center">
                <div class="col-3 col-md-3 col-lg-3">
                    <img src="<?= BASE_URL; ?>assets/frontend/images/<?= $logo; ?>" alt="" style="width:50%;">
                  <!--<h1 class="mb-0"><a href="index.html" class="text-white h2 mb-0"><strong>MOLINDO<span class="text-primary">.</span></strong></a></h1>-->
                </div>
                <div class="col-12 col-md-12 col-lg-12">
                    <nav class="site-navigation text-left text-md-left" role="navigation">
                        <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>
                        <ul class="site-menu js-clone-nav d-none d-lg-block">
                            <li class="<?= $active == 'home' ? 'active' : ''; ?>">
                                <a href="<?= BASE_URL(); ?>">Home</a>
                            </li>
                            <li class="has-children <?= $active == 'sejarah' || $active == 'kontak' ? 'active' : ''; ?>">
                                <a href="">Profile</a>
                                <ul class="dropdown arrow-top">
                                    <li><a href="<?= BASE_URL(); ?>sejarah">History Molindo</a></li>
                                    <li><a href="<?= BASE_URL(); ?>contact">Contact</a></li>
                                    <li><a href="<?= BASE_URL(); ?>visi">Visi & Misi</a></li>
                                    <li><a href="<?= BASE_URL(); ?>assets/frontend/file/policy.pdf" target="blank">Policy Terpadu 2019</a></li>
                                </ul>
                            </li>
                            <?php foreach ($kategori as $rows) { ?>
                                <li class="has-children">
                                    <a href="<?= BASE_URL();?>Article/Url/<?=  $rows['id'] ? url_title($rows['name']) : $rows['name']?>"><?= $rows['name']; ?></a>
                                    <ul class="dropdown arrow-top">
                                        <?php foreach ($sub as $r) { ?>
                                            <?php if ($r['menu_id'] == $rows['id']) { ?>
                                                <li class="has-children">
                                                    <a href="<?= BASE_URL();?>Article/Url/<?=  $r['id'] ? url_title($r['submenu']) : $r['submenu']?>" ><?= $r['submenu']; ?></a>
                                                    <ul class="dropdown">
                                                        <?php foreach ($subchild as $rs) { ?>
                                                            <?php if ($rs['submenu_id'] == $r['id']) { ?>
                                                        <li><a href="<?= BASE_URL();?>Article/Url/Article/ISO/<?=  $rs['mainmenu'] ? url_title($rs['mainmenu']) : $rs['mainmenu']?>" title="<?= $rs['judul'] ? $rs['judul'] : '' ?>"><?= $rs['mainmenu']; ?></a></li>
                                                            <?php }
                                                        } ?>
                                                    </ul>
                                                </li>
                                            <?php }
                                        } ?>
                                    </ul>
                                </li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>