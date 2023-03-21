<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if ((!isset($_SESSION['user']) == true) and (!isset($_SESSION['password']) == true)) {
    unset($_SESSION['user']);
    unset($_SESSION['password']);
    header('Location: ./index.php');
} else {
    $logado = $_SESSION['user'];
}

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
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="./imgs/logo.jpeg" type="icon">
    <title>FEPAC</title>


</head>

<?php
include('./controllers/conexao.php');

$pagina = 1;
$limite = 10;

// Paginação
if (isset($_GET['pagina'])) {
    $pagina = filter_input(INPUT_GET, "pagina", FILTER_VALIDATE_INT);
}

if (!$pagina) {
    $pagina = 1;
}

$inicio = ($pagina * $limite) - $limite;

$registros = $conexao->query("SELECT COUNT(id) count FROM inscricao")->fetch_assoc()["count"];
$paginas = ceil($registros / $limite);

$sql = $conexao->query("SELECT * FROM inscricao ORDER BY id DESC LIMIT $inicio, $limite");
// Paginação

$qtd = $conexao->query("SELECT COUNT(id) AS id_qtd FROM inscricao");
$qtd_linhas = $qtd->fetch_assoc();

?>

<body>
    <header>
        <div class="containe">
            <div class="container-child">
                <div class="logo">
                    <img width="230px" src="./imgs/company-yellow.jpg" alt="">
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
                <h1>FEPAC - INSCRIÇÔES - <?php echo date("Y") ?></h1>
            </div>
        </div>


        <div class="container centralize mt-3">

            <div class="busca">
                <form action="">
                    <div class="input-group mb-3">
                        <input id="procurar" type="text" name="busca" class="form-control" placeholder="Pesquisar..." value="<?php if (isset($_GET['busca'])) echo $_GET['busca'] ?>">
                        <button id="lupa" type="submit" class="input-group-text" value=""><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php if ($pagina > 1) : ?>
                        <li class="page-item">
                            <a class="page-link" href="?pagina=1" aria-label="Previous">
                                <span aria-hidden="true">
                                    << </span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="?pagina=<?= $pagina - 1; ?>" aria-label="Previous">
                                <span aria-hidden="true">
                                    < </span>
                                    <?php endif; ?>
                            </a>
                        </li>
                        <li class="page-item"><span class="page-link"><?php echo $pagina ?></span></li>
                        <?php if ($pagina < $paginas) : ?>
                            <li class="page-item">
                                <a class="page-link" href="?pagina=<?= $pagina + 1; ?>" aria-label="Next">
                                    <span aria-hidden="true">></span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="?pagina=<?= $paginas; ?>" aria-label="Next">
                                    <span aria-hidden="true">>></span>
                                </a>
                            <?php endif; ?>

                            <li class="page-item margin">
                                <a class="page-link diminuir" aria-label="Next">
                                    <span>Total de inscrições</span> (
                                    <?php echo $qtd_linhas['id_qtd'] ?>
                                    )
                                </a>
                            </li>

                            </li>
                </ul>
            </nav>
        </div>


        <div class="color mt-2 mb-5">
            <section class="intro">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <?php if (isset($_SESSION['deletado'])) {
                                        unset($_SESSION['deletado'])
                                    ?>
                                        <div class="alert alert-success" role="alert">
                                            Usuário deletado com sucesso!
                                        </div>

                                    <?php } ?>

                                    <div class="table-responsive">
                                        <div class="main ">
                                            <div class="view">
                                                <table class="table table-light table-hover">
                                                    <thead>
                                                        <th>#</th>
                                                        <th>Coro</th>
                                                        <th class="mobile">Orgão que Pertence</th>
                                                        <th class="mobile">Endereço do Coro</th>
                                                        <th class="mobile">Cidade</th>
                                                        <th class="mobile">Estado</th>
                                                        <th>Imprimir</th>
                                                        <th>Detalhes</th>
                                                        <th>Editar</th>
                                                        <th>Excluir</th>
                                                    </thead>

                                                    <?php
                                                    if (!isset($_GET['busca'])) {
                                                        while ($dados = mysqli_fetch_assoc($sql)) { ?>
                                                            <tbody>
                                                                <tr>
                                                                    <td><?php echo $dados['id'] ?></td>
                                                                    <td><?php echo ucfirst($dados['coro']) ?></td>
                                                                    <td class="mobile"><?php echo ucfirst($dados['orgao_pertence']) ?></td>
                                                                    <td class="mobile"><?php echo ucfirst($dados['endereco_coro']) ?></td>
                                                                    <td class="mobile"><?php echo ucfirst($dados['cidade']) ?></td>
                                                                    <td class="mobile"><?php echo ucfirst($dados['estado']) ?></td>
                                                                    <td><a href="./controllers/imprimir.php?id=<?php echo $dados['id'] ?>"><i class="fa-solid fa-print"></i></a></td>
                                                                    <td><a class="vejamais" href="detalhes.php?id=<?php echo $dados['id'] ?>">Ver mais</a></td>
                                                                    <td><a href="./controllers/editar.php?id=<?php echo $dados['id'] ?>"><i class="fa-solid fa-pen"></i></a></td>
                                                                    <td><a href="./controllers/excluir.php?id=<?php echo $dados['id'] ?>"><i class="fa-sharp fa-solid fa-xmark"></i></a></td>
                                                                </tr>
                                                            </tbody>
                                                        <?php }
                                                    } else {
                                                        // Filtro de pesquisa
                                                        $pesquisa = $_GET['busca'];
                                                        $sql_busca = "SELECT * FROM 
                                                        inscricao WHERE id LIKE '%$pesquisa%'
                                                        OR coro LIKE '%$pesquisa%' 
                                                        OR orgao_pertence LIKE '%$pesquisa%' 
                                                        OR endereco_coro LIKE '%$pesquisa%' 
                                                        OR cidade LIKE '%$pesquisa%' 
                                                        OR estado LIKE '%$pesquisa%' 
                                                        OR pais LIKE '%$pesquisa%' 
                                                        OR maestro LIKE '%$pesquisa%' ORDER BY id DESC";
                                                        $query = $conexao->query($sql_busca) or die($conexao->error);
                                                        // Filtro de pesquisa

                                                        if ($query->num_rows == 0) { ?>
                                                            <div class="alert alert-danger" role="alert">
                                                                Nenhum resultado encontrado!
                                                            </div>
                                                            <?php
                                                        } else {
                                                            while ($dados = mysqli_fetch_assoc($query)) {    ?>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><?php echo $dados['id'] ?></td>
                                                                        <td><?php echo ucfirst($dados['coro']) ?></td>
                                                                        <td class="mobile"><?php echo ucfirst($dados['orgao_pertence']) ?></td>
                                                                        <td class="mobile"><?php echo ucfirst($dados['endereco_coro']) ?></td>
                                                                        <td class="mobile"><?php echo ucfirst($dados['cidade']) ?></td>
                                                                        <td class="mobile"><?php echo ucfirst($dados['estado']) ?></td>
                                                                        <td class="mobile"><?php echo ucfirst($dados['pais']) ?></td>
                                                                        <td class="mobile"><?php echo ucfirst($dados['maestro']) ?></td>
                                                                        <td class="mobile"><?php echo $dados['telefone'] ?></td>
                                                                        <td><a href="?"><i class="fa-solid fa-print"></i></a></td>
                                                                        <td><a class="vejamais" href="detalhes.php?id=<?php echo $dados['id'] ?>">Ver mais</a></td>
                                                                        <td><a href="./controllers/editar.php?id=<?php echo $dados['id'] ?>"><i class="fa-solid fa-pen"></i></a></td>
                                                                        <td><a href="./controllers/excluir.php?id=<?php echo $dados['id'] ?>"><i class="fa-sharp fa-solid fa-xmark"></i></a></td>
                                                                    </tr>
                                                        <?php }
                                                        }
                                                    } ?>
                                                                </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>