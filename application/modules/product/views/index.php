<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php load_view($components['page_header']) ?>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách sản phẩm</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table data-role="datatable" data-url="<?= base_url('/product/ajax_list') ?>" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên danh mục</th>
                                        <th>Hình ảnh minh họa</th>
                                        <th>Trạng thái</th>
                                        <th>Danh mục</th>
                                        <th>On/Off</th>
                                        <th>Thư viện ảnh</th>
                                        <th>Chi tiết sản phẩm dạng ảnh</th>
                                        <th>Chỉnh sửa</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên danh mục</th>
                                        <th>Hình ảnh minh họa</th>
                                        <th>Trạng thái</th>
                                        <th>Danh mục</th>
                                        <th>On/Off</th>
                                        <th>Thư viện ảnh</th>
                                        <th>Chi tiết sản phẩm dạng ảnh</th>
                                        <th>Chỉnh sửa</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
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
