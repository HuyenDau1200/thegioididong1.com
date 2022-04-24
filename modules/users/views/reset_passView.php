<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/css/reset.css" rel="stylesheet" type="text/css" />
    <link href="public/css/reset_pass.css" rel="stylesheet" type="text/css" />
    <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <title>Thiết lập lại mật khẩu</title>
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
        <div class="clearfix" id="home">
            <a href="?"><i class="fa fa-close"></i></a>
        </div>
        <h2>LẤY LẠI MẬT KHẨU</h2>
        <form action="" method="POST" id="reset-pass">
            <input type="password" id='new-pass' name="new_pass" placeholder="new pass">
            <?php echo form_error('new_pass') ?>
            <input type="password" id='confirm-pass' name="confirm_pass" placeholder="old pass">
            <?php echo form_error('confirm_pass') ?>
            <?php echo form_error('reset_pass') ?>
            <input type="submit" value="Xác nhận" name="btn-set-new-pass" id="btn-set-new-pass">
        </form>
    </div>
</body>
</html>