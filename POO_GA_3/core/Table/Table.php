<?php
namespace Core\Table;
use Core\Database\Database;


class Table
{
	protected $table;
	protected $db;

	public function __construct(Database $db) // $db est une instance de Database ou une de ses filles
	{
		$this->db = $db;
		if (is_null($this->table))
		{
			$parts = explode('\\', get_class($this));
			$class_name = end($parts);
			$this->table = strtolower(str_replace('Table', '', $class_name)) . 's';
		}
	}




	public function all()
	{
		return $this->query('SELECT * FROM ' . $this->table);
	}



	public function query($statement, $attributes = null, $one = false)
	{
		if($attributes)
		{
			$data = $this->db->prepare(
				$statement,
				$attributes,
				str_replace('Table', 'Entity', get_class($this)),
				$one
			);
			return $data;
		} else {
			$data = $this->db->query(
				$statement,
				str_replace('Table', 'Entity', get_class($this)),
				$one
			);
			return $data;
		}
	}



	/**
	 * Recupere l'article selectionne
	 * @param int $id L'id de l'article selectionne
	 * @return array
	 */
	public function find($id)
	{
		$results =  $this->query("
			SELECT *
			FROM {$this->table}
			WHERE id = ?
			",
			[$id],
			true
		);

		return $results;
	}



	/**
	 * Update l'article mofifié
	 * @param int $id L'id de l'article selectionne
	 * @param array $fields Les champs a mettre a jour
	 * @return array
	 */
	public function update($id, $fields)
	{
		$sql_parts  = []; // tableau vide
		$attributes = []; // tableau vide
		foreach ($fields as $k => $v)
		{
			$sql_parts[]  = "$k = ?";
			$attributes[] = $v;
		}
		$attributes[] = $id;

		$sql_part = implode(', ', $sql_parts);
		
		printGC($sql_part);
		
		$results =  $this->query("UPDATE {$this->table} SET $sql_part WHERE id = ?", $attributes, true);
		
		return $results;
	}



	public function extractList($key, $value)
	{
		$records =$this->all();
		$return = [];
		foreach($records as $v)
		{
			$return[$v->$key] = $v->$value;
		}

		return $return;
	}



}