Minha Primeira Aplicação/Sistema PHP - Base de dados

## User Story #1
Abra o `DBEaver` e crie uma base de dados chamada `codemaster`.
A seguir, crie uma tabela chamada `users` com as seguintes características.

| COLUNA       | TIPO         | RESTRIÇÃO                  |
|--------------|--------------|----------------------------|
| id           | int          | AUTOINCREMENT PRIMARY KEY  |
| name         | varchar(65)  | NOT NULL                   |
| login        | varchar(65)  | NOT NULL                   |
| password     | varchar(65)  | NOT NULL                   |
| created_at   | DATETIME     | CURRENT_TIMESTAMP()        |
| updated_at   | DATETIME     | CURRENT_TIMESTAMP()        |

<details>
    <summary>Ver Estrutura</summary>

<span style="color: #ef5350; font-size: 0.9rem">*Digite o código abaixo linha a linha para praticar*</span>

Estrutura
```sql
CREATE TABLE IF NOT EXISTS users (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(65) NOT NULL,
	login VARCHAR(65) NOT NULL,
	password VARCHAR(65) NOT NULL,
	created_at DATETIME DEFAULT CURRENT_TIMESTAMP(),
	updated_at DATETIME DEFAULT CURRENT_TIMESTAMP()
)
```
</details>

# User Story #2
Insira 2 ou mais `registos` na tabela `users`.

*Sugestão de registos:*
| name          | login | password   |
|---------------|-------|------------|
| Maria Freitas | maria | 12345      |
| João Teixeira | joao  | 54321      |

<details>
    <summary>Ver Estrutura</summary>

<span style="color: #ef5350; font-size: 0.9rem">*Digite o código abaixo linha a linha para praticar*</span>

Estrutura
```sql
INSERT INTO users (name, login, password) VALUES ('Maria Freitas', 'maria', '12345');
INSERT INTO users (name, login, password) VALUES ('João Teixeira', 'joao', '54321');
```

</details>

---