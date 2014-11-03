<?php
Class Documentos extends CI_Model
{
	function listar()
	{
		$query  = $this->db->get('tipo_documento');
		$result = $query->result();

		return json_encode($result);
	}

	function combo()
	{
		$query = $this->db->get('tipo_documento');
		foreach($query->result() as $row)
			$combo[] = array("value" => $row->id_tipo_documento, "text" => $row->tipo_documento);

		return json_encode(array("options" => $combo));
	}
}
?>
