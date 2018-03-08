<?php $title = 'Super Blog'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php?listPosts">Retour vers les news</a></p>



<!-- DISPLAY SELECTED POST -->
<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']); ?>
        <i>&nbsp;&nbsp;&nbsp;
            le <?= $post['creation_date_fr']; ?>
        </i>
    </h3>
    <p>
        <?= htmlspecialchars($post['content']); ?>
    </p>
</div>
	
	


<!-- DISPLAY COMMENTS RELATED WITH SELECTED POST -->
<h2>Commentaires</h2>

<?php
while ($data = $comments->fetch())
{
?>

    <div class="commentaires">
        <p>
            <span class="who">
                <i>
                    <strong>
                        <?= htmlspecialchars($data['author']); ?>
                    </strong>
                    <small>le 
                        <?= $data['comment_date_fr']; ?>
                    </small>
                    ( <a href="index.php?action=edit&amp;id_comment=<?= $data['id_comment']; ?>&amp;id=<?= $_GET['id'] ?>">Modifier</a> )
                    ( <a href="index.php?action=deleteComment&amp;id_comment=<?= $data['id_comment']; ?>&amp;id=<?= $_GET['id'] ?>">Supprimer</a> )
                </i>
            </span><br />
            
            <?= nl2br(htmlspecialchars($data['comment'])); ?>
        </p>
    </div>

<?php
}
?>
<?php $content = ob_get_clean(); ?>




<!-- DISPLAY FORM FOR NEW COMMENT -->
<?php ob_start(); ?>
<fieldset>
	<legend><i>Pour ajouter un commentaire, replissez les champs puis validez:</i></legend>
    <pre> <?= print_r($_GET); ?> </pre>
    <pre> <?= print_r($_POST); ?> </pre>
    <pre> <?= print_r($data); ?> </pre>
    <form action="index.php?action=addComment&amp;id=<?= $_GET['id'] ?>"
        method="post">
        <div>
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author" />
        </div>
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment"></textarea>
        </div>
        <div>
            <input type="hidden" name="oldAction" value="<?= $_GET['action'] ?>">
            <input type="submit" value="Envoyer" />
        </div>
    </form>
</fieldset>

<?php $form_newComment = ob_get_clean(); ?>




<!-- DISPLAY FORM TO MODIFY A COMMENT -->
<?php ob_start(); ?>
<fieldset>
	<legend><i>Pour modifier ce commentaire, faites vos modifications puis cliquez sur 'Modofier':</i></legend>
    <pre>GET: <?= print_r($_GET); ?> </pre>
    <pre>POST: <?= print_r($_POST); ?> </pre>
    <pre>data: <?= print_r($data); ?> </pre>

    <form action="index.php?action=updateComment&amp;id_comment=<?= $_GET['id_comment'] ?>&amp;id=<?= $_GET['id'] ?>"
        method="post">
        <div>
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author" value="toto" disabled="disabled" />
        </div>
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment">TaTa</textarea>
        </div>
        <div>
            <input type="hidden" name="oldAction" value="<?= $_GET['action'] ?>">
            <input type="submit" value="Modifier" />
        </div>
    </form>
</fieldset>

<?php $form_updateComment = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>