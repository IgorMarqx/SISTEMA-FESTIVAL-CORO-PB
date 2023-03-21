<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();
include('./controllers/conexao.php');

$id = intval($_GET['id']);

$sql = "SELECT * FROM inscricao WHERE id='$id'";
$resposta = $conexao->query($sql);
$linha = $resposta->fetch_object();

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
    <link rel="stylesheet" href="./assets/systemAssets/sistema.css">
    <link rel="stylesheet" href="./assets/systemAssets/detalhes.css">
    <link rel="stylesheet" href="./assets/systemAssets/edicao.css">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="./imgs/logo.jpeg" type="icon">
    <title>Detalhes - <?php echo $linha->coro ?></title>
</head>

<body>
    <header>
        <div class="containe text-center">
            <div class="container-child ">
                <div class="logo">
                    <img width="230px" src="./imgs/company-yellow.jpg" alt="">
                    <h1>FESTIVAL PARAIBANO DE COROS</h1>
                </div>
            </div>
        </div>
        <?php $linha->orgao_pertence ?>
        <div class="title mt-3">
            <div class="insc">
                <h1>Ficha de inscrição</h1>
            </div>
        </div>

        <div class="container voltar mt-4">
            <a href="./sistema.php" class="btn btn-outline-warning"><img src="./imgs/arrow-return-left.svg" alt=""></a>

            <div class="buttons">
                <a href="./controllers/imprimir.php?id=<?php echo $id ?>" class="btn btn-outline-primary">Imprimir</a>
                <a href="./controllers/editar.php?id=<?php echo $id ?>" class="btn btn-outline-success">Editar</a>
                <a href="./controllers/excluir.php?id=<?php echo $id ?>" class="btn btn-outline-danger">Excluir</a>
            </div>
        </div>

        <div class="container outline mt-2">
            <div class="container fora">

                <div class="title info mt-3 mb-3">
                    <h2>Informações Principais</h2>
                </div>

                <div class="dentro-1" onclick="window.location='./controllers/editar.php?id=<?php echo $id ?>'">
                    <div class="coro">
                        <h3>Coro</h3>
                        <p><?php echo ucfirst($linha->coro) ?></p>
                    </div>

                    <div class="coro">
                        <h3>Orgão</h3>
                        <p><?php echo ucfirst($linha->orgao_pertence) ?></p>
                    </div>

                    <div class="coro">
                        <h3>Endereço</h3>
                        <p><?php echo ucfirst($linha->endereco_coro) ?></p>
                    </div>

                    <div class="coro">
                        <h3>Cidade</h3>
                        <p><?php echo ucfirst($linha->cidade) ?></p>
                    </div>

                    <div class="coro">
                        <h3>Estado</h3>
                        <p><?php echo ucfirst($linha->estado) ?></p>
                    </div>

                    <div class="coro">
                        <h3>Pais</h3>
                        <p><?php echo ucfirst($linha->pais) ?></p>
                    </div>
                </div>

                <div class="title info mt-3 mb-3">
                    <h2>Maestro e Coordenador</h2>
                </div>


                <div class="dentro-1" onclick="window.location='./controllers/editar.php?id=<?php echo $id ?>'">
                    <div class="coro">
                        <h3>Maestro</h3>
                        <p><?php echo ucfirst($linha->maestro) ?></p>
                    </div>

                    <div class="coro">
                        <h3>Telefone do Maestro</h3>
                        <p><?php echo ucfirst($linha->telefone) ?></p>
                    </div>

                    <div class="coro email">
                        <h3>Email do Maestro</h3>
                        <p><?php echo ucfirst($linha->email) ?></p>
                    </div>

                    <div class="coro">
                        <h3>Coordenador</h3>
                        <p><?php echo ucfirst($linha->coordenador) ?></p>
                    </div>

                    <div class="coro">
                        <h3>Telefone do Coordenador</h3>
                        <p><?php echo ucfirst($linha->telefone_coordenador) ?></p>
                    </div>

                    <div class="coro email">
                        <h3>Email do Coordenador</h3>
                        <p><?php echo ucfirst($linha->email_coordenador) ?></p>
                    </div>
                </div>

                <div class="title info mt-3 mb-3">
                    <h2>Historicos</h2>
                </div>

                <div class="dentro-2" onclick="window.location='./controllers/editar.php?id=<?php echo $id ?>'">
                    <div class="estado">
                        <h3>Historico do Coro</h3>
                        <p><?php echo ucfirst($linha->historico_coro) ?></p>
                    </div>

                    <div class="estado">
                        <h3>Historico do Maestro</h3>
                        <p><?php echo ucfirst($linha->historico_maestro) ?></p>
                    </div>
                </div>

                <div class="estado data mt-3 mb-3" onclick="window.location='./controllers/editar.php?id=<?php echo $id ?>'">
                    <h3>Data inserida</h3>
                    <p><?php echo date("d/m/Y H:i", strtotime($linha->data_insercao)) ?></p>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</header>