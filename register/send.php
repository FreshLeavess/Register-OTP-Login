<?php
session_start();

$conn = mysqli_connect("localhost","root","","littleproject");

$username = $_POST["username"];
$email = $_POST["email"];
$password = password_hash($_POST["password"],PASSWORD_DEFAULT);

$result = mysqli_query($conn,"SELECT * FROM akun WHERE email = '$email'");

if (mysqli_num_rows($result) === 1) {
    $_SESSION["exist"] = true;
    header("Location: register.php");
    exit;
}


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$numRandom = random_int(100000,999999);

require '../vendor/autoload.php';

$mail = new PHPMailer(true);

    $mail->SMTPDebug =0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'insan.nazal@gmail.com';                     //SMTP username
    $mail->Password   = 'uujqfoxdzkxwklhd';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


    $mail->setFrom('insan.nazal@gmail.com', 'Insan');
    $mail->addAddress($email);     //Add a recipient

    $mail->isHTML(false);                                  //Set email format to HTML
    $mail->Subject = 'OTP FreshLeavess';
    $mail->Body    =  $numRandom ;

    $mail->send();

    $_SESSION["numRandom"] = $numRandom;
    $_SESSION["username"] = $username;
    $_SESSION["email"] = $email;
    $_SESSION["password"] = $password;
    

    echo "<script>document.location.href = 'verifikasi.php'</script>";


?>