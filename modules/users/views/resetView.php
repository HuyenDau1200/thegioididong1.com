<?php get_header()?>
<div id="main-content-wp" class="change-pass-page">
    <div class="wp-inner">
    <div class="section" id="title-page">
        <div class="clearfix">
            <h3 id="index" class="fl-left">Đổi mật khẩu khách hàng</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php get_sidebar('user')?>
        <div id="content" class="fl-right">                       
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="old-pass">Mật khẩu cũ</label>
                        <input type="password" name="pass-old" id="pass-old">
                        <?php echo form_error('pass-old')?>
                        <label for="new-pass">Mật khẩu mới</label>
                        <input type="password" name="pass-new" id="pass-new">
                        <?php echo form_error('pass-new')?>
                        <label for="confirm-pass">Xác nhận mật khẩu</label>
                        <input type="password" name="confirm-pass" id="confirm-pass">
                        <?php echo form_error('confirm-pass')?>
                        <button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<?php get_footer()?>