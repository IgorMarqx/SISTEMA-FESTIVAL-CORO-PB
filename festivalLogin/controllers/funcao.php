<?php
function validacao()
{
    include('./conexao.php');
    session_start();


    $_SESSION['msg'] = false;
    $_SESSION['success'] = false;
    if (isset($_POST['confirmar'])) {

        $id = $_POST['id'];
        
        $coro = $_POST['coro'];
        $orgao_pertence = $_POST['orgao_pertence'];
        $endereco_coro = $_POST['endereco_coro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $pais = $_POST['pais'];
        $maestro = $_POST['maestro'];
        $fone_maestro = $_POST['fone_maestro'];
        $email_maestro = $_POST['email_maestro'];
        $coordenador = $_POST['coordenador'];
        $fone_coord = $_POST['fone_coord'];
        $email_coord = $_POST['email_coord'];
        $coro_txt = $_POST['coro_txt'];
        $maestro_txt = $_POST['maestro_txt'];
        
        // Primarios
        if (empty($coro)) {
            $_SESSION['msg'] = "Preencha o campo coro";
        } else if (empty($orgao_pertence)) {
            $_SESSION['msg'] = "Preencha o campo Orgão";
        } else if (empty($endereco_coro)) {
            $_SESSION['msg'] = "Preencha o campo Endereço";
        } else if (empty($cidade)) {
            $_SESSION['msg'] = "Preencha o campo Cidade";
        } else if (empty($estado)) {
            $_SESSION['msg'] = "Preencha o campo Estado";
        } else if (empty($pais)) {
            $_SESSION['msg'] = "Preencha o campo Pais";
        }
        // Primarios
        
        // Maestro
        else if (empty($maestro)) {
            $_SESSION['msg'] = "Preencha o campo Maestro";
        } else if (empty($fone_maestro)) {
            $_SESSION['msg'] = "Preencha o campo Telefone do Maestro";
        } else if (!filter_var($email_maestro, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['msg'] = "Preencha o campo Email do Maestro";
        }
        // Maestro
        
        // Coordenador
        else if (empty($coordenador)) {
            $_SESSION['msg'] = "Preencha o campo Coordenador";
        } else if (empty($fone_coord)) {
            $_SESSION['msg'] = "Preencha o campo Telefone do Coordenador";
        } else if (!filter_var($email_coord, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['msg'] = "Preencha o campo Email do Coordenador";
        }
        // Coordenador
        
        else if (empty($coro_txt)) {
            $_SESSION['msg'] = "Preencha o campo Historico do coro";
        } else if (empty($maestro_txt)) {
            $_SESSION['msg'] = "Preencha o campo Historico do maestro";
        } else {
            $sql = ("UPDATE  inscricao SET coro='$coro', orgao_pertence='$orgao_pertence', endereco_coro='$endereco_coro', cidade='$cidade', estado='$estado', pais='$pais', maestro='$maestro', telefone='$fone_maestro', email='$email_maestro', coordenador='$coordenador', telefone_coordenador='$fone_coord', email_coordenador='$email_coord', historico_coro='$coro_txt', historico_maestro='$maestro_txt' WHERE id = $id");
            $conexao->query($sql);
            $_SESSION['success'] = "Candidato Alterado com sucesso";
        }

    }
}
