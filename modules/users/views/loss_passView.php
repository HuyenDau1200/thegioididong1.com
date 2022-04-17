<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/css/reset.css" rel="stylesheet" type="text/css" />
    <link href="public/css/loss_pass.css" rel="stylesheet" type="text/css" />
    <title>Form xác nhận email</title>
</head>

<body>
    <form action="" id="confirm-email" method="POST">
        <label for="email">Nhập vào email của bạn:</label>
        <input type="text" name="email" id="email">
        <?php echo form_error('email')?>
        <input type="submit" value="Xác nhận" name="btn-confirm-email" id="btn-confirm-email">
    </form>
</body>