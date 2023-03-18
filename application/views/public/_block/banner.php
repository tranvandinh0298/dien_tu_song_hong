<?php if (!empty($data['slides'])) { ?>
    <div class="banner">
        <div class="apple-banner">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach ($data['slides'] as $slide) { ?>
                        <div class="swiper-slide" style="background: #000 url(<?= $slide->image ?>) no-repeat 50% 10%;background-size: auto 100%;">
                            <div class="slide__content">
                                <div class="title txt" style="transition-duration: 1000ms;">
                                    <h2 class="homepage-headline"><?= $slide->name ?></h2>
                                    <div class="mytxt" style="font-size: 22px !important;color: #fff !important;"><?= $slide->description ?></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="swiper-button-prev"><span></span></div>
                <div class="swiper-button-next"><span></span></div>
                <ul class="swiper-pagination autoplay">
                </ul>
            </div>
        </div>
    </div>
<?php } ?>
<!--end banner-->