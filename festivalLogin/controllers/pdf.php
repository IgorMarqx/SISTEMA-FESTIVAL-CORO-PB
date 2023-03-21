<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .fora {
            text-align: center;
        }

        .centro {
            text-align: center;
            margin: 1rem;
            border: 1px solid #E8E8E8;
        }

        th,
        td {
            width: 10.4rem;
            word-wrap: break-word;
        }

        .historico {
            width: 20.4rem;
            padding-right: 1rem;
            text-align: justify;
        }

        .email {
            word-break: break-all;
            width: 10.4rem;
        }

        .ende {
            width: 21rem;
        }

        .title {
            background-color: #E8E8E8;
        }

        .data {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 100%;
        }

        .unset {
            text-decoration: none;
            color: black;
            cursor: auto;
        }
    </style>
</head>

<?php
include('./conexao.php');

$id = intval($_GET['id']);

$sql = "SELECT * FROM inscricao WHERE id= '$id'";
$query = $conexao->query($sql);


if ($query->num_rows > 0) {
    while ($linha = $query->fetch_object()) {

?>
        <div style="text-align: center;">
            <img width="250px" src="http://www.festivalparaibanodecoros.com/images/company-yellow.jpg">
        </div>
        
        <div class="title mt-3" style="text-align: center;">
            <h1>FEPAC - Ficha de inscrição</h1>
        </div>
        
        <div class='container' style="display: flex;">
            <div class='container fora'>

                <div class='title mt-3 mb-3'>
                    <h2>Informações Principais</h2>
                </div>

                <div class="fora">
                    <table class="centro">
                        <thead>
                            <th>Coro</th>
                            <th>Orgão</th>
                            <th>Estado</th>
                            <th>Pais</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo ucfirst($linha->coro) ?></td>
                                <td><?php echo ucfirst($linha->orgao_pertence) ?></td>
                                <td><?php echo ucfirst($linha->estado) ?></td>
                                <td><?php echo ucfirst($linha->pais) ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="centro">
                        <thead>
                            <th class="ende">Endereço</th>
                            <th class="ende">Cidade</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ende"><?php echo ucfirst($linha->endereco_coro) ?></td>
                                <td class="ende"><?php echo ucfirst($linha->cidade) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <div class='title mt-3 mb-3'>
                    <h2>Maestro e Coordenador</h2>
                </div>


                <div class="fora">
                    <table class="centro">
                        <thead>
                            <th class="email">Maestro</th>
                            <th class="email">Telefone do Maestro</th>
                            <th class="email">Coordenador</th>
                            <th class="email">Telefone do Coordenador</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="email"><?php echo ucfirst($linha->maestro) ?></td>
                                <td class="email"><?php echo ucfirst($linha->telefone) ?></td>
                                <td class="email"><?php echo ucfirst($linha->coordenador) ?></td>
                                <td class="email"><?php echo ucfirst($linha->telefone_coordenador) ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="centro">
                        <thead>
                            <th class="ende">Email do Maestro</th>
                            <th class="ende">Email do Coordenador</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ende"><?php echo ucfirst($linha->email) ?></td>
                                <td class="ende"><?php echo ucfirst($linha->email_coordenador) ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class='title mt-3 mb-3'>
                        <h2>Historicos</h2>
                    </div>

                    <table class="centro">
                        <thead>
                            <th>Historico do Coro</th>
                            <th>Historico do Maestro</th>
                        </thead>

                        <tbody>
                            <tr>
                                <td class="historico"><?php echo ucfirst($linha->historico_coro) ?></td>
                                <td class="historico"><?php echo ucfirst($linha->historico_maestro) ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class='estado data mt-3 mb-3'>
                        <h3>Data inserida</h3>
                        <p><?php echo date('d/m/Y H:i', strtotime($linha->data_insercao)) ?></p>
                    </div>
                </div>
            </div>

    <?php
    }
} else {
    header('Location: sistema.php');
}
    ?>