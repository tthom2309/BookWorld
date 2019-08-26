<?php ob_start() ?>
<h2 class="text-center">Editer mes infos</h2>
	<div id="profileinfo">
		<form action="updateinfouser" method="post">
			<fieldset>
				Nom: <input type="text" class="form-control" id="name" name="name" value="<?php echo $userSESS->getName() ?>" placeholder="name">
				Prénom: <input type="text" class="form-control" id="surname" name="surname" value="<?php echo $userSESS->getSurname() ?>" placeholder="surname">
				Adresse: <input type="text" class="form-control" id="adress" name="adress" value="<?php echo $userSESS->getAdress() ?>" placeholder="adress">
				E-mail: <input type="text" class="form-control" id="email" name="email" value="<?php echo $userSESS->getMail() ?>" placeholder="email">
				<br /><button type="submit" class="btn btn-success">Mettre à jour</button>
				<a href="profile"><button class="btn btn-info">Retour en arrière</button></a>
			</fieldset>
		</form>
	</div>
<?php
	$title = 'BookWorld - Editer mon profil';
	$content = ob_get_clean();
	include 'includes/layout.php';
?>