<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    protected $usuario_logado = null;

    public function __construct()
    {
        parent::__construct();

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->load->library('session');
        $this->load->helper('url');

        // Carregamento de models essenciais
        $this->load->model('Perfume_model');
        $this->load->model('Cliente_model');
        $this->load->model('Marca_model');
        $this->load->model('Carrinho_model');
        $this->load->model('Dashboard_model');
        $this->load->model('Usuarios_model');
        $this->load->model('Pedido_model');

        // Identifica usuario autenticado
        if ($this->session->userdata('admin_logado')) {
            $this->usuario_logado = array(
                'id'     => $this->session->userdata('admin_id'),
                'nome'   => $this->session->userdata('admin_nome'),
                'email'  => $this->session->userdata('admin_email'),
                'perfil' => $this->session->userdata('admin_perfil')
            );
            $this->load->vars(array('usuario_logado' => $this->usuario_logado));
        }

        // Protecao das rotas que iniciam com "admin", exceto login e auth
        $uri = trim($this->uri->uri_string(), '/');
        if (preg_match('#^admin(?!\/(auth|login))#i', $uri)) {
            if (!$this->session->userdata('admin_logado')) {
                $this->session->set_flashdata('erro', 'Por favor, autentique-se para acessar o painel administrativo.');
                redirect(base_url('admin/login'));
            }
        }
    }

    protected function isAdmin()
    {
        return isset($this->usuario_logado['perfil']) && $this->usuario_logado['perfil'] === 'admin';
    }

    protected function isGerente()
    {
        return isset($this->usuario_logado['perfil']) && in_array($this->usuario_logado['perfil'], array('admin', 'gerente'));
    }
}
