<?php
namespace App\Table;
use Core\Table\Table;

class PostTable extends Table
{
	/**
	 * Recupere les derniers articles
	 * @return array
	 */
	public function getLastPosts()
	{
		$results = $this->query("
			SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre as categorie
			FROM articles
			LEFT JOIN categories ON category_id = categories.id
			ORDER BY articles.date DESC
		");

		return $results;
	}



	/**
	 * Recupere les articles filtres par category_id
	 * @return array
	 */
	public function getLastPostsByCategorie($category_id)
	{
		$results = $this->query("
			SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie
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