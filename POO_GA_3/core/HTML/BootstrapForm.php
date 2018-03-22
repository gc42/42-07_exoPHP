<?php
namespace Core\HTML;

class BootstrapForm extends Form
{
	/**
	 * @param string $html Le code HTML qu'on veut entourer de la balise definie dans l'attribut $surround
	 * @return string
	 */
	protected function surround($html)
	{
		return '<div class="form-group">' . $html . '</div>';
	}


	
	
	/**
	 * @param string $name  Le nom du champ a creer
	 * @param string $label Le titre du champ a creer
	 * @param string $options Le type de input a creer (default='text', ou 'password'...)
	 * @return string
	 */
	public function input($name, $label, $options = [])
	{
		$type = isset($options['type']) ? $options['type'] : 'text'; // Si type est defini, sinon on met $type = text

		return $this->surround(
			'<label>' . $label . '</label>' .
			'<input type="' . $type . '" class="form-control" name="' . $name . '" value="' . $this->getValue($name) . '">');
	}



	/**
	 * @return string
	 */
	public function submit()
	{
		return $this->surround(
			'<button type="submit" class="btn btn-outline-primary btn-sm">Envoyer</button>'
		);
	}

}
