<?php get_header();
?>
<div id="main-content-wp" class="info-account-page">
    <div class="wrap clearfix">
        <?php get_sidebar()?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Bạn chắc chắn muốn xóa khách hàng này?</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action="" method="POST">
                        <label for="firstName">Họ</label>
                        <input type="text" name="firstName" id="firstName" value="<?php echo $info_user['firstName']?>" readonly="readonly">
                        <label for="display-name">Tên</label>
                        <input type="text" name="lastName" id="lastName" value="<?php echo $info_user['lastName']?>" readonly="readonly">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="username" placeholder="" value="<?php echo $info_user['username']?>" readonly="readonly">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?php echo $info_user['email']?>" readonly="readonly">
                        <label for="tel">Số điện thoại</label>
                        <input type="tel" name="phone_number" id="tel" value="<?php echo $info_user['phoneNumber']?>" readonly="readonly">
                        <label for="address">Địa chỉ</label>
                        <textarea name="address" id="address" readonly="readonly" ><?php echo $info_user['address']?></textarea>
                        <button type="submit" name="btn-delete" id="btn-submit">Xoá</button>
                        <button type="submit" name="btn-back" id="btn-submit">Quay lại</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer()?>