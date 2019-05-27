<?php ob_start() ?>
	<h3> Liste des Livres</h3>
	<div>
		<table class="management">
			<tr class="management">
				<th scope="col">isbn</th>
				<th scope="col">Titre</th>
				<th scope="col">Auteur</th>
				<th scope="col">Editeur</th>
				<th scope="col">Catégorie</th>
				<th scope="col">Prix</th>
				<th scope="col">Quantité</th>
				<th scope=\"col\">Editer </th>
				<th scope=\"col\">Supprimer </th>
				
			</tr>
			<?php foreach($books as $book):?>
			<tr>
				<td><?=$book->getIsbn();?></td>
				<td><?=$book->getLabel();?></td>
				<td><?=$book->getAuthor_Name();?></td>
				<td><?=$book->getPublisher_Name();?></td>
				<td><?=$book->getCategory_Label();?></td>
				<td><?=$book->getPrice();?></td>
				<td><?=$book->getQuantity_Available();?></td>
				<td> à faire</td>
				<td> à faire</td>
			</tr>
			<?php endforeach ?>
		</table>
	</div>
<?php
	$title = 'BookWorld - Gestion des livres';
	$content = ob_get_clean();
	include 'includes/layout.php';
?>