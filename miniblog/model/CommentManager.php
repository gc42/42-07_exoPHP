<?php
namespace Guillaume\miniBlog\Model;

require_once('model/Manager.php');

class CommentManager extends Manager
{
    /**
     * Select comments related by selected post
     * 
     * @param int $postId The Id of selected post
     */
    public function getComments($postId)
    {
        $db = $this->dbConnect();
    
        // Find related comments
        $comments = $db->prepare('SELECT
        id AS id_comment,
        author,
        comment,
        DATE_FORMAT(comment_date, "%d/%b/%Y à %Hh%i et %s\'\'")  AS comment_date_fr
        FROM blog_comments
        WHERE id_post = ?
        ORDER BY comment_date
        LIMIT 0, 10
        ');
        $comments->execute(array($postId));
        
        return $comments;
    }




    /**
     * Select edited comment
     * 
     * @param int $postId The Id of selected post
     */
    public function getComment($id_comment)
    {
        $db = $this->dbConnect();
    
        // Find related comments
        $editedComment = $db->prepare('SELECT
        id AS id_comment,
        author,
        comment
        FROM blog_comments
        WHERE id = ?
        ');
        $editedComment->execute(array($id_comment));
        $editedComment = $editedComment->fetch();
        
        return $editedComment;
    }
    
    
    
    /**
     * Insert new comments in the database
     * 
     * @param int    $postId  The Id of selected post.
     * @param string $author  The author of the new comment.
     * @param string $comment The text of the new comment.
     */
    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO blog_comments (id_post, author, comment, comment_date)
                                  VALUES(:new_id, :new_author, :new_comment, NOW())');
        $affectedLines = $comments->execute(array(
            'new_id'      => $postId,
            'new_author'  => $author,
            'new_comment' => $comment,
        ));
        
        return $affectedLines;
    }



    /**
     * Update modified comment in the database
     * 
     * @param string $id_comment The Id of the current comment.
     * @param string $comment    The new text of the current comment.
     */
    
    
    public function updateComment($id_comment, $comment)
    {
        $db = $this->dbConnect();
        $modifiedcomment = $db->prepare('UPDATE blog_comments SET
                                comment = :modif_comment,
                                comment_date = NOW()
                                WHERE id = :id_comment
                                ');
        
        $modifiedcomment->bindParam('modif_comment', $comment,  PDO::PARAM_STR); // string
        $modifiedcomment->bindParam('id_comment', $id_comment,  PDO::PARAM_INT); // entier

        $affectedLines = $modifiedcomment->execute();
       
        return $affectedLines;
    }
    



    /**
     * Delete selected comment in the database
     * 
     * @param string $id_comment The Id of the comment you want to delete.
     */
    
    public function delComment($id_comment)
    {
        $db = $this->dbConnect();
        $deletedcomment = $db->prepare('DELETE FROM blog_comments WHERE id = :id_comment');
        
        $affectedLines = $deletedcomment->execute(array(
            'id_comment' => $id_comment,
        ));
        
        return $affectedLines;
    }
}    

