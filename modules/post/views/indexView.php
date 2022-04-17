<?php
get_header();
?>
<div id="main-content-wp" class="clearfix blog-page">
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
            <div class="section" id="list-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title">Blog</h3>
                </div>
                <div class="section-detail">
                    <?php if(!empty($listPost)) { ?>
                    <ul class="list-item">
                        <?php foreach ($listPost as $post) { ?>
                        <li class="clearfix">
                            <a href="?page=detail_blog" title="" class="thumb fl-left">
                                <img src="admin/public/images/<?= $post['postThumb']?>" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?mod=post&action=detail&id=<?= $post['postId']?>" title="" class="title"><?= $post['postTitle']?></a>
                                <span class="create-date"><?= $post['createdAt']?></span>
                                <p class="desc"><?= $post['postDesc']?></p>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                    <?php } else {?>
                    <p>Không có bài viết mới nào. Vui lòng quay lại sau!</p>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php get_sidebar() ?>
    </div>
</div>
<?php get_footer()?>
