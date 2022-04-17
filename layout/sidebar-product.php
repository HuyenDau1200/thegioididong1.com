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
</div>