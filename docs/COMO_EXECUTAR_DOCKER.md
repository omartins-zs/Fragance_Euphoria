# 🐳 Como Executar com Docker Compose

Instruções para inicialização conteinerizada de alta performance com **PHP 8.1 FPM**, **Nginx Reverse Proxy**, **MySQL 8.0** e **phpMyAdmin**.

---

## 🏗️ Arquitetura dos Containers

```
                    ┌─────────────────────────┐
                    │      Nginx (8080)       │
                    │  Reverse Proxy & Cache  │
                    └────────────┬────────────┘
                                 │ FastCGI (9000)
                    ┌────────────▼────────────┐
                    │      PHP 8.1 FPM        │
                    │    (Fragance App)       │
                    └────────────┬────────────┘
                                 │ TCP (3306)
         ┌───────────────────────┴───────────────────────┐
         │                                               │
┌────────▼────────┐                             ┌────────▼────────┐
│   MySQL 8.0     │                             │   phpMyAdmin    │
│  (Porta 3308)   │                             │  (Porta 8085)   │
└─────────────────┘                             └─────────────────┘
```

---

## 📋 Pré-requisitos

- Docker Desktop instalado e operacional.
- Docker Compose v2.x (`docker compose version`).

---

## 🚀 Passo a Passo

### 1. Configurar Variáveis de Ambiente
Copie o template de variáveis:
```bash
cp .env.example .env
```
No arquivo `.env`, comente o bloco `# LOCAL` e descomente o bloco `# DOCKER`:
```ini
# DOCKER (Ativo)
APP_URL=http://localhost:8080/
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=fragance_euphoria_bd
DB_USERNAME=user
DB_PASSWORD=password
DB_ROOT_PASSWORD=root
```

### 2. Construir e Iniciar os Containers
Execute na raiz do projeto:
```bash
docker compose up -d --build
```

### 3. Verificar Saúde dos Containers
```bash
docker compose ps
```
Aguarde até que os serviços `fragance_app`, `fragance_nginx`, `fragance_mysql` e `fragance_phpmyadmin` apresentem status `Up` ou `healthy`.

### 4. Acessar os Painéis
- **Loja Virtual (Vitrine Pública):** [http://localhost:8080](http://localhost:8080)
- **Carrinho e Checkout:** [http://localhost:8080/carrinho](http://localhost:8080/carrinho)
- **Painel Administrativo:** [http://localhost:8080/admin/login](http://localhost:8080/admin/login)
- **phpMyAdmin:** [http://localhost:8085](http://localhost:8085)
  - Servidor: `mysql`
  - Usuário: `root`
  - Senha: `root`

---

## 🛑 Comandos Úteis

Para pausar:
```bash
docker compose stop
```

Para reiniciar:
```bash
docker compose start
```

Para derrubar e remover os containers:
```bash
docker compose down
```

Para derrubar removendo volumes persistidos:
```bash
docker compose down -v
```
