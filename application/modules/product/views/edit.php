<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php load_view($components['page_header']) ?>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Chỉnh sửa</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php if (!empty($data['errors'])) echo displayFormError($data['errors']) ?>
                            <form method="POST" action="<?= base_url('product/edit/' . $data['product']->id) ?>" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?= formInputName($data['product']->name); ?>
                                    </div>
                                    <div class="col-md-12">
                                        <?= formInputEditor('description',$data['product']->description, lang('description')); ?>
                                    </div>
                                    <div class="col-md-12">
                                        <?= formInputEditor('detail',$data['product']->detail, 'Chi tiết'); ?>
                                    </div>
                                    <div class="col-md-12">
                                        <?= formInputImage($data['product']->image); ?>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for=""><?= lang('category') ?></label>
                                            <div class="input-group">
                                                <select data-role='select' class="form-control select2" name="category_id" style="width: 100%;">
                                                    <option value="">Tùy chọn</option>
                                                    <?php
                                                    if (!empty($data['categories'])) {
                                                        foreach ($data['categories'] as $category) {
                                                            if ($category->id == $data['product']->category_id) {
                                                                echo '<option value=' . $category->id . ' selected>' . $category->name . '</option>';
                                                            } else {
                                                                echo '<option value=' . $category->id . '>' . $category->name . '</option>';
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <?= formInputFeature($data['product']->feature) ?>
                                    </div>
                                    <div class="col-md-12">
                                        <?= formInputStatus($data['product']->status) ?>
                                    </div>
                                </div>
                                <div class="form-group float-right">
                                    <?= displayResetButton() ?>
                                    <?= displaySubmitButton() ?>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->