<?php get_header() ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật bài viết</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="title" id="title" value="<?= $infoPost['postTitle'] ?>">
                        <?php form_error('title') ?>
                        <label for="desc">Mô tả ngắn</label>
                        <textarea name="desc" id="desc"><?= $infoPost['postDesc'] ?></textarea>
                        <label for="detail">Chi tiết</label>
                        <textarea name="detail" id="detail" class="ckeditor"><?= $infoPost['postDetail'] ?></textarea>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb" value="<?= $infoPost['postThumb'] ?>" onchange="chooseFile(this)">
                            <img id="product-image" src='<?= "public/images/".$infoPost['postThumb'] ?>' >
                        </div>
                        <?php form_error('file') ?>
                        <label>Danh mục bài viết</label>
                        <select name="cat">
                            <option value="" selected="selected">-- Danh mục gốc --</option>
                            <?php foreach ($listCatOptions as $option) { ?>
                                <option value="<?= $option['postCatId'] ?>" <?php if(!empty($infoPost['postCatId']) && $infoPost['postCatId'] == $option['postCatId']) echo "selected='selected'"?> ><?= $option['postCatTitle'] ?></option>
                            <?php } ?>
                        </select>
                        <?php form_error('cat') ?>
                        <button type="submit" name="btn-update" id="btn-submit">Cập nhật</button>
                        <button type="submit" name="btn-back" id="btn-submit">Quay lại</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
<script>
    function chooseFile(fileInput) {
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#product-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
</script>
