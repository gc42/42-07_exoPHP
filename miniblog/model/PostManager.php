<?php
namespace Guillaume\miniBlog\Model;

require_once('model/Manager.php');

class PostManager extends Manager
{
     /**
     * Select all posts in database
     */
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




    /**
     * Select the current post in database
     */
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        
        // Find the selected post
        $req = $db->prepare('SELECT title, content, DATE_FORMAT(creation_date, "%d/%b/%Y à %Hh%i et %s\'\'")  AS creation_date_fr FROM blog_posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch(); // Because only one result
        
        return $post;
    }






    /**
     * Insert new post in the database
     * 
     * @param string $author  The author of the new post.
     * @param string $title   The title of new post.
     * @param string $content The content of the new post.
     */
    public function addPost($author, $title, $content)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO blog_posts (author, title, content, creation_date) VALUES(:new_author, :new_title, :new_content, NOW())');
        $affectedLines = $comments->execute(array(
            'new_author'  => $author,
            'new_title'   => $title,
            'new_content' => $content,
        ));
        
        return $affectedLines;
    }







    /**
     * Delete all related comments of the selected post in the database
     * 
     * @param string $postId The Id of the post you want to delete all comments.
     */
    public function delAllPostComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('DELETE FROM blog_comments WHERE id_post = :postId');
        $affectedLines = $comments->execute(array(
            'postId' => $postId,
        ));
        
        return $affectedLines;
    }




    /**
     * Delete the current post in database
     * 
     * @param string $postId The Id of the post you want to delete.
     */
    public function delPost($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('DELETE FROM blog_posts WHERE id = :postId');
        $affectedLines = $comments->execute(array(
            'postId' => $postId,
        ));
        
        return $affectedLines;
    }
   

}