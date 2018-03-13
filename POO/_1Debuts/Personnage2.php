<?php
class Personnage2
{
    // LES ATTRIBUTS POUR LA BDD ################################################
    private $_id;
    private $_nom;
    private $_forcePerso;
    private $_degats;
    private $_niveau;
    private $_experience;

    // LES ATTRIBUTS STATIQUES ################################################
    private static $_texteADire = 'Je vais t\'arracher les yeux !';
    
    // LES CONSTANTES ################################################
    const FORCE_PETITE = 20;
    const FORCE_MOYENNE = 50;
    const FORCE_GRANDE = 80;


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




    // Liste des getters ################################################
    public function id()         { return $this->_id; }
    public function nom()        { return $this->_nom; }
    public function forcePerso() { return $this->_forcePerso; }
    public function degats()     { return $this->_degats; }
    public function niveau()     { return $this->_niveau; }
    public function experience() { return $this->_experience; }




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

    public function setForcePerso($forcePerso)
    {
        $forcePerso = (int) $forcePerso;
        if ($forcePerso >= 1 && $forcePerso <= 100)
        {
            $this->_forcePerso = $forcePerso;
        }
    }

    public function setDegats($degats)
    {
        $degats = (int) $degats;
        if ($degats >= 0 && $degats <= 100)
        {
            $this->_forcePerso = $degats;
        }
    }

    public function setNiveau($niveau)
    {
        $niveau = (int) $niveau;
        if ($niveau >= 0 && $niveau <= 100)
        {
            $this->_forcePerso = $niveau;
        }
    }

    public function setExperience($experience)
    {
        $experience = (int) $experience;
        if ($experience >= 0 && $experience <= 100)
        {
            $this->_forcePerso = $experience;
        }
    }




    // ACTIONS ################################################
    public function frapper(Personnage1 $persoAFrapper) // Une méthode qui frappera un personnage (suivant la force qu'il a).
    {
        $persoAFrapper->_degats += $this->_forcePerso;
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
