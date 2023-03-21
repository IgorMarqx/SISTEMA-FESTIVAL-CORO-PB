<?php
session_start();

include('./conexao.php');
include('./funcoes.php');


validacoes();

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
    <link rel="stylesheet" href="./assets/responsivo.css">
    <link rel="shortcut icon" href="./assets/imgs/logo.jpeg" type="icon">
    <title>Ficha de inscrição</title>
</head>

<body>
    <div class="header">
        <img src="./assets/imgs/company-yellow.jpg" alt="" srcset="">
        <h1>FEPAC</h1>
    </div>

    <div class="container">
        <form action="" method="post">
            <?php if ($_SESSION['msg']) : ?>
                <div class="alert alert-danger mt-2" role="alert">
                    <?php echo $_SESSION['msg'] ?>
                </div>
            <?php endif; ?>

            <?php if ($_SESSION['success']) :
                ?>
                <div class="alert alert-success mt-2" role="alert">
                    <?php echo $_SESSION['success']; ?>
                </div>
            <?php endif; ?>
            <div class="form mt-2">
                <form class="row">
                    <div class="principal row">


                        <div class="primarios row">
                            <div class="cabeca mt-4 mb-5">
                                <h2>FICHA DE INSCRIÇÂO 21° FEPAC 2023</h2>
                            </div>

                            <div class="col-md-6">
                                <label for="coro" class="form-label">CORO <span style="color: red;"> *</span></label>
                                <input value="<?php if (isset($_POST['coro'])) echo $_POST['coro']; ?>" name="coro" placeholder="ex: coral clarear" type="text" class="form-control" id="coro">
                            </div>


                            <div class="col-md-6">
                                <label for="orgao" class="form-label">ÓRGÃO QUE PERTENCE <span style="color: red;"> *</span></label>
                                <input value="<?php if (isset($_POST['orgao_pertence'])) echo $_POST['orgao_pertence']; ?>" name="orgao_pertence" placeholder="ex: coro da unipê" type="text" class="form-control" id="orgao">
                            </div>

                            <div class="col-md-6">
                                <label for="endereco" class="form-label">ENDEREÇO DO CORO <span style="color: red;"> *</span></label>
                                <input value="<?php if (isset($_POST['endereco_coro'])) echo $_POST['endereco_coro']; ?>" name="endereco_coro" placeholder="ex: Rua Peregrino de Carvalho" type="text" class="form-control" id="endereco">
                            </div>

                            <div class="col-md-6">
                                <label for="cidade" class="form-label">CIDADE <span style="color: red;"> *</span></label>
                                <input value="<?php if (isset($_POST['cidade'])) echo $_POST['cidade']; ?>" name="cidade" id="cidade" placeholder="ex: João Pessoa" type="text" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label for="estado" class="form-label">ESTADO <span style="color: red;"> *</span></label>
                                <input value="<?php if (isset($_POST['estado'])) echo $_POST['estado']; ?>" name="estado" placeholder="ex: Paraiba ou (PB)" type="text" class="form-control" id="estado">
                            </div>

                            <div class="col-md-6">
                                <label for="pais" class="form-label">PAIS <span style="color: red;"> *</span></label>
                                <input value="<?php if (isset($_POST['pais'])) echo $_POST['pais']; ?>" name="pais" placeholder="ex: Brasil" type="text" class="form-control" id="pais">
                            </div>
                        </div>


                        <div class="maestro row">
                            <div class="container title">
                                <span class="nick">Maestro</span>
                            </div>
                            <div class="col-md-4">
                                <label for="maestro" class="form-label">MAESTRO (A) <span style="color: red;"> *</span></label>
                                <input value="<?php if (isset($_POST['maestro'])) echo $_POST['maestro']; ?>" placeholder="ex: Maestro Lucas" name="maestro" type="text" class="form-control" id="maestro">
                            </div>
                            <div class="col-md-2">
                                <label for="telefone" class="form-label">FONE/WHATSAPP <span style="color: red;"> *</span></label>
                                <input value="<?php if (isset($_POST['fone_maestro'])) echo $_POST['fone_maestro']; ?>" name="fone_maestro" placeholder="(00) 00000-0000" type="text" class="form-control" id="telefone">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">E-MAIL <span style="color: red;"> *</span></label>
                                <input value="<?php if (isset($_POST['email_maestro'])) echo $_POST['email_maestro']; ?>" name="email_maestro" placeholder="exemplo@gmail.com" type="text" class="form-control" id="email">
                            </div>
                        </div>

                        <div class="maestro row">
                            <div class="container title">
                                <span class="nick">Coordenador</span>
                            </div>
                            <div class="col-md-4">
                                <label for="coordenador" class="form-label">COORDENADOR(A) <span style="color: red;"> *</span></label>
                                <input value="<?php if (isset($_POST['coordenador'])) echo $_POST['coordenador']; ?>" placeholder="ex: João" name="coordenador" type="text" class="form-control" id="coordenador">
                            </div>
                            <div class="col-md-2">
                                <label for="telefone_cord" class="form-label">FONE/WHATSAPP <span style="color: red;"> *</span></label>
                                <input value="<?php if (isset($_POST['fone_coord'])) echo $_POST['fone_coord']; ?>" name="fone_coord" placeholder="(00) 00000-0000" type="text" class="form-control" id="telefone_cord">
                            </div>
                            <div class="col-md-6">
                                <label for="email_cord" class="form-label">E-MAIL <span style="color: red;"> *</span></label>
                                <input value="<?php if (isset($_POST['email_coord'])) echo $_POST['email_coord']; ?>" name="email_coord" placeholder="exemplo@gmail.com" type="text" class="form-control" id="email_cord">
                            </div>

                        </div>
                        <div class="historicos row mt-2 ">
                            <div class="col-md-6">
                                <label for="coro_text" class="form-label">HISTÓRICO DO CORO <span style="color: red;"> *</span></label>
                                <textarea name="coro_txt" class="form-control" id="coro_text" rows="3"> <?php if (isset($_POST['coro_txt'])) echo $_POST['coro_txt']; ?></textarea>
                            </div>

                            <div class="col-lg-6 mb-2">
                                <label for="maestro_text" class="form-label">HISTÓRICO DO MAESTRO (A) <span style="color: red;"> *</span></label>
                                <textarea name="maestro_txt" class="form-control" id="maestro_text" rows="3"><?php if (isset($_POST['maestro_txt'])) echo $_POST['maestro_txt']; ?></textarea>
                            </div>
                        </div>

                        <div class="atencao mb-2">
                            <span>Atenção, todos os campos marcados com o (*) são obrigatórios!</span>
                        </div>

                        <div class="buttonSubmit mb-5">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Enviar</button>
                        </div>

                        <!-- Button trigger modal -->

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: red;">Atenção</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" style="color: red;">
                                        OBS: 01- Para finalizar encaminhar foto e link do coro para o e-mail festivalparaibanodecoros@outlook.com
                                    </div>
                                    <div class="modal-body" style="color: red;">
                                        OBS: 02- As quatros peças que serão executadas durante apresentação oficial do coro só devem ser encaminhadas após a confirmação de participação do coro de acordo com o regulamento.
                                    </div>
                                    <div class="modal-body" style="color: red;">
                                        OBS: 03- Todas as informações necessárias estão contidas no Regulamento no 21º Fepac 2023 à disposição neste site. Outras informações através do WhatsApp 83-99382-7772
                                    </div>
                                    <div class="modal-footer">
                                        <input name="confirmar" type="submit" class="btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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