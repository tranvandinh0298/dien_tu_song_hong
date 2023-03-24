<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php load_view($components['page_header']) ?>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Thêm mới</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php if (!empty($data['errors'])) echo displayFormError($data['errors']) ?>
                            <form method="POST" action="<?= base_url('slide/create') ?>" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?= formInputName(!empty($data['input']['name']) ? $data['input']['name'] : ''); ?>
                                    </div>
                                    <div class="col-md-12">
                                        <?= formInputEditor('description',!empty($data['input']['description']) ? $data['input']['description'] : '', lang('description')); ?>
                                    </div>
                                    <div class="col-md-12">
                                        <?= formInputImage('','image','Hình ảnh'); ?>
                                    </div>
                                    <div class="col-md-12">
                                        <?= formInputImage('', 'mobile_image','Hình ảnh dành cho mobile'); ?>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for=""><?= lang('category') ?></label>
                                            <div class="input-group">
                                                <select data-role='select' class="form-control select2" name="category_id" style="width: 100%;">
                                                    <option value="">Dùng làm quảng cáo trên trang chủ</option>
                                                    <?php
                                                    if (!empty($data['categories'])) {
                                                        foreach ($data['categories'] as $category) {
                                                            echo '<option value=' . $category->id . '>' . $category->name . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <?= formInputStatus() ?>
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