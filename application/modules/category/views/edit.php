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
                            <form method="POST" action="<?= base_url('category/edit/' . $data['category']->id) ?>" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?= formInputName($data['category']->name); ?>
                                    </div>
                                    <div class="col-md-12">
                                        <?= formInputImage($data['category']->image); ?>
                                    </div>
                                    <div class="col-md-12">
                                        <?= formInputStatus($data['category']->status) ?>
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