<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require './mailer/autoload.php';

    if(isset($_POST["email"])&&$_POST["email"]!=""){
        $subject=$_POST["subject"];
        $name=$_POST["name"];
        $email=$_POST["email"];
        $phonenumber=$_POST["number"];
        $message=$_POST["message"];
        
        try {
            $mail->SMTPDebug=0;
            $mail->isSMTP();
            $mail->Host='mail.hostname.com';//provided by the hosting server
            $mail->SMTPAuth=true;
            $mail->Username='mailhandler@glorioustanzania.co.tz';//create this email
            $mail->Password='create password';//developer has to create it
            $mail->SMTPSecure='tls';
            $mail->Port=587;
            //$mail->setFrom($smtpEmail, $username);
            $mail->addAddress("info@glorioustanzania.co.tz", "glorioustanzaniatours");
            $mail->addReplyTo($email,$name);
            $mail->isHTML(true);
            $mail->Subject=$subject;
            $mail->Body="<!DOCTYPE html><html lang='En'><body><div>Client Message: $message</div><body></html>";
            $mail->AltBody=$message;
            $mail->send();

            header("location:../400.html"); exit();//email sent
        }
        catch (Exception $e) {header("location:../503.html"); exit();}//email could sent

    }
    else{header("location:../Contacts.html"); exit();}
?>