<?php

if (empty($_POST['username']) || empty($_POST['password'])) {

    set_flash_message("Todos os campos são de preenchimento obrigatório!");
    url_redirect(['route' => 'login']);
}

$login = $_POST['username'];
$password = $_POST['password'];



$query = 'SELECT name FROM users WHERE login = ? AND password = ?';

$sql = $pdo->prepare($query);


if ($sql->execute([$login, $password])) {
    $user = $sql->fetch(PDO::FETCH_ASSOC);
} else {
    $user = [];
}



if (!empty($user)) {

    $_SESSION['is_authenticated'] = true;

    set_flash_message("Usuário autenticado com sucesso!");
    url_redirect (['route' => 'dashboard']);
} else {
    
        set_flash_message("Usuário ou senha inválidos!");
        url_redirect(['route' => 'login']);
    }   

/*Codigo do README 8*/