<?php $title = 'Mini-blog'; ?>

<?php ob_start(); ?>
<h1>Mon mini-blog !</h1>
<p class="retour"><a href="index.php">< Retour vers les news</a></p>



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
                    ( <a href="index.php?action=editComment&amp;id_comment=<?= $data['id_comment']; ?>&amp;id=<?= $_GET['id'] ?>">Modifier</a> )
                    <?php
                        if ($_GET['action'] == "wantDeleteComment" AND $_GET['id_comment'] == $data['id_comment'])
                        {
                        ?>
                        <span class="suppr">    
                            ( <a href="index.php?action=deleteComment&amp;id_comment=<?= $data['id_comment']; ?>&amp;id=<?= $_GET['id'] ?>" style="color:red;">Confirmer suppression</a> )
                        </span>
                        <?php
                        }
                        else
                        {
                        ?>
                        <span class="suppr">
                            ( <a href="index.php?action=wantDeleteComment&amp;id_comment=<?= $data['id_comment']; ?>&amp;id=<?= $_GET['id'] ?>">Supprimer</a> )
                        </span>
                        <?php
                        }
                    ?>
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
<?php
    if ($_GET['action'] == "wantNewComment")
    { ?>
        <fieldset>
            <legend><i>Pour ajouter un commentaire, compléter les champs puis valider :</i></legend>
            <!-- <pre> <?= print_r($_GET); ?> </pre> -->
            <!-- <pre> <?= print_r($_POST); ?> </pre> -->
            <!-- <pre> <?= print_r($data); ?> </pre> -->
            <form action="index.php?action=addComment&amp;id=<?= $_GET['id'] ?>"
                method="post">
                <div>
                    <label for="author">Auteur</label><br />
                    <input type="text" id="author" name="author" placeholder="Indiquer votre pseudo" autofocus/>
                </div>
                <div>
                    <label for="comment">Commentaire (max 255 caractères)</label><br />
                    <textarea id="comment" name="comment" placeholder="Rédiger votre commentaire ici..." rows="5" cols="50" maxlengt="255"></textarea>
                </div>
                <div>
                    <input type="hidden" name="oldAction" value="<?= $_GET['action'] ?>">
                    <input type="button" onclick="window.location.replace('index.php?action=post&amp;id=<?= $_GET['id'] ?>')" value="Annuler" /> <!-- Bouton d'annulation -->
                    <input type="submit" value="Envoyer" />
                </div>
            </form>
        </fieldset>
    <?php
    }
    else
    { ?>
        <form action="index.php?action=wantNewComment&amp;id=<?= $_GET['id'] ?>"
        method="post">
        <input type="submit" value="Ajouter un commentaire" />
    <?php
    }
?>

<?php $form_new = ob_get_clean(); ?>




<!-- DISPLAY FORM TO MODIFY A COMMENT -->
<?php ob_start(); ?>
<fieldset>
	<legend><i>Modifiez votre commentaire puis cliquez sur 'Modifier':</i></legend>
    <!-- <pre>GET: <?= print_r($_GET); ?> </pre> -->
    <!-- <pre>POST: <?= print_r($_POST); ?> </pre> -->
    <!-- <pre>editedComment: <?= print_r($editedComment); ?> </pre> -->

    <form action="index.php?action=updateComment&amp;id_comment=<?= $_GET['id_comment'] ?>&amp;id=<?= $_GET['id'] ?>"
        method="post">
        <div>
            <label for="author">Auteur (non modifiable)</label><br />
            <input type="text" id="author" name="author" value="<?= $editedComment['author']; ?>" style="background:lightgrey;" disabled="disabled" />
        </div>
        <div>
            <label for="comment">Commentaire à modifier (max 255 caractères)</label><br />
            <textarea id="comment" name="comment" rows="5" cols="50" maxlengt="255" autofocus><?= $editedComment['comment']; ?></textarea>
        </div>
        <div>
            <input type="hidden" name="oldAction" value="<?= $_GET['action'] ?>">
            <input type="button" onclick="window.location.replace('index.php?action=post&amp;id=<?= $_GET['id'] ?>')" value="Annuler" /> <!-- Bouton d'annulation -->
            <input type="submit" value="Modifier" />
        </div>
    </form>
</fieldset>

<?php $form_update = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>