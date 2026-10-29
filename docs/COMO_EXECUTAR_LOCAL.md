# 💻 Como Executar Localmente (Host)

Instruções para configurar e executar a loja virtual **Fragance Euphoria** diretamente na sua máquina local sem uso de Docker.

---

## 🖥️ Ambiente de referência (máquina de desenvolvimento)

| Item | Especificação |
|---|---|
| **Sistema Operacional** | Windows 11 Pro 64-bit |
| **Shell** | PowerShell 7 / Windows Terminal |
| **PHP Suportado** | PHP 7.4.x até 8.2.x |
| **Extensões PHP** | `mysqli`, `pdo_mysql`, `mbstring`, `intl`, `zip`, `gd`, `bcmath` |
| **Banco de Dados** | MySQL 8.0+ ou MariaDB 10.4+ |
| **Porta da Aplicação** | `8000` |
| **Porta do MySQL Local** | `3306` |

---

## 📋 Pré-requisitos

1. **PHP:** instalado e disponível no PATH do sistema (`php -v`).
2. **MySQL:** rodando na porta padrão 3306.
3. Extensão `mysqli` e `pdo_mysql` habilitadas no `php.ini`.

---

## 🔧 Passo a Passo

### 1. Configurar o Arquivo .env
Copie o modelo de ambiente:
```bash
cp .env.example .env
```
No arquivo `.env`, certifique-se de que o bloco `# LOCAL` está ativo:
```ini
# LOCAL (Ativo)
APP_URL=http://localhost:8000/
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=fragance_euphoria_bd
DB_USERNAME=root
DB_PASSWORD=
```

### 2. Inicializar o Banco de Dados
Importe o schema e os dados de teste:
```bash
mysql -u root -p < docker/mysql/init.sql
```

### 3. Iniciar o Servidor Embutido do PHP
Execute na raiz do projeto:
```bash
php -S localhost:8000
```

### 4. Acessar a Aplicação
- **Loja Pública:** [http://localhost:8000](http://localhost:8000)
- **Login do Painel Admin:** [http://localhost:8000/admin/login](http://localhost:8000/admin/login)

Para credenciais de login e testes rápidos em 1 clique, consulte [`docs/ACESSOS_TESTES.md`](file:///C:/Projetos/Fragance_Euphoria/docs/ACESSOS_TESTES.md).
