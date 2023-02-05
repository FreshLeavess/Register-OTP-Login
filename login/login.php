<?php 

session_start();

$conn = mysqli_connect("localhost","root","","littleproject");


if(isset($_POST["button"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn,"SELECT * FROM akun WHERE email = '$email'");


    if(mysqli_num_rows($result) === 1) {

        $rows = mysqli_fetch_assoc($result);

        if(password_verify($password,$rows["password"])) {

            if($rows["verifikasi"] === "") {

                $noVerif = true;

            } else {

                $_SESSION["login"] = true;

                header('Location: index.php');

            }
        } else {

            $pwWrong = true;
        }

    } else {

        $emailWrong = true;

    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">

</head>
<body class="align">


    <div class="grid">

        <form action="" method="post" class="form login">

            <header class="login__header">
            <h3 class="login__title">Login</h3>
            </header>

            <div class="login__body">

                <div class="form__field">
                    <input type="email" placeholder="Email" name="email" required>
                </div>

                <?php if(isset($noVerif)) : ?>
                    <p style="color:red;font-style:italic;font-size:12px">* Verifikasi terlebih dahulu email anda</p>
                <?php endif; ?>

                <?php if(isset($emailWrong)) : ?>
                    <p style="color:red;font-style:italic;font-size:12px">* email belum terdaftar</p>
                <?php endif; ?>

                <div class="form__field">
                    <input type="password" placeholder="Password" name="password" required>
                </div>

                <?php if(isset($pwWrong)) : ?>
                    <p style="color:red;font-style:italic;font-size:12px">* password salah</p>
                <?php endif; ?>

            </div>

            <footer class="login__footer">
            <input type="submit" value="Login" name="button">

            <p><span class="icon icon--info">!</span><a href="../register/register.php">Te boga akun</a></p>
            </footer>

        </form>

    </div>

</body>
</html>