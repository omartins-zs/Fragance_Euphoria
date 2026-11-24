<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Cliente_model extends CI_Model
{
	public function buscaClientes()
	{
		$this->db->select('*');
		$this->db->from('clientes');

		return $this->db->get()->result();
	}

	public function buscaClientePorId($id)
	{
		$this->db->select('*');
		$this->db->from('clientes');
		$this->db->where('id', (int) $id);

		return $this->db->get()->row();
	}

	public function emailEmUso($email, $ignorar_id = null)
	{
		$this->db->where('email', strtolower(trim($email)));
		if ($ignorar_id !== null) {
			$this->db->where('id !=', (int) $ignorar_id);
		}

		return $this->db->count_all_results('clientes') > 0;
	}

	public function inserir($cliente)
	{
		$this->db->insert("clientes", $cliente);
	}

	public function inserirRetornandoId($cliente)
	{
		$this->db->insert("clientes", $cliente);
		return $this->db->insert_id();
	}

	public function buscaPorEmail($email)
	{
		$this->db->where('email', strtolower(trim($email)));
		return $this->db->get('clientes')->row();
	}

	public function autenticar($email, $senha)
	{
		$cliente = $this->buscaPorEmail($email);
		if (!$cliente) {
			return null;
		}

		$senha_valida = false;
		if (password_verify($senha, $cliente->senha)) {
			$senha_valida = true;
		} elseif (md5($senha) === $cliente->senha || sha1($senha) === $cliente->senha) {
			$senha_valida = true;
			// Atualiza para o hash seguro do PHP automaticamente
			$this->atualizar($cliente->id, array('senha' => password_hash($senha, PASSWORD_DEFAULT)));
		}

		if ($senha_valida) {
			return $cliente;
		}

		return null;
	}

	public function getCartoes($cliente_id)
	{
		$this->db->where('cliente_id', (int) $cliente_id);
		$this->db->order_by('id', 'DESC');
		return $this->db->get('cartoes_cliente')->result();
	}

	public function buscaCartaoPorId($cartao_id, $cliente_id)
	{
		$this->db->where('id', (int) $cartao_id);
		$this->db->where('cliente_id', (int) $cliente_id);
		return $this->db->get('cartoes_cliente')->row();
	}

	public function salvarCartao($cartao)
	{
		$this->db->insert('cartoes_cliente', $cartao);
		return $this->db->insert_id();
	}

	public function removerCartao($cartao_id, $cliente_id)
	{
		$this->db->where('id', (int) $cartao_id);
		$this->db->where('cliente_id', (int) $cliente_id);
		return $this->db->delete('cartoes_cliente');
	}

	public function atualizar($id, $cliente)
	{
		$this->db->where("id", (int) $id);
		return $this->db->update("clientes", $cliente);
	}
}
