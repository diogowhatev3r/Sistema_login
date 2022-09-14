<?php

$query = 'SELECT * FROM users';
$sql = $pdo->prepare($query);

if ($sql->execute()) {
    $users = $sql->fetchAll(PDO::FETCH_ASSOC);
} else {
    $users = [];
}
?>

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