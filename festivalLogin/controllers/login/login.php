<?php
session_start();
include_once('../conexao.php');


if (isset($_POST['submit']) && !empty($_POST['user']) && !empty($_POST['password'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM adminlogin WHERE usuario = '$user' AND senha = '$password'";

    $resultado = $conexao->query($sql);

    if ($resultado->num_rows < 1) {
        // var_dump($resultado);
        $_SESSION['error'] = "Usuário ou senha incorretos!";
        unset($_SESSION['user']);
        unset($_SESSION['password']);
        header("Location:  ../../index.php");
    } else {
        // var_dump($resultado);
        $_SESSION['user'] = $user;
        $_SESSION['password'] = $password;
        header("Location: ../../sistema.php");
    }
} else {
    header("Location: ../../index.php");
}
