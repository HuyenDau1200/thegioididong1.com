<?php get_header() ?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách khách hàng</h3>
                    <a href="?mod=customer&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(<?php echo sumCustomers()?>)</span></a></li>
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
                                    <td><span class="thead-text">Địa chỉ</span></td>
                                    <td><span class="thead-text">Ngày tạo</span></td>
                                    <td><span class="thead-text">Ngày cập nhật</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Người cập nhật</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Thao tác</span></td>
                                </tr>
                            </thead>
                            <?php if(!empty($listCustomer)){
                                ?>
                            <tbody>
                                <?php foreach($listCustomer as $user){
                                    $temp++;?>
                                <tr>
                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                    <td><span class="tbody-text"><?= $user['userId']?></h3></span>
                                    
                                    <td><span class="tbody-text"><?= $user['firstName'].' '. $user['lastName']?></span></td>
                                    <td><span class="tbody-text"><?= $user['username']?></span></td>
                                    <td><span class="tbody-text"><?= $user['password']?></span></td>
                                    <td><span class="tbody-text"><?= $user['email']?></span></td>
                                    <td><span class="tbody-text"><?= $user['phoneNumber']?></span></td>
                                    <td><span class="tbody-text"><?= $user['address']?></span></td>
                                    <td><span class="tbody-text"><?= $user['createdAt']?></span></td>
                                    <td><span class="tbody-text"><?= $user['updatedAt']?></span></td>
                                    <td><span class="tbody-text"><?= $user['createdBy']?></span></td>
                                    <td><span class="tbody-text"><?= $user['updatedBy']?></span></td>
                                    <td>
                                        <span class="tbody-text">
                                            <?php
                                                if(checkActive($user['isActive'])) {
                                                    echo "Đã kích hoạt";
                                                } else {
                                                    echo "Chưa kích hoạt";
                                                }
                                            ?>
                                        </span>
                                    </td>
                                    <td class="clearfix">
                                        <ul class="list-operation">
                                            <li><a href="?mod=customer&action=update&id=<?= $user['userId']?>" title="Cập nhật thông tin" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="?mod=customer&action=resetPass&id=<?= $user['userId']?>" title="Đổi mật khẩu" class="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></li>
                                            <li><a href="?mod=customer&action=delete&id=<?= $user['userId']?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                               <?php }?>
                            </tbody>
                            <?php }?>
                            <tfoot>
                            </tfoot>
                        </table>
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