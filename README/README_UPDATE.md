# CRUD - Criar utilizadores

## User Story #1
Na pasta `templates/backoffice` crie um ficheiro chamado `page_user_update.php`.

---

## User Story #2
Validamos se a chave `id` existe dentro da super global $_GET, ou seja, dentro da querystring na url do nosso navegador.

Ex: ?route=user_update&area=admin&`id=1`

Bem no topo do ficheiro `page_user_update.php`, digite o seguinte bloco de código de PHP.

<details>
    <summary>Ver solução</summary>

<span style="color: #ef5350; font-size: 0.9rem">*Digite o código abaixo linha a linha para praticar*</span>

Solução

```php
<?php

if (empty($_GET['id']) && !is_int($_GET['id'])) {
    // Disparamos a mensagem abaixo.
    set_flash_message('Identificação inválida, tente novamente');
    // Redirecionamentos para a rota 'user_read' 
    url_redirect(['route' => 'user_read']);
}

```
</details>

---

## User Story #3
Validamos e testamos se as chaves da super global `$_POST`.

1. Se **NÃO** estiverem vazias, `atualiza` o utilizador com os dados formulário.
1. Se estiverem vazias, `mostra` o utilizador dentro do formulário.

<details>
    <summary>Ver solução</summary>

<span style="color: #ef5350; font-size: 0.9rem">*Digite o código abaixo linha a linha para praticar*</span>

Solução

```php
/**
 * Na condição abaixo testamos se as chaves 
 * da super global $_POST NÃO estão vazias
 */
if (
    !empty($_POST['name'])  || // OU
    !empty($_POST['login']) || // OU
    !empty($_POST['password'])
) {
    // declaração
    $query = 'UPDATE users SET name = ?, login = ?, password = ? WHERE id = ?';
    // preparação 
    $sql = $pdo->prepare($query);
    // execução
    if ($sql->execute([
        $_POST['name'],
        $_POST['login'],
        $_POST['password'],
        $_GET['id']
    ])) {
        $message = "Registo atualizado com sucesso";
    } else {
        $message = "Não foi atualizar o registo, tente novamente";
    }
        
    // Disparamos uma mensagem com o valor que está dentro da variável $message.
    set_flash_message($message);
    // Redirecionamentos para a rota 'user_create' 
    url_redirect(['route' => 'user_update']);
} else {
    // declaração
    $query = 'SELECT * FROM users WHERE id = ?';
    // preparação 
    $sql = $pdo->prepare($query);
    // execução
    if ($sql->execute([$_GET['id']])) {
        $user = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        $user = [];
    }
}

?>

```
</details>

---


## User Story #4
Dentro do ficheiro `page_user_update.php`, bem no final, crie a seguinte estrutura HTML

<details>
    <summary>Ver solução</summary>

<span style="color: #ef5350; font-size: 0.9rem">*Digite o código abaixo linha a linha para praticar*</span>

Solução

```html
<div class="page">
    <form class="form" method="POST" action="<?php echo url_generate(['route' => 'user_update']); ?>">
        <h1>Atualizar utilizador</h1>
        <div class="horizontal-line"></div>
        <div class="form-group flex flex-col">
            <label for="name">Nome</label>
            <input type="text" name="name" value="<?php echo $user['name']; ?>">
        </div>
        <div class="form-group">
            <label for="name">Login</label>
            <input type="text" name="login" value="<?php echo $user['login']; ?>">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" value="<?php echo $user['password']; ?>">
        </div>
        <div class="form-group">
            <button>Guardar</button>
        </div>
    </form>
</div>
```
</details>