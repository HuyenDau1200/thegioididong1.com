<?php get_header(); ?>
<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <h3 id="index" class="fl-left">Cập nhật tài khoản khách hàng</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php get_sidebar('user')?>
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action="" method="POST">
                        <label for="firstName">Họ</label>
                        <input type="text" name="firstName" id="firstName" value="<?php echo $info_user['firstName']?>">
                        <?php echo form_error('firstName')?>

                        <label for="display-name">Tên</label>
                        <input type="text" name="lastName" id="lastName" value="<?php echo $info_user['lastName']?>">
                        <?php echo form_error('lastName')?>

                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="username" placeholder="" value="<?php echo $info_user['username']?>" readonly="readonly">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?php echo $info_user['email']?>" readonly="readonly">
                        <?php echo form_error('email')?>
                        <label for="tel">Số điện thoại</label>
                        <input type="tel" name="phone_number" id="tel" value="<?php echo $info_user['phoneNumber']?>">
                        <?php echo form_error('phone_number')?>
                        <label for="address">Địa chỉ</label>
                        <textarea name="address" id="address" ><?php echo $info_user['address']?></textarea>
                        <?php echo form_error('address')?>
                        <button type="submit" name="btn-update" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>

