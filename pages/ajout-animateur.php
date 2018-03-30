<?php

$error=[];
$envoyer_form = false;

//Vérification inputs utilisateur
if(isset($_POST['enregistrer_fiche_animateur'])){

	$data = validerAnimateur($_POST, false);
	if(in_array(false, $data)){
		$error = getMessagesErreurs($data);
	}

	//Envoi ou pas des données
	if (!$error){
		$envoyer_form = true;
	}
}

if(!$envoyer_form){
	//les erreurs dans le corps du formulaire
	
?>


<div class="row row_main__admin">
	
	<!--colonnes laterales pour centrer le contenu-->
	<div class="col-lg-1"></div>

	<!--contenu central / fiche ajout-->
	<div class="col-lg-10">
		<h2 class= "jumbotron jumbotron__h2__admin">Ajouter un(e) animateur(trice)</h2>

	<!--Espace pour message erreur gral.-->
		<div class="form-group">
			<div class="col-md-10 col-md-offset-2">
				<?php
				//Message d'erreur de base, les autres s'affichent sous les champs du formulaire
				if((isset($error) && count($error) > 0)){
					echo '<div class="alert-danger">Oups! Besoin de quelques corrections:</div>';
				}
				?>
			</div>
		</div>

		<form method="post" action="">
<div class="form-row">
				<div class="form-group col-md-6">
					<legend>Nom</legend>
					<input required type="text" class="form-control" name="nom_personne" placeholder="Nom" value="<?php echo (isset($_POST['nom_personne'])) ? $_POST['nom_personne'] : '';?>">
					<small class="alert alert-danger alert--cachee"><?php echo (!empty($error['nom_personne'])) ? $error['nom_personne'] : ''; ?></small>
				</div>
				<div class="form-group col-md-6">
					<legend>Prénom</legend>
					<input required type="text" class="form-control" name="prenom_personne" placeholder="Prénom" value="<?php echo (isset($_POST['prenom_personne'])) ? $_POST['prenom_personne'] : '';?>">
					<small class="alert alert-danger alert--cachee"><?php echo (!empty($error['prenom_personne'])) ? $error['prenom_personne'] : ''; ?></small>
				</div>
			</div>

	  		<div class="form-row">
				<div class="form-group col-md-2">
					<legend>Adresse</legend>
					<input required type="text" class="form-control" name="numero_adresse_personne" placeholder="Adresse" value="<?php echo (isset($_POST['numero_adresse_personne'])) ? $_POST['numero_adresse_personne'] : '';?>">
					<small class="alert alert-danger alert--cachee"><?php echo (!empty($error['numero_adresse_personne'])) ? $error['numero_adresse_personne'] : ''; ?></small>
				</div>
				<div class="form-group col-md-4">
					<legend>Rue</legend>
					<input required type="text" class="form-control" name="rue_adresse_personne" placeholder="Rue" value="<?php echo (isset($_POST['rue_adresse_personne'])) ? $_POST['rue_adresse_personne'] : '';?>">
					<small class="alert alert-danger alert--cachee"><?php echo (!empty($error['rue_adresse_personne'])) ? $error['rue_adresse_personne'] : ''; ?></small>
				</div>
				<div class="form-group col-md-2">
					<legend>Code Postal</legend>
					<input required type="text" class="form-control" name="code_postal_adresse_personne" placeholder="Code Postal" value="<?php echo (isset($_POST['code_postal_adresse_personne'])) ? $_POST['code_postal_adresse_personne'] : '';?>">
					<small class="alert alert-danger alert--cachee"><?php echo (!empty($error['code_postal_adresse_personne'])) ? $error['code_postal_adresse_personne'] : ''; ?></small>
				</div>
				<div class="form-group col-md-4">
					<legend>Ville</legend>
					<input required type="text" class="form-control" name="ville_adresse_personne" placeholder="Ville" value="<?php echo (isset($_POST['ville_adresse_personne'])) ? $_POST['ville_adresse_personne'] : '';?>">
					<small class="alert alert-danger alert--cachee"><?php echo (!empty($error['ville_adresse_personne'])) ? $error['ville_adresse_personne'] : ''; ?></small>
				</div>
		  	</div>

		  	<div class="form-row">	
				<div class="form-group col-md-6">
					<legend>Téléphone</legend>
					<input required type="tel" class="form-control" name="telephone_personne" placeholder="Téléphone" value="<?php echo (isset($_POST['telephone_personne'])) ? $_POST['telephone_personne'] : '';?>">
					<small class="alert alert-danger alert--cachee"><?php echo (!empty($error['telephone_personne'])) ? $error['telephone_personne'] : ''; ?></small>
				</div>

				<div class="form-group col-md-6">
					<legend>Courriel</legend>
					<input required type="email" class="form-control" name="courriel_personne" placeholder="Courriel" value="<?php echo (isset($_POST['courriel_personne'])) ? $_POST['courriel_personne'] : '';?>">
					<small class="alert alert-danger alert--cachee"><?php echo (!empty($error['courriel_personne'])) ? $error['courriel_personne'] : ''; ?></small>
				</div>
			</div>
		  	<div class="form-row">	
				<div class="form-group col-md-6">
					<legend>Mot de passe</legend>
					<input required type="password" class="form-control" name="mot_passe_personne" placeholder="Mot de passe" value="<?php echo (isset($_POST['mot_passe_personne'])) ? $_POST['mot_passe_personne'] : '';?>">
					<small class="alert alert-danger alert--cachee"><?php echo (!empty($error['mot_passe_personne'])) ? $error['mot_passe_personne'] : ''; ?></small>
				</div>

				<div class="form-group col-md-6">
					<legend>Confirmation du mot de passe</legend>
					<input required type="password" class="form-control" name="mot_passe_personne" placeholder="Mot de passe" value="<?php echo (isset($_POST['mot_passe_personne'])) ? $_POST['mot_passe_personne'] : '';?>">
					<small class="alert alert-danger alert--cachee"><?php echo (!empty($error['mot_passe_personne'])) ? $error['mot_passe_personne'] : ''; ?></small>
				</div>
			</div>

			<div class="form-row">	
				<div class="form-group col-md-6">
					<input type="submit" name="enregistrer_fiche_animateur" value="Ajouter" class="btn btn-secondary btn-lg btn-block btn__admin btn__admin--publier">
				</div>
				<div class="form-group col-md-3">
					<input type="reset" name="reset_fiche" value="Nettoyer" class="btn btn-secondary btn-lg btn-block btn__admin btn__admin--nettoyer">
				</div>
				<div class="form-group col-md-3">
					<a class="btn__admin--retour--a" href="index.php?action=liste-animateurs"><input type="button" value="Liste animateurs" class="btn  btn-outline-warning btn-lg btn-block btn-block btn__admin btn__admin--retour"></input></a>
				</div>
			</div>
		</form>

		<div class="col-lg-1"></div>

</div>
</main>
</div>
</div>	 

<?php
	} else {


		$insertion = insererAnimateur($bdd, $data);

		//vérifie si query ok (returns false or last_id)
		if($insertion){
			echo '<div class="col-md-12 reponse"><p>Fiche correctement enregistrée, merci.</p>
				<p><a href="index.php?action=modif-animateur&code_personne='.$insertion.'" class="alert-link">Voir la fiche</a></p>
				<p><a href="index.php?action=ajout-animateur" class="alert-link">Enregistrer une nouvel animateur</a></p></div>';
			exit;
		}else{
			echo '<div class="col-md-12 reponse"><p>Erreur lors de la requête, veuillez contacter l\'adminsitrateur de la base de données.</p><a href="?action=ajout-animateur" class="alert-link">Enregistrer une nouvel animateur</a></div>';
		}
	}
?>       

<!--js Bootstrap-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>