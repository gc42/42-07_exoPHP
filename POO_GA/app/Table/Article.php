<?php
namespace App\Table;


class Article extends Table
{
	/**
	 * 
	 */
	public static function getLast()
	{
		$results = self::query("
			SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie
			FROM articles
			LEFT JOIN categories
				ON category_id = categories.id
			");

		return $results;
	}

	/**
	 * 
	 */
	public static function getLastByCategorie($category_id)
	{
		$results = self::query("
			SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie
			FROM articles
			LEFT JOIN categories ON category_id = categories.id
			WHERE category_id = ?
			", [$category_id]);

		return $results;
	}



	
	public function getUrl()
	{
		return 'index.php?p=article&id=' . $this->id;
	}



	public function getExtrait()
	{
		$html  = '<p>' . substr($this->contenu, 0, 200) . '...';
		$html .= '<a href="' . $this->getURL() . '"> Voir la suite</a></p>';

		return $html;
	}
}