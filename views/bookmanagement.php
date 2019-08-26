<?php ob_start() ?>
	<h2 class="text-center"> Liste des Livres</h2>
	<div id="buttonbox">
		<a href="newbook"><button class="btn btn-info">Ajouter un livre</button></a>
		<a href="newauthor"><button class="btn btn-info">Ajouter un auteur</button></a>
		<a href="newpublisher"><button class="btn btn-info">Ajouter un éditeur</button></a>
		<a href="newcategory"><button class="btn btn-info">Ajouter une catégorie</button></a>
		<a href="management"><button class="btn btn-info">Retour en arrière</button></a>
	</div>
	<br />
	<div>
		<table class="table table-striped">
			<tr class="management">
				<th scope="col">isbn</th>
				<th scope="col">Titre</th>
				<th scope="col">Auteur</th>
				<th scope="col">Editeur</th>
				<th scope="col">Catégorie</th>
				<th scope="col">Prix</th>
				<th scope="col">Quantité</th>
				<th scope="col">Editer </th>
				<th scope="col">Supprimer </th>
				
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
				<td> <?php echo '<a href="modifybook?isbn='.$book->getIsbn().'"><button class="btn btn-info">Editer</button></a>';?></td>
				<td> <a href="<?php echo 'removebook?isbn='.$book->getIsbn()?>"><button type="button" class="btn btn-danger">Supprimer</button></a></li></td>
			</tr>
			<?php endforeach ?>
		</table>
	</div>
	
<?php
	$title = 'BookWorld - Gestion des livres';
	$content = ob_get_clean();
	include 'includes/layout.php';
?>