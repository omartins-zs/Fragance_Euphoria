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

	public function atualizar($id, $cliente)
	{
		$this->db->where("id", (int) $id);
		return $this->db->update("clientes", $cliente);
	}
}
