<?php 
var_dump($_GET);
var_dump($_POST);


$erreur_code = '';
$error = [];
$insertion = '';

if(isset($_POST['modif_animateur'])) {
	
	$data = validerAnimateur($_POST);
	if(in_array(false, $data)) {
		$error = getMessagesErreurs($data);
	}

	if (!$error) {
		$insertion = modifAnimateur($bdd, $_POST['code_personne']);

		if(!$insertion) {
			echo '<div class="col-md-12 reponse"><p>Erreur lors de la requête, veuillez contacter l\'adminsitrateur de la base de données.</p>
			<p><a href="index.php?action=modif-animateur&code_personne='.$_GET['code_personne'].'">Retour à la fiche de l\'animateur</a></p>
			<p><a href="index.php?action=liste-animateurs">Retour à la liste des animateurs</a></p></div>';
			exit();
		} else {
			echo '<div class="col-md-12 reponse"><p>Fiche correctement enregistrée, merci.</p>
			<p><a href="index.php?action=modif-animateur&code_personne='.$_POST['code_personne'].'">Retour à la fiche de l\'animateur</a></p>
			<p><a href="index.php?action=liste-animateurs">Retour à la liste des animateurs</a></p></div>';

			exit();
		}	
	}
}

if (isset($_GET['code_personne']) && is_numeric($_GET['code_personne'])) {
	$animateur = afficheFicheAnimateur($bdd, $_GET['code_personne']);

	if(is_null($animateur)) {
		$erreur_code = "Information erronée: impossible d'afficher la page.";
	}

}else{
	$erreur_code = "Information manquante: impossible d'afficher la page.";
}

if($erreur_code) {
	echo '<div class="col-md-12 reponse"><p>'.$erreur_code.'</p><a href="?action=liste-animateurs" class="alert-link">Veuillez réessayer, merci.</a></div>';
} else {  

?>

<!--colonnes laterales poru centrer contenu-->
<div class="col-lg-1"></div>

<div class="col-lg-10">					
	<h2 class= "jumbotron jumbotron__h2__admin">Vos activités pour la session</h2>
	<!-- fiche activité + liste participants par activite-->
	
<!--affichage RESULTATS avec titre et auteur clickables-->
<h2>Resultat de la recherche</h2>
<h5>Vous avez recherché: <?php echo $_GET['recherche']?></h5>

<table class="table table-hover table-sm">
	<!--Accessibilite-->
	<caption>Table avec resultats de la recherche</caption>
	<!--Display resultats-->
	<thead class="thead-light">
		<tr>
			<th scope="col">Code</th>
			<th scope="col">Titre</th>
			<th scope="col">Auteur</th>
			<th scope="col">Genre</th>
			<th scope="col">Editeur</th>
			<th scope="col">Publication</th>
		</tr>
	</thead>
	<tbody>
		<?php
		while($donnees = mysqli_fetch_assoc($liste)){
			echo '<tr>
				<td><a href="index.php?action=modif-activite&code_activite='.$donnees['Code'].'">'.$donnees['Titre'].'</a></td>
				<td>'.$donnees['Categorie'].'</td>
				<td><a href="index.php?action=modif-animateur&code_personne='.$donnees['Code'].'">'.$donnees['Animateur'].'</a></td>
				<td>'.$donnees['Places'].'</td>
				<td><a href="index.php?action=liste-participants&code_activite='.$donnees['Code'].'">Liste inscrits</td>
				<td>'.$donnees['Prix'].'</td>
				<td>'.$donnees['Date_debut'].'</td>
				<td>'.$donnees['Date_fin'].'</td>	
				<td>Supprimer</td>										
			</tr>';
		}
		?>
	</tbody>
</table>
</table>

<p><a href="index.php?action=listelivres">Retour à la liste de livres</a></p>

<?php
}
?>
<!--js Bootstrap-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>