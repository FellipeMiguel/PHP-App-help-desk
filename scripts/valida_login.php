<?php
$usuarios_autenticado = false;

$usuarios_app = array(
    array('email' => 'adm@teste.com', 'senha' => 'senha'),
    array('email' => 'user@teste.com', 'senha' => 'senha'),
);

foreach ($usuarios_app as $user) {
    if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
        $usuarios_autenticado = true;
    }
}

if ($usuarios_autenticado) {
    echo 'Usuário autenticado';
} else {
    header('Location: ../index.php?login=erro');
}
