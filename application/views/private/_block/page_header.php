<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= $title ?></h1>
            </div>
            <?php
            if (!empty($data['breadcrumbs'])) {
                echo '<div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">';
                foreach ($data['breadcrumbs'] as $label) {
                    echo '<li class="breadcrumb-item">' . $label . '</li>';
                }
                echo '</ol>
                </div>';
            }
            ?>
        </div>
    </div><!-- /.container-fluid -->
</section>