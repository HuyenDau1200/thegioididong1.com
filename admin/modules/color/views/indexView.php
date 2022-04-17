<?php get_header() ?>
<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách màu sắc</h3>
                    <a href="?mod=color&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Mã màu</span></td>
                                    <td><span class="thead-text">Tên màu</span></td>
                                    <td><span class="thead-text">Thao tác</span></td>
                                </tr>
                            </thead>
                            <?php if(!empty($listColor)){
                                $temp = $start;
                            ?>
                            <tbody>
                                <?php foreach($listColor as $item){ $temp++;?>
                                <tr>
                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                    <td><span class="tbody-text"><?= $item['colorId'] ?></h3></span>
                                    <td><span class="tbody-text"><?= $item['colorCode'] ?></h3></span>
                                    <td><span class="tbody-text"><?= $item['colorName'] ?></span></td>
                                    <td class="clearfix">
                                        <ul class="list-operation">
                                            <li><a href="?mod=color&action=update&id=<?= $item['colorId'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="?mod=color&action=delete&id=<?= $item['colorId'] ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
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
                    <?= get_pagging($numPage, $page, "?mod=color") ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>