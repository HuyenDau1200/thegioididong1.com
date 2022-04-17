<?php
get_header();
?>
<div id="main-content-wp" class="clearfix detail-blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="detail-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title"><?= $infoPost['postTitle']?></h3>
                </div>
                <div class="section-detail">
                    <span class="create-date"><?= $infoPost['createdAt']?></span>
                    <div class="detail">
                        <p><strong><?= $infoPost['postDesc']?></strong></p>
                        <?= $infoPost['postDetail']?>
                    </div>
                </div>
            </div>
        </div>
        <?php get_sidebar('page') ?>
    </div>
</div>
<?php get_footer()?>
