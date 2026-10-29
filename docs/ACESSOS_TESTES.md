# 🔑 Acessos, Credenciais e Roteiro de Testes

Guia consolidado de portas, serviços, credenciais dos seeders e roteiro de validação ponta a ponta do projeto **Fragance Euphoria E-commerce**.

---

## 🌐 URLs dos Serviços

| Serviço | Ambiente Docker | Ambiente Local (Host) | Descrição |
|---|---|---|---|
| **Loja Virtual (Shop)** | [http://localhost:8080](http://localhost:8080) | [http://localhost:8000](http://localhost:8000) | Vitrine de perfumes, categorias, promoções e blog |
| **Carrinho de Compras** | [http://localhost:8080/carrinho](http://localhost:8080/carrinho) | [http://localhost:8000/carrinho](http://localhost:8000/carrinho) | Gestão de itens no carrinho e cálculo de frete |
| **Checkout (Novo)** | [http://localhost:8080/carrinho/checkout](http://localhost:8080/carrinho/checkout) | [http://localhost:8000/carrinho/checkout](http://localhost:8000/carrinho/checkout) | Finalização de compra e pagamento |
| **Login do Painel** | [http://localhost:8080/admin/login](http://localhost:8080/admin/login) | [http://localhost:8000/admin/login](http://localhost:8000/admin/login) | Formulário e botões de login em 1 clique |
| **Painel Administrativo** | [http://localhost:8080/admin](http://localhost:8080/admin) | [http://localhost:8000/admin](http://localhost:8000/admin) | Dashboard gerencial, catálogo e gestão de pedidos |
| **Gestão de Pedidos (Novo)** | [http://localhost:8080/admin/pedidos](http://localhost:8080/admin/pedidos) | [http://localhost:8000/admin/pedidos](http://localhost:8000/admin/pedidos) | Listagem, detalhes e atualização de status de pedidos |
| **Health Check** | [http://localhost:8080/health](http://localhost:8080/health) | [http://localhost:8000/health](http://localhost:8000/health) | Diagnóstico da aplicação e status de banco de dados |
| **MySQL 8.0** | `localhost:3308` | `localhost:3306` | Banco de dados relacional |
| **phpMyAdmin** | [http://localhost:8085](http://localhost:8085) | — | Gestão visual de tabelas e registros do banco |

---

## 👥 Credenciais dos Usuários de Teste (Seeders)

Todos os usuários contam com senha padrão `Password@123` e botões de **login rápido em 1 clique** na tela de login:

| Perfil | Nome | E-mail | Senha | Permissões |
|---|---|---|---|---|
| **Admin** | Administrador Fragance | `admin@fragance.com` | `Password@123` | Acesso total: dashboard financeiro, perfumes, marcas, clientes e pedidos |
| **Gerente** | Gerente de Vendas | `gerente@fragance.com` | `Password@123` | Gestão de produtos, controle de estoque e alteração de status de pedidos |
| **Atendente** | Atendente de Loja | `atendente@fragance.com` | `Password@123` | Visualização de estoque, consulta de clientes e leitura de pedidos |

---

## 🗄️ Credenciais do Banco de Dados

| Parâmetro | Valor Docker | Valor Local (Padrão) |
|---|---|---|
| **Host** | `mysql` (interno) / `localhost:3308` | `127.0.0.1:3306` |
| **Database** | `fragance_euphoria_bd` | `fragance_euphoria_bd` |
| **Usuário Comum** | `user` | `root` |
| **Senha Usuário** | `password` | (vazio) |
| **Root Password** | `root` | `root` |

---

## 🧪 Roteiro de Validação e Testes Ponta a Ponta

### 1. Teste de Health Check
Verifique o diagnóstico da aplicação via cURL ou navegador:
```bash
curl http://localhost:8080/health
```
Resposta esperada:
```json
{
  "status": "ok",
  "app": "Fragance Euphoria",
  "database": "connected",
  "php": "8.1.x",
  "timestamp": "2026-10-28 22:30:00"
}
```

### 2. Teste do Fluxo de Compra (E-commerce + Checkout)
1. Acesse a vitrine em [http://localhost:8080/shop](http://localhost:8080/shop).
2. Clique em **Detalhes** de um perfume (ex: *Good Girl* ou *Sauvage*).
3. Selecione a quantidade e clique em **Comprar**.
4. Você será redirecionado para o **Carrinho de Compras**.
5. Clique em **Fechar Pedido** para abrir o formulário de **Checkout**.
6. Preencha seus dados de entrega, escolha a forma de pagamento (*PIX*, *Cartão* ou *Boleto*) e clique em **Confirmar e Pagar Agora**.
7. Valide a exibição da tela de **Sucesso**, com o número do pedido `#X`, recibo e resumo completo.

### 3. Teste de Gestão do Pedido no Painel Admin
1. Acesse [http://localhost:8080/admin/login](http://localhost:8080/admin/login).
2. Clique no botão de 1 clique **Administrador Geral** ou **Gerente de Vendas**.
3. No menu lateral, acesse **Pedidos de Venda** (`/admin/pedidos`).
4. Localize o pedido recém-criado e clique em **Abrir**.
5. No formulário de situação, altere o status de *Pago* para *Enviado* e clique em **Atualizar**.
6. Valide a mensagem de sucesso e a nova badge atualizada.

### 4. Teste de Logout
1. No canto superior direito da barra de topo, clique na foto do perfil.
2. Clique em **Sair do Painel**.
3. A sessão será finalizada e redirecionada para a tela de login.
