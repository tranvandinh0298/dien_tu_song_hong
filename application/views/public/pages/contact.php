<!-- Page Title -->
<section class="page-title text-center con-banner m-top110">
    <div class="container relative clearfix">
        <div class="title-holder">
            <div class="title-text">
                <h1><?= lang('contact') ?></h1>
                <p style="color:white;"><?= $data['settings']['email'] ?></p>
            </div>
        </div>
    </div>
</section> <!-- end page title -->
<div class="main-wrapper oh padding-box">
    <div class="mss">
        <h2>Để lại cho chúng tôi 1 tin nhắn!</h2>
        <?php
        if (!empty($data['errors'])) {
            echo '<div class="alert">' . $data['errors'] . '</div>';
        }
        if (!empty($data['success'])) {
            echo '<div class="alert alert--success">' . $data['success'] . '</div>';
        }
        ?>
        <form action="<?= base_url('contact') ?>" enctype="multipart/form-data" method="post">
            <div class="row">
                <div class="c-input">
                    <input type="text" placeholder="Tên của bạn" name="name" class="intxt" value="" required>
                </div>
                <div class="c-input">
                    <input type="text" placeholder="Địa chỉ email" name="email" class="intxt" value="" required>
                </div>
                <div class="c-input2">
                    <input type="text" placeholder="Số điện thoại liên hệ" name="phone" class="intxt" value="" required>
                </div>
                <div class="c-input2">
                    <textarea name="message" id="msg" placeholder="Tin nhắn" required></textarea>
                </div>
                <div class="clear"></div>
            </div>
            <input type="hidden" name="time" id="time" style="width:250px" class="intxt" value="">
            <input type="hidden" name="dede_fields" value="name,text;email,text;msg,multitext;time,text;tel,text;cun,text">
            <input type="hidden" name="dede_fieldshash" value="5523b3af837f82d6d3932a44a193a4ba">
            <div align="center">
                <input type="submit" name="submit" value="Gửi" class="coolbg">
            </div>
        </form>
    </div>

    <!-- Blog Standard -->
    <section class="section-wrap blog-standard pb-10">
        <!-- content -->
        <div class="row about-c contact-c">
            <h2 class=" col-md-12  col-sm-12 col-xs-12">CÔNG TY CỔ PHẦN ĐẦU TƯ VÀ PHÁT TRIỂN CÔNG NGHỆ VIỄN THÔNG SÔNG HỒNG</h2>
            <!-- <div class="contact-left">
                <img src="<?= base_url('public/assets/images/con3.jpg') ?>" alt="photo">
            </div> -->
            <div class="contact-right">
                <ul class="con-ic">
                    <li class="con-ic1">Trụ sở: <?= $data['settings']['address'] ?></li>
                    <li class="con-ic2">Điện thoại: <?= $data['settings']['phone'] ?></li>
                    <li class="con-ic4">Fax: <?= $data['settings']['fax'] ?></li>
                    <li class="con-ic6">Email: <?= $data['settings']['email'] ?></li>
                </ul>
            </div>
            <div class="clear"></div>

            <div class=" col-md-12  col-sm-12 col-xs-12 con-line"></div>

            <h2 class=" col-md-12  col-sm-12 col-xs-12">CÔNG TY TNHH ORBITA VIỆT NAM</h2>
            <div class="contact-left">
                <img src="<?= base_url('public/assets/images/con3.jpg') ?>" alt="orbita factory photo">
            </div>
            <div class="contact-right">
                <ul class="con-ic">
                    <li class="con-ic1">Trụ sở chính HCM: 270B Lý Thường Kiệt, P. 6, Q. Tân Bình</li>
                    <li class="con-ic2">Điện thoại: (028) 62922365</li>
                    <li class="con-ic4">Fax:(028) 62650965</li>
                    <li class="con-ic6">Email: orbitavn@gmail.com</li>
                </ul>
            </div>
            <div class="clear"></div>
            <!-- <div class=" col-md-12  col-sm-12 col-xs-12 con-line"></div> -->
            <!--惠州-->
            <!-- <h2 class=" col-md-12  col-sm-12 col-xs-12">Huizhou factory</h2>
            <div class="contact-left">
                <img src="<?= base_url('public/assets/images/con2.jpg') ?>" alt="orbita factory photo">
            </div>
            <div class="contact-right">
                <ul class="con-ic">

                    <li class="con-ic2">Tel:+867523633501-8037</li>
                    <li class="con-ic3">Mobile:+8618928480199</li>
                    <li class="con-ic4">Fax:+867523633900</li>
                    <li class="con-ic5">Skype:<a href="skype:orbita-sales5?chat " rel="nofollow">orbita-sales5</a>
                    </li>
                    <li class="con-ic6">Email: <a href="mailto:sales5@orbitatech.com" rel="nofollow">sales5@orbitatech.com</a></li>
                    <li class="con-ic1">Address: Orbita Industrial Park,Zhoukangwei, Changbu village,
                        Xinxu Town, Huiyang Dist.Huizhou,Guangdong Province, China</li>
                </ul>

            </div>
            <div class="clear"></div> -->
            <!-- <div class=" col-md-12  col-sm-12 col-xs-12 con-line"></div>
            <h2 class=" col-md-12  col-sm-12 col-xs-12">CÔNG TY TNHH ORBITA VIỆT NAM

            </h2>
            <div class="contact-left2">
                <ul class="con-ic">

                    <li class="con-ic1">Trụ sở chính HCM: 270B Lý Thường Kiệt, P. 6, Q. Tân Bình</li>
                    <li class="con-ic2">Điện thoại: (028) 62922365</li>
                    <li class="con-ic4">Fax:(028) 62650965</li>
                    <li class="con-ic6">Email: orbitavn@gmail.com</li>

                </ul>
            </div> -->
            <!-- <div class="contact-right2">
                <ul class="con-ic">
                    <li class="con-ic1">CN Đà Nẵng: 30 Nguyễn Tri Phương,Thanh Khê, Đà Nẵng </li>
                    <li class="con-ic2">Điện thoại: (0236) 3662886</li>
                    <li class="con-ic4">Fax:(0236) 3662986</li>
                    <li class="con-ic6">Email: orbitavn@gmail.com</li>

                </ul>
            </div>
            <div class="contact-left2 padd30">
                <ul class="con-ic">
                    <li class="con-ic1">CN Nha Trang: 80 Vân Đồn, Phước Hoà, Nha Trang</li>
                    <li class="con-ic2">Điện thoại: (0258) 3872166</li>
                    <li class="con-ic4">Fax:(0258) 3873166</li>
                    <li class="con-ic6">Email: orbitavn@gmail.com</li>

                </ul>
            </div> -->
            <div class="clear"></div>
            <!-- <div class="col-md-8 col-sm-12 col-xs-12 con-line"> -->
        </div>
        <!--俄罗斯-->

        <div class="clear"></div>
        <div class="col-md-12 col-sm-12 col-xs-12 con-line">
        </div>


</div> <!-- end container -->

</section> <!-- end blog standard -->
</div>

<div id="back-to-top">
    <a href="#top"><i class="fa fa-angle-up"></i></a>
</div>
</section>
</div> <!-- end main-wrapper -->