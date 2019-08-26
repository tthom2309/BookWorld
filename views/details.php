<?php ob_start() ?>
	<div>
		<div class="row">
			<table class="table table-sm">
				<tr>
					<td>Titre: </td><td><?=$book->getLabel();?></td>
				</tr>
				<tr>
					<td>Auteur: </td><td><?=$book->getAuthor_Name();?></td>
				</tr>
				<tr>
					<td>Categorie: </td><td><?=$book->getCategory_Label();?></td>
				</tr>
				<tr>
					<td>Prix: </td><td><?=$book->getPrice();?>€</td>
				</tr>
				<tr>
					<td>Editeur: </td><td><?=$book->getPublisher_Name();?></td>
				</tr>
				<tr>
					<td>Isbn: </td><td><?=$book->getIsbn();?></td>
				</tr>
			</table>
			<?php
				if($book->getQuantity_Available()!=0 and !empty($_SESSION['login'])){
					echo '<a href="addCart?isbn='.$book->getIsbn().'"><button class="btn btn-warning">Ajouter au panier</button></a>';
					
				}
				else
				{
					
				}
			?>
		</div>	
	</div>
<?php
	$title = 'BookWorld - '.$book->getLabel();
	$content = ob_get_clean();
	include 'includes/layout.php';
?>