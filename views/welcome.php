<?php ob_start() ?>
	
	<h1>Welcome</h1>
	
	<?php
		 /*echo 'a<br>';
		//$db = getDB();
		$db = new PDO('mysql:host=localhost;dbname=projetWeb;charset=utf8','root','');
		$db->prepare('SELECT * FROM `user`');
		$reponse = $db->prepare('SELECT * FROM `category`;');
		 $reponse->fetch(PDO::FETCH_NUM);
		 echo 'a<br>';
		
		
		foreach($reponse as $donnees )
{
    echo $reponse['id_category'];
    echo 'a<br>';
    echo $reponse['name_cat'];
    echo '<br>';
   
}
//echo $reponse;
$reponse->closeCursor();
 echo 'a<br>';*/
 
 
 
 

    $bdd = getDB();

$reponse = $bdd->query('SELECT * FROM USER');
//reponse est un objet PDOStatement (voir doc)
while ($donnees = $reponse->fetch())
{
    echo $donnees['id_user'];
    echo '<br>';
    echo $donnees['login'];
    echo '<br>';
    echo $donnees['password'];
	echo '<br>';
	echo $donnees['mail'];
	echo '<br>';
	
}
$reponse->closeCursor();
	
 
	//$_SESSION['login']="Test";
	echo $_SESSION['login'];
	
	
	$res = password_hash('test',PASSWORD_DEFAULT);
	echo $res;
	?>

<?php
	$title = 'BookWorld - Accueil';
	$content = ob_get_clean();
	include 'includes/layout.php';
?>