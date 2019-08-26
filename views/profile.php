<?php ob_start() ?>

	<h2 class="text-center">Mes infos</h2>
	<div id="profileinfo">
	<?php
		echo 'Nom : '.$userSESS->getName().'<br />';
		echo 'Prénom : '.$userSESS->getSurname().'<br />';
		echo 'Adresse : '.$userSESS->getAdress().'<br />';
		echo 'E-mail : '.$userSESS->getMail().'<br /><br/>';
		echo '<a href="updateuser"><button class="btn btn-success">Editer mes infos</button></a>'; 
		echo '<br /><a href="orderuser"><button class="btn btn-info">Consulter mes commandes</button></a>'; 
	?>
	</div>
<?php
	$title = 'BookWorld - Mon profil';
	$content = ob_get_clean();
	include 'includes/layout.php';
?>