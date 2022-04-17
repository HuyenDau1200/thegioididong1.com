
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/css/reset.css" rel="stylesheet" type="text/css" />
    <link href="public/css/login.css" rel="stylesheet" type="text/css" />
    <title>Form đăng nhập</title> 
</head>
<body>
    <style>
        .error{
            color: red;
            font-style: italic;
            font-weight: bold;
            text-align: left;
        }
    </style>
    <div id="wp-form-login">
        <h1 class="page-title">ĐĂNG NHẬP</h1>
        <form id="form-login" action="" method="POST">
            <input type="text" name="username" value="<?php set_value('username') ?>" placeholder="username" id="username"/>
            <?php form_error('username') ?>
            <input type="password" name="password" value="" placeholder="password" id="password"/>
            <?php form_error('password') ?>
            <input type="submit" name="btn-login" value="Đăng nhập" id="btn-login"/>
            <?php form_error('account') ?>
        </form>
    </div>
</body>
</html>