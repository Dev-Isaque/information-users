## Tutorial: Configuração do Arquivo conn.php

O arquivo `conn.php` é usado para estabelecer uma conexão com um banco de dados MySQL em aplicativos PHP. Aqui está um resumo rápido sobre como configurar este arquivo:

1. Abra o arquivo `conn.php` em um editor de texto.
2. Defina o nome do servidor na variável `$servername`.
3. Defina o nome de usuário na variável `$username`.
4. Defina a senha na variável `$password`.
5. Defina o nome do banco de dados na variável `$dbname`.
6. Salve as alterações no arquivo.
7. Utilize o arquivo `conn.php` em seus aplicativos PHP para estabelecer a conexão com o banco de dados.

Certifique-se de que todas as informações de conexão estejam corretas para evitar erros ao conectar-se ao banco de dados MySQL.

## Como Criar a Tabela de Usuários e Informações do Usuário

Para começar a utilizar nosso sistema, você precisa criar as tabelas de usuários e informações do usuário em seu banco de dados. Siga os passos abaixo:

1. **Crie a Tabela `usuarios`:** Execute a seguinte query SQL em seu banco de dados para criar a tabela de usuários:

```sql
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    created_at TIMESTAMP
);

-- Crie a Tabela `informacoes_usuario`: Execute a seguinte query SQL em seu banco de dados para criar a tabela de informações do usuário:
CREATE TABLE informacoes_usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    imagem_perfil VARCHAR(255),
    nome VARCHAR(100),
    idade INT,
    rua VARCHAR(255),
    bairro VARCHAR(100),
    estado VARCHAR(50),
    biografia TEXT
);
