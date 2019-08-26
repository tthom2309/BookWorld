<?php ob_start() ?>
		

	<h2>Liste des articles</h2>
	<input class="form-control" id="searchBar" type="text" placeholder="Recherche par titre" >
	<div class="card-deck">

	<?php foreach($books as $book):?>	
			<div class="col-auto p-2" id="cardbook" data-role="cardbook">
			<div class="card h-100">
				<?php echo '<img src="'.$book->getImage().'" class="card-img-top" >';
				?>
				<div class="card-body">
					<?php echo '<h5 class="card-title">'.$book->getLabel().'</h5>';
						echo '<p class="card-text">Author: '.$book->getAuthor_Name().'</p>';
					?>
				</div>
			<div class="card-footer">
				<?php
					echo '<a href="details?isbn='.$book->getIsbn().'"><button class="btn btn-info " style="width: 95%;">Détails</button></a>';
				?>
			</div>
			</div>
			</div>
	<?php endforeach ?>	
	</div>
	
<?php
	$title = 'BookWorld - Livres';
	$content = ob_get_clean();
	include 'includes/layout.php';
?>