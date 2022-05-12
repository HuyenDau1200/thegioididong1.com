<!DOCTYPE html>
<html>
    <head>
        <title>THE GIOI DI DONG</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/carousel/owl.carousel.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/carousel/owl.theme.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/style.css" rel="stylesheet" type="text/css"/>
        <link href="public/responsive.css" rel="stylesheet" type="text/css"/>

        <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="public/js/elevatezoom-master/jquery.elevatezoom.js" type="text/javascript"></script>
        <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <script src="public/js/carousel/owl.carousel.js" type="text/javascript"></script>
        <script src="public/js/main.js" type="text/javascript"></script>
        <script src="public/js/cart.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="site">
            <div id="container">
                <div id="header-wp">
                    <div id="head-top" class="clearfix">
                        <div class="wp-inner">
                            <div id="main-menu-wp" class="fl-left">
                                <ul id="main-menu" class="clearfix">
                                    <li>
                                        <a href="?" title="">Trang chủ</a>
                                    </li>
                                    <li>
                                        <a href="?mod=post" title="">Blog</a>
                                    </li>
                                    <li>
                                        <a href="?mod=page&action=detail&id=1" title="">Giới thiệu</a>
                                    </li>
                                    <li>
                                        <a href="?mod=page&action=detail&id=2" title="">Liên hệ</a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <?php if(user_login()) {?>
                                <div id="dropdown-user" class="dropdown dropdown-extended fl-right">
                                    <button class="dropdown-toggle clearfix" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <div id="thumb-circle" class="fl-left">
                                            <img src="admin/public/images/user-32.png">
                                        </div>
                                        <h3 id="account" class="fl-right">
                                            <?php if(!empty(user_login())) echo user_login();?>
                                        </h3>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="?mod=users&action=updateAccount" title="Thông tin cá nhân">Thông tin tài khoản</a></li>
                                        <li><a href="?mod=users&action=logout" title="Thoát">Thoát</a></li>
                                    </ul>
                                </div>
                                <?php } else { ?>
                                <a href="?mod=users&action=login" title="" id="payment-link" class="fl-right">Đăng nhập/Đăng ký</a>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div id="head-body" class="clearfix">
                        <div class="wp-inner">
                            <a href="?" title="" id="logo" class="fl-left">THEGIOIDIDONG.COM</a>
                            <div id="search-wp" class="fl-left">
                                <form method="POST" action="">
                                    <input type="text" name="s" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                                    <button type="submit" id="sm-s">Tìm kiếm</button>
                                </form>
                            </div>
                            <div id="action-wp" class="fl-right">
                                <div id="advisory-wp" class="fl-left">
                                    <span class="title">Hotline</span>
                                    <span class="phone">0123.456.789</span>
                                </div>
                                <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                                <a href="?mod=cart" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="num"><?= getNumOrderCart() ?></span>
                                </a>
                                <div id="cart-wp" class="fl-right">
                                    <div id="btn-cart">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span id="num"><?= getNumOrderCart() ?></span>
                                    </div>
                                    <div id="dropdown">
                                        <?php if (getNumOrderCart() > 0) {?>
                                            <p class="desc">Có <span><?= getNumOrderCart() ?></span> sản phẩm trong giỏ hàng</p>
                                            <ul class="list-cart">
                                                <?php foreach (getListBuyCart() as $item) { ?>
                                                    <li class="clearfix">
                                                        <a href="<?= $item['url']?>" title="" class="thumb fl-left">
                                                            <img src="admin/public/images/<?= $item['productThumb'] ?>" alt="">
                                                        </a>
                                                        <div class="info fl-right">
                                                            <a href="<?= $item['url']?>" title="" class="product-name"><?= $item['productName'] ?></a>
                                                            <p class="price"><?= currency_format($item['price']) ?></p>
                                                            <p class="qty">Số lượng: <span><?=$item['qty']?></span></p>
                                                        </div>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                            <div class="total-price clearfix">
                                                <p class="title fl-left">Tổng:</p>
                                                <p class="price fl-right"><?= currency_format(getTotalCart())?></p>
                                            </div>
                                            <div class="action-cart clearfix">
                                                <a href="?mod=cart" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
                                                <a href="?mod=cart&action=checkout" title="Thanh toán" class="checkout fl-right">Thanh toán</a>
                                            </div>
                                        <?php } else { ?>
                                            <p class="desc">Không có sản phẩm nào trong giỏ hàng!</p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>