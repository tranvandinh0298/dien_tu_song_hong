<p class="login-box-msg">Nhập thông tin tại đây để đặt lại mật khẩu</p>
<form action="recover-password.html" method="post">
    <div class="input-group mb-3">
        <div class="input-group-append">
            <div class="input-group-text">
                <i class="fas fa-phone"></i>
            </div>
        </div>
        <input type="phone" class="form-control" placeholder="Số điện thoại">
    </div>
    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Yêu cầu đặt lại mật khẩu</button>
        </div>
        <!-- /.col -->
    </div>
</form>
<p class="mt-3 mb-1">
    <a href="<?= base_url('dashboard/login') ?>">Đăng nhập</a>
</p>