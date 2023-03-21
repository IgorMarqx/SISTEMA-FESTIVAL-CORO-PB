<?php
session_start();
include('./conexao.php');

if (isset($_POST['confirmar'])) {
    $id =  intval($_GET['id']);
    $sql = "DELETE FROM inscricao WHERE id= '$id'";
    $_SESSION['deletado'] = $conexao->query($sql);

    if ($conexao) { ?>
        <script>
            window.location.href = '../sistema.php'
        </script>
<?php
    }
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- FOLHA CSS -->
    <link rel="stylesheet" href="../assets/systemAssets/sistema.css">
    <link rel="stylesheet" href="../assets/systemAssets/detalhes.css">
    <link rel="stylesheet" href="../assets/systemAssets/edicao.css">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="shortcut icon" href="../imgs/logo.jpeg" type="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Candidato - <?php echo $linha->coro ?></title>
</head>

<body class="none">
    <header>
        <div class="containe">
            <div class="container-child">
                <div class="logo">
                    <img width="230px" src="../imgs/company-yellow.jpg" alt="">
                    <h1>FESTIVAL PARAIBANO DE COROS</h1>
                </div>
                <div class="responsive-logo">
                    <div class="dropdown">
                        <a class="dropdown-item" href="./controllers/login/logout.php"><i class="fa-sharp fa-solid fa-right-from-bracket"></i> Sair</a>
                    </div>
                </div>


            </div>
        </div>

        <div class="title mt-3">
            <div class="mid">
                <h1>Lista de candidatos</h1>
            </div>
        </div>

        <div class="excluir">
            <h1>Tem certeza que deseja excluir?</h1>

            <form action="" method="post" class="mt-3">
                <div class="btns">
                    <a class="btn btn-success" href="../sistema.php">Não</a>
                    <button class="btn btn-danger" name="confirmar" value="1" type="submit">Sim</button>
                </div>
            </form>
        </div>
    </header>
</body>