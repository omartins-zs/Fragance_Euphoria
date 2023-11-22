<!-- // application/controllers/Carrinho.php -->
<?
defined('BASEPATH') or exit('No direct script access allowed');

class Carrinho extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
	}
	public function index()
	{
		$this->load->view('templates/shop/header');
		$this->load->view('templates/shop/navbar');
		// Exibe a página do carrinho
		$this->load->view('shop/carrinho');
		$this->load->view('templates/shop/footer');
	}

	public function adicionar()
	{
		// Adiciona um item ao carrinho
		$data = array(
			'id'      => $this->input->post('id'),
			'qtde'     => $this->input->post('quantidade'),
			'preco'   => $this->input->post('preco'),
			'nome'    => $this->input->post('nome'),
		);

		$this->cart->insert($data);
		redirect('carrinho');
	}
	public function remover($rowid)
	{
		// Remove um item do carrinho
		$data = array(
			'rowid' => $rowid,
			'qtde'   => 0
		);

		$this->cart->update($data);
		redirect('carrinho');
	}
	
	public function limpar()
	{
		// Limpa o carrinho
		$this->cart->destroy();
		redirect('carrinho');
	}
}
