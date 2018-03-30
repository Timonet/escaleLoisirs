<?php 

var_dump($_GET);
var_dump($_POST);


$erreur_code = '';
$error = [];
$insertion = '';

if(isset($_POST['modif_activite'])) {
	
	$data = validerActivite($_POST);
	if(in_array(false, $data)) {
		$error = getMessagesErreurs($data);
	}

	if (!$error) {
		$insertion = modifActivite($bdd, $data);

		if(!$insertion) {
			echo '<div class="col-md-12 reponse"><p>Erreur lors de la requête, veuillez contacter l\'adminsitrateur de la base de données.</p>
			<p><a href="index.php?action=modif-activite&code_personne='.$_GET['code_personne'].'">Retour à la fiche de l\'activite</a></p>
			<p><a href="index.php?action=liste-activites">Retour à la liste des activites</a></p></div>';
			exit();
		} else {
			echo '<div class="col-md-12 reponse"><p>Fiche correctement enregistrée, merci.</p>
			<p><a href="index.php?action=modif-activite&code_personne='.$_POST['code_personne'].'">Retour à la fiche de l\'activite</a></p>
			<p><a href="index.php?action=liste-activites">Retour à la liste des activites</a></p></div>';

			exit();
		}	
	}
}

if (isset($_GET['code_activite']) && is_numeric($_GET['code_activite'])) 
	{
	$activite = afficheInfosActivite($bdd, $_GET['code_activite']);

	if(is_null($activite)) {
		$erreur_code = "Information erronée: impossible d'afficher la page.";
	}

}else{
	$erreur_code = "Information manquante: impossible d'afficher la page.";
}

if($erreur_code) {
	echo '<div class="col-md-12 reponse"><p>'.$erreur_code.'</p><a href="?action=liste-activites" class="alert-link">Veuillez réessayer, merci.</a></div>';
} else {  

?>

<div class="row row_main__admin">
	
<!--colonnes laterales pour centrer le contenu-->
<div class="col-lg-1"></div>

<div class="col-lg-10">
	<h2 class= "jumbotron jumbotron__h2__admin">Fiche activité</h2>
	<h6 class="h6__admin">*Vous pouvez modifier la fiche sur cette même page.</h6>

	<!--fiche modifiable activité-->
<form method="post" action="">	
	<input type="hidden" name="code_activite" value="<?php echo $activite['code_activite']; ?>">
					
<div class="form-row">
	<div class="form-group col-lg-6">
		<legend>Activité</legend>
		<input required type="text" class="form-control" name="nom_activite" placeholder="Nom activité" value="<?php echo (isset($_POST['nom_activite'])) ? $_POST['nom_activite'] : '';?>">
			<small class="alert alert-danger alert--cachee"><?php echo (!empty($error['nom_activite'])) ? $error['nom_activite'] : ''; ?></small>
	</div>
	<div class="form-group col-md-6">
		<legend>Categorie</legend>
			<?php
			$check_index_bouton = (!empty($_POST['enregistrer_fiche_activite'])) ? $_POST['enregistrer_fiche_activite'] : '';
			$check_index_categorie = (!empty($_POST['categorie'])) ? $_POST['categorie'] : '';
			echo getSelect($bdd, $check_index_bouton, $check_index_categorie, '0', 'categorie');
			?>
			<small class="alert alert-danger alert--cachee"><?php echo (!empty($error['categorie'])) ? $error['categorie'] : ''; ?></small>
	</div>
</div>

<div class="form-group col-md-12" id="form-group-description">
	<legend>Description</legend>
	<textarea class="form-control" rows="5" required type="text" class="form-control" name="description_activite" placeholder="Description" value="<?php echo (isset($_POST['description_activite'])) ? $_POST['description_activite'] : '';?>"></textarea>
		<small class="alert alert-danger alert--cachee"><?php echo (!empty($error['description_activite'])) ? $error['description_activite'] : ''; ?></small>

</div>

<div class="form-row">
	<div class="form-group col-md-6">
		<legend>Animateur</legend>
			<?php
			$check_index_bouton = (!empty($_POST['enregistrer_fiche_activite'])) ? $_POST['enregistrer_fiche_activite'] : '';
			$check_index_animateur = (!empty($_POST['animateur'])) ? $_POST['animateur'] : '';
			echo getSelect($bdd, $check_index_bouton, $check_index_animateur, '0', 'animateur');
			?>
			<small class="alert alert-danger alert--cachee"><?php echo (!empty($error['categorie'])) ? $error['categorie'] : ''; ?></small>
	</div>
	<div class="form-group col-md-2">
		<legend>Salle</legend>
		<input required type="text" class="form-control" name="salle_activite" placeholder="No de salle" value="<?php echo (isset($_POST['salle_activite'])) ? $_POST['salle_activite'] : '';?>">
			<small class="alert alert-danger alert--cachee"><?php echo (!empty($error['salle_activite'])) ? $error['salle_activite'] : ''; ?></small>
	</div>
    <div class="form-group col-md-2">
        <legend>Nombre de places</legend>
		<input required type="text" class="form-control" name="nb_participants_max_activite" placeholder="Nb. de places" value="<?php echo (isset($_POST['nb_participants_max_activite'])) ? $_POST['nb_participants_max_activite'] : '';?>">
			<small class="alert alert-danger alert--cachee"><?php echo (!empty($error['nb_participants_max_activite'])) ? $error['nb_participants_max_activite'] : ''; ?></small>
    </div>	
    <div class="form-group col-md-2">
		<legend>Prix</legend>
		<input required type="text" class="form-control" name="prix_activite" placeholder="Prix" value="<?php echo (isset($_POST['prix_activite'])) ? $_POST['prix_activite'] : '';?>">
			<small class="alert alert-danger alert--cachee"><?php echo (!empty($error['prix_activite'])) ? $error['prix_activite'] : ''; ?></small>
	</div>	   
</div>

<div class="form-row">	
	<div class="form-group col-md-3">
		<legend>Date debut</legend>
		<input required type="date" class="form-control" name="date_debut_activite" placeholder="aaaa-mm-jj" value="<?php echo (isset($_POST['date_debut_activite'])) ? $_POST['date_debut_activite'] : '';?>">
			<small class="alert alert-danger alert--cachee"><?php echo (!empty($error['date_debut_activite'])) ? $error['date_debut_activite'] : ''; ?></small>		
	</div>

	<div class="form-group col-md-3">
		<legend>Date fin</legend>
		<input required type="date" class="form-control" name="date_fin_activite" placeholder="aaaa-mm-jj" value="<?php echo (isset($_POST['date_fin_activite'])) ? $_POST['date_fin_activite'] : '';?>">
			<small class="alert alert-danger alert--cachee"><?php echo (!empty($error['date_fin_activite'])) ? $error['date_fin_activite'] : ''; ?></small>	
	</div>
	<div class="form-group col-md-3">
		<legend>Heure debut</legend>
		<input required type="time" class="form-control" name="heure_debut_activite" value="<?php echo (isset($_POST['heure_debut_activite'])) ? $_POST['heure_debut_activite'] : '';?>">
			<small class="alert alert-danger alert--cachee"><?php echo (!empty($error['heure_debut_activite'])) ? $error['heure_debut_activite'] : ''; ?></small>			
	</div>

	<div class="form-group col-md-3">
		<legend>Heure fin</legend>
		<input required type="time" class="form-control" name="heure_fin_activite" value="<?php echo (isset($_POST['heure_fin_activite'])) ? $_POST['heure_fin_activite'] : '';?>">
			<small class="alert alert-danger alert--cachee"><?php echo (!empty($error['heure_fin_activite'])) ? $error['heure_fin_activite'] : ''; ?></small>	
	</div>
</div>

<div class="form-row">	
	<div class="form-group col-md-6">
		<input type="submit" name="enregistrer_fiche_activite" value="Publier" class="btn btn-secondary btn-lg btn-block btn__admin btn__admin--publier">
	</div>
	<div class="form-group col-md-3">
		<input type="reset" name="reset_fiche" value="Nettoyer" class="btn btn-secondary btn-lg btn-block btn__admin btn__admin--nettoyer">
	</div>
	<div class="form-group col-md-3">
		<a href="index.php?action=liste-activites"><input type="button" value="Liste" class="btn btn-secondary btn-lg btn-block btn__admin btn__admin--nettoyer"></a>
	</div>
</div>
</form>
			
<div class="col-lg-1"></div>
</div>
</div>
</main>
</div>
</div>	       

<!--js Bootstrap-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>

<?php
}
?> 