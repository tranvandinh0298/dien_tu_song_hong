<p class="login-box-msg">Đăng nhập để bắt đầu phiên làm việc</p>

<form action="<?= base_url("auth/login") ?>" method="POST">
    <div class="input-group mb-3">
        <div class="input-group-append">
            <div class="input-group-text">
                <i class="fas fa-user"></i>
            </div>
        </div>
        <input type="text" name="username" class="form-control" value="<?php echo !empty($data['post']['username']) ? $data['post']['username'] : ''; ?>" placeholder="Tài khoản">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
        <input type="password" name="password" class="form-control" placeholder="Mật khẩu" autocomplete="true">
    </div>
    <div class="input-group mb-3">
        <div class="icheck-primary">
            <input type="checkbox" name="remember_login" id="remember">
            <label for="remember">
                Ghi nhớ đăng nhập
            </label>
        </div>
    </div>
    <div class="input-group mb-3">
        <button type="submit" class="btn btn-primary btn-block">
            Đăng nhập
        </button>
    </div>
</form>
<!-- <p class="mb-1">
    <a href="<?= base_url('auth/forgot_password') ?>">Quên mật khẩu?</a>
</p> -->