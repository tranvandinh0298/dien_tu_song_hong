<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php load_view($components['page_header']) ?>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title">Thư viện ảnh</h4>
                        </div>
                        <div class="card-body">
                            <?php
                            if (!empty($data['galleries'])) {
                            ?>
                                <div>
                                    <div class="filter-container p-0 row">
                                        <?php
                                        foreach ($data['galleries'] as $gallery) {
                                        ?>
                                            <div class="filtr-item col-sm-2" data-category="<?= $gallery->type ?>" data-id="<?= $gallery->id; ?>">
                                                <a href="<?= base_url("product/delete_image/" . $gallery->id) ?>" onclick="return confirm('Bạn có chắc là muốn xóa ảnh này không?');" class="btn btn-outline-danger btn-delete-image">
                                                    <i class="fa fa-times-circle"></i>
                                                </a>
                                                <a href="<?= base_url($gallery->image . "?text=" . $gallery->id) ?>" data-toggle="lightbox" data-title="<?= 'link: ' . $gallery->image ?>">
                                                    <img src="<?= base_url($gallery->image . "?text=" . $gallery->id) ?>" class="img-fluid mb-2" alt="<?= 'link: ' . $gallery->image ?>" />
                                                </a>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            <?php
                            } else {
                                echo 'Hiện chưa có dữ liệu';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card card-default" id="dropzone" data-url="<?= base_url('product/ajax_upload_image/' . $data['product']->id) ?>">
                        <div class="card-header">
                            <h3 class="card-title">Tải thêm ảnh tại đây</h3>
                        </div>
                        <div class="card-body">
                            <div id="actions" class="row">
                                <div class="col-lg-6">
                                    <div class="btn-group w-100">
                                        <span class="btn btn-success col fileinput-button">
                                            <i class="fas fa-plus"></i>
                                            <span>Thêm ảnh</span>
                                        </span>
                                        <button type="submit" class="btn btn-primary col start">
                                            <i class="fas fa-upload"></i>
                                            <span>Bắt đầu tải lên</span>
                                        </button>
                                        <!-- <button type="reset" class="btn btn-warning col cancel">
                                            <i class="fas fa-times-circle"></i>
                                            <span>Cancel upload</span>
                                        </button> -->
                                    </div>
                                </div>
                                <div class="col-lg-6 d-flex align-items-center">
                                    <div class="fileupload-process w-100">
                                        <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                            <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table table-striped files" id="previews">
                                <div id="template" class="row mt-2">
                                    <div class="col-auto">
                                        <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                                    </div>
                                    <div class="col d-flex align-items-center">
                                        <p class="mb-0">
                                            <span class="lead" data-dz-name></span>
                                            (<span data-dz-size></span>)
                                        </p>
                                        <strong class="error text-danger" data-dz-errormessage></strong>
                                    </div>
                                    <div class="col-4 d-flex align-items-center">
                                        <div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                            <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                        </div>
                                    </div>
                                    <div class="col-auto d-flex align-items-center">
                                        <div class="btn-group">
                                            <button class="btn btn-primary start">
                                                <i class="fas fa-upload"></i>
                                                <span>Bắt đầu</span>
                                            </button>
                                            <!-- <button data-dz-remove class="btn btn-warning cancel">
                                                <i class="fas fa-times-circle"></i>
                                                <span>Cancel</span>
                                            </button> -->
                                            <button data-dz-remove class="btn btn-danger delete">
                                                <i class="fas fa-trash"></i>
                                                <span>Xóa</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->