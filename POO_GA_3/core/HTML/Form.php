<?php
namespace Core\HTML;
/**
 * Class Form
 * Permet de generer des champs de formulaires tres simplement
 */
class Form
{
	/**
	 * @var array Donnees utilisees pour le formulaire
	 */
	protected $data;

	/**
	 * @var string Le 'tag' utilise pour habiller les champs (default 'p')
	 */
	public $surround = 'p';



	/**
	 * @param array $data
	 */
	public function __construct($data = array())
	{
		$this->data = $data;
	}


	/**
	 * @param string $html Le code HTML qu'on veut entourer de la balise definie dans l'attribut $surround
	 * @return string
	 */
	protected function surround($html)
	{
		return "<{$this->surround}>{$html}<{$this->surround}>";
	}


	/**
	 * @param int $index Index de la valeur a recuperer
	 * @return string
	 */
	protected function getValue($index)
	{
		return isset($this->data[$index]) ? $this->data[$index] : null;
	}


	/**
	 * @param string $name  Le nom du champ a creer
	 * @param string $label Le titre du champ a creer
	 * @param array  $options Le type de input a creer sous la forme: ['type' => 'password']. Ddefault='text'.
	 * @return string
	 */
	public function input($name, $label, $options = [])
	{
		$type = isset($options['type']) ? $options['type'] : 'text'; // Si type est defini, sinon on met $type = text

		return $this->surround(
			'<label>' . $label . '</label>' .
			'<input type="' . $type . '" name="' . $name . '" value="' . $this->getValue($name) . '">');
	}
	
	
	


	/**
	 * @return string
	 */
	public function submit()
	{
		return $this->surround('<button type="submit">Envoyer</button>');
	}


}