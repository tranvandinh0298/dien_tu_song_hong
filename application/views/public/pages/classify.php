<!-- Page Heading Section Start -->
<?php if (!empty($data['slide'])) {
?>
    <section class="page-title text-center pro-sec" style="background-image: url(<?= base_url($data['slide']->image) ?>)">
        <div class="container relative clearfix">
            <div class="title-holder">
                <div class="title-text">
                    <h1><?= $data['slide']->name ?></h1>
                    <p style="color:white;"><?= $data['slide']->description ?></p>
                </div>
            </div>
        </div>
    </section>
<?php
} ?>

<section class="product-c pad60">
    <div class="product-left">
        <?php
        if (!empty($data['products'])) {
            foreach ($data['products'] as $product) { ?>
                <div class="grid col-md-4 col-xs-12 pro-box">
                    <div class="pro">
                        <a href="<?= base_url('san-pham/' . $product->alias) ?>">
                            <img src="<?= base_url($product->image) ?>" alt="<?= $product->name ?>">
                        </a>
                    </div>
                    <h3><a href="<?= base_url('san-pham/' . $product->alias) ?>"><b><?= $product->name ?></b></a></h3>
                </div>
            <?php
            }
        } else { ?>
            <p class="alert">
                <?= lang('not_found_product') ?> 
            </p>
        <?php
        } ?>

        <div class="clear"></div>
    </div>
    <!-- Sidebar -->
    <?php load_view($components['sidebar']); ?>
</section>