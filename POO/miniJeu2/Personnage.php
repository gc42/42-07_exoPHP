<?php
class Personnage
{
    // LES ATTRIBUTS ################################################
    protected   $_id,
                $_nom,
                $_type,
                $_degats,
                $_atout,
                $timeEndormi;
    
        
    // LES CONSTANTES DE RETOUR D'ACTIONS ##############################
    const CEST_MOI = 1;
    const PERSONNAGE_TUE = 2;
    const PERSONNAGE_FRAPPE = 3;
    
    // Constante renvoyée par la méthode `lancerUnSort` (voir classe Magicien) si on a bien ensorcelé un personnage.
    const PERSONNAGE_ENSORCELE = 4;
    
    // Constante renvoyée par la méthode `lancerUnSort` (voir classe Magicien) si on veut jeter un sort alors que la magie du magicien est à 0.
    const PAS_DE_MAGIE = 5;
    
    // Constante renvoyée par la méthode `frapper` si le personnage qui veut frapper est endormi.
    const PERSO_ENDORMI = 6;



    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
        $this->type = strtolower(static::class);
    }




    // ACTIONS ################################################
    public function estEndormi()
    {
        return $this->timeEndormi > time();
    }




    public function frapper(Personnage $perso)
    {
        // Avant tout : vérifier qu'on ne se frappe pas soi-même.
        // Si c'est le cas, on stoppe tout en 
        // renvoyant une valeur signifiant que le personnage ciblé est le personnage qui attaque.
        if ($perso->getId() == $this->_id)
        {
            return self::CEST_MOI;
        }

        if ($this->estEndormi())
        {
            return self::PERSO_ENDORMI;
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




    public function nomValide()
    {
      return !empty($this->_nom);
    }




    public function reveil()
    {
        $secondes = $this->timeEndormi;
        $secondes -= time();

        $heures = floor($secondes / 3600);
        $secondes -= $heures * 3600;
        $minutes = floor($secondes / 60);
        $secondes -= $minutes * 60;

        $heures .= $heures <= 1 ? ' heure' : ' heures';
        $minutes .= $minutes <= 1 ? ' minute' : ' minutes';
        $secondes .= $secondes <= 1 ? ' seconde' : ' secondes';

        return $heures . ', ' . $minutes . ' et ' . $secondes;
    }




    

    // Liste des getters ################################################
    public function getId()            { return $this->id; }
    public function getNom()           { return $this->nom; }
    public function getType()         { return $this->type; }
    public function getDegats()        { return $this->degats; }
    public function getAtout()         { return $this->atout; }
    public function getTimeEndormi()   { return $this->timeEndormi; }
    





    // Liste des setters ################################################
    public function setId($id)
    {
        $id = (int) $id; // Convertit en entier. Souvent '0' si pas entier
        if ($id > 0)
        {
            $this->id = $id;
        }
    }

    public function setNom($nom)
    {
        if (is_string($nom))
        {
            $this->nom = $nom;
        }
    }

    public function setAtout($atout)
    {
        $atout = (int) $atout;

        if ($atout >= 0 && $atout <= 100)
        {
            $this->atout = $atout;
        }
    }

    public function setDegats($degats)
    {
        $degats = (int) $degats;
        if ($degats >= 0 && $degats <= 100)
        {
            $this->degats = $degats;
        }
    }

    public function setTimeEndormi($time)
    {
        $this->timeEndormi = (int) $time;
    }
}
