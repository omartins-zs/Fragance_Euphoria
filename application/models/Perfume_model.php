<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Perfume_model extends CI_Model
{
	public function buscaPerfumes()
	{
		$this->db->select('*');
		$this->db->from('perfumes');

		return $this->db->get()->result();
	}

	public function inserir($marca)
	{
		$this->db->insert("perfumes", $marca);
	}

	public function buscaPerfumePorId($id)
	{
		$this->db->select('*');
		$this->db->from('perfumes');
		$this->db->where('id', $id);

		return $this->db->get()->row();
	}
}
