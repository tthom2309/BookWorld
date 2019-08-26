<?php ob_start() ?>
	
	<h1>Page introuvable</h1>

<?php
	$title = 'BookWorld - Erreur';
	$content = ob_get_clean();
	include 'includes/layout.php';
?>