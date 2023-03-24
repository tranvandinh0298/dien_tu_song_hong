<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= !empty($title) ? $title : lang('home') ?></title>
    <meta charset="UTF-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php load_view($components['meta']); ?>
    <link rel="stylesheet" href="<?= base_url('public/assets/css/swiper.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/css/main.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/css/about.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/css/custom.css?v='.VERSION) ?>">
</head>

<body>
    <?php load_view($components['header']); ?>

    <!-- Content Wrapper. Contains page content -->
    <?php load_view($content) ?>
    <!-- /.content-wrapper -->

    <?php load_view($components['footer']); ?>

    <script src="<?= base_url('public/assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/swiper.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/apple.js') ?>"></script>
    <!-- All JavaScript files================================================== -->
    <!-- Custom script for this template -->
    <script src="<?= base_url('public/assets/js/main.js?v='.VERSION) ?>"></script>
    <script>
        $(document).ready(function() {
            $("body").floating({
                "theme": "panel_theme_round_hollow",
                "state": true,
                "moveState": true,
                "size": "auto",
                "position": "right-center",
                "tip": {
                    "background-color": "#000",
                    "color": "#fff"
                },
                "account": [{
                    "type": "Email",
                    "tip": "<?= $data['settings']['email'] ?>",
                    "text": "<?= $data['settings']['email'] ?>",
                    "url": "mailto:<?= $data['settings']['email'] ?>"
                }, {
                    "type": "Phone",
                    "tip": "<?= $data['settings']['phone'] ?>",
                    "text": "<?= $data['settings']['phone'] ?>",
                    "url": "tel:<?= $data['settings']['phone'] ?>"
                }, {
                    "type": "Skype",
                    "tip": "<?= $data['settings']['skype'] ?>",
                    "text": "<?= $data['settings']['skype'] ?>",
                    "url": "skype:<?= $data['settings']['skype'] ?>?chat"
                }, {
                    "type": "WhatsApp",
                    "tip": "<?= $data['settings']['phone'] ?>",
                    "text": "<?= $data['settings']['phone'] ?>",
                    "url": "https://api.whatsapp.com/send?phone=<?= $data['settings']['phone'] ?>"
                }, {
                    "type": "Top",
                    "tip": "Back top",
                    "text": null,
                    "url": null
                }]
            });

            $(".m-button").click(function() {
                $(".m-menu").slideToggle();
            });
            $(".m-close").click(function() {
                $(".m-menu").slideToggle();
            });
            $(".m-list").click(function() {
                if ($(this).find("ul").is(":visible")) {
                    $(".m-list").find("ul").slideUp();
                    $(".m-list").find("span").html("+");
                    $(this).find("ul").slideUp();
                    $(this).find("span").html("+");
                } else {
                    $(".m-list").find("ul").slideUp();
                    $(".m-list").find("span").html("+");
                    $(this).find("ul").slideDown();
                    $(this).find("span").html("-");
                }
            });
        })
    </script>
</body>

</html>