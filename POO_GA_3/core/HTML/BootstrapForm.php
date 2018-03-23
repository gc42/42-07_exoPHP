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
		$label = '<label>' . $label . '</label>';

		if ($type === 'textarea')
		{
			$input = '<textarea class="form-control" name="' . $name . '">' . $this->getValue($name) . '</textarea>';
		} else {
			$input = '<input class="form-control" type="' . $type . '" name="' . $name . '" value="' . $this->getValue($name) . '">';
		}
		
		return $this->surround($label . $input);
	}



	/**
	 * 
	 */
	public function select($name, $label, $options)
	{
		$label = '<label>' . $label . '</label>';
		$input = '<select class="form-control" name="' . $name . '">';

		foreach($options as $k => $v)
		{
			$attributes = '';
			if ($k == $this->getValue($name))
			{
				$attributes = ' selected';
			}
			$input .= "<option value='$k'$attributes>$v</option>";
		}

		$input .= '</select>';

		return $this->surround($label . $input);
	}



	/**
	 * @param string $name Le nom de ce bouton de validation
	 * @return string
	 */
	public function submit($name = 'Valider')
	{
		return $this->surround(
			'<button type="submit" class="btn btn-primary">' . $name . '</button>'
		);
	}

}
