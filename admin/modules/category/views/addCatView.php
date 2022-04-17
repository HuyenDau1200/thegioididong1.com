<?php get_header() ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới danh mục</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="title">Tên danh mục</label>
                        <input type="text" name="title" id="title">
                        <?php form_error('title') ?>
                        <label>Danh mục cha</label>
                        <select name="parent-cat">
                            <option value="0" selected="selected">-- Danh mục gốc --</option>
                            <?php foreach ($listCatOptions as $option) { ?>
                            <option value="<?= $option['value'] ?>" <?php if(!empty($parentCat) && $parentCat=="{$option['value']}") echo "selected=selected";?> ><?= $option['label'] ?></option>
                            <?php } ?>
                        </select>
                        <button type="submit" name="btn-add" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>