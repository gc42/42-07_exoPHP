<?php
class PersonnagesManager
{
    // LES ATTRIBUTS ################################################
    private $_db; // Instance de PDO




    // CONSTRUCTOR connect to DB on creation
    public function __construct($db)
    {
    $this->setDb($db);
    }



    // SETTER for DB
    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }





    public function add(Personnage $perso)
    {
        // Préparation de la requête d'insertion.
        // Assignation des valeurs pour le nom du personnage.
        // Exécution de la requête.
        $query = 'INSERT INTO personnages(nom, type) VALUES(:nom, :type)';
        $q = $this->_db->prepare($query);
        $q->bindValue(':nom',  $perso->getNom());
        $q->bindValue(':type', $perso->getType());
        $q->execute();

        // Hydratation du personnage passé en paramètre avec assignation de son identifiant et des dégâts initiaux (= 0).
        $perso->hydrate([
            'id' => $this->_db->lastInsertId(),
            'degats' => 0,
            'atout'  => 0,
        ]);
    }





    public function count()
    {
        // Exécute une requête COUNT() et retourne le nombre de résultats retourné.
        return $this->_db->query('SELECT COUNT(*) FROM personnages')->fetchColumn();
    }





    public function delete(Personnage $perso)
    {
        // Exécute une requête de type DELETE. Pas besoin de preparer car pas de donnees sensibles
        return $this->_db->exec('DELETE FROM personnages WHERE id = '.$perso->getId());
    }





    public function exists($info)
    {
        // On veut voir si tel personnage ayant pour id $info existe.

        // Si le paramètre est un entier, c'est qu'on a fourni un identifiant.
        // On exécute alors une requête COUNT() avec une clause WHERE, et on retourne un boolean.
        if (is_int($info))
        {
            return (bool) $this->_db->query('SELECT COUNT(*) FROM personnages WHERE id = '.$info)->fetchColumn();
        }

        // Sinon c'est qu'on a passé un nom.
        // Exécution d'une requête COUNT() avec une clause WHERE, et retourne un boolean.
        $q = $this->_db->prepare('SELECT COUNT(*) FROM personnages WHERE nom = :nom');
        $q->execute([':nom' => $info]);

        return (bool) $q->fetchColumn();
    }





    public function get($info)
    {
        // Si le paramètre est un entier, on veut récupérer le personnage avec son identifiant.
        // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Personnage.
        if (is_int($info))
        {
            // $info etant ici un chiffre, c'est pas une donnee sensible, donc pas de requete preparee
            $q = $this->_db->query('SELECT
                id, nom, degats, timeEndormi, type, atout
                FROM personnages
                WHERE id ='.$info);
            $perso = $q->fetch(PDO::FETCH_ASSOC);

        }
        // Sinon, on veut récupérer le personnage avec son nom.
        // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Personnage.
        else
        {
            // $info est ici un texte entre par le joueur, c'est sensible => requete preparee
            $q = $this->_db->prepare('SELECT
                id, nom, degats, timeEndormi, type, atout
                FROM personnages
                WHERE nom = :nom
                ');
            $q->execute([':nom' => $info]);
            $perso = $q->fetch(PDO::FETCH_ASSOC);
        }

        switch ($perso['type'])
        {
            case 'guerrier': return new Guerrier($perso);
            case 'magicien': return new Magicien($perso);
            default: return null;
        }
    }





    public function getList($nom)
    {
        // Retourne la liste des personnages dont le nom n'est pas $nom.
        // Le résultat sera un tableau d'instances de Personnage.
        $persos = [];

        $q = $this->_db->prepare('SELECT
            id, nom, degats, timeEndormi, atout, type
            FROM personnages
            WHERE nom <> :nom
            ORDER BY nom
            ');
        $q->execute([':nom' => $nom]);
        
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            switch ($donnees['type'])
            {
                case 'guerrier': $persos[] = new Guerrier($donnees); break;
                case 'magicien': $persos[] = new Magicien($donnees); break;
            }
        }
        // echo '<pre>$manager getList: '; print_r($manager); echo '</pre>';
        return $persos;
    }





    public function update(Personnage $perso)
    {
        // Prépare une requête de type UPDATE.
        $q = $this->_db->prepare('UPDATE personnages
            SET
            degats      = :degats,
            timeEndormi = :timeEndormi,
            atout       = :atout
            WHERE id = :id
            ');
        
        // Assignation des valeurs à la requête.
        $q->bindValue(':degats',      $perso->getDegats(),       PDO::PARAM_INT);
        $q->bindValue(':timeEndormi', $perso->getTimeEndormi(),  PDO::PARAM_INT);
        $q->bindValue(':atout',       $perso->getAtout(),        PDO::PARAM_INT);
        $q->bindValue(':id',          $perso->getId(),           PDO::PARAM_INT);
        
        // Exécution de la requête.
        $q->execute();
    }





    
}