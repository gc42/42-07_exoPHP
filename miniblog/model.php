<?php
function dbConnect()
{
    try
    {
        // DB connexion
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'toto',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
        // If error, display message and stop all
        die('Erreur : ' . $e->getMessage());
    }
    return $db;
}




function getPosts()
{
    $db = dbConnect();
    
    // Find the last posts
    $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%b/%Y à %Hh%i et %s\'\'")  AS creation_date_fr FROM blog_posts ORDER BY creation_date DESC LIMIT 0, 5');
        
    return $req;
}





function getPost($postId)
{
    $db = dbConnect();
    
    // Find the selected post
 	$req = $db->prepare('SELECT title, content, DATE_FORMAT(creation_date, "%d/%b/%Y à %Hh%i et %s\'\'")  AS creation_date_fr FROM blog_posts WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch(); // Because only one result
    
    return $post;
}





function getComments($postId)
{
    $db = dbConnect();

    // Find related comments
    $comments = $db->prepare('SELECT author, comment, DATE_FORMAT(comment_date, "%d/%b/%Y à %Hh%i et %s\'\'")  AS comment_date_fr
    FROM blog_comments
    WHERE id_post = ?
    ORDER BY comment_date DESC
    LIMIT 0, 10
    ');
    $comments->execute(array($postId));
    
    return $comments;
}
