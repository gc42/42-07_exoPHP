<?php
class Magicien extends Personnage
{
	public function lancerUnSort(Personnage $perso)
	{
		// Valeur de l'atout en fonction des degats du personnage
		if     ($this->degats >= 0 && $this->degats <= 25)	{ $this->atout = 4; }
		elseif ($this->degats >= 25 && $this->degats < 50)	{ $this->atout = 3; }
		elseif ($this->degats >= 50 && $this->degats < 75)	{ $this->atout = 2; }
		elseif ($this->degats >= 75 && $this->degats < 90)	{ $this->atout = 1; }
		
		else  { $this->atout = 0; }



		if ($perso->id == $this->id)
		{
			return self::CEST_MOI;
		}



		if ($this->atout == 0)
		{
			return self::PAS_DE_MAGIE;
		}



		if ($this->estEndormi())
		{
			return self::PERSO_ENDORMI;
		}
		

		
		$perso->timeEndormi = time() + ($this->atout * 1) * 6;  // Temps d'endormissement (* 6 * 3600 = 6 heures)
		
		return self::PERSONNAGE_ENSORCELE;
	}
}