# 🚀 Como Executar o Projeto

Este projeto pode ser executado de duas maneiras:

1. **Via Docker Compose (Recomendado):** Ambiente conteinerizado de ponta a ponta com PHP 8.1 FPM, Nginx, MySQL 8.0 com auto-seed e phpMyAdmin.
2. **Localmente no Host:** Utilizando o interpretador PHP nativo e o servidor MySQL local.

---

## 🧭 Escolha o Modo de Execução

- Para executar rapidamente com containers:
  👉 Consulte o [Guia de Execução com Docker](file:///C:/Projetos/Fragance_Euphoria/docs/COMO_EXECUTAR_DOCKER.md).

- Para rodar diretamente no sistema operacional da sua máquina:
  👉 Consulte o [Guia de Execução Local](file:///C:/Projetos/Fragance_Euphoria/docs/COMO_EXECUTAR_LOCAL.md).

---

## ⚡ Comandos Rápidos

### Execução via Docker
```bash
# 1. Copiar variáveis de ambiente
cp .env.example .env

# 2. Subir os containers em segundo plano
docker compose up -d --build

# 3. Acessar a loja virtual
# http://localhost:8080
```

### Execução Local
```bash
# 1. Importar script inicial no MySQL
mysql -u root -p < docker/mysql/init.sql

# 2. Iniciar servidor embutido do PHP
php -S localhost:8000
```

Para consultar as credenciais e roteiro de validação, veja [`docs/ACESSOS_TESTES.md`](file:///C:/Projetos/Fragance_Euphoria/docs/ACESSOS_TESTES.md).
