<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý slide</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Quản lý slide</a></li>
                        <li class="breadcrumb-item active">Thêm mới</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
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