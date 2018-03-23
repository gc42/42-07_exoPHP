<?php
namespace App\Table;
use Core\Table\Table;

class PostTable extends Table
{
	// Redeclaration specifique du nom de la table
	// car la table 'articles' aurait du s'appeller 'posts' 
	protected $table = 'articles';


	/**
	 * Recupere les derniers articles
	 * @return array
	 */
	public function getLastPosts()
	{
		$results = $this->query("
			SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre as category
			FROM articles
			LEFT JOIN categories ON category_id = categories.id
			ORDER BY articles.date DESC
		");

		return $results;
	}



	/**
	 * Recupere un seul article grace a son 'id' en liant la categorie associee
	 * @param $id int
	 * @return \App\Entity\PostEntity  (ie: un objet de la class Entity)
	 */
	public function findWithCategory($id)
	{
		$results = $this->query("
			SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre as category
			FROM articles
			LEFT JOIN categories ON category_id = categories.id
			WHERE articles.id = ?",
			[$id], true);

		return $results;
	}



	/**
	 * Recupere les articles filtres par category_id
	 * @param $category_id int
	 * @return array
	 */
	public function getLastPostsByCategory($category_id)
	{
		$results = $this->query("
			SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre as category
			FROM articles
			LEFT JOIN categories ON category_id = categories.id
			WHERE category_id = ?
			ORDER BY articles.date DESC
			",
			[$category_id]
		);

		return $results;
	}



	







}