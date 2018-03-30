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

<div class="row row_main__admin">
	
<!--colonnes laterales pour centrer le contenu-->
<div class="col-lg-1"></div>

<div class="col-lg-10">
<h2 class= "jumbotron jumbotron__h2__admin">Fiche animateur(trice)</h2>
<h6 class="h6__admin">*Vous pouvez modifier la fiche sur cette même page.</h6>

<!--fiche modifiable animateur(trice)-->
<form method="POST" action="">
	<input type="hidden" name="code_personne" value="<?php echo $animateur['code_personne']; ?>">

		<!--Espace pour message erreur gral. et erreur['code_personne'] dans post-->
		<div class="form-group">
			<div class="col-md-10 col-md-offset-2">
				<?php
				//Champ pour alerte erreurs, les erreurs de getMessagesErreurs s'affichent sous chaque champ du formulaire, sauf:
				if(!empty($error)){
					echo '<div class="alert-danger alert--cachee">Oups! Besoin de quelques corrections:</div>';
					$error['code_personne'] = (!empty($error['code_personne'])) ? $error['code_personne'] : '';
					echo '<div class="alert-danger alert--cachee">'.$error['code_personne'].'</div>';
				}
				?>
			</div>
		</div>

	<div class="form-row">
		<div class="form-group col-md-6">
			<legend>Nom</legend>
			<input required type="text" class="form-control" name="nom_personne" placeholder="Nom" value="<?php echo (isset($_POST['nom_personne'])) ? $_POST['nom_personne'] : $animateur['nom_personne'];?>">
			<small class="alert alert-danger alert--cachee"><?php echo (!empty($error['nom_personne'])) ? $error['nom_personne'] : ''; ?></small>
		</div>
		<div class="form-group col-md-6">
			<legend>Prénom</legend>
			<input required type="text" class="form-control" name="prenom_personne" placeholder="Prénom" value="<?php echo (isset($_POST['prenom_personne'])) ? $_POST['prenom_personne'] : $animateur['prenom_personne'];?>">
			<small class="alert alert-danger alert--cachee"><?php echo (!empty($error['prenom_personne'])) ? $error['prenom_personne'] : ''; ?></small>
		</div>
	</div>

		<div class="form-row">
		<div class="form-group col-md-2">
			<legend>Adresse</legend>
			<input required type="text" class="form-control" name="numero_adresse_personne" placeholder="Adresse" value="<?php echo (isset($_POST['numero_adresse_personne'])) ? $_POST['numero_adresse_personne'] : $animateur['numero_adresse_personne'];?>">
			<small class="alert alert-danger alert--cachee"><?php echo (!empty($error['numero_adresse_personne'])) ? $error['numero_adresse_personne'] : ''; ?></small>
		</div>
		<div class="form-group col-md-4">
			<legend>Rue</legend>
			<input required type="text" class="form-control" name="rue_adresse_personne" placeholder="Rue" value="<?php echo (isset($_POST['rue_adresse_personne'])) ? $_POST['rue_adresse_personne'] : $animateur['rue_adresse_personne'];?>">
			<small class="alert alert-danger alert--cachee"><?php echo (!empty($error['rue_adresse_personne'])) ? $error['rue_adresse_personne'] : ''; ?></small>
		</div>
		<div class="form-group col-md-2">
			<legend>Code Postal</legend>
			<input required type="text" class="form-control" name="code_postal_adresse_personne" placeholder="Code Postal" value="<?php echo (isset($_POST['code_postal_adresse_personne'])) ? $_POST['code_postal_adresse_personne'] : $animateur['code_postal_adresse_personne'];?>">
			<small class="alert alert-danger alert--cachee"><?php echo (!empty($error['code_postal_adresse_personne'])) ? $error['code_postal_adresse_personne'] : ''; ?></small>
		</div>
		<div class="form-group col-md-4">
			<legend>Ville</legend>
			<input required type="text" class="form-control" name="ville_adresse_personne" placeholder="Ville" value="<?php echo (isset($_POST['ville_adresse_personne'])) ? $_POST['ville_adresse_personne'] : $animateur['ville_adresse_personne'];?>">
			<small class="alert alert-danger alert--cachee"><?php echo (!empty($error['ville_adresse_personne'])) ? $error['ville_adresse_personne'] : ''; ?></small>
		</div>
  	</div>

  	<div class="form-row">	
		<div class="form-group col-md-6">
			<legend>Téléphone</legend>
			<input required type="tel" class="form-control" name="telephone_personne" placeholder="Téléphone" value="<?php echo (isset($_POST['telephone_personne'])) ? $_POST['telephone_personne'] : $animateur['telephone_personne'];?>">
			<small class="alert alert-danger alert--cachee"><?php echo (!empty($error['telephone_personne'])) ? $error['telephone_personne'] : ''; ?></small>
		</div>

		<div class="form-group col-md-6">
			<legend>Courriel</legend>
			<input required type="email" class="form-control" name="courriel_personne" placeholder="Courriel" value="<?php echo (isset($_POST['courriel_personne'])) ? $_POST['courriel_personne'] : $animateur['courriel_personne'];?>">
			<small class="alert alert-danger alert--cachee"><?php echo (!empty($error['courriel_personne'])) ? $error['courriel_personne'] : ''; ?></small>
		</div>
	</div>
  	<div class="form-row">	
		<div class="form-group col-md-6">
			<legend>Mot de passe</legend>
			<input required type="password" class="form-control" name="mot_passe_personne" placeholder="Mot de passe" value="<?php echo (isset($_POST['mot_passe_personne'])) ? $_POST['mot_passe_personne'] : $animateur['mot_passe_personne'];?>">
			<small class="alert alert-danger alert--cachee"><?php echo (!empty($error['mot_passe_personne'])) ? $error['mot_passe_personne'] : ''; ?></small>
		</div>

		<div class="form-group col-md-6">
			<legend>Confirmation du mot de passe</legend>
			<input required type="password" class="form-control" name="mot_passe_personne" placeholder="Mot de passe" value="<?php echo (isset($_POST['mot_passe_personne'])) ? $_POST['mot_passe_personne'] : $animateur['mot_passe_personne'];?>">
			<small class="alert alert-danger alert--cachee"><?php echo (!empty($error['mot_passe_personne'])) ? $error['mot_passe_personne'] : ''; ?></small>
		</div>
	</div>
	<div class="form-row">	
		<div class="form-group col-md-6">
			<input type="submit" name="eliminer_fiche_animateur" value="Éliminer" class="btn btn-secondary btn-lg btn-block btn__admin btn__admin--eliminer">
		</div>
		<div class="form-group col-md-6">
			<input type="submit" name="modif_animateur" value="Modifier" class="btn btn-secondary btn-lg btn-block btn__admin btn__admin--publier">
		</div>
	</div>
	<p><span class="span__admin--alerte">Attention</span>, le boutton "éliminer" efface la fiche de la base de données.</p>
</form>

<p class="p__admin--pieddepage"><a class="p__a__admin--pieddepage" href="index.php?action=liste-animateurs">Aller à la liste des animateurs(trices)</a></p>
	
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

