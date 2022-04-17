<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/css/reset.css" rel="stylesheet" type="text/css" />
    <link href="public/css/login.css" rel="stylesheet" type="text/css" />
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
    <div id="wp-form-login">
        <h1 class="page-title">ĐĂNG KÝ TÀI KHOẢN</h1>
        <form id="form-login" action="" method="POST">
            <input type="text" name="fullname" value="<?php echo set_value('fullname') ?>" placeholder="fullname" id="fullname" />
            <?php form_error('fullname') ?>
            <input type="text" name="email" value="<?php echo set_value('email') ?>" placeholder="email" id="email" />
            <?php form_error('email') ?>
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