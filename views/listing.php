<?php ob_start() ?>
	
	
	<div id="wrapper">
	<?php $i=1; ?>
	<?php foreach($books as $book):?>	
	
	<?php 
		if(($i%2)!=0){
			echo "<div class=\"row \"><div class=\"col-sm-6\"> ";
		}
	?>
		
			<div class="card mb-3" style="width: 400px; height:200px;">
				<div class="row no-gutters">
					<div class="col-md-4">
						<img src="..." class="card-img" alt="...">
					</div>
					<div class="col-md-8">
						<div class="card-body">
							<h6 class="card-title"><?=$book->getLabel();?></h6>
							<br />
							<p class="card-text">Author: <?=$book->getAuthor_Name();?></p>
							<?php
								echo '<a href="details?isbn='.$book->getIsbn().'"><button class="btn btn-info">Détails</button></a>';
							?>
						</div>
					</div>
				</div>
			</div>
			</div>
	<?php 
		if(($i%2)==0){
			echo "</div>";
		}
		$i++;
	?>		
		
	<?php endforeach ?>	
	</div>
<?php
	$title = 'BookWorld - Livres';
	$content = ob_get_clean();
	include 'includes/layout.php';
?>