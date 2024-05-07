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
