<?php
function dbConnect()
{
    // DB connexion
    $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'toto',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    return $db;
    // Traitement des erreurs inutile car repris par throw/try dans le rooter
}




function getPosts()
{
    $db = dbConnect();
    
    // Find the last posts
    $posts = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, "%d/%b/%Y à %Hh%i et %s\'\'")  AS creation_date_fr FROM blog_posts ORDER BY creation_date DESC LIMIT 0, 5');
        
    return $posts;
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




function postComment($postId, $author, $comment)
{
    $db = dbConnect();
    $comments = $db->prepare('INSERT INTO blog_comments (id_post, author, comment, comment_date) VALUES(:new_id, :new_author, :new_comment, NOW())');
	$affectedLines = $comments->execute(array(
        'new_id'      => $postId,
		'new_author'  => $author,
		'new_comment' => $comment,
    ));
    
    return $affectedLines;
}

