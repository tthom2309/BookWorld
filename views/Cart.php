<?php ob_start() ?>
	<h2>Panier</h2>

<table class="table table-sm">
  <thead>
    <tr>
		<th scope="col">Nom</th>   
		<th scope="col">Prix</th>
		<th scope="col" class="tr-right">Action</th>
    </tr>
	</thead>
	<tbody>
		<?php foreach($carts as $cart):?>
			<tr>
				<td> <?php $cart->getBookLabel();?> </td>
				<td> <?php $cart->getBookPrice();?> </td>
				<td></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table> 
<?php
	$title = 'BookWorld - Mon Panier';
	$content = ob_get_clean();
	include 'includes/layout.php';
?>