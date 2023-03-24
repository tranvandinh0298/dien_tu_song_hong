<!-- Page Heading Section Start -->
<?php if (!empty($data['slide'])) {
?>
    <div class="pagehding-sec pro-sec art-shop-banner" style="background-image: url(<?= base_url($data['slide']->image) ?>)">
        <div class="images-overlay"></div>
        <div class="page-heading">
            <h2><?= $data['slide']->name ?></h2>
            <p><?= $data['slide']->description ?></p>
        </div>
    </div>
<?php
} ?>

<!-- Page Heading Section End -->
<!-- end of hero slider -->
<!-- start about-section -->
<section class="section-padding blog-single-section">
    <div class="container">
        <div class="Xcontent">
            <ul class="Xcontent01">
                <div class="Xcontent06"><img src="<?= base_url($data['product']->image) ?>"></div>
                <ol class="Xcontent08">
                    <div class="Xcontent19 im-box"><img src="<?= base_url($data['product']->image) ?>"></div>
                    <?php
                    if (!empty($data['galleries'])) {
                        for ($i = 0; $i < 4; $i++) {
                            if (!empty($data['galleries'][$i]))
                                echo '<div class="Xcontent0' . $i . ' im-box"><img src="' . base_url($data['galleries'][$i]->image) . '"></div>';
                        }
                    }
                    ?>
                </ol>

                <ol class="Xcontent13">
                    <div class="Xcontent14">
                        <h1><?= $data['product']->name ?></h1>
                    </div>
                    <div class="Xcontent17">
                        <?= $data['product']->description ?>
                    </div>
                    <div class="clear"></div>
                    <?php if (count($data['galleries']) > 5) { ?>
                        <div class="Xcontent26">
                            <p class="Xcontent27"><?= lang('more_image') ?></p>
                            <?php
                            if (!empty($data['galleries'])) {
                                for ($i = 4; $i < count($data['galleries']); $i++) {
                                    echo '<div class="Xcontent0' . $i . ' cor0 im-box"><img src="' . base_url($data['galleries'][$i]->image) . '"></div>';
                                }
                            }
                            ?>
                        </div>
                    <?php } ?>
                </ol>
            </ul>
        </div>
        <div class="clear"></div>
        <div class="product-left">
            <div class="blog-content">
                <div class="art-shop-t">
                    <span><?= lang('product_details') ?>:</span>
                </div>
                <div class="art-shop-cc">
                    <?php
                    if (!empty($data['product']->detail))
                        echo $data['product']->detail;
                    ?>
                    <div style="box-sizing: border-box; margin: 0px; padding: 0px;">
                        <?php
                        if (!empty($data['details'])) {
                            foreach ($data['details'] as $gallery) {
                        ?>
                                <img alt="<?= $data['product']->name ?>" src="<?= base_url($gallery->image) ?>">
                        <?php
                            }
                        }
                        ?>
                    </div>

                </div>
                <!-- <div class=" more-posts">
                    <div class="previous-post"> <span class="post-control-link"><i class="ti-arrow-circle-left">PREV: </i></span> <a href="/products/Hotel-Locks/975.html">E4041 LCD smart electronic hotel lock</a> </div>
                    <div class="next-post">none <span class="post-control-link"> <i class="ti-arrow-circle-right">NEXT:</i></span> </div>
                </div> -->
                <!-- end more-posts -->


            </div>
        </div>
        <!-- Sidebar -->
        <?php load_view($components['sidebar']); ?>

    </div>
    <!-- end container -->
</section>
<!-- end about-section -->