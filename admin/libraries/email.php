<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
//Create an instance; passing `true` enables exceptions
function send_mail($send_to_mail,$send_to_fullname,$subject,$content,$option=array()){
    global $config;
    $config_email=$config['email'];
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $config_email['smtp_host'];                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $config_email['smtp_user'];                     //SMTP username
        $mail->Password   = $config_email['smtp_pass'];                               //SMTP password
        $mail->SMTPSecure = $config_email['smtp_secure'];            //Enable implicit TLS encryption
        $mail->Port       = $config_email['smtp_port'];                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail-> CharSet='UTF-8';
        //Recipients
        $mail->setFrom($config_email['smtp_user'],$config_email['smtp_fullname']);
        $mail->addReplyTo($config_email['smtp_user'],$config_email['smtp_fullname']);
        $mail->addAddress($send_to_mail,$send_to_fullname);
        //Attachments
        if(!empty($option)){
            $mail -> addAttachment($option['name_file_attachment'],$option['name_file_replace']);
        }
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $content;
    
        $mail->send();
        return 'Thông tin đã được gửi!';
    } catch (Exception $e) {
        return 'Không gửi được email. Lỗi: '.$mail->ErrorInfo;
    }
}
