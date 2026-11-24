<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cliente extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    /**
     * Tela de login do cliente
     */
    public function login()
    {
        if ($this->isClienteLogado()) {
            redirect(base_url('cliente/conta'));
        }

        $dados['titulo'] = 'Login do Cliente | Fragance Euphoria';
        $dados['produtosNoCarrinho'] = $this->Carrinho_model->contarProdutosNoCarrinho($_SESSION['carrinho'] ?? array());

        $this->load->vars($dados);
        $this->load->view('templates/shop/header');
        $this->load->view('templates/shop/navbar');
        $this->load->view('shop/cliente/login');
        $this->load->view('templates/shop/footer');
    }

    /**
     * Autenticacao de teste em 1 clique para agilizar validacao
     */
    public function demo($perfil = 'lucas')
    {
        $email = ($perfil === 'mariana') ? 'mariana.silva@email.com' : 'lucasguimaraes@email.com';
        $cliente = $this->Cliente_model->buscaPorEmail($email);

        if ($cliente) {
            $this->iniciarSessaoCliente($cliente);
            $this->session->set_flashdata('sucesso', "Bem-vindo(a), {$cliente->nome}! Você está conectado.");
            redirect(base_url('cliente/conta'));
        }

        $this->session->set_flashdata('erro', 'Cliente de teste não encontrado.');
        redirect(base_url('cliente/login'));
    }

    /**
     * Processa a autenticacao do cliente
     */
    public function autenticar()
    {
        $email = $this->input->post('email', TRUE);
        $senha = $this->input->post('senha', TRUE);

        if (empty($email) || empty($senha)) {
            $this->session->set_flashdata('erro', 'Por favor, informe e-mail e senha.');
            redirect(base_url('cliente/login'));
        }

        $cliente = $this->Cliente_model->autenticar($email, $senha);

        if ($cliente) {
            $this->iniciarSessaoCliente($cliente);
            $this->session->set_flashdata('sucesso', "Bem-vindo(a) de volta, {$cliente->nome}!");

            // Se o cliente veio do carrinho de compras, retorna para o checkout
            if (!empty($_SESSION['carrinho'])) {
                redirect(base_url('carrinho/checkout'));
            }

            redirect(base_url('cliente/conta'));
        } else {
            $this->session->set_flashdata('erro', 'E-mail ou senha incorretos.');
            redirect(base_url('cliente/login'));
        }
    }

    /**
     * Tela de cadastro de novo cliente
     */
    public function cadastro()
    {
        if ($this->isClienteLogado()) {
            redirect(base_url('cliente/conta'));
        }

        $dados['titulo'] = 'Criar Conta de Cliente | Fragance Euphoria';
        $dados['produtosNoCarrinho'] = $this->Carrinho_model->contarProdutosNoCarrinho($_SESSION['carrinho'] ?? array());

        $this->load->vars($dados);
        $this->load->view('templates/shop/header');
        $this->load->view('templates/shop/navbar');
        $this->load->view('shop/cliente/cadastro');
        $this->load->view('templates/shop/footer');
    }

    /**
     * Salva novo cadastro de cliente
     */
    public function salvar_cadastro()
    {
        $this->form_validation->set_rules('nome', 'Nome Completo', 'required|min_length[3]|max_length[150]');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|max_length[100]');
        $this->form_validation->set_rules('celular', 'Celular', 'required|min_length[10]|max_length[20]');
        $this->form_validation->set_rules('endereco', 'Endereço', 'required|min_length[8]|max_length[150]');
        $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[6]');
        $this->form_validation->set_rules('confirma_senha', 'Confirmação de Senha', 'required|matches[senha]');

        if (!$this->form_validation->run()) {
            $this->session->set_flashdata('erro', validation_errors('<div>', '</div>'));
            redirect(base_url('cliente/cadastro'));
        }

        $email = strtolower(trim($this->input->post('email', TRUE)));
        if ($this->Cliente_model->emailEmUso($email)) {
            $this->session->set_flashdata('erro', 'Já existe uma conta cadastrada com este e-mail.');
            redirect(base_url('cliente/cadastro'));
        }

        $novo_cliente = array(
            'nome'     => trim($this->input->post('nome', TRUE)),
            'email'    => $email,
            'celular'  => preg_replace('/\D/', '', $this->input->post('celular', TRUE)),
            'endereco' => trim($this->input->post('endereco', TRUE)),
            'senha'    => password_hash($this->input->post('senha'), PASSWORD_DEFAULT)
        );

        $cliente_id = $this->Cliente_model->inserirRetornandoId($novo_cliente);

        if ($cliente_id) {
            $cliente = $this->Cliente_model->buscaClientePorId($cliente_id);
            $this->iniciarSessaoCliente($cliente);
            $this->session->set_flashdata('sucesso', 'Conta criada com sucesso! Seja bem-vindo(a) à Fragance Euphoria.');

            if (!empty($_SESSION['carrinho'])) {
                redirect(base_url('carrinho/checkout'));
            }

            redirect(base_url('cliente/conta'));
        } else {
            $this->session->set_flashdata('erro', 'Erro ao salvar os dados. Tente novamente.');
            redirect(base_url('cliente/cadastro'));
        }
    }

    /**
     * Painel 'Minha Conta' com visualizacao e edicao de dados e endereco
     */
    public function conta()
    {
        $this->exigirClienteLogado();

        $cliente = $this->Cliente_model->buscaClientePorId($this->cliente_logado['id']);
        $pedidos = $this->Pedido_model->get_pedidos_by_email($cliente->email);
        $cartoes = $this->Cliente_model->getCartoes($cliente->id);

        $dados['titulo']             = 'Minha Conta | Fragance Euphoria';
        $dados['cliente']            = $cliente;
        $dados['total_pedidos']      = count($pedidos);
        $dados['ultimos_pedidos']    = array_slice($pedidos, 0, 3);
        $dados['total_cartoes']      = count($cartoes);
        $dados['produtosNoCarrinho'] = $this->Carrinho_model->contarProdutosNoCarrinho($_SESSION['carrinho'] ?? array());

        $this->load->vars($dados);
        $this->load->view('templates/shop/header');
        $this->load->view('templates/shop/navbar');
        $this->load->view('shop/cliente/conta');
        $this->load->view('templates/shop/footer');
    }

    /**
     * Atualiza dados cadastrais e endereco do cliente
     */
    public function atualizar_dados()
    {
        $this->exigirClienteLogado();

        $this->form_validation->set_rules('nome', 'Nome', 'required|min_length[3]|max_length[150]');
        $this->form_validation->set_rules('celular', 'Celular', 'required|min_length[10]|max_length[20]');
        $this->form_validation->set_rules('endereco', 'Endereço', 'required|min_length[8]|max_length[150]');

        if (!$this->form_validation->run()) {
            $this->session->set_flashdata('erro', validation_errors('<div>', '</div>'));
            redirect(base_url('cliente/conta'));
        }

        $dados_atualizacao = array(
            'nome'     => trim($this->input->post('nome', TRUE)),
            'celular'  => preg_replace('/\D/', '', $this->input->post('celular', TRUE)),
            'endereco' => trim($this->input->post('endereco', TRUE))
        );

        // Atualizacao opcional de senha
        $nova_senha = (string) $this->input->post('nova_senha');
        if (!empty($nova_senha)) {
            if (strlen($nova_senha) < 6) {
                $this->session->set_flashdata('erro', 'A nova senha deve ter pelo menos 6 caracteres.');
                redirect(base_url('cliente/conta'));
            }
            $dados_atualizacao['senha'] = password_hash($nova_senha, PASSWORD_DEFAULT);
        }

        $this->Cliente_model->atualizar($this->cliente_logado['id'], $dados_atualizacao);

        // Atualiza os dados da sessao
        $this->session->set_userdata(array(
            'cliente_nome'     => $dados_atualizacao['nome'],
            'cliente_celular'  => $dados_atualizacao['celular'],
            'cliente_endereco' => $dados_atualizacao['endereco']
        ));

        $this->session->set_flashdata('sucesso', 'Seus dados e endereço foram atualizados com sucesso!');
        redirect(base_url('cliente/conta'));
    }

    /**
     * Historico de pedidos do cliente
     */
    public function pedidos()
    {
        $this->exigirClienteLogado();

        $dados['titulo']             = 'Meus Pedidos | Fragance Euphoria';
        $dados['pedidos']            = $this->Pedido_model->get_pedidos_by_email($this->cliente_logado['email']);
        $dados['produtosNoCarrinho'] = $this->Carrinho_model->contarProdutosNoCarrinho($_SESSION['carrinho'] ?? array());

        $this->load->vars($dados);
        $this->load->view('templates/shop/header');
        $this->load->view('templates/shop/navbar');
        $this->load->view('shop/cliente/pedidos');
        $this->load->view('templates/shop/footer');
    }

    /**
     * Detalhes de um pedido especifico do cliente
     */
    public function pedido_detalhes($id = null)
    {
        $this->exigirClienteLogado();

        if (!$id) {
            redirect(base_url('cliente/pedidos'));
        }

        $pedido = $this->Pedido_model->get_pedido_by_id_and_email($id, $this->cliente_logado['email']);
        if (!$pedido) {
            $this->session->set_flashdata('erro', 'Pedido não encontrado ou não pertence à sua conta.');
            redirect(base_url('cliente/pedidos'));
        }

        $dados['titulo']             = "Detalhes do Pedido #{$pedido->id} | Fragance Euphoria";
        $dados['pedido']             = $pedido;
        $dados['itens']              = $this->Pedido_model->get_itens_by_pedido($pedido->id);
        $dados['produtosNoCarrinho'] = $this->Carrinho_model->contarProdutosNoCarrinho($_SESSION['carrinho'] ?? array());

        $this->load->vars($dados);
        $this->load->view('templates/shop/header');
        $this->load->view('templates/shop/navbar');
        $this->load->view('shop/cliente/pedido_detalhes');
        $this->load->view('templates/shop/footer');
    }

    /**
     * Gestao de cartoes de credito salvos do cliente
     */
    public function cartoes()
    {
        $this->exigirClienteLogado();

        $dados['titulo']             = 'Meus Cartões de Crédito | Fragance Euphoria';
        $dados['cartoes']            = $this->Cliente_model->getCartoes($this->cliente_logado['id']);
        $dados['produtosNoCarrinho'] = $this->Carrinho_model->contarProdutosNoCarrinho($_SESSION['carrinho'] ?? array());

        $this->load->vars($dados);
        $this->load->view('templates/shop/header');
        $this->load->view('templates/shop/navbar');
        $this->load->view('shop/cliente/cartoes');
        $this->load->view('templates/shop/footer');
    }

    /**
     * Salva novo cartao de forma segura (apenas ultimos 4 digitos e metadados)
     */
    public function salvar_cartao()
    {
        $this->exigirClienteLogado();

        $nome_titular = trim((string) $this->input->post('nome_titular', TRUE));
        $numero       = preg_replace('/\D/', '', (string) $this->input->post('numero_cartao', TRUE));
        $validade     = trim((string) $this->input->post('validade', TRUE));
        $bandeira     = trim((string) $this->input->post('bandeira', TRUE) ?: 'Mastercard');

        if (empty($nome_titular) || strlen($numero) < 13 || empty($validade)) {
            $this->session->set_flashdata('erro', 'Por favor, informe corretamente os dados do cartão de crédito.');
            redirect(base_url('cliente/cartoes'));
        }

        // Detecta bandeira automaticamente se possivel
        if (str_starts_with($numero, '4')) {
            $bandeira = 'Visa';
        } elseif (preg_match('/^(5[1-5]|222[1-9]|22[3-9]|2[3-6]|27[01]|2720)/', $numero)) {
            $bandeira = 'Mastercard';
        } elseif (preg_match('/^(34|37)/', $numero)) {
            $bandeira = 'American Express';
        } elseif (preg_match('/^(636368|438935|504175|451416|6011|622)/', $numero)) {
            $bandeira = 'Elo';
        }

        // Armazena com seguranca estrita (apenas ultimos 4 digitos)
        $novo_cartao = array(
            'cliente_id'      => $this->cliente_logado['id'],
            'nome_titular'    => strtoupper($nome_titular),
            'ultimos_digitos' => substr($numero, -4),
            'bandeira'        => $bandeira,
            'validade'        => $validade
        );

        $this->Cliente_model->salvarCartao($novo_cartao);
        $this->session->set_flashdata('sucesso', "Cartão com final •••• {$novo_cartao['ultimos_digitos']} salvo com sucesso!");
        redirect(base_url('cliente/cartoes'));
    }

    /**
     * Remove um cartao salvo
     */
    public function remover_cartao($id = null)
    {
        $this->exigirClienteLogado();

        if ($id) {
            $this->Cliente_model->removerCartao((int) $id, $this->cliente_logado['id']);
            $this->session->set_flashdata('sucesso', 'Cartão removido com sucesso.');
        }

        redirect(base_url('cliente/cartoes'));
    }

    /**
     * Encerra a sessao do cliente
     */
    public function logout()
    {
        $this->session->unset_userdata(array(
            'cliente_id',
            'cliente_nome',
            'cliente_email',
            'cliente_endereco',
            'cliente_celular',
            'cliente_logado'
        ));

        $this->session->set_flashdata('aviso', 'Você saiu da sua conta de cliente.');
        redirect(base_url('shop'));
    }

    private function iniciarSessaoCliente($cliente)
    {
        $dados_sessao = array(
            'cliente_id'       => $cliente->id,
            'cliente_nome'     => $cliente->nome,
            'cliente_email'    => $cliente->email,
            'cliente_endereco' => $cliente->endereco,
            'cliente_celular'  => $cliente->celular,
            'cliente_logado'   => TRUE
        );

        $this->session->set_userdata($dados_sessao);
    }
}
