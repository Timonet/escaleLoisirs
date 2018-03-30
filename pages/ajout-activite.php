
<?php

$error=[];
$envoyer_form = false;

//Vérification inputs utilisateur
if(isset($_POST['enregistrer_fiche_activite'])){

	$data = validerActivite($_POST, false);
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
<h2 class= "jumbotron jumbotron__h2__admin">Publier une activité</h2>

<form method="post" action="">

	
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
			<a href="index.php?action=liste-activites"><input type="button" value="Liste" class="btn btn-secondary btn-lg btn-block btn__admin btn__admin--nettoyer"></input></a>
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

		$insertion = insererActivite($bdd, $data);

		//vérifie si query ok (returns false or last_id)
		if($insertion){
			echo '<div class="col-md-12 reponse"><p>Fiche correctement enregistrée, merci.</p>
				<p><a href="index.php?action=modif-activite&code_activite='.$insertion.'" class="alert-link">Voir la fiche de l\'activité</a></p>
				<p><a href="index.php?action=ajout-activite" class="alert-link">Enregistrer une nouvelle activité</a></p></div>';
			exit;
		}else{
			echo '<div class="col-md-12 reponse"><p>Erreur lors de la requête, veuillez contacter l\'administrateur de la base de données.</p><a href="?action=ajout-activite" class="alert-link">Enregistrer une nouvelle activité</a></div>';
		}
	}
?>  

<!--js Bootstrap-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>