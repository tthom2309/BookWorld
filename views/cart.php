<?php ob_start() ?>
	<h2>Panier</h2>
<?php
	$nbBook = numberBookCart();
	if($nbBook <=0){
		echo '<h1>Votre panier est vide!</h1>';
	}
	else
	{
		echo '<table class="table table-bordered">';
		echo '<tr><td scope="col">Titre</td>';
		echo '<td scope="col">Quantité</td>';
		echo '<td scope="col">Prix</td>';
		echo '<td scope="col" class="tr-right">Action</td></tr>';
		
		for($i = 0; $i < $nbBook; $i++){
			echo '<tr><td>';
			echo $_SESSION['cart']['titleBook'][$i];
			echo '</td><td>';
			echo $_SESSION['cart']['quantity'][$i];
			echo '</td><td>';
			echo $_SESSION['cart']['price'][$i];
			echo '€</td><td>';
			echo $i;
			echo '</td></tr>';
			
		}
		echo '<tr><td colspan="2">Total</td><td>';
		echo priceCart();
		echo '€</td></tr>';
		echo '</table> ';
		echo '<a href="newOrder"><button class="btn btn-success">Valider commande</button></a>   ';
		echo '<a href="cleanCart"><button class="btn btn-danger">Vider panier</button></a>';
	}	
?>


<?php
	$title = 'BookWorld - Mon Panier';
	$content = ob_get_clean();
	include 'includes/layout.php';
?>