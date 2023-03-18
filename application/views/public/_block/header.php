<header id="header" class="site-header header-style-3">
    <div class="topbar">
        <div class="topbar-c">
            <div class="contact-info">
                <ul>
                    <li><i class="ti-email"></i> <?= $data['settings']['email'] ?></li>
                    <li><i class="ti-mobile"></i> <?= $data['settings']['phone'] ?></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <!-- end container -->

    <nav class="navigation navbar navbar-default pc-nav">
        <div class="container">
            <div class="navbar-header">
                <h1>
                    <a class="navbar-brand" href="<?= base_url('home') ?>">
                        <img src="<?= base_url('public/assets/images/song_hong_logo.jpg') ?>" alt="Công ty cổ phần đầu tư và phát triển công nghệ viễn thông sông Hồng">
                    </a>
                </h1>
            </div>
            <div class="m-button">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div id="navbar" class="navbar-collapse collapse navbar-right navigation-holder">
                <ul class="nav navbar-nav">
                    <li><a href="<?= base_url('home') ?>"><?= lang('home') ?></a></li>
                    <li class="menu-item-has-children"><a href="<?= base_url('ve-chung-toi') ?>"><?= lang('aboutus') ?></a>
                        <ul class="sub-menu">
                            <li><a href="<?= base_url('ve-chung-toi') ?>"><?= lang('introduction') ?></a></li>
                            <li><a href="<?= base_url('lich-su-phat-trien') ?>"><?= lang('history') ?></a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children"> <a href="#"><?= lang('categories') ?></a>
                        <ul class="sub-menu">
                            <?php if (!empty($data['categories'])) {
                                foreach ($data['categories'] as $category) {
                            ?>
                                    <li><a href="<?= base_url('danh-muc/' . $category->alias) ?>"><?= $category->name ?></a></li>
                            <?php
                                }
                            } ?>
                        </ul>
                    </li>

                    <li><a href="<?= base_url('/tin-tuc') ?>">Tin tức</a>
                    </li>
                    <li><a href="<?= base_url('/lien-he') ?>">Liên hệ</a></li>
                </ul>
            </div>
            <!-- end of nav-collapse -->

            <div class="m-menu">
                <ul>
                    <li><a href="<?= base_url('home') ?>">Trang chủ</a></li>
                    <li><a href="<?= base_url('ve-chung-toi') ?>">Về chúng tôi</a></li>
                    <li class="m-list"> <a href="javascript:void(0);">PRODUCTS<span>+</span></a>
                        <ul>
                            <?php
                            if (!empty($data['categories'])) {
                                foreach ($data['categories'] as $category) {
                            ?>
                                    <li><a href="<?= base_url('danh-muc/' . $category->alias) ?>"><?= $category->name ?></a></li>
                            <?php
                                }
                            }
                            ?>
                        </ul>
                    </li>
                    <li><a href="<?= base_url('/tin-tuc') ?>">Tin tức</a></li>
                    <li><a href="<?= base_url('/lien-he/') ?>">Liên hệ</a></li>
                </ul>
                <div class="m-contact-info ">
                    <ul>
                        <li><i class="ti-email"></i> <?= $data['settings']['email'] ?></li>
                        <li><i class="ti-mobile"></i> <?= $data['settings']['phone'] ?></li>
                    </ul>
                </div>
                <div class="m-close">
                    Đóng
                </div>
            </div>
            <!--end m-menu-->
        </div>
        <!-- end of container -->
    </nav>
</header>