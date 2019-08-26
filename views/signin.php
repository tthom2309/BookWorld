<?php ob_start() ?>
	

	<form action="addUser" method="post">
		<fieldset>
            <legend>Inscrivez-vous</legend>
				<div class="form-row">
					<div class="col-md-4 mb-3">
						<label for="login">Pseudo</label>
						<input type="text" class="form-control" id="login" name="login"  required>
						
					</div>
					<div class="col-md-4 mb-3">
						<label for="password">Mot de passe</label>
						<input type="password" class="form-control" id="password" name="password"   required>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-4 mb-3">
						<label for="surname">Prénom</label>
						<input type="text" class="form-control" id="surname" name="surname"  required>
						
					</div>
					<div class="col-md-4 mb-3">
						<label for="name">Nom</label>
						<input type="text" class="form-control" id="name" name="name"   required>
					</div>
				</div>
				
				<div class="form-row">
					<label><h5>Adresse</h5></label>
				</div>
				<div class="form-row">				
					<div class="col-md-4 mb-3">
						<label for="street">Rue</label>
						<input type="text" class="form-control" id="street" name="street"  required>
						
					</div>
					<div class="col-md-4 mb-3">
						<label for="numberS">Numéro</label>
						<input type="text" class="form-control" id="numberS" name="numberS"   required>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-4 mb-3">
						<label for="postalcode">Code postal</label>
						<input type="text" class="form-control" id="postalcode" name="postalcode"  required>
						
					</div>
					<div class="col-md-4 mb-3">
						<label for="city">Ville</label>
						<input type="text" class="form-control" id="city" name="city"   required>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-4 mb-3">
						<label for="email">Adresse mail</label>
						<input type="text" class="form-control" id="email" name="email"  required>
						
					</div>
				</div>
				<div class="col-3">
					<button type="submit" class="btn btn-success">Inscription</button>
				</div>
	  </fieldset>
  </form>
</div>

<?php
	$title = 'BookWorld - Inscription';
	$content = ob_get_clean();
	include 'includes/layout.php';
?>