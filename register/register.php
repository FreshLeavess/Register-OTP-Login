<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body class="align">


    <div class="grid">

        <form action="send.php" method="post" class="form login">

            <header class="login__header">
            <h3 class="login__title">Registrasi</h3>
            </header>

            <div class="login__body">

                <div class="form__field">
                    <input type="text" placeholder="Username" name="username"required>
                </div>
                <div class="form__field">
                    <input type="email" placeholder="Email" name="email" required>
                </div>
                <?php if(isset($exist)) : ?>
                    <p>email telah digunakan</p>
                <?php endif; ?>
                <div class="form__field">
                    <input type="password" placeholder="Password" name="password" required>
                </div>

            </div>

            <footer class="login__footer">
            <input type="submit" value="Sign-up" name="button">
            </footer>

        </form>

    </div>
    
</body>
</html>