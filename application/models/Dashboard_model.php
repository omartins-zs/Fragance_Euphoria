<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Dashboard_model extends CI_Model
{
	public function countPerfumes()
	{
		$this->db->select('COUNT(*) as TOTAL_PERFUMES');
		$this->db->from('perfumes');

		$result = $this->db->get()->row()->TOTAL_PERFUMES;

		return $result;
	}
	
	public function countClientes()
	{
		$this->db->select('COUNT(*) as TOTAL_CLIENTES');
		$this->db->from('clientes');

		$result = $this->db->get()->row()->TOTAL_CLIENTES;

		return $result;
	}
	
	public function countMarcas()
	{
		$this->db->select('COUNT(*) as TOTAL_MARCAS');
		$this->db->from('marcas');

		$result = $this->db->get()->row()->TOTAL_MARCAS;

		return $result;
	}
}
