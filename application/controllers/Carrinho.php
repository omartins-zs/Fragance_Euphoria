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
}
