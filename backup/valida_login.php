<?php
session_start();

$usuarios_autenticado = false;
$usuario_id = null;
$usuario_perfil_id = null;

$perfis = array(1 => 'adm', 2 => 'user');

$usuarios_app = array(
    array('id' => '1', 'email' => 'adm@teste.com', 'senha' => '1234', 'perfil_id' => 1),
    array('id' => '2', 'email' => 'user@teste.com', 'senha' => '1234', 'perfil_id' => 1),
    array('id' => '3', 'email' => 'jose@teste.com', 'senha' => '1234', 'perfil_id' => 2),
    array('id' => '4', 'email' => 'maria@teste.com', 'senha' => '1234', 'perfil_id' => 2),
);

foreach ($usuarios_app as $user) {
    if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
        $usuarios_autenticado = true;
        $usuario_id = $user['id'];
        $usuario_perfil_id = $user['perfil_id'];
    }
}

if ($usuarios_autenticado) {
    $_SESSION['autenticado'] = 'SIM';
    $_SESSION['id'] = $usuario_id;
    $_SESSION['perfil_id'] = $usuario_perfil_id;
    header('Location: ../pages/home.php');
} else {
    $_SESSION['autenticado'] = 'NAO';
    header('Location: ../index.php?login=erro');
}
