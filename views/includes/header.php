<div class="fixed-top">
	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #932727;">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="welcome">Accueil</a>
			</li>
			<li class="nav-item">
				<a href="listing" class="nav-link">Livres</a>
			</li>
			<?php
				if(!empty($_SESSION['login'])){
					echo"<li class=\"nav-item\"><a href=\"profile\" class=\"nav-link\">Profil</a></li>";
					if($_SESSION['role']!=3){
						echo"<li class=\"nav-item\"><a href=\"management\" class=\"nav-link\">Management</a></li>";
				
					}
				}
			?>
		</ul>
		<?php       
			if(empty($_SESSION['login'])){
				echo "<a href=\"login\"> <button type=\"button\" class=\"btn btn-success\">Connexion</button> </a>";
				echo "<a href=\"signin\"> <button type=\"button\" class=\"btn btn-info\">Inscription</button> </a>";
			}
			else 
			{
				
				echo "<a href=\"cart\"> <button type=\"button\" class=\"btn btn-warning\">Mon panier</button> </a>";
				echo "<a href=\"logout\"> <button type=\"button\" class=\"btn btn-dark\">Déconnexion</button> </a>";
			}
		?>
	</nav>
<div>