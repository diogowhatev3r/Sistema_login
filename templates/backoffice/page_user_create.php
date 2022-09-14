<div class="page">
    <form class="form" method="POST" action="<?php echo url_generate(['route' => 'user_create']); ?>">
        <h1>Criar utilizadores</h1>
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name">
        </div>
        <div class="form-group">
            <label for="name">Login</label>
            <input type="text" name="login">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>
        <div class="form-group">
            <button>Login</button>
        </div>
    </form>
</div>


<?php

/**
 * Na condição abaixo testamos se as chaves 
 * da super global $_POST NÃO estão vazias
 */
if (
    !empty($_POST['name'])  && // OU
    !empty($_POST['login']) && // OU
    !empty($_POST['password'])
) {
    // declaração
    $query = 'INSERT INTO users (name, login, password) VALUES (?, ?, ?)';
    // preparação 
    $sql = $pdo->prepare($query);
    // execução
    if ($sql->execute([
        $_POST['name'],
        $_POST['login'],
        $_POST['password']
    ])) {
        $message = "Registo criado com sucesso";
    } else {
        $message = "Não foi possível criar o registo, tente novamente";
    }
        
    // Disparamos uma mensagem com o valor que está dentro da variável $message.
    set_flash_message($message);
    // Redirecionamentos para a rota 'user_create' 
    url_redirect(['route' => 'user_create']);
}



/*
Testamos se alguem executou o método POST, com os vectores name, login e password

Mas quem executou o método POST?

O formulário que está dentro do ficheiro templates/backoffice/page_user_create.php

Onde?

No botão que tem o valor Login

Bem me parecia 

Obriagdo pela ajuda

:D

*/



