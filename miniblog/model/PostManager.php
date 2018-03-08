<?php
namespace Guillaume\miniBlog\Model;

require_once('model/Manager.php');

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        
        // Find the last posts
        $posts = $db->query('SELECT id, title, content,
            DATE_FORMAT(creation_date, "%d/%b/%Y à %Hh%i et %s\'\'")
            AS creation_date_fr
            FROM blog_posts
            ORDER BY creation_date DESC
            LIMIT 0, 5');
            
        return $posts;
    }





    public function getPost($postId)
    {
        $db = $this->dbConnect();
        
        // Find the selected post
        $req = $db->prepare('SELECT title, content, DATE_FORMAT(creation_date, "%d/%b/%Y à %Hh%i et %s\'\'")  AS creation_date_fr FROM blog_posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch(); // Because only one result
        
        return $post;
    }
}

