<?php ob_start() ?>

	
<?php
	$title = 'BookWorld - Livres';
	$content = ob_get_clean();
	include 'includes/layout.php';
?>