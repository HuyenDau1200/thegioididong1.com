<?php get_header() ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới khách hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="firstName">Họ:</label>
                        <input type="text" name="firstName" id="firstName" value="<?php set_value('firstName') ?>">
                        <?php form_error('firstName') ?>
                        <label for="lastName">Tên:</label>
                        <input type="text" name="lastName" id="lastName" value="<?php set_value('lastName') ?>">
                        <?php form_error('lastName') ?>
                        <label for="username1">Tên đăng nhập:</label>
                        <input type="text" name="username" id="username1" value="<?php set_value('username') ?>">
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
                        <?php form_error('account') ?>
                        <button type="submit" name="btn-add" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>