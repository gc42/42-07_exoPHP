<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Page HTML test</title>
    </head>
    <body>
        <h2>Page de test</h2>
        
        <p>
            Cette page contient <strong>uniquement</strong> du code HTML.<br />
            Voici quelques petits tests :
        </p>
        
        <ul>
        <li style="color: blue;">Texte en bleu</li>
        <li style="color: red;">Texte en rouge</li>
        <li style="color: green;">Texte en vert</li>
        </ul>

        <p>
        <?php echo "Ceci est du texte en PHP"; ?>
        </p>
        <p>Aujourd'hui nous sommes le <?php echo date('d/m/Y h:i:s'); ?>.</p>

        <?php
        $age_du_visiteur = 17;
        $age_du_visiteur = 27;
        $age_du_visiteur = 55;
        $nom_visiteur = "Mon \"nom\" est Zozo";
        $lieu_naissance = 'Pays d\'Oth';

        echo $age_du_visiteur;
        echo $nom_visiteur;
        echo $lieu_naissance;

        echo "Le visiteur a $age_du_visiteur, et s'appelle $nom_visiteur <br />";
        echo 'Le visiteur a ' . $age_du_visiteur . 'ans<br />';

        $nombre = 2 + 4; // $nombre prend la valeur 6
        echo 'j\'attends ' . $nombre . '<br />';
        $nombre = 5 - 1; // $nombre prend la valeur 4
        echo 'j\'attends ' . $nombre . '<br />';
        $nombre = 3 * 5; // $nombre prend la valeur 15
        echo 'j\'attends ' . $nombre . '<br />';
        $nombre = 10 / 2; // $nombre prend la valeur 5
        echo 'j\'attends ' . $nombre . '<br />';

        // Allez on rajoute un peu de difficulté
        $nombre = 3 * 5 + 1; // $nombre prend la valeur 16
        echo 'j\'attends ' . $nombre . '<br />';
        $nombre = (1 + 2) * 2; // $nombre prend la valeur 6
        echo 'j\'attends ' . $nombre . '<br />';
        ?>

        <?php
        $age = 8;
        $autorisation_entrer = NULL;

        if ($age <= 20)
        {
            echo "Salut petit !<br />";
            $autorisation_entrer = true;
        }
        else
        {
            echo "Site pour les novices, pas pour les vieux comme toi<br />";
            $autorisation_entrer = false;
        }

        if ($autorisation_entrer == true)
        {
            echo "Vous avez l'autorisation d'entrer.<br />";
        }
        elseif ($autorisation_entrer == false)
        {
            echo "Degage !<br />";
        }

        ?>

        <?php
        // Creer un arrey
        $prenom = array ('Francois', 'Michel', 'Nicole', 'Véronique', 'Benoît');
        ?>

        <?php
        echo $prenom[1];
        ?>

        <?php
        $coords = array (
            'prenom' => 'Francois',
            'nom' => 'CARON',
            'adresse' => '3 rue des vagues',
            'ville' => 'Pez');

            echo $coords['ville'];

            $n = 0;
            while ($n < 5)
            {
                echo $prenom[$n++] . '<br />';
            }
        ?>
        <br />
        <?php
        foreach ($prenom as $key) {
            echo $key . '<br />';
        }?>
        <br />
        <?php
        foreach ($coords as $turkey => $element) {
            echo $turkey . ' : ';
            echo $element . '<br />';
        }
        ?>

        <?php
        echo '<pre>';
        print_r($coords);
        echo '<pre>';
        ?>

        <?php
        if (array_key_exists('nom', $coords)) {
            echo 'La clé "nom" se trouve dans les coordonnées<br />';
        }
        if (array_key_exists('pays', $coords)) {
            echo 'La clé "pays" se trouve dans les coordonnées';
        }
        else {
            echo 'Pas de "pays" dans les coordonnees<br />';
        }

        $fruits = array ('Banane', 'Pomme', 'Poire', 'Cerise', 'Fraise', 'Framboise');

        if (in_array('Myrtille', $fruits))
        {
            echo 'La valeur "Myrtille" se trouve dans les fruits !';
        }
        else {
            echo 'Pas de Myrtille';
        }

        if (in_array('Cerise', $fruits))
        {
            echo 'La valeur "Cerise" se trouve dans les fruits !<br />';
        }
        else {
            echo 'Pas de Cerise <br />';
        }

        $position = array_search('Fraise', $fruits);
        echo '"Fraise" se trouve en position ' . $position . '<br />';

        $position = array_search('Cerise', $fruits);
        echo '"Cerise" se trouve en position ' . $position . '<br />';

        ?>
        Toto<br />

        <?php
        function DireBonjour($nom)
        {
            echo 'Bonjour ' . $nom . ' !<br />';
        }

        DireBonjour('Marie');
        DireBonjour('Patrice');
        DireBonjour('Edouard');
        DireBonjour('Pascale');
        DireBonjour('François');
        DireBonjour('Benoît');
        DireBonjour('Père Noël');
        ?>

        <?php
        function VolCone($rayon, $hauteur) {
            $volume = $rayon * $rayon * $hauteur * 3.14 * (1/3);
            return $volume;
        }

        $volume = VolCone(3, 1);
        echo '<br />';
        echo 'Volume d\'un cone de rayon 3 et hauteur 1 :' . $volume . 'm3';
        
        ?>














    </body>
</html>