<?php get_header() ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Bạn có chắc chắn xóa bài viết này?</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="title" id="title" value="<?= $infoSlider['sliderName'] ?>">
                        <?php form_error('title') ?>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb" value="<?= $infoSlider['sliderImage'] ?>" onchange="chooseFile(this)">
                            <img id="product-image" src='<?= "public/images/".$infoSlider['sliderImage'] ?>' >
                        </div>
                        <?php form_error('file') ?>
                        <button type="submit" name="btn-delete" id="btn-submit">Xóa</button>
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
