<?php
/**
 * Test Runner completo de Rotas e Fluxos - Fragance Euphoria
 */

$baseUrl = 'http://nginx';
$cookieJar = tempnam(sys_get_temp_dir(), 'ci_cookie_');

function isRedirect($code) {
    return in_array($code, [301, 302, 303, 307], true);
}

function request($method, $path, $postFields = null, $follow = false, $cookies = true) {
    global $baseUrl, $cookieJar;
    $ch = curl_init();
    $url = $baseUrl . $path;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
    if ($cookies) {
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieJar);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieJar);
    }
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, $follow);
    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
        if ($postFields) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, is_array($postFields) ? http_build_query($postFields) : $postFields);
        }
    }
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $headers = substr($response, 0, $headerSize);
    $body = substr($response, $headerSize);
    $redirectUrl = curl_getinfo($ch, CURLINFO_REDIRECT_URL);
    curl_close($ch);

    return [
        'code' => $httpCode,
        'headers' => $headers,
        'body' => $body,
        'redirect' => $redirectUrl
    ];
}

$passed = 0;
$failed = 0;

function assertTest($name, $condition, $details = '') {
    global $passed, $failed;
    if ($condition) {
        echo " [PASS] $name\n";
        $passed++;
    } else {
        echo "![FAIL] $name: $details\n";
        $failed++;
    }
}

echo "=========================================================\n";
echo " TESTE DE TODAS AS ROTAS - FRAGANCE EUPHORIA\n";
echo "=========================================================\n\n";

echo "--- 1. Rotas Publicas da Loja (E-Commerce) ---\n";

$res = request('GET', '/health');
assertTest('GET /health (Health Check)', $res['code'] === 200 && strpos($res['body'], '"status": "ok"') !== false, "Code: {$res['code']}");

$res = request('GET', '/');
assertTest('GET / (Home Shop)', $res['code'] === 200 && strpos($res['body'], 'Fragance Euphoria') !== false, "Code: {$res['code']}");

$res = request('GET', '/shop');
assertTest('GET /shop', $res['code'] === 200 && strpos($res['body'], 'Fragance Euphoria') !== false, "Code: {$res['code']}");

$res = request('GET', '/shop/produtos');
assertTest('GET /shop/produtos', $res['code'] === 200 && strpos($res['body'], 'Good Girl') !== false, "Code: {$res['code']}");

$res = request('GET', '/shop/produtos/Todos');
assertTest('GET /shop/produtos/Todos', $res['code'] === 200 && strpos($res['body'], 'Catálogo') !== false, "Code: {$res['code']}");

$res = request('GET', '/shop/produtos/Feminino');
assertTest('GET /shop/produtos/Feminino', $res['code'] === 200 && strpos($res['body'], 'Good Girl') !== false, "Code: {$res['code']}");

$res = request('GET', '/shop/produtos/Masculino');
assertTest('GET /shop/produtos/Masculino', $res['code'] === 200 && strpos($res['body'], 'Sauvage') !== false, "Code: {$res['code']}");

$res = request('GET', '/shop/produtos/Unissex');
assertTest('GET /shop/produtos/Unissex', $res['code'] === 200 && strpos($res['body'], 'CK One') !== false, "Code: {$res['code']}");

$res = request('GET', '/shop/detalhes/1');
assertTest('GET /shop/detalhes/1 (Detalhes do Produto)', $res['code'] === 200 && strpos($res['body'], 'Good Girl') !== false, "Code: {$res['code']}");

$res = request('GET', '/shop/detalhes/99999');
assertTest('GET /shop/detalhes/99999 (Produto inexistente -> 404)', $res['code'] === 404, "Code: {$res['code']}");

$res = request('GET', '/shop/promocoes');
assertTest('GET /shop/promocoes', $res['code'] === 200 && strpos($res['body'], 'Promoções') !== false, "Code: {$res['code']}");

$res = request('GET', '/shop/blog');
assertTest('GET /shop/blog', $res['code'] === 200 && strpos($res['body'], 'Blog') !== false, "Code: {$res['code']}");

$res = request('GET', '/carrinho');
assertTest('GET /carrinho (Carrinho vazio)', $res['code'] === 200, "Code: {$res['code']}");

$res = request('GET', '/carrinho/checkout');
assertTest('GET /carrinho/checkout (Vazio deve redirecionar)', isRedirect($res['code']), "Code: {$res['code']}");


echo "\n--- 2. Fluxo do Carrinho e Finalizacao de Pedido ---\n";

$res = request('POST', '/carrinho/adicionar', ['id' => 1, 'quantidade' => 2]);
assertTest('POST /carrinho/adicionar (Adiciona Good Girl)', isRedirect($res['code']), "Code: {$res['code']}");

$res = request('GET', '/carrinho');
assertTest('GET /carrinho com produto adicionado', $res['code'] === 200 && strpos($res['body'], 'Good Girl') !== false, "Code: {$res['code']}");

$res = request('GET', '/carrinho/checkout');
assertTest('GET /carrinho/checkout com itens no carrinho', $res['code'] === 200 && strpos($res['body'], 'Finalização do Pedido') !== false, "Code: {$res['code']}");

$res = request('POST', '/carrinho/finalizar', [
    'nome' => 'Cliente Teste Automatizado',
    'email' => 'teste@cliente.com',
    'celular' => '11988887777',
    'endereco' => 'Rua das Flores, 123 - Centro',
    'forma_pagamento' => 'PIX'
]);
assertTest('POST /carrinho/finalizar (Cria pedido)', isRedirect($res['code']) && strpos($res['headers'], '/carrinho/sucesso/') !== false, "Headers: {$res['headers']}");

preg_match('#/carrinho/sucesso/(\d+)#', $res['headers'], $matches);
$pedidoId = isset($matches[1]) ? (int)$matches[1] : 0;

if ($pedidoId > 0) {
    $res = request('GET', '/carrinho/sucesso/' . $pedidoId);
    assertTest("GET /carrinho/sucesso/$pedidoId (Recibo do cliente)", $res['code'] === 200 && strpos($res['body'], 'Cliente Teste Automatizado') !== false, "Code: {$res['code']}");

    // Teste de seguranca de IDOR no recibo com novo cookie
    $resIdor = request('GET', '/carrinho/sucesso/' . $pedidoId, null, false, false);
    assertTest("Seguranca: GET /carrinho/sucesso/$pedidoId sem sessao de compra redireciona", isRedirect($resIdor['code']), "Code: {$resIdor['code']}");
} else {
    assertTest("Geracao do pedido", false, "Pedido ID nao encontrado no header");
}


echo "\n--- 3. Protecao e Rotas Administrativas (Sem Login) ---\n";

// Criar nova sessao limpa
@unlink($cookieJar);
$cookieJar = tempnam(sys_get_temp_dir(), 'ci_cookie_');

$res = request('GET', '/admin');
assertTest('GET /admin sem login redireciona para /admin/login', isRedirect($res['code']), "Code: {$res['code']}");

$res = request('GET', '/admin/perfume');
assertTest('GET /admin/perfume sem login redireciona', isRedirect($res['code']), "Code: {$res['code']}");

$res = request('GET', '/admin/marca');
assertTest('GET /admin/marca sem login redireciona', isRedirect($res['code']), "Code: {$res['code']}");

$res = request('GET', '/admin/cliente');
assertTest('GET /admin/cliente sem login redireciona', isRedirect($res['code']), "Code: {$res['code']}");

$res = request('GET', '/admin/pedidos');
assertTest('GET /admin/pedidos sem login redireciona', isRedirect($res['code']), "Code: {$res['code']}");

$res = request('GET', '/login');
assertTest('GET /login exibe formulario', $res['code'] === 200 && strpos($res['body'], 'Painel de Gestão') !== false, "Code: {$res['code']}");

$res = request('GET', '/admin/login');
assertTest('GET /admin/login exibe formulario', $res['code'] === 200, "Code: {$res['code']}");


echo "\n--- 4. Autenticacao Admin (Perfil Administrador) ---\n";

$res = request('GET', '/admin/auth/demo/admin');
assertTest('GET /admin/auth/demo/admin (Login demo admin)', isRedirect($res['code']), "Code: {$res['code']}");

$res = request('GET', '/admin/dashboard');
assertTest('GET /admin/dashboard (Logado como admin)', $res['code'] === 200 && strpos($res['body'], 'Dashboard') !== false, "Code: {$res['code']}");

$res = request('GET', '/admin/perfume');
assertTest('GET /admin/perfume (Listagem de perfumes)', $res['code'] === 200 && strpos($res['body'], 'Catálogo de Perfumes') !== false, "Code: {$res['code']}");

$res = request('GET', '/admin/perfume/novo');
assertTest('GET /admin/perfume/novo (Formulario de perfume)', $res['code'] === 200 && strpos($res['body'], 'Novo perfume') !== false, "Code: {$res['code']}");

$res = request('GET', '/admin/perfume/edit/1');
assertTest('GET /admin/perfume/edit/1 (Edicao de perfume)', $res['code'] === 200 && strpos($res['body'], 'Editar perfume') !== false, "Code: {$res['code']}");

$res = request('GET', '/admin/marca');
assertTest('GET /admin/marca (Listagem de marcas)', $res['code'] === 200 && strpos($res['body'], 'Marcas') !== false, "Code: {$res['code']}");

$res = request('GET', '/admin/marca/novo');
assertTest('GET /admin/marca/novo (Formulario de marca)', $res['code'] === 200 && strpos($res['body'], 'Nova marca') !== false, "Code: {$res['code']}");

$res = request('GET', '/admin/marca/edit/1');
assertTest('GET /admin/marca/edit/1 (Edicao de marca)', $res['code'] === 200 && strpos($res['body'], 'Editar marca') !== false, "Code: {$res['code']}");

$res = request('GET', '/admin/cliente');
assertTest('GET /admin/cliente (Listagem de clientes)', $res['code'] === 200 && strpos($res['body'], 'Clientes') !== false, "Code: {$res['code']}");

$res = request('GET', '/admin/cliente/novo');
assertTest('GET /admin/cliente/novo (Formulario de cliente)', $res['code'] === 200 && strpos($res['body'], 'Novo cliente') !== false, "Code: {$res['code']}");

$res = request('GET', '/admin/cliente/edit/1');
assertTest('GET /admin/cliente/edit/1 (Edicao de cliente)', $res['code'] === 200 && strpos($res['body'], 'Editar cliente') !== false, "Code: {$res['code']}");

$res = request('GET', '/admin/pedidos');
assertTest('GET /admin/pedidos (Listagem de pedidos)', $res['code'] === 200 && strpos($res['body'], 'Gestão de Pedidos') !== false, "Code: {$res['code']}");

$res = request('GET', '/admin/pedidos/detalhes/1');
assertTest('GET /admin/pedidos/detalhes/1 (Detalhes do pedido 1)', $res['code'] === 200 && strpos($res['body'], 'Pedido #1') !== false, "Code: {$res['code']}");

$res = request('POST', '/admin/pedidos/status/1', ['status' => 'Entregue']);
assertTest('POST /admin/pedidos/status/1 (Alterar status para Entregue)', isRedirect($res['code']), "Code: {$res['code']}");


echo "\n--- 5. Controle de Acesso por Perfil (Atendente / Operador) ---\n";

@unlink($cookieJar);
$cookieJar = tempnam(sys_get_temp_dir(), 'ci_cookie_');

$res = request('GET', '/admin/auth/demo/atendente');
assertTest('GET /admin/auth/demo/atendente (Login atendente)', isRedirect($res['code']), "Code: {$res['code']}");

$res = request('GET', '/admin/dashboard');
assertTest('GET /admin/dashboard (Atendente tem acesso de leitura)', $res['code'] === 200, "Code: {$res['code']}");

$res = request('GET', '/admin/perfume/novo');
assertTest('GET /admin/perfume/novo (Atendente BLOQUEADO de cadastrar perfume)', isRedirect($res['code']), "Code: {$res['code']}");

$res = request('GET', '/admin/marca/novo');
assertTest('GET', '/admin/marca/novo (Atendente BLOQUEADO de cadastrar marca)', isRedirect($res['code']), "Code: {$res['code']}");


echo "\n--- 6. Logout ---\n";

$res = request('GET', '/admin/logout');
assertTest('GET /admin/logout (Destroi sessao)', isRedirect($res['code']), "Code: {$res['code']}");

$res = request('GET', '/admin/dashboard');
assertTest('GET /admin/dashboard apos logout redireciona para login', isRedirect($res['code']), "Code: {$res['code']}");

@unlink($cookieJar);

echo "\n=========================================================\n";
echo " RESULTADO: $passed PASSOU | $failed FALHOU\n";
echo "=========================================================\n";

exit($failed > 0 ? 1 : 0);
