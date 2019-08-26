<?php ob_start() ?>
	<form action="updatebook" method="post" enctype="multipart/form-data">
		<fieldset>
			<legend class="text-center">Ajouter un livre</legend>
				Numéro ISBN: <input type="text" class="form-control" id="isbn" name="isbn" value="<?php echo $book->getIsbn() ?>" readonly>
				Titre du livre: <input type="text" class="form-control" id="label" name="label" value="<?php echo $book->getLabel()?>">
				Catégorie: <select class="custom-select mr-sm-2" id="category" name="category" >
				<?php
					foreach($categories as $category){
						if($book->getCategory()==$category->getId_Category()){
							echo '<option value="'.$category->getId_Category().'" selected>'.$category->getName_cat().'</option>';
						}
						else
						{
							echo '<option value="'.$category->getId_Category().'">'.$category->getName_cat().'</option>';
						}	
					}
				?>
				</select>
				Auteur:  <select class="custom-select mr-sm-2" id="author" name="author" >
				<?php
					foreach($authors as $author){
						if($book->getAuthor()==$author->getId_Author()){
							echo '<option value="'.$author->getId_Author().'" selected>'.$author->getName().'</option>';
						}
						else
						{
							echo '<option value="'.$author->getId_Author().'">'.$author->getName().'</option>';
						}
					}
				?>
				</select>
				Editeur: <select class="custom-select mr-sm-2" id="publisher" name="publisher" >
				<?php
					foreach($publishers as $publisher){
						if($book->getPublisher()==$publisher->getId_Publisher()){
							echo '<option value="'.$publisher->getId_Publisher().'" selected>'.$publisher->getName().'</option>';
						}
						else
						{
							echo '<option value="'.$publisher->getId_Publisher().'">'.$publisher->getName().'</option>';
						}	
					}
				?>
				</select>
				Prix: <input type="text" class="form-control" id="price" name="price" value="<?php echo $book->getPrice()?>">
				Quantité: <input type="text" class="form-control" id="quantity" name="quantity" value="<?php echo $book->getQuantity_Available()?>">
				<br />
				Image: <input type="file" id="picture" name="picture" accept="image/jpeg" >
				<br />
				Synopsis: <textarea class="form-control" id="synopsis" name="synopsis" ><?php echo $book->getSynopsis()?> </textarea >
				<br />
				<button type="submit" class="btn btn-success">Mettre à jour le livre</button>
		</fieldset>
	</form>

<?php
	$title = 'BookWorld - Editer livre';
	$content = ob_get_clean();
	include 'includes/layout.php';
?>