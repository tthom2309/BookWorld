<?php 
ob_start() 
?>
	<h1>Liste des commandes</h1>
	<a href="management"><button class="btn btn-info">Retour en arrière</button></a>
	<?php
		$i=0;
		foreach($orders as $order){
			$price=0;
			echo '<div class="accordion" id="orders">';
			echo '<div><div class="card-header" id="heading'.$i.'"><h2 class="mb-0">';
			$statusTMP = Order::getStatusObject($order->getStatus());
			echo '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse'.$i.'" aria-expanded="false" aria-controls="collapse'.$i.'">Commande n°'
              .$order->getIdOrder();
			echo '</h2></div>';
			echo '<div id="collapse'.$i.'" class="collapse" aria-labelledby="heading'.$i.'" data-parent="#orders"><div class="card-body">';
			$userTMP=user::getUserById($order->getUser());
			echo 'Client : '.$userTMP->getName().' '.$userTMP->getSurname().'<br>';
			echo 'Statut de la commande: '.$statusTMP[0];
			echo '<table class="table table-bordered">';
			echo '<tr><td colspan="3">Liste des articles:</td></tr>';
			echo '<tr><td>Articles</td><td>Quantité</td><td>Prix</td>';
			$bookordersTMP = bookorder::getAll();
		
			foreach($bookordersTMP as $bookorder){
				if($order->getIdOrder()==$bookorder->getNumOrder()){
					echo '<tr><td>'.$bookorder->getBookName().'</td><td>'.$bookorder->getQuantity().'</td><td>'.$bookorder->getPrice().'€</td></tr>';
					$price += ($bookorder->getQuantity()*$bookorder->getPrice());
				}
			}
			echo '<tr><td clospan="2">Total</td><td>'.$price.'€</td></tr>';
			echo '</table></div></div></div></div>';	
			$i++;
		}
	?>
<?php
	$title = 'BookWorld - Gestion des commandes';
	$content = ob_get_clean();
	include 'includes/layout.php';
?>