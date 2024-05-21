<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Perfume_model extends CI_Model
{
	public function buscaPerfumes()
	{
		$this->db->select('*');
		$this->db->from('perfumes');
		$result['perfumes'] = $this->db->get()->result();

		// Execute a segunda consulta para obter o total de perfumes
		$this->db->select('COUNT(*) as TOTAL_PERFUMES');
		$this->db->from('perfumes');
		$result['total_perfumes'] = $this->db->get()->row()->TOTAL_PERFUMES;

		return $result;
	}

	public function buscaPerfumesPorTipo($tipo)
	{
		$this->db->select('*');
		$this->db->from('perfumes');

		// Adiciona a condição para buscar por tipo
		if ($tipo !== 'Todos') {
			$this->db->where('tipo', $tipo);
		}

		return $this->db->get()->result();
	}

	public function buscaPerfumesAleatorios($quantidade)
	{
		// Seleciona perfumes aleatórios limitados pela quantidade desejada
		$this->db->select('*');
		$this->db->from('perfumes');
		$this->db->order_by('RAND()');
		$this->db->limit($quantidade);

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

	public function atualizar($id, $marca)
	{
		$this->db->where("id", $id);
		return $this->db->update("perfumes", $marca);
	}
}
