<?php get_header() ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?mod=users&controller=team&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Thêm người dùng - nhóm quản trị</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php get_sidebar('user') ?>
        <div id="content" class="fl-right"> 
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="fullname">Họ và tên:</label>
                        <input type="text" name="fullname" id="fullname-name" value="<?php set_value('fullname') ?>">
                        <?php form_error('fullname') ?>
                        <label for="username">Tên đăng nhập:</label>
                        <input type="text" name="username" id="username" value="<?php set_value('username') ?>">
                        <?php form_error('username') ?>
                        <label for="password">Mật khẩu:</label>
                        <input type="password" name="password" id="password">
                        <?php form_error('password') ?>
                        <label for="email">Email:</label>
                        <input type="text" name="email" id="email" value="<?php set_value('email') ?>">
                        <?php form_error('email') ?>
                        <label for="tel">Số điện thoại:</label>
                        <input type="text" name="tel" id="tel" value="<?php set_value('tel') ?>">
                        <?php form_error('tel') ?>
                        <label for="address">Địa chỉ:</label>
                        <textarea name="address" id="address"><?php set_value('address') ?></textarea>
                        <?php form_error('address') ?>
                        <label for="role">Quyền truy cập:</label>
                        <select name="role" id="role">
                            <option value="">-- Chọn quyền --</option>
                            <option value="1">Quản lý</option>
                            <option value="2">Nhân viên</option>
                        </select>
                        <?php form_error('role') ?>
                        <?php form_error('account') ?>
                        <button type="submit" name="btn-add" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>