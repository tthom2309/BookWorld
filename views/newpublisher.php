<?php ob_start() ?>
	<form action="addpublisher" method="post" enctype="multipart/form-data">
		<fieldset>
			<legend class="text-center">Ajouter un éditeur</legend>
				Editeur: <input type="text" class="form-control" id="name" name="name" required>
				<br />
				<button type="submit" class="btn btn-success">Ajouter nouvel éditeur</button>
				<a href="bookmanagement"><button class="btn btn-info">Retour en arrière</button></a>
		</fieldset>
	</form>
	
<?php
	$title = 'BookWorld - Ajouter un éditeur';
	$content = ob_get_clean();
	include 'includes/layout.php';