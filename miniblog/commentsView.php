<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Super Blog</title>
	<link rel="stylesheet" type="text/css" href="blog.css">

</head>
<body>
	<h1>Mon super blog !</h1>
	<p><a href="index.php">Retour vers les news</a></p>


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
                    </i>
                </span><br />
				
				<?= nl2br(htmlspecialchars($data['comment'])); ?>
			</p>
		</div>
	
	<?php
	}
	?>
</body>
</html>