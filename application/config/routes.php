<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
*/
$route['default_controller'] = 'shop';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// E-Commerce / Loja Publica
$route['shop'] = 'shop';
$route['shop/produtos'] = 'shop/produtos';
$route['shop/produtos/(:any)'] = 'shop/produtos/$1';
$route['shop/detalhes/(:num)'] = 'shop/detalhes/$1';
$route['shop/promocoes'] = 'shop/promocoes';
$route['shop/blog'] = 'shop/blog';

// Carrinho de Compras & Checkout
$route['carrinho'] = 'carrinho';
$route['carrinho/adicionar'] = 'carrinho/adicionar';
$route['carrinho/remover/(:any)'] = 'carrinho/remover/$1';
$route['carrinho/limpar'] = 'carrinho/limpar';
$route['carrinho/checkout'] = 'carrinho/checkout';
$route['carrinho/finalizar'] = 'carrinho/finalizar';
$route['carrinho/sucesso/(:num)'] = 'carrinho/sucesso/$1';

// Autenticacao Administrativa
$route['login'] = 'admin/auth/index';
$route['logout'] = 'admin/auth/logout';
$route['admin/login'] = 'admin/auth/index';
$route['admin/logout'] = 'admin/auth/logout';
$route['admin/auth/entrar'] = 'admin/auth/entrar';
$route['admin/auth/demo/(:any)'] = 'admin/auth/demo/$1';

// Painel Administrativo
$route['admin'] = 'admin/dashboard';
$route['admin/dashboard'] = 'admin/dashboard';
$route['admin/perfume'] = 'admin/perfume';
$route['admin/marca'] = 'admin/marca';
$route['admin/cliente'] = 'admin/cliente';

// Gestao de Pedidos no Painel
$route['admin/pedidos'] = 'admin/pedidos/index';
$route['admin/pedidos/detalhes/(:num)'] = 'admin/pedidos/detalhes/$1';
$route['admin/pedidos/status/(:num)'] = 'admin/pedidos/status/$1';

// Area do Cliente / Minha Conta
$route['cliente'] = 'cliente/conta';
$route['cliente/login'] = 'cliente/login';
$route['cliente/demo/(:any)'] = 'cliente/demo/$1';
$route['cliente/autenticar'] = 'cliente/autenticar';
$route['cliente/cadastro'] = 'cliente/cadastro';
$route['cliente/salvar_cadastro'] = 'cliente/salvar_cadastro';
$route['cliente/conta'] = 'cliente/conta';
$route['cliente/atualizar_dados'] = 'cliente/atualizar_dados';
$route['cliente/pedidos'] = 'cliente/pedidos';
$route['cliente/pedidos/(:num)'] = 'cliente/pedido_detalhes/$1';
$route['cliente/cartoes'] = 'cliente/cartoes';
$route['cliente/cartoes/salvar'] = 'cliente/salvar_cartao';
$route['cliente/cartoes/remover/(:num)'] = 'cliente/remover_cartao/$1';
$route['cliente/logout'] = 'cliente/logout';

// Aliases amigaveis
$route['minha-conta'] = 'cliente/conta';
$route['meus-pedidos'] = 'cliente/pedidos';

// Health Check
$route['health'] = 'shop/health';
