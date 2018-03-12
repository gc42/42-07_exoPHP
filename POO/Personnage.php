<?php
class Personnage
{
    // LES ATTRIBUTS
    private $_force;        // La force du personnage
    private $_experience;   // Son expérience
    private $_degats;       // Ses dégâts
  
    // LES METHODES

    public function __construct($force, $degats) // Constructeur demandant 2 paramètres
    {
      echo 'Voici le constructeur !'; // Message s'affichant une fois que tout objet est créé.
      $this->setForce($force);        // Initialisation de la force.
      $this->setDegats($degats);      // Initialisation des dégâts.
      $this->_experience = 1;         // Initialisation de l'expérience à 1.
    }

    // LES getters
    public function force()
    {
      return $this->_force;
    }

    public function experience()
    {
      return $this->_experience;
    }

    public function degats()
    {
      return $this->_degats;
    }



    // Setter chargé de modifier l'attribut $_force.
    public function setForce($force)
    {
        if(!is_int($force)) // si ce n'est pas un entier
        {
            trigger_error('La force d\'un personnage doit être un nombre entier', E_USER_WARNING);
            return;
        }

        if ($force > 100) // On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
        {
            trigger_error('La force d\'un personnage ne peut dépasser 100', E_USER_WARNING);
            return;
        }
        
        $this->_force = $force;
    }



    // Mutateur chargé de modifier l'attribut $_experience.
    public function setExperience($experience)
    {
        if (!is_int($experience)) // S'il ne s'agit pas d'un nombre entier.
        {
            trigger_error('L\'expérience d\'un personnage doit être un nombre entier', E_USER_WARNING);
            return;
        }
        
        if ($experience > 100) // On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
        {
            trigger_error('L\'expérience d\'un personnage ne peut dépasser 100', E_USER_WARNING);
            return;
        }
        
        $this->_experience = $experience;
    }



    // Mutateur chargé de modifier l'attribut $_degats.
    public function setDegats($degats)
    {
        if (!is_int($degats)) // S'il ne s'agit pas d'un nombre entier.
    {
        trigger_error('Le niveau de dégâts d\'un personnage doit être un nombre entier', E_USER_WARNING);
        return;
    }

$this->_degats = $degats;
  }



    


    public function frapper(Personnage $persoAFrapper) // Une méthode qui frappera un personnage (suivant la force qu'il a).
    {
        $persoAFrapper->_degats += $this->_force;
    }
      
    

    public function gagnerExperience() // Une méthode augmentant l'attribut $experience du personnage.
    {
        // On ajoute 1 à notre attribut $_experience idem que +=.
        $this->_experience++;
    }
   


    // Nous déclarons une méthode dont le seul but est d'afficher un texte.
    public function parler()
    {
        echo 'Je suis un personnage !' . '<br />';
    }



    
}
