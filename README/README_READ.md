# CRUD - Criar utilizadores

## User Story
Na pasta `templates/backoffice` crie um ficheiro chamado `page_user_read.php`.

## User Story
Dentro do ficheiro `page_user_read.php`, crie a seguinte estrutura HTML

```
div.page
  h1 Lista de utilizadores
  div.horizontal-line
  table.table
    tr
      th Id
      th Nome
      th Login
      th Criado
      th Atualizado
    tr
      td 1
      td Lucas Filipe
      td lucas
      td 13/09/2022
      td 13/09/2022
```
<details>
    <summary>Ver solução</summary>

<span style="color: #ef5350; font-size: 0.9rem">*Digite o código abaixo linha a linha para praticar*</span>

Solução

```html
<div class="page">
    <h1>Lista de utilizadores</h1>
    <div class="horizontal-line"></div>
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Login</th>
            <th>Criado</th>
            <th>Atualizado</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Lucas Filipe</td>
            <td>lucas</td>
            <td>13/09/2022</td>
            <td>13/09/2022</td>
        </tr>
    </table>
</div>
```

</details>

---

## User Story
No ficheiro `public/css/style.css` crie o seguinte código de estilo bem no final

```css
.table {
    width: 100%;
}

.table th,
.table td {
    text-align: left;
}
```

## User Story
Bem no topo do ficheiro `page_user_read.php` antes do código HTML, digite o seguinte código de bloco PHP.

```php
<?php

$query = 'SELECT * FROM users';
$sql = $pdo->prepare($query);

if ($sql->execute()) {
    $users = $sql->fetchAll(PDO::FETCH_ASSOC);
} else {
    $users = [];
}
?>
```
---

## User Story
No segundo bloco table row `(tr)` da nossa tabela, faça um loop `(foreach)` com os dados que foram retornados e preenchidos na variável `$users`

<details>
    <summary>Ver solução</summary>

<span style="color: #ef5350; font-size: 0.9rem">*Digite o código abaixo linha a linha para praticar*</span>

Solução

```html
<div class="page">
    <h1>Lista de utilizadores</h1>
    <div class="horizontal-line"></div>
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Login</th>
            <th>Criado</th>
            <th>Atualizado</th>
        </tr>
        <?php foreach ($users as $user) : ?>
        <tr>
            <td><?php echo $user['id'] ?></td>
            <td><?php echo $user['name'] ?></td>
            <td><?php echo $user['login'] ?></td>
            <td><?php echo $user['created_at'] ?></td>
            <td><?php echo $user['updated_at'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
```

</details>

---

## User Story
No ficheiro `templates/backoffice/head.php`, identifique a âncora `Sobre Nós` e mude o texto desta âncora para `Utilizadores`.

Nesta mesma âncora, mude o valor do atributo `href` por `<?php echo url_generate(['route' => 'user_read']); ?>`