<div >
	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #932727;">
	<span class="navbar-brand">Bookworld</span>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
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
		</div>
		<?php       
			if(empty($_SESSION['login'])){
				echo "<a href=\"login\"> <button type=\"button\" class=\"btn btn-success\">Connexion</button> </a>";
				echo "<a href=\"signin\"> <button type=\"button\" class=\"btn btn-info\">Inscription</button> </a>";
			}
			else 
			{
				require_once('models/cart.php');
				echo "<a href=\"cart\"> <button type=\"button\" class=\"btn btn-warning\">Mon panier<span class=\"badge badge-light\">".bookinthecart()."</span></button> </a>";
				echo "<a href=\"logout\"> <button type=\"button\" class=\"btn btn-dark\">Déconnexion</button> </a>";
			}
		?>
		
	</nav>
<div>