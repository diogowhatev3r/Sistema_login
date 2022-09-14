<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo PAGE_TITLE; ?></title>
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <header>
        <div class="page">
            <nav class="menu flex flex-justify-space-between">
                <ul>
                    <li>
                        <a href="<?php echo url_generate(['route' => 'home']); ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo url_generate(['route' => 'user_read']); ?>">Utilizadores</a>
                    </li>
                    <li>
                        <a href="<?php echo url_generate(['route' => 'contact']); ?>">Contacto</a>
                    </li>
                </ul>
                <ul>
                <?php if (is_authenticated()) : ?>
                    <!-- Este "li" só será exibido caso eu tenha me autenticado -->
                    <li>
                        <a href="?route=dashboard">Dashboard</a>
                    </li>
                <?php endif; ?>
                    <li>
                <?php if (is_authenticated()) : ?>
                        <!-- Este hyperlink só será exibido caso eu tenha me autenticado -->
                        <a class="user-login-button" href="<?php echo url_generate(['route' => 'logout']); ?>">Fazer Logout</a>
                <?php else : ?>
                        <!-- Este hyperlink só será exibido caso eu não tenha me autenticado -->
                        <a class="user-login-button" href="<?php echo url_generate(['route' => 'login']); ?>">Fazer Login</a>
                <?php endif; ?>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <?php if (get_flash_message()) : ?>
        <div class="page">
            <div class="flash-messages">
                <p><?php echo get_flash_message(); ?></p>
            </div>
        </div>
    <?php endif; ?>