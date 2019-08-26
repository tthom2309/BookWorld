<?php ob_start() ?>
	
	<h3>Bienvenue sur BookWorld, site de vente en ligne de livres en tout genre.</h3>
	

<?php
	$title = 'BookWorld - Accueil';
	$content = ob_get_clean();
	include 'includes/layout.php';
?>