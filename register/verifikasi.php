<?php
session_start();

$conn = mysqli_connect("localhost","root","","");

if(isset($_POST["buttonverif"])) { 
   
    $numRandom = password_hash($_SESSION["numRandom"] , PASSWORD_DEFAULT);
    
    $otp = $_POST["otp"];

    if(password_verify($otp,$numRandom) ) {

        $username = $_SESSION["username"];
        $email = $_SESSION["email"];
        $password = $_SESSION["password"];

        mysqli_query($conn,"INSERT INTO akun VALUES('','$username','$email','$password','active')");

        session_unset();
        session_destroy();
        
        echo "<script>document.location.href = '../login/login.php';</script>";
        
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body class="align">


    <div class="grid">

        <form action="" method="post" class="form login">

            <header class="login__header">
            <h3 class="login__title">Verifikasi</h3>
            </header>

            <div class="login__body">
                <div class="form__field">
                    <input type="text" placeholder="OTP" name="otp" required>
                </div>
            </div>

            <footer class="login__footer">
            <input type="submit" value="Sign-up" name="buttonverif">
            </footer>

        </form>

    </div>
    
</body>
</html>