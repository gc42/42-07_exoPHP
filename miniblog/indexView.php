<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Super Blog</title>
	<link rel="stylesheet" type="text/css" href="blog.css">

</head>
<body>
	<h1>Mon super blog !</h1>
	<p>Derniers billets du blog :</p>

<!-- Display all posts -->
	<?php
	while ($data = $req->fetch())
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
				
				<!-- link to comments -->
				<br />
				<a href="comments.php?postId=<?php echo $data['id']; ?>">Voir les commentaires</a>
			</p>
		</div>
	
	<?php
	}
	?>

</body>
</html>