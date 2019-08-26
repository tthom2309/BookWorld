<?php ob_start() ?>
	<div>
		<div id="left">
			<img class="details" src="<?=$book->getImage();?>" />
		</div>
		<div id="right">
			
				<h3>Titre:<?=$book->getLabel();?></h3>
				<h3>Auteur: <?=$book->getAuthor_Name();?></h3>
				<h3>Categorie: <?=$book->getCategory_Label();?></h3>
				<h3>Prix:<?=$book->getPrice();?>€</h3>
				<h3>Editeur: <?=$book->getPublisher_Name();?></h3>
				<h3>Isbn: <?=$book->getIsbn();?></h3>

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