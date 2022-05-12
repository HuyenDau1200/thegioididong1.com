<div class="sidebar fl-left">
    <div class="section" id="category-product-wp">
        <div class="section-head">
            <h3 class="section-title">Danh mục sản phẩm</h3>
        </div>
        <div class="secion-detail">
            <ul class="list-item">
                <?php foreach (getListCatParent() as $cat) {?>
                    <li>
                        <a href="?mod=category&id=<?= $cat['catId'] ?>" title=""><?= $cat['catTitle'] ?></a>
                        <?php if(countItem($cat['catId']) != 0) { ?>
                            <ul class="sub-menu">
                                <?php foreach (getListCat() as $cat1) {
                                    if ($cat1['parentId'] == $cat['catId']) {?>
                                        <li>
                                            <a href="?mod=category&id=<?= $cat1['catId'] ?>" title=""><?= $cat1['catTitle']?></a>
                                            <?php if(countItem($cat1['catId']) != 0) { ?>
                                                <ul class="sub-menu">
                                                    <?php foreach (getListCat() as $cat2) {
                                                        if ($cat2['parentId'] == $cat1['catId']) {?>
                                                            <li>
                                                                <a href="?mod=category&id=<?= $cat2['catId'] ?>" title=""><?= $cat2['catTitle']?></a>
                                                            </li>
                                                        <?php } } ?>
                                                </ul>
                                            <?php }?>
                                        </li>
                                    <?php } }?>
                            </ul>
                        <?php }?>
                    </li>
                <?php }?>
            </ul>
        </div>
    </div>
    <?php if (isset($sumProducts) && $sumProducts > 0) { ?>
    <div class="section" id="filter-product-wp">
        <div class="section-head">
            <h3 class="section-title">Bộ lọc</h3>
        </div>
        <div class="section-detail">
            <form method="POST" action="">
                <table>
                    <thead>
                    <tr>
                        <td colspan="2">Giá</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input type="radio" name="r-price" value="1"></td>
                        <td>Dưới 1.000.000đ</td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="r-price" value="2"></td>
                        <td>1.000.000đ - 5.000.000đ</td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="r-price" value="3"></td>
                        <td>5.000.000đ - 10.000.000đ</td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="r-price" value="4"></td>
                        <td>Trên 10.000.000đ</td>
                    </tr>
                    </tbody>
                </table>
               <!-- <?php if (!empty(getColorOptions())) { ?>
                <table>
                    <thead>
                        <tr>
                            <td colspan="2">Màu sắc</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach (getColorOptions() as $color) {?>
                        <tr>
                            <td><input type="radio" name="r-color" value="<?= $color['colorId']?>"></td>
                            <td><?= $color['colorName']?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <?php } ?> -->
            </form>
        </div>
    </div>
    <?php }?>
</div>
