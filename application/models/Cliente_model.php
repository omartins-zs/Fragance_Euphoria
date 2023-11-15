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
}
