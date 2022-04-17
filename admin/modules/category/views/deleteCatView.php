<?php get_header() ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Bạn có chắc chắn muốn xóa danh mục này không?</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="title">Tên danh mục</label>
                        <input type="text" name="title" id="title" value="<?= $infoCat['catTitle'] ?>" readonly="readonly">
                        <?php form_error('title') ?>
                        <label>Danh mục cha</label>
                        <select name="parent-cat" aria-readonly="false">
                            <option value="0" <?php if(!empty($infoCat['parentId']) && $infoCat['parentId']== 0) echo "selected='selected'"?>>-- Danh mục gốc --</option>
                            <?php foreach ($listCatOptions as $option) { ?>
                                <option value="<?= $option['value'] ?>" <?php if(!empty($infoCat['parentId']) && $infoCat['parentId'] == $option['value']) echo "selected='selected'"?>><?= $option['label'] ?></option>
                            <?php } ?>
                        </select>
                        <button type="submit" name="btn-delete" id="btn-submit">Xóa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>
