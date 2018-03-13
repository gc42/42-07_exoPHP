<?php
class Personnage1
{
    // LES ATTRIBUTS
    private $_force;        // La force du personnage
    private $_localisation; // Le lieu dans lequel il se trouve
    private $_experience;   // Son expérience
    private $_degats;       // Ses dégâts

    // LES ATTRIBUTS STATIQUES
    private static $_texteADire = 'Je vais t\'arracher les yeux !';

    // LES CONSTANTES
    const FORCE_PETITE = 20;
    const FORCE_MOYENNE = 50;
    const FORCE_GRANDE = 80;

  
    // LES METHODES

    public function __construct($forceInitiale, $degatsInitiale) // Constructeur demandant 2 paramètres
    {
      echo 'Un nouveau personnage est cree !'; // Message s'affichant une fois que tout objet est créé.
      $this->setForce($forceInitiale);        // Initialisation de la force.
      $this->setDegats($degatsInitiale);      // Initialisation des dégâts.
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
        if(in_array($force, [self::FORCE_PETITE, self::FORCE_MOYENNE, self::FORCE_GRANDE])) // si valeur dans le tableau
        {
            $this->_force = $force;
        }
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



    


    public function frapper(Personnage1 $persoAFrapper) // Une méthode qui frappera un personnage (suivant la force qu'il a).
    {
        $persoAFrapper->_degats += $this->_force;
    }
      
    

    public function gagnerExperience() // Une méthode augmentant l'attribut $experience du personnage.
    {
        // On ajoute 1 à notre attribut $_experience idem que +=.
        $this->_experience++;
    }
   


    // Méthode STATIQUE
    public static function parler()
    {
        echo self::$_texteADire; // Reference a l'attribut statique
    }



    
}
