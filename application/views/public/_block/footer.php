<footer class="site-footer">
    <div class="upper-footer">
        <div class="container">
            <div class="row">

                <div class="col col-lg-12 col-md-12 col-sm-12">
                    <div class="widget contact-widget service-link-widget">
                        <div class="widget-title">
                            <h3><?= lang('company') ?></h3>
                        </div>
                        <ul>
                            <li><?= lang('tel') ?>: <?= $data['settings']['telephone'] ?></li>
                            <li><?= lang('phone') ?>: <?= $data['settings']['phone'] ?></li>
                            <li><?= lang('fax') ?>FAX: <?= $data['settings']['fax'] ?></li>
                            <li><?= lang('skype') ?>: <?= $data['settings']['skype'] ?></li>
                            <li><?= lang('email') ?>: <?= $data['settings']['email'] ?></li>
                            <li><?= lang('address') ?>: <?= $data['settings']['address'] ?></li>
                        </ul>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <!-- end container -->
    </div>
    <div class="lower-footer">
        <div class="container">
            <div class="row">
                <div class="separator"></div>
                <div class="col col-xs-12">
                    <p class="copyright"><?= lang('copyright') ?></p>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</footer>