<?php $title = 'Mini-blog'; ?>

<?php ob_start(); ?>
<h2>Mon super blog !</h2>
<p>Derniers billets du blog :</p>

<!-- <pre> <?= print_r($_GET); ?> </pre> -->
<!-- DISPLAY ALL POSTS -->
<?php
while ($data = $posts->fetch())
{
?>		

	<div class="news">
		<h3>
			<?= htmlspecialchars($data['title']); ?>;
			<i>&nbsp;&nbsp;&nbsp;le 
			<?= htmlspecialchars($data['creation_date_fr']); ?>;
			</i>
		</h3>
	
		<p>
			<!-- content, en respectant les \n dans le texte -->
			<?= nl2br(htmlspecialchars($data['content'])); ?>
			
			<!-- link go to comments -->
			<br />
			<a href="index.php?action=post&amp;id=<?= $data['id']; ?>">Voir les commentaires</a>
			<?php
				if ($_GET['action'] == "wantDeletePost" AND $_GET['id'] == $data['id'])
				{
				?>        
					<span class="suppr">
						( <a href="index.php?action=deletePost&amp;id=<?= $_GET['id'] ?>" style="color:red;">Confirmer suppression de cette news</a> )
					</span>
				<?php
				}
				else
				{
				?>
					( <a href="index.php?action=wantDeletePost&amp;id=<?= $data['id'] ?>">Supprimer cette news</a> )
				<?php
				}
			?>
		</p>
	</div>

<?php
}
?>
<?php $content = ob_get_clean(); ?>




<!-- DISPLAY FORM FOR NEW POST -->
<?php ob_start(); ?>
<?php
    if ($_GET['action'] == "wantNewPost")
    { ?>
        <fieldset>
            <legend><i>Pour ajouter une news, compléter les champs puis valider :</i></legend>
            <!-- <pre> <?= print_r($_GET); ?> </pre> -->
           <form action="index.php?action=addPost"
                method="post">
                <div>
                    <label for="author">Auteur</label><br />
                    <input type="text" id="author" name="author" placeholder="Indiquer votre pseudo" autofocus/>
				</div>
				<div>
                    <label for="title">Titre</label><br />
                    <input type="text" id="title" name="title" placeholder="Indiquer le titre de cette news" />
                </div>
                <div>
                    <label for="content">Texte de la news (max 255 caractères)</label><br />
                    <textarea id="content" name="content" placeholder="Rédiger votre news ici..." rows="5" cols="50" maxlengt="255"></textarea>
                </div>
                <div>
                    <input type="button" onclick="window.location.replace('index.php')" value="Annuler" /> <!-- Bouton d'annulation -->
                    <input type="submit" value="Envoyer" />
                </div>
            </form>
        </fieldset>
    <?php
    }
    else
    { ?>
        <form action="index.php?action=wantNewPost"
        method="post">
        <input type="submit" value="Ajouter une news" />
    <?php
    }
?>

<?php $form_new = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>