<?php
class Personnage
{
    // LES ATTRIBUTS POUR LA BDD ################################################
    private $_id,
            $_nom,
            $_degats;
    
    const CEST_MOI = 1;
    const PERSONNAGE_TUE = 2;
    const PERSONNAGE_FRAPPE = 3;


    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    // ACTIONS ################################################
    public function frapper(Personnage $perso)
    {
        // Avant tout : vérifier qu'on ne se frappe pas soi-même.
        // Si c'est le cas, on stoppe tout en 
        // renvoyant une valeur signifiant que le personnage ciblé est le personnage qui attaque.
        if ($perso->id() == $this->_id)
        {
            return self::CEST_MOI;
        }

        // On indique au personnage frappé qu'il doit recevoir des dégâts.
        // Puis on retourne la valeur renvoyée par la méthode : self::PERSONNAGE_TUE ou self::PERSONNAGE_FRAPPE
        return $perso->recevoirDegats();

    }
    
    
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }



    public function recevoirDegats()
    {
        // On augmente de 5 les dégâts.
        $this->_degats += 5;

        // Si on a 100 de dégâts ou plus, la méthode renverra une valeur signifiant que le personnage a été tué.
        if ($this->_degats >= 100)
        {
            return self::PERSONNAGE_TUE;
        }
        
        // Sinon, on se contente de dire que le personnage a bien ete frappe.
        return self::PERSONNAGE_FRAPPE;
    }


    // Liste des getters ################################################
    public function id()         { return $this->_id; }
    public function nom()        { return $this->_nom; }
    public function degats()     { return $this->_degats; }


    // Liste des setters ################################################
    public function setId($id)
    {
        $id = (int) $id; // Convertit en entier. Souvent '0' si pas entier
        if ($id > 0)
        {
            $this->_id = $id;
        }
    }

    public function setNom($nom)
    {
        if (is_string($nom))
        {
            $this->_nom = $nom;
        }
    }

    public function setDegats($degats)
    {
        $degats = (int) $degats;
        if ($degats >= 0 && $degats <= 100)
        {
            $this->_degats = $degats;
        }
    }

    


    public function nomValide()
    {
      return !empty($this->_nom);
    }

}
