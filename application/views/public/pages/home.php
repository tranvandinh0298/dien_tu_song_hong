<?php load_view($components['banner']); ?>

<div class="content">
    <!-- <div class="line1">
        <div class="exp">
            <b>Important news</b>
            <h2><a href="/news/marketing_news/2021/0617/977.html">ORBITA Dual Function Locks INSTALLED APEC Project
                    By WYNDHAM</a></h2>
            <div class="exp-box">
                <a href="/SERVICE/Hotel-lock-Video/"><img src="<?= base_url('public/assets/images/exp1.jpg') ?>"></a>
            </div>
            <div class="exp-box">
                <a href="https://www.orbitalock.com/en/"><img src="<?= base_url('public/assets/images/exp2.jpg') ?>"></a>
            </div>
            <div class="exp-box">
                <a href="/SERVICE/LOCK-OEM-ODM/"><img src="<?= base_url('public/assets/images/ODM.jpg') ?>"></a>
            </div>
            <div class="clear"></div>
        </div>
    </div> -->
    <!--end line1-->
    <div class="line2">
        <h2><?= lang('newest_products') ?></h2>
        <div class="line2-l">
            <img src="<?= base_url('public/assets/images/OKK.jpg') ?>" alt="ORBITA E4041 Bluetooth hotel lock">
        </div>
        <?php
        if (!empty($data['newestProducts'])) {
            foreach ($data['newestProducts'] as $product) { ?>
                <div class="new-pro-box margin11">
                    <div class="n-p-l">
                        <h3><a href="<?= base_url('san-pham/' . $product->alias) ?>"><?= $product->name ?></a></h3>
                        <?php if (!empty($data['categories'])) {
                            foreach ($data['categories'] as $category) {
                                if ($category->id == $product->category_id) {
                        ?>
                                    <a class="box-more" href="<?= base_url('danh-muc/' . $category->alias) ?>"><?= $category->name ?></a>
                        <?php
                                }
                            }
                        } ?>
                    </div>
                    <img src="<?= base_url($product->image) ?>" alt="<?= $product->name ?>">
                </div>
        <?php }
        } ?>
        <div class="clear"></div>
        <div style="margin-top:16px;">
            <a href="#">
                <img src="<?= base_url('public/assets/images/smarAD.jpg') ?>" alt="orbitalock.com" style="width:100%;" />
            </a>
        </div>
    </div>
    <!--end line2-->
</div>
<!--end content-->
<div class="line3">
    <div class="line3-c">
        <div class="line3-l">
            <div class="blue-arrow">
                <img src="<?= base_url('public/assets/images/blue-arrow.gif') ?>">
            </div>
            <div class="line3-l-blue">

            </div>
            <div class="line3-l-white">
                <p>
                Công ty cổ phần đầu tư và phát triển công nghệ viễn thông sông Hồng đã trở thành một công ty chuyên cung cấp các giải pháp, tích hợp công nghệ toàn diện cho khách sạn.
                </p>
                <ul>
                    <li>
                        <b>18/11/2009</b>
                        <p>Công ty được thành lập</p>
                    </li>
                    <li>
                        <b>2010</b>
                        <p>Mở rộng lĩnh vực kinh doanh sản xuất các thiết bị điện tử
                        </p>
                    </li>
                    <li>
                        <b>2011</b>
                        <p>Khẳng định được vị thế</p>
                    </li>
                    <li>

                        <p>......</p>
                    </li>
                </ul>
                <div class="js-m">
                    <a href="<?= base_url('ve-chung-toi') ?>">Tìm hiểu thêm</a>
                </div>
                <!-- <div class="js-v">
                    <a href="/about/"> Video</a>
                </div> -->
                <div class="clear"></div>
            </div>
        </div>
        <div class="line3-r">
            <h2>Về chúng tôi</h2>
            <img src="<?= base_url('public/assets/images/aboutus_background_image.png') ?>" alt="COMMERCE SERVICE">
        </div>
        <div class="clear"></div>
    </div>
</div>
<!--end line3-->
<div class="line4">
    <div class="line4-l">
        <div class="line4-l-c">
            <div class="OEM">
                <span><?= lang('our_clients') ?></span>
            </div>
            <div class="short-line">
            </div>
            <p>
                <?= lang('our_clients_note') ?>
            </p>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<!--end line4-->
<div class="line5">
    <h2><?= lang('our_products') ?></h2>
    <p class="line5-p"><?= lang('our_products_note') ?></p>
    <div class="line5-line"></div>
    <p class="pro-list">
        <?php if (!empty($data['categories'])) {
            foreach ($data['categories'] as $category) {
        ?>
                <span>
                    <a href="<?= base_url('danh-muc/' . $category->alias) ?>">
                        <img src="<?= base_url($category->image) ?>" alt="<?= $category->name ?>">
                        <?= $category->name ?>
                    </a>
                </span>
        <?php
            }
        } ?>

    </p>
    <div class="clear"></div>


    <div class="clear"></div>

    <div class="ppro-box-wrap">
        <?php
        if (!empty($data['products'])) {
            $count = 0;
            foreach ($data['products'] as $product) {
        ?>
                <div class="ppro-box">
                    <a class="t-a" href="<?= base_url('san-pham/' . $product->alias) ?>">
                        <img src="<?= base_url($product->image) ?>" alt="<?= $product->name ?>">
                        <?= $product->name ?>
                    </a>
                </div>
        <?php
            }
        }
        ?>
    </div>
    <div class="clear"></div>
</div>
<!--end line5 -->
<div class="line6">
    <div class="line6-c">
        <b><?= lang('news') ?></b>
        <div class="line6-l">
            <!-- <div class="l6-date">
                June-08 2022
            </div> -->
            <a href="#">
                <img alt="Grands Suites Malta to Install ORBITA Wireless Online Lock" src="<?= base_url('public/assets/images/1-211109164R30-L.jpg') ?>">
            </a>
            <!-- <h2><a href="/news/marketing_news/2021/1109/1040.html">Grands Suites Malta to Install ORBITA Wireless
                    Online Lock</a></h2>
            <p>
                ORBITA zigbee wireless door locks and safes stood out from numerious industr...
            </p> -->

        </div>
        <div class="line6-r">
            <ul>
                <li>
                    <a href="<?= base_url('/tin-tuc/nen-lua-chon-khoa-dien-tu-nhu-the-nao-cho-khach-san-resort') ?>">
                        <div class="l6-l">
                            <b>14</b>
                            Tháng 3/2023
                        </div>
                        <div class="l6-r">
                            <h2>NÊN LỰA CHỌN KHÓA ĐIỆN TỬ NHƯ THẾ NÀO CHO KHÁCH SẠN, RESORT</h2>
                            <p>
                            Hiện nay các loại khóa điện tử là lựa chọn của hầu hết các resort, khách sạn thay thế cho ổ khóa cơ trước đây, khi khách thuê phòng sẽ được...
                            </p>
                        </div>
                        <div class="clear"></div>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('/tin-tuc/minibar-la-gi-tai-sao-hien-nay-cac-khach-san-deu-su-dung') ?>">
                        <div class="l6-l">
                            <b>05</b>
                            Tháng 2/2023
                        </div>
                        <div class="l6-r">
                            <h2>MINIBAR LÀ GÌ? TẠI SAO HIỆN NAY CÁC KHÁCH SẠN ĐỀU SỬ DỤNG ?</h2>
                            <p>
                                Minibar khách sạn hay còn gọi tủ mát khách sạn là thiết bị không thể thiếu trong phòng khách sạn hiện nay...
                            </p>
                        </div>
                        <div class="clear"></div>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('/tin-tuc/tai-sao-cac-khach-san-thuong-su-dung-ket-sat--khoa-dien-tu') ?>">
                        <div class="l6-l">
                            <b>01</b>
                            Tháng 1/2023
                        </div>
                        <div class="l6-r">
                            <h2>TẠI SAO CÁC KHÁCH SẠN THƯỜNG SỬ DỤNG KÉT SẮT KHÓA ĐIỆN TỬ?</h2>
                            <p>
                            Ngày nay tại những khách sạn, resort...khu nghỉ dưỡng bạn dễ dàng thấy những chiếc két sắt cá nhân đựng...
                            </p>
                        </div>
                        <div class="clear"></div>
                    </a>
                </li>

            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>
<!--end line6-->