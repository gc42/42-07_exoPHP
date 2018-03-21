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
	 * @return array
	 */
	public static function findPost($id)
	{
		
		$results =  $this->query("
			SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie
			FROM articles
			LEFT JOIN categories ON category_id = categories.id
			WHERE articles.id = ?
			",
			[$id],
			true
		);

		return $results;
	}



}