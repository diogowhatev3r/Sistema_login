Minha Primeira Aplicação/Sistema PHP - Base de dados

## User Story #1
Dentro do ficheiro `config.php` crie as constantes abaixo.

| NOME DA CONSTANTE | VALOR DA CONSTANTE |
|-------------------|--------------------|
| DB_HOST           | 127.0.0.1          |
| DB_NAME           | codemaster         |
| DB_USER           | USER_DB_HERE       |
| DB_PASS           | PASS_DB_HERE       |
| DB_PORT           | 3306               |

<details>
    <summary>Ver Estrutura</summary>

<span style="color: #ef5350; font-size: 0.9rem">*Digite o código abaixo linha a linha para praticar*</span>

Estrutura
```php
// Define o endereço da nossa página web.
define('PAGE_URL', 'http://localhost/pasta-do-trabalho');

// Define as configurações da base de dados.
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'codemaster');
define('DB_USER', 'USER_DB_HERE');
define('DB_PASS', 'PASS_DB_HERE');
define('DB_PORT', '3306');
```
</details>

---

## User Story #2
Identifique o seguinte trecho de código no ficheiro `index.php`.

```php
require_once 'functions/auth.php';

// Escreva o novo código aqui nesta linha.

if (empty($_GET['route'])) {
    $page = 'login';
} else {
    $page = $_GET['route'];
}
```

Escreva o código abaixo no local indicado.

```php
/**
 * A palavra DSN significa "Data Source Name", que contém toda 
 * a informação necessária para o PHP fazer uma conexão a base de dados.
 * 
 * O que as constantes abaixo significam?
 * 
 * DB_HOST - O endereço/IP de ligação a base de dados.
 * DB_NAME - Nome da base de dados
 * DB_USER - O utilizador de ligação a base de dados.
 * DB_PASS - A senha de ligação a base de dados.
 * DB_PORT - Porta de ligação a base de dados.
 * 
 * Iremos concatenar a string abaixo com os valores das
 * constantes definidas no ficheiro config.php e atribuir
 * o resultado da concatenação dentro da variável $dsn.
 */
$dsn = 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';port='.DB_PORT;

/**
 * Abaixo criamos uma instância da classe PDO
 * para fazermos uma ligação a base de dados.
 * 
 * Lembrem-se das nossas aulas de programação orientada a objeto.
 * 
 * O PHP faz todo o trabalho duro por nós, temos apenas
 * que saber utilizar os recursos disponíveis. 
 * 
 * PDO significa "PHP Data Object", e é através deste recurso que iremos
 * enviar comandos SQL a nossa base de dados.
 */
$pdo = new PDO($dsn, DB_USER, DB_PASS);
```
---

## User Story #3
Identifique o seguinte trecho de código no ficheiro `controllers/authenticate.php`.

```php
$login = $_POST['username'];
$password = $_POST['password'];

// Escreva o novo código aqui nesta linha.

if ($login == USER_LOGIN && $password == USER_PASSWORD) {
```

Escreva o código abaixo no local indicado.

```php
/**
 * $querySQL é nome da variável que irá conter o código da nossa consulta SQL.
 *
 * Em vez de passarmos diretamente as variáveis como é mostrado no exemplo abaixo:
 *
 * 'SELECT login, password FROM users WHERE login = '.$login.' AND password = '.$password.'
 *
 * Nós criamos interrogações que irão servir de ligação (bind) para as variáveis
 * que iremos passar posteriomente.
 *
 * O uso do bind é basicamente para acrescenta uma camada de segurança
 * a mais na hora da consulta, limitando ou excluindo as chances de SQL injections.
 *
 * https://www.one.com/pt/seguranca-site/o-que-e-sql-injection
 */
$query = 'SELECT name FROM users WHERE login = ? AND password = ?';

/**
 * Agora iremos chamar a função "db_query" que irá retornar a nossa
 * consulta à base de dados de acordo com o código SQL que foi passado
 * no segundo argumento da função.

 * Agora reparem no terceiro argumento desta função, que é um array de índice, e que cada uma destas
 * posições representam uma interrogação.
 *
 * posição 0, primeira ? - $login
 * posição 1, segunda  ? - $password
 *
 * Estamos a dizer que:
 * 1. O valor da variável $login é igual a "login = ?"
 * 2. O valor da variável $password é igual a "password = ?"
 */

/* Pedimos para o PDO preparar a nossa query/comando SQL */
$sql = $pdo->prepare($query);

/**
 * Depois de preparada, a query/commando é enviada/executada
 * na nossa base de dados.
 */
if ($sql->execute([$login, $password])) {
   /**
    * se SUCESSO, retorna um array associativo sendo que a 'chave' do
    * array assotivo é o "nome da coluna" em base dados e o 'valor'
    * do array associativo é o "valor da coluna" em base de dados.
    */
    $user = $sql->fetch(PDO::FETCH_ASSOC);
} else {
    /**
     * se INSUCESSO, atribui um array vazio.
     */
    $user = [];
}
```

---

## User Story #4
Identifique o seguinte trecho de código no ficheiro `controllers/authenticate.php`.

```php
if ($login == USER_LOGIN && $password == USER_PASSWORD) {
    /* Criamos uma chave chamda 'is_authenticated' na super global $_SESSION e guardamos um valor boleano (true) */
    $_SESSION['is_authenticated'] = true;
```

Substitua pelo código abaixo.

```php
/**
 * Na condição abaixo testamos se a variável $user "NÃO" está vazia, 
 * veja a exclamação antes da função empty.
 * 
 * se VERDADEIRO, então criamos uma chave chamada 'is_authenticated' dentro da super global
 * $_SESSION e guardamos um valor boleano (true).
 *
 * Logo a seguir, redirecionamos o utilizador para a página dashboard.
 */
if (!empty($user)) {
    /* Criamos uma chave chamda 'is_authenticated' na super global $_SESSION e guardamos um valor boleano (true) */
    $_SESSION['is_authenticated'] = true;

    // Grava as informações do utilizador dentro da chave 'user' na super global $_SESSION.
    $_SESSION['user'] = $user;
```

---

## User Story #5
Identifique o seguinte trecho de código no ficheiro `functions/url.php`.

```php
header('Location: http://localhost:8080/?' . $buildQueryString);
```

Substitua pelo código abaixo.

```php
header('Location: '.PAGE_URL.'?' . $buildQueryString);
```