<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/css/reset.css" rel="stylesheet" type="text/css" />
    <link href="public/css/login.css" rel="stylesheet" type="text/css" />
    <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <title>Form đăng ký</title>
</head>

<body>
    <style>
        .error {
            color: red;
            font-style: italic;
            font-weight: bold;
            text-align: left;
        }
    </style>
    <div id="wp-form-login" class="clearfix">
        <div class="clearfix" id="home">
            <a href="?"><i class="fa fa-close"></i></a>
        </div>
        <h1 class="page-title">ĐĂNG KÝ TÀI KHOẢN</h1>
        <form id="form-login" action="" method="POST">
            <input type="text" name="firstName" value="<?php echo set_value('firstName') ?>" placeholder="first name" id="firstName" />
            <?php form_error('firstName') ?>
            <input type="text" name="lastName" value="<?php echo set_value('lastName') ?>" placeholder="last name" id="lastName" />
            <?php form_error('lastName') ?>
            <input type="text" name="email" value="<?php echo set_value('email') ?>" placeholder="email" id="email" />
            <?php form_error('email') ?>
            <input type="text" name="phoneNumber" value="<?php echo set_value('phoneNumber') ?>" placeholder="phone number" id="phoneNumber" />
            <?php form_error('phoneNumber') ?>
            <input type="text" name="address" value="<?php echo set_value('address') ?>" placeholder="address" id="address" />
            <?php form_error('address') ?>
            <input type="text" name="username" value="<?php echo set_value('username') ?>" placeholder="username" id="username" />
            <?php form_error('username') ?>
            <input type="password" name="password" value="" placeholder="password" id="password" />
            <?php form_error('password') ?>
            <input type="submit" name="btn-reg" value="ĐĂNG KÝ" id="btn-login" />
            <?php form_error('account')?>
        </form>
        <a href="?mod=users&action=login" id="login">Đăng nhập</a>
    </div>
</body>

</html>