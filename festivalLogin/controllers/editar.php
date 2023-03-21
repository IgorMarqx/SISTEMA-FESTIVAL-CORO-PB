<?php
include('./conexao.php');
include('./funcao.php');
$id =  intval($_GET['id']);

$sql = "SELECT * FROM inscricao WHERE id='$id'";
$resposta = $conexao->query($sql);
$linha = $resposta->fetch_object();

validacao();
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
    <link rel="stylesheet" href="../assets/systemAssets/sistema.css">
    <link rel="stylesheet" href="../assets/systemAssets/detalhes.css">
    <link rel="stylesheet" href="../assets/systemAssets/edicao.css">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="../imgs/logo.jpeg" type="icon">
    <title>Candidato - <?php echo $linha->coro ?></title>
</head>

<body>
    <header>
        <div class="containe text-center">
            <div class="container-child ">
                <div class="logo">
                    <img width="230px" src="../imgs/company-yellow.jpg" alt="">
                    <h1>FESTIVAL PARAIBANO DE COROS</h1>
                </div>
            </div>
        </div>
        <?php $linha->orgao_pertence ?>
        <div class="title mt-3">
            <div class="mid">
                <h1>Editar Informações</h1>
            </div>
        </div>

        <div class="container voltar mt-4">
            <a href="../sistema.php" class="btn btn-outline-warning"><img src="../imgs/arrow-return-left.svg" alt=""></a>
        </div>

        <div class="container edicao mt-2">
            <form action="" method="POST">
                <div class="forms row">

                    <?php if ($_SESSION['msg']) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $_SESSION['msg'] ?>
                        </div>
                    <?php } ?>

                    <?php if ($_SESSION['success']) { ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $_SESSION['success'] ?>
                        </div>
                    <?php } ?>

                    <input name="id" type="hidden" value="<?php echo $linha->id ?>">

                    <div class="mb-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">CORO <span class="error"> *</span></label>
                        <input name="coro" type="text" class="form-control" placeholder="Username" value="<?php echo $linha->coro ?>">
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">ORGÃO QUE PERTENCE <span class="error"> *</span></label>
                        <input name="orgao_pertence" type="text" class="form-control" placeholder="Username" value="<?php echo $linha->orgao_pertence ?>">
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">ENDEREÇO <span class="error"> *</span></label>
                        <input name="endereco_coro" type="text" class="form-control" placeholder="Username" value="<?php echo $linha->endereco_coro ?>">
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">CIDADE <span class="error"> *</span></label>
                        <input name="cidade" type="text" class="form-control" placeholder="Username" value="<?php echo $linha->cidade ?>">
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">ESTADO <span class="error"> *</span></label>
                        <input name="estado" type="text" class="form-control" placeholder="Username" value="<?php echo $linha->estado ?>">
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="exampleFormControlInput1" class="form-label">PAIS <span class="error"> *</span></label>
                        <input name="pais" type="text" class="form-control" placeholder="Username" value="<?php echo $linha->pais ?>">
                    </div>
                </div>

                <div class="row forms maestro">
                    <div class="title-edit">
                        <h3>MAESTRO</h3>
                    </div>

                    <div class="mb-3 col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">MAESTRO(A) <span class="error"> *</span></label>
                        <input name="maestro" type="text" class="form-control" placeholder="Username" value="<?php echo $linha->maestro ?>">
                    </div>

                    <div class="mb-3 col-md-3">
                        <label for="exampleFormControlInput1" class="form-label">TELEFONE <span class="error"> *</span></label>
                        <input name="fone_maestro" id="telefone" type="text" class="form-control" placeholder="Username" value="<?php echo $linha->telefone ?>">
                    </div>

                    <div class="mb-3 col-md-5">
                        <label for="exampleFormControlInput1" class="form-label">E-MAIL <span class="error"> *</span></label>
                        <input name="email_maestro" t type="text" class="form-control" placeholder="Username" value="<?php echo $linha->email ?>">
                    </div>
                </div>

                <div class="row forms">
                    <div class="title-edit">
                        <h3>COORDENADOR</h3>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">COORDENADOR <span class="error"> *</span></label>
                        <input name="coordenador" type="text" class="form-control" placeholder="Username" value="<?php echo $linha->coordenador ?>">
                    </div>

                    <div class="mb-3 col-md-3">
                        <label for="exampleFormControlInput1" class="form-label">TELEFONE <span class="error"> *</span></label>
                        <input name="fone_coord" id="telefone_cord" type="text" class="form-control" placeholder="Username" value="<?php echo $linha->telefone_coordenador ?>">
                    </div>

                    <div class="mb-3 col-md-5">
                        <label for="exampleFormControlInput1" class="form-label">E-MAIL <span class="error"> *</span></label>
                        <input name="email_coord" type="text" class="form-control" placeholder="Username" value="<?php echo $linha->email_coordenador ?>">
                    </div>
                </div>

                <div class="row forms">
                    <div class="col-md-6">
                        <label for="coro_text" class="form-label">HISTÓRICO DO CORO <span style="color: red;"> *</span></label>
                        <textarea name="coro_txt" class="form-control" id="coro_text" rows="3"><?php echo $linha->historico_coro ?></textarea>
                    </div>

                    <div class="col-lg-6 mb-2">
                        <label for="maestro_text" class="form-label">HISTÓRICO DO MAESTRO (A) <span style="color: red;"> *</span></label>
                        <textarea name="maestro_txt" class="form-control" id="maestro_text" rows="3"><?php echo $linha->historico_maestro ?></textarea>
                    </div>
                </div>

                <div class="forms mt-4 button">
                    <input name="confirmar" type="submit" class="btn btn-warning" value="Alterar">
                </div>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            $('#telefone').mask('(00) 00000-0000');
            $('#telefone_cord').mask('(00) 00000-0000');
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>