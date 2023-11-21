<?php

/**
 * @author Gabriel Martins
 */

/**
 * Retorna o nome da marca com base no ID da marca.
 * Esta função consulta o banco de dados para obter o nome da marca associada ao ID fornecido.
 * @param int $marca_id O ID da marca para o qual obter o nome.
 * @return string Retorna o nome da marca associada ao ID ou uma string vazia se a marca não for encontrada.
 */
function nome_marca($marca_id)
{
	// Carregue o CI para acessar o banco de dados
	$CI = &get_instance();
	// Consulte o banco de dados para obter o nome da marca
	$CI->db->select('nome');
	$CI->db->where('id', $marca_id);
	$query = $CI->db->get('marcas');

	// Verifique se a consulta foi bem-sucedida
	if ($query->num_rows() > 0) {
		$row = $query->row();
		return $row->nome;
	}

	// Retorne uma string vazia se a marca não for encontrada
	return '';
}
