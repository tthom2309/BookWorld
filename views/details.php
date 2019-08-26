<?php ob_start() ?>
	<h1>Détails</h1>
	<div id="container-details">
		<div id="left">
			<img class="details" src="<?=$book->getImage();?>" />
		</div>
		<div id="right">
			<div id="container-infos">
				<h3>Titre:<?=$book->getLabel();?></h3>
				<h3>Auteur: <?=$book->getAuthor_Name();?></h3>
				<h3>Categorie: <?=$book->getCategory_Label();?></h3>
				<h3>Prix:<?=$book->getPrice();?>€</h3>
				<h3>Editeur: <?=$book->getPublisher_Name();?></h3>
				<h3>Isbn: <?=$book->getIsbn();?></h3>
			</div>
		<div id="container-buttons">
		<?php
				if(!empty($_SESSION['login'])){
					if($book->getQuantity_Available()!=0){
						
						echo '<a href="addCart?isbn='.$book->getIsbn().'"><button class="btn btn-warning">Ajouter au panier</button></a>';
								
					}
					else
					{
						echo '<a href=""><button class="btn btn-warning" disabled>Rupture de stock</button></a>';
					}
				}
				echo '<a href="listing"><button class="btn btn-info">Retour en arrière</button></a>';
			?>	
		</div>
		</div>
		
	</div>
	<div id="synopsis">
	<h3>Synopsis</h3>
	<hr>
			<?=$book->getSynopsis();?>
	</div>
	<br />	
	
<?php
	$title = 'BookWorld - '.$book->getLabel();
	$content = ob_get_clean();
	include 'includes/layout.php';
?>