<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/css/reset.css" rel="stylesheet" type="text/css" />
    <link href="public/css/reset_pass.css" rel="stylesheet" type="text/css" />
    <title>Thiết lập lại mật khẩu</title>
</head>
<body>
    <form action="" method="POST" id="reset-pass">
        <h2>LẤY LẠI MẬT KHẨU</h2>
        <label for="new_pass">Nhập mật khẩu mới:</label>
        <input type="password" id='new-pass' name="new_pass">
        <?php echo form_error('new_pass') ?>
        <label for="confirm_pass">Xác nhận lại mật khẩu:</label>
        <input type="password" id='confirm-pass' name="confirm_pass">
        <?php echo form_error('confirm_pass') ?>
        <?php echo form_error('reset_pass') ?>
        <input type="submit" value="Xác nhận" name="btn-set-new-pass" id="btn-set-new-pass">
    </form>
</body>
</html>