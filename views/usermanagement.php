<?php ob_start() ?>
	<h3> Liste Utilisateurs</h3>
	<a href="management"><button class="btn btn-info">Retour en arrière</button></a>
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
						if($user->getId_user()==1){
							echo "<td> - </td>";
							echo "<td> - </td>";
						}
						else
						{
							if(($user->getRole()==1)){
								echo "<td> - </td>";
							}
							elseif($user->getRole()==2){
								echo '<td><a href="updateToAdmin?id_user='.$user->getId_user().'"><button class="btn btn-info">Passer en admin</button></a></td>';
							}
							else
							{
								echo '<td><a href="updateToWorker?id_user='.$user->getId_user().'"><button class="btn btn-info">Passer en worker</button></a>';
								echo '<a href="updateToAdmin?id_user='.$user->getId_user().'"><button class="btn btn-info">Passer en admin</button></a></td>';
							}	
							echo '<td><a href="deleteUser?id_user='.$user->getId_user().'"><button class="btn btn-danger">Supprimer</button></a></td>';
						}
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