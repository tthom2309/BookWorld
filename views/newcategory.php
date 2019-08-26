<?php ob_start() ?>
	<form action="addcategory" method="post" enctype="multipart/form-data">
		<fieldset>
			<legend class="text-center">Ajouter une catégorie</legend>
				Catégorie: <input type="text" class="form-control" id="name" name="name" required>
				<br />
				<button type="submit" class="btn btn-success">Ajouter nouvelle cétgorie</button>
				<a href="bookmanagement"><button class="btn btn-info">Retour en arrière</button></a>
		</fieldset>
	</form>
	
<?php
	$title = 'BookWorld - Ajouter une catégorie';
	$content = ob_get_clean();
	include 'includes/layout.php';