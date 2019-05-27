<?php ob_start() ?>
	<h3> Liste Utilisateurs</h3>
	<div>
		<table>
			<tr>
				<th scope="col">id</th>
				<th scope="col">Pseudo</th>
				<th scope="col">Nom</th>
				<th scope="col">Prénom</th>
				<th scope="col">E-mail</th>
				<th scope="col">Adresse</th>
				<th scope="col">Rôle</th>
				<?php
					if($_SESSION['role']==1){
						echo "<th scope=\"col\">Changer rôle</th>";
						echo "<th scope=\"col\">Supprimer utlisateur</th>";
					}
				?>
			</tr>
			<?php foreach($users as $user):?>
			<tr>
				<td><?=$user->getId_user();?></td>
				<td><?=$user->getLogin();?></td>
				<td><?=$user->getName();?></td>
				<td><?=$user->getSurname();?></td>
				<td><?=$user->getMail();?></td>
				<td><?=$user->getAdress();?></td>
				<td><?=$user->getRole_Name();?></td>
				<?php
					if($_SESSION['role']==1){
						echo "<td> à faire</td>";
						echo "<td> à faire</td>";
					}
				?>
			</tr>
			<?php endforeach ?>
		</table>
	</div>
<?php
	$title = 'BookWorld - Gestion des utilisateurs';
	$content = ob_get_clean();
	include 'includes/layout.php';
?>