<div class="product-right">
    <div class="blog-sidebar">
        <div class="widget category-widget">
            <h3><?= lang('categories') ?></h3>
            <ul>
                <?php
                if (!empty($data['categories'])) {
                    foreach ($data['categories'] as $category) {
                ?>
                        <li>
                            <a href="<?= base_url('/danh-muc/' . $category->alias) ?>" <?= !empty($data['category']) && $data['category']->id == $category->id ? 'class="active"' : ''; ?>><?= $category->name ?></a>
                        </li>
                <?php
                    }
                }
                ?>
            </ul>
        </div>
        <div class="new-side-box">
            <h3 class="widget-title "><?= lang('lastest_news') ?></h3>
            <article>
                <div class="entry">
                    <img src="<?= base_url('public/assets/images/news_first.jpg') ?>" alt="NÊN LỰA CHỌN KHÓA ĐIỆN TỬ NHƯ THẾ NÀO CHO KHÁCH SẠN, RESORT" />
                    <h4 class="entry-title"><a href="<?= base_url('/tin-tuc/nen-lua-chon-khoa-dien-tu-nhu-the-nao-cho-khach-san-resort') ?>" style="text-transform:capitilize;">NÊN LỰA CHỌN KHÓA ĐIỆN TỬ NHƯ THẾ NÀO CHO KHÁCH SẠN, RESORT</a></h4>
                    <span>
                        14/03/2023
                    </span>
                </div>
            </article>
            <article>
                <div class="entry">
                    <img src="<?= base_url('public/assets/images/news_second.jpg') ?>" alt="MINIBAR LÀ GÌ? TẠI SAO HIỆN NAY CÁC KHÁCH SẠN ĐỀU SỬ DỤNG ?" />
                    <h4 class="entry-title"><a href="<?= base_url('/tin-tuc/minibar-la-gi-tai-sao-hien-nay-cac-khach-san-deu-su-dung') ?>">MINIBAR LÀ GÌ? TẠI SAO HIỆN NAY CÁC KHÁCH SẠN ĐỀU SỬ DỤNG ?</a></h4>
                    <span>
                        05/02/2023
                    </span>
                </div>
            </article>
            <article>
                <div class="entry">
                    <img src="<?= base_url('public/assets/images/news_third.jpg') ?>" alt="TẠI SAO CÁC KHÁCH SẠN THƯỜNG SỬ DỤNG KÉT SẮT KHÓA ĐIỆN TỬ?" />
                    <h4 class="entry-title"><a href="<?= base_url('/tin-tuc/tai-sao-cac-khach-san-thuong-su-dung-ket-sat--khoa-dien-tu') ?>">TẠI SAO CÁC KHÁCH SẠN THƯỜNG SỬ DỤNG KÉT SẮT KHÓA ĐIỆN TỬ?</a></h4>
                    <span>
                        01/01/2023
                    </span>
                </div>
            </article>
        </div>
    </div>
</div>
<div class="clear"></div>