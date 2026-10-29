<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Usuarios_model', 'usuarios');
    }

    /**
     * Tela de login administrativo com perfis de teste em 1 clique
     */
    public function index()
    {
        if ($this->session->userdata('admin_logado')) {
            redirect(base_url('admin/dashboard'));
        }

        $dados['titulo'] = 'Login Administrativo | Fragance Euphoria';
        $dados['demo_users'] = $this->usuarios->get_demo_users();

        $this->load->view('admin/login', $dados);
    }

    /**
     * Processa login via credenciais
     */
    public function entrar()
    {
        $email = $this->input->post('email', TRUE);
        $senha = $this->input->post('senha', TRUE);

        if (empty($email) || empty($senha)) {
            $this->session->set_flashdata('erro', 'Por favor, preencha e-mail e senha.');
            redirect(base_url('admin/login'));
        }

        $usuario = $this->usuarios->autenticar($email, $senha);

        if ($usuario) {
            $session_data = array(
                'admin_id'      => $usuario->id,
                'admin_nome'    => $usuario->nome,
                'admin_email'   => $usuario->email,
                'admin_perfil'  => $usuario->perfil,
                'admin_logado'  => TRUE
            );
            $this->session->set_userdata($session_data);
            $this->session->set_flashdata('sucesso', "Bem-vindo(a), {$usuario->nome}! Sessão iniciada com sucesso.");
            redirect(base_url('admin/dashboard'));
        } else {
            $this->session->set_flashdata('erro', 'Credenciais inválidas. Verifique seu e-mail e senha.');
            redirect(base_url('admin/login'));
        }
    }

    /**
     * Login rapido em 1 clique para demonstracao
     */
    public function demo($perfil = 'admin')
    {
        $demos = $this->usuarios->get_demo_users();
        $perfil = strtolower(trim($perfil));

        if (!array_key_exists($perfil, $demos)) {
            $perfil = 'admin';
        }

        $demo = $demos[$perfil];
        $session_data = array(
            'admin_id'      => $demo['id'],
            'admin_nome'    => $demo['nome'],
            'admin_email'   => $demo['email'],
            'admin_perfil'  => $demo['perfil'],
            'admin_logado'  => TRUE
        );

        $this->session->set_userdata($session_data);
        $this->session->set_flashdata('sucesso', "Conectado com perfil de teste: {$demo['nome']} ({$demo['perfil']})");
        redirect(base_url('admin/dashboard'));
    }

    /**
     * Encerra a sessao e redireciona
     */
    public function logout()
    {
        $this->session->unset_userdata(array('admin_id', 'admin_nome', 'admin_email', 'admin_perfil', 'admin_logado'));
        $this->session->sess_destroy();
        redirect(base_url('admin/login'));
    }
}
