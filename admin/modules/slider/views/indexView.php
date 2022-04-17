<?php get_header() ?>
    <div id="main-content-wp" class="list-product-page">
        <div class="wrap clearfix">
            <?php get_sidebar(); ?>
            <div id="content" class="fl-right">
                <div class="section" id="title-page">
                    <div class="clearfix">
                        <h3 id="index" class="fl-left">Danh sách slider</h3>
                        <a href="?mod=slider&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                    </div>
                </div>
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <div class="filter-wp clearfix">
                            <ul class="post-status fl-left">
                                <li class="all"><a href="">Tất cả <span class="count">(<?= sum_slider() ?>)</span></a></li>
                            </ul>
                            <form method="GET" class="form-s fl-right">
                                <input type="text" name="s" id="s">
                                <input type="submit" name="sm_s" value="Tìm kiếm">
                            </form>
                        </div>
                        <div class="actions">
                            <form method="GET" action="" class="form-actions">
                                <select name="actions">
                                    <option value="">Tác vụ</option>
                                    <option value="1">Xóa</option>
                                </select>
                                <input type="submit" name="sm_action" value="Áp dụng">
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table list-table-wp">
                                <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tên Slider</span></td>
                                    <td><span class="thead-text">Ảnh slider</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Ngày tạo</span></td>
                                    <td><span class="thead-text">Ngày cập nhật</span></td>
                                    <td><span class="thead-text">Thao tác</span></td>
                                </tr>
                                </thead>
                                <?php if(!empty($listSlider)) {
                                    $temp = $start;
                                    ?>
                                    <tbody>
                                    <?php foreach($listSlider as $slider){ $temp++;?>
                                        <tr>
                                            <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                            <td><span class="tbody-text"><?= $slider['sliderId']?></span></td>
                                            <td><span class="tbody-text"><?= $slider['sliderName']?></span></td>
                                            <td>
                                                <div class="tbody-thumb">
                                                    <img src="public/images/<?= $slider['sliderImage']?>" alt="">
                                                </div>
                                            </td>$slider
                                            <td><span class="tbody-text"><?= $slider['createdBy']?></span></td>
                                            <td><span class="tbody-text"><?= $slider['createdAt']?></span></td>
                                            <td><span class="tbody-text"><?= $slider['updatedAt']?></span></td>
                                            <td class="clearfix">
                                                <ul class="list-operation">
                                                    <li><a href="?mod=slider&action=update&id=<?= $slider['sliderId']?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                    <li><a href="?mod=slider&action=delete&id=<?= $slider['sliderId']?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                <?php } ?>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="section" id="paging-wp">
                    <div class="section-detail clearfix">
                        <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
                        <?= get_pagging($numPage, $page, "?mod=slider")?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>