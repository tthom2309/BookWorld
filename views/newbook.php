<?php ob_start() ?>
	<form action="addbook" method="post" enctype="multipart/form-data">
		<fieldset>
			<legend class="text-center">Ajouter un livre</legend>
				Numéro ISBN: <input type="text" class="form-control" id="isbn" name="isbn" required>
				Titre du livre: <input type="text" class="form-control" id="label" name="label" required>
				Catégorie: <select class="custom-select mr-sm-2" id="category" name="category" required>
				<?php
					foreach($categories as $category){
						echo '<option value="'.$category->getId_Category().'">'.$category->getName_cat().'</option>';
					}
				?>
				</select>
				Auteur:  <select class="custom-select mr-sm-2" id="author" name="author" required>
				<?php
					foreach($authors as $author){
						echo '<option value="'.$author->getId_Author().'">'.$author->getName().'</option>';
					}
				?>
				</select>
				Editeur: <select class="custom-select mr-sm-2" id="publisher" name="publisher" required>
				<?php
					foreach($publishers as $publisher){
						echo '<option value="'.$publisher->getId_Publisher().'">'.$publisher->getName().'</option>';
					}
				?>
				</select>
				Prix: <input type="text" class="form-control" id="price" name="price" required>
				Quantité: <input type="text" class="form-control" id="quantity" name="quantity" required>
				<br />
				Image: <input type="file" id="picture" name="picture" accept="image/jpeg" required>
				<br />
				Synopsis: <textarea class="form-control" id="synopsis" name="synopsis" > </textarea required>
				<br />
				<button type="submit" class="btn btn-success">Ajouter nouveau livre</button>
				<a href="bookmanagement"><button class="btn btn-info">Retour en arrière</button></a>
		</fieldset>
	</form>
<?php
	$title = 'BookWorld - Ajouter un livre';
	$content = ob_get_clean();
	include 'includes/layout.php';
?>