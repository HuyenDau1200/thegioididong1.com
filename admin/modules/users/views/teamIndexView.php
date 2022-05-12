<?php get_header() ?>
<div id="main-content-wp" class="list-post-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?mod=users&controller=team&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Nhóm quản trị</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php get_sidebar('user') ?>
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(<?php echo sum_team()?>)</span></a></li>
                        </ul>
                        <form method="GET" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Họ và tên</span></td>
                                    <td><span class="thead-text">Tên đăng nhập</span></td>
                                    <td><span class="thead-text">Mật khẩu</span></td>
                                    <td><span class="thead-text">Email</span></td>
                                    <td><span class="thead-text">Số điện thoại</span></td>
                                    <td><span class="thead-text">Ngày tạo</span></td>
                                    <td><span class="thead-text">Địa chỉ</span></td>
                                    <td><span class="thead-text">Quyền truy cập</span></td>
                                    <td><span class="thead-text">Thao tác</span></td>
                                </tr>
                            </thead>
                            <?php if(!empty($list_team_manager)){
                                $temp = $start;
                                ?>
                            <tbody>
                                <?php foreach($list_team_manager as $user){
                                    $temp++;?>
                                <tr>
                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                    <td><span class="tbody-text"><?php echo $temp?></h3></span>
                                    
                                    <td><span class="tbody-text"><?= $user['firstName'].' '. $user['lastName']?></span></td>
                                    <td><span class="tbody-text"><?= $user['username']?></span></td>
                                    <td><span class="tbody-text"><?= $user['password']?></span></td>
                                    <td><span class="tbody-text"><?= $user['email']?></span></td>
                                    <td><span class="tbody-text"><?= $user['phoneNumber']?></span></td>
                                    <td><span class="tbody-text"><?= date('d/m/Y',$user['createdAt'])?></span></td>
                                    <td><span class="tbody-text"><?= $user['address']?></span></td>
                                    <td><span class="tbody-text"><?= $user['role']?></span></td>
                                    <td class="clearfix">
                                        <ul class="list-operation">
                                            <li><a href="?mod=users&controller=team&action=update&id=<?= $user['userId']?>" title="Cập nhật thông tin" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="?mod=users&controller=team&action=reset&id=<?= $user['userId']?>" title="Đổi mật khẩu" class="edit"><i class="fa fa-exchange" aria-hidden="true"></i></a></li>
                                            <li><a href="?mod=users&controller=team&action=delete&id=<?= $user['userId']?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                               <?php }?>
                            </tbody>
                            <?php }?>
                            <tfoot>
                            </tfoot>
                        </table>
                        <p><strong>Role = 1 - Admin, 2 - Nhân viên</strong></p>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <?php
                     echo get_pagging($num_page, $page,"?mod=users&controller=team");
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>