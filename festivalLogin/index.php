<?php
session_start();
include_once('./controllers/conexao.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- FOLHA CSS -->
    <link rel="stylesheet" href="./assets/loginAssets/login.css">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="./imgs/logo.jpeg" type="icon">
    <title>Login - ADMIN</title>
</head>

<body>
    <div class="body">
        <div class="container principal mt-5">
            <img height="150rem" src="./imgs/company-yellow.jpg" alt="">
        </div>
        <div class="container mt-5">
            <div class="formulario">
                <form action="./controllers/login/login.php" method="POST">
                    <label class="us" for="user">Usuario <span>*</span></label>
                    <?php
                    if (isset($_SESSION['error'])) :
                    ?>
                        <div class="error">
                            <span><i class="fa-solid fa-triangle-exclamation"></i><?php echo $_SESSION['error'] ?></span>
                        </div>
                    <?php
                    endif;
                    unset($_SESSION['error']);
                    ?>

                    <input value="<?php if(isset($_POST['user'])) echo $_POST['user']; ?>" name="user" type="text" id="user" class="form-control" autofocus placeholder="Insira seu usuário">

                    <label class="us mt-3" for="pass">Senha <span>*</span></label>
                    <div class="input-group mb-3">
                        <input id="pass" name="password" type="password" class="form-control" placeholder="Informe sua senha">
                        <span class="input-group-text"><img onclick="eyeClick()" id="eye" src="./imgs/eye-open.svg" width="20px" alt=""></span>
                    </div>


                    <div class="d-grid gap-2 col-12 mx-auto mt-3">
                        <input name="submit" class="btn" id="submit" type="submit" value="Entrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="./assets/loginAssets/login.js"></script>
</body>

</html>