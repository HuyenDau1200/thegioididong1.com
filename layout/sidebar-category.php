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
                        <td><input type="radio" name="r-price"></td>
                        <td>Dưới 500.000đ</td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="r-price"></td>
                        <td>500.000đ - 1.000.000đ</td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="r-price"></td>
                        <td>1.000.000đ - 5.000.000đ</td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="r-price"></td>
                        <td>5.000.000đ - 10.000.000đ</td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="r-price"></td>
                        <td>Trên 10.000.000đ</td>
                    </tr>
                    </tbody>
                </table>
                <table>
                    <thead>
                    <tr>
                        <td colspan="2">Hãng</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input type="radio" name="r-brand"></td>
                        <td>Acer</td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="r-brand"></td>
                        <td>Apple</td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="r-brand"></td>
                        <td>Hp</td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="r-brand"></td>
                        <td>Lenovo</td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="r-brand"></td>
                        <td>Samsung</td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="r-brand"></td>
                        <td>Toshiba</td>
                    </tr>
                    </tbody>
                </table>
                <table>
                    <thead>
                    <tr>
                        <td colspan="2">Loại</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input type="radio" name="r-price"></td>
                        <td>Điện thoại</td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="r-price"></td>
                        <td>Laptop</td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <?php }?>
</div>
