<?php
namespace Guillaume\miniBlog\Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'toto',
            array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));

        return $db;
        // Traitement des erreurs inutile car repris par throw/try dans le rooter
    }

}