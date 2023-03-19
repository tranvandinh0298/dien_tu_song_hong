<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?php echo base_url("public/assets/images/song_hong_logo.jpg") ?>" alt="AdminLTE Logo" class="brand-image">
        <span class="brand-text font-weight-light">Quản trị</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url("private/dist/img/user2-160x160.jpg") ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?= base_url('auth/logout') ?>" class="d-block" title="<?= lang('logout') ?>">Admin - đăng xuất</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item <?= $data['_controller'] == 'slide' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= $data['_controller'] == 'slide' ? 'active' : '' ?>">
                        <span class="nav-icon">
                            <i class="fas fa-sliders-h"></i>
                        </span>
                        <p>
                            <?= lang('banner_management') ?>
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('slide/create') ?>" class="nav-link <?= $data['_controller'] == 'slide' && $data['_method'] == 'create' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?= lang('add_banner') ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('slide') ?>" class="nav-link <?= $data['_controller'] == 'slide' && $data['_method'] == 'index' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?= lang('banner_list') ?></p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= $data['_controller'] == 'product' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= $data['_controller'] == 'product' ? 'active' : '' ?>">
                        <span class="nav-icon">
                            <i class="fab fa-product-hunt"></i>
                        </span>
                        <p>
                        <?= lang('product_management') ?>
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('product/create') ?>" class="nav-link <?= $data['_controller'] == 'product' && $data['_method'] == 'create' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?= lang('add_product') ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('product') ?>" class="nav-link <?= $data['_controller'] == 'product' && $data['_method'] == 'index' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?= lang('product_list') ?></p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= $data['_controller'] == 'category' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= $data['_controller'] == 'category' ? 'active' : '' ?>">
                        <span class="nav-icon">
                            <i class="fas fa-list"></i>
                        </span>
                        <p>
                        <?= lang('category_management') ?>
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('category/create') ?>"  class="nav-link <?= $data['_controller'] == 'category' && $data['_method'] == 'create' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?= lang('add_category') ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('category') ?>" class="nav-link <?= $data['_controller'] == 'category' && $data['_method'] == 'index' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?= lang('category_list') ?></p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= $data['_controller'] == 'message' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= $data['_controller'] == 'message' ? 'active' : '' ?>">
                        <span class="nav-icon">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <p>
                            <?= lang('contact') ?>
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('message') ?>" class="nav-link <?= $data['_controller'] == 'message' && $data['_method'] == 'index' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?= lang('contact_list') ?></p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header"><?= lang('settings') ?></li>
                <li class="nav-item">
                    <a href="<?= base_url('setting') ?>" class="nav-link  <?= $data['_controller'] == 'setting' ? 'active' : '' ?>">
                        <span class="nav-icon">
                            <i class="fas fa-cog"></i>
                        </span>
                        <p>
                            <?= lang('common_setting') ?>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>