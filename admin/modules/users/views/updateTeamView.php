<?php get_header();
?>
<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?mod=users&controller=team&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Cập nhật tài khoản - nhóm quản trị</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php get_sidebar('user')?>
        <div id="content" class="fl-right">                       
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action="" method="POST">
                        <label for="display-name">Họ và tên</label>
                        <input type="text" name="fullname" id="display-name" value="<?php echo $info_user['fullname']?>">
                        <?php echo form_error('fullname')?>
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="username" placeholder="" value="<?php echo $info_user['username']?>" readonly="readonly">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?php echo $info_user['email']?>" readonly="readonly">
                        <?php echo form_error('email')?>
                        <label for="tel">Số điện thoại</label>
                        <input type="tel" name="phone_number" id="tel" value="<?php echo $info_user['phone_number']?>">
                        <?php echo form_error('phone_number')?>
                        <label for="address">Địa chỉ</label>
                        <textarea name="address" id="address" ><?php echo $info_user['address']?></textarea>
                        <?php echo form_error('address')?>
                        <label for="role">Quyền truy cập:</label>
                        <select name="role" id="role">
                            <option value="">-- Chọn quyền --</option>
                            <option value="1" <?php if(!empty($info_user['role']) && $info_user['role']=='1') echo "selected='selected'"?>>Quản lý</option>
                            <option value="2" <?php if(!empty($info_user['role']) && $info_user['role']=='2') echo "selected='selected'"?>>Biên tập viên</option>
                            <option value="3" <?php if(!empty($info_user['role']) && $info_user['role']=='3') echo "selected='selected'"?>>Cộng tác viên</option>
                        </select>
                        <?php form_error('role') ?>
                        <?php form_error('account') ?>
                        <button type="submit" name="btn-update" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer()?>