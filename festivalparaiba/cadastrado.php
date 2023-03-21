<?php

// use PHPMailer\PHPMailer\PHPMailer;

// require './mailer/vendor/autoload.php';

// $mail = new PHPMailer();
// $mail->isSMTP();
// $mail->SMTPDebug = 2;
// $mail->Host = 'smtp.gmail.com';
// $mail->Port = 587;
// $mail->SMTPAuth = true;
// $mail->Username = 'igormarquesdeazevedo11@gmail.com';
// $mail->Password = 'aspire987Igor86531492';

// $mail->setFrom('igormarquesdeazevedo11@gmail.com', 'TESTANDO');
// $mail->addAddress('lodolam528@galcake.com');
// $mail->Subject = "TESTANDO";

// $mail->msgHTML("<h1>Email enviado com sucesso</h1> <p>Enviado!</p>");
// $mail->Body = "Email enviado com sucesso!";

// if ($mail->send()) {
//     echo "Email enviado com sucesso!";
// } else {
//     echo "Falha";
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/style.css">
    <link rel="stylesheet" href="./assets/login.css">
    <title>Ficha de inscrição</title>
</head>

<body class="scroll">
    <div class="header">
        <img src="./assets/imgs/company-yellow.jpg" alt="" srcset="">
        <h1>FEPAC</h1>
    </div>

    <div class="obrigado">
        <h1>Formulário enviado com sucesso! Confira seu e-mail</h1>
        <a class="btn btn-success" href="index.php">Cadastrar Novamente</a>
    </div>