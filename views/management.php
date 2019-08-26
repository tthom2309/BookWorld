<?php ob_start() ?>
	<h1 class="text-center">Management</h1>
	<div>
		<a href="usermanagement" class="btn btn-info btn-lg btn-block active" role="button" aria-pressed="true">Utilisateurs</a>
		<a href="ordermanagement" class="btn btn-info btn-lg btn-block active" role="button" aria-pressed="true">Commandes</a>
		<a href="bookmanagement" class="btn btn-info btn-lg btn-block active" role="button" aria-pressed="true">Produits</a>
		<a href="stats" class="btn btn-info btn-lg btn-block active" role="button" aria-pressed="true">Statistiques</a>
		
	</div>	
<?php
	$title = 'BookWorld - Management';
	$content = ob_get_clean();
	include 'includes/layout.php';
?>