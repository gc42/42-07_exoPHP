<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h2>Mon super blog !</h2>
<p>Derniers billets du blog :</p>

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
			<?= nl2br(htmlspecialchars($data['content'])); ?>;
			
			<!-- link go to comments -->
			<br />
			<a href="index.php?action=post&amp;id=<?= $data['id']; ?>">Voir les commentaires</a>
		</p>
	</div>

<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>