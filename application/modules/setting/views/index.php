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
                            <h3 class="card-title">Chỉnh sửa thông tin chung</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php if (!empty($data['errors'])) echo displayFormError($data['errors']) ?>
                            <form method="POST" action="<?= base_url('setting') ?>" enctype="multipart/form-data">
                                <div class="row">
                                    <?php if (!empty($data['settings'])) {
                                        foreach ($data['settings'] as $key => $value) {
                                    ?>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="<?= $key ?>" value="<?= $value->description ?>" placeholder="" disabled />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="<?= $value->name ?>" value="<?= $value->value; ?>" placeholder="" required />
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>

                                </div>
                                <div class="form-group float-right">
                                    <!-- <button type="reset" class="btn btn-default">
                                        <i class="fas fa-redo-alt"></i>
                                        Cài lại
                                    </button> -->
                                    <?= displayResetButton() ?>
                                    <!-- <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save"></i>
                                        Lưu
                                    </button> -->
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