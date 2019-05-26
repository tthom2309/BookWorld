<?php ob_start() ?>
	<form method="post">
        <fieldset>
            <legend>Identifiez-vous</legend>
			<div class="form-group">
				<label for="login">Nom d'utilisateur</label>
				<input type="text" class="form-control" id="login" name="login" aria-describedby="loginHelp" placeholder="Entrez votre nom d'utilisateur" >
       
			</div>
			<div class="form-group">
				<label for="password">Mot de passe</label>
				<input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" >
			</div>
			<small id="loginHelp" class="form-text text-muted">Ne jamais divulguer votre nom d'utilisateur et/ou votre mot de de passe.</small>
			<button type="submit" class="btn btn-primary">Se connecter</button>
        </fieldset>
    </form>
<?php
	$title = 'BookWorld - Connexion';
	$content = ob_get_clean();
	include 'includes/layout.php';
?>