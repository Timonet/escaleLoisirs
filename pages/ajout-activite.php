<?php

$error=[];
$envoyer_form = false;

//Vérification inputs fiche
if(isset($_POST['publier_activite'])){

    $data = validerNouvelleActivite($_POST);
    if(in_array(false, $data)){
        $error = messagesErreurs($data);
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

<!--contenu central / fiche ajout activite-->
<div class="col-lg-10">
	<h2 class= "jumbotron jumbotron__h2__admin">Publier une activité</h2>

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
			<div class="form-group col-lg-12">
				<legend>Titre</legend>
				<input required type="text" class="form-control" name="titre_activite" placeholder="Titre de l'activité" value="<?php if(isset($_POST['titre_activite'])){echo $_POST['titre_activite'];}?>">
				<small class="alert-danger"><?php echo (!empty($error['titre_ativite'])) ? $error['titre_activite'] : ''; ?></small>
			</div>
		</div>

	  	<div class="form-row">
			<div class="form-group col-md-6">
				<legend>Animateur</legend>
				<?php
				$check_index_submit = (!empty($_POST['publier_activite'])) ? $_POST['publier_activite'] : '';
				$check_index_animateur = (!empty($_POST['animateur'])) ? $_POST['animateur'] : '';
				echo getSelect($bdd, $check_index_submit, $check_index_animateur, '0', 'animateur');
				?>
				<small class="alert-danger"><?php echo (!empty($error['animateur'])) ? $error['animateur'] : ''; ?></small>
			</div>

			<div class="form-group col-md-6">
				<legend>Catégorie</legend>
				<?php
				$check_index_categorie = (!empty($_POST['categorie'])) ? $_POST['categorie'] : '';
				echo getSelect($bdd, $check_index_submit, $check_index_categorie, '0', 'categorie');
				?>
				<small class="alert-danger"><?php echo (!empty($error['categorie'])) ? $error['categorie'] : ''; ?></small>
			</div>   
	  	</div>

	  	<div class="form-group col-md-12">
			<legend>Description</legend>
			<textarea class="form-control" rows="5" name="description" value="<?php if(isset($_POST['description'])){echo $_POST['description'];}?>"></textarea>
				<small class="alert-danger"><?php echo (!empty($error['description'])) ? $error['description'] : ''; ?></small>
		</div>

		<div class="form-row">	
            <div class="form-group col-md-4">
                <legend>Salle</legend>
				<input type="text" class="form-control" name="salle" placeholder="Salle" value="<?php if(isset($_POST['salle'])){echo $_POST['salle'];}?>">
				<small class="alert-danger"><?php echo (!empty($error['salle'])) ? $error['salle'] : ''; ?></small>
				<?php
				//sprint 4: deroulant salles sur bdd + possiblite ajouter nouvelle salle dans bdd depuis deroulant
				?>
            </div>	
			<div class="form-group col-md-4">
				<legend>Nombre de places</legend>
				<input type="text" class="form-control" name="nb_places" placeholder="Nb. de places" value="<?php if(isset($_POST['nb_places'])){echo $_POST['nb_places'];}?>">
				<small class="alert-danger"><?php echo (!empty($error['nb_places'])) ? $error['nb_places'] : ''; ?></small>
			</div>
			<div class="form-group col-md-4">
				<legend>Prix</legend>
				<input type="text" class="form-control" name="prix" placeholder="Prix" value="<?php if(isset($_POST['prix'])){echo $_POST['prix'];}?>">
				<small class="alert-danger"><?php echo (!empty($error['prix'])) ? $error['prix'] : ''; ?></small>
			</div>
		</div>

		<div class="form-row">	
			<div class="form-group col-md-3">
				<legend>Date début</legend>
				<input type="date" class="form-control" name="date_debut" placeholder="Choisir date sur le calendrier" value="<?php if(isset($_POST['date_debut'])){echo $_POST['date_debut'];}?>">
				<small class="alert-danger"><?php echo (!empty($error['date_debut'])) ? $error['date_debut'] : ''; ?></small>
			</div>
			<div class="form-group col-md-3">
				<legend>Date fin</legend>
				<input type="date" class="form-control" name="date_fin" placeholder="Choisir date sur le calendrier" value="<?php if(isset($_POST['date_fin'])){echo $_POST['date_fin'];}?>">
				<small class="alert-danger"><?php echo (!empty($error['date_fin'])) ? $error['date_fin'] : ''; ?></small>
			</div>
			<div class="form-group col-md-3">
				<legend>Heure début</legend>
                <input type="time" class="form-control" name="hr_debut" placeholder="Choisir heure sur la liste" value="<?php if(isset($_POST['hr_debut'])){echo $_POST['hr_debut'];}?>">
				<small class="alert-danger"><?php echo (!empty($error['hr_debut'])) ? $error['hr_debut'] : ''; ?></small>
			</div>
			<div class="form-group col-md-3">
				<legend>Heure fin</legend>
                <input type="time" class="form-control" name="hr_fin" placeholder="Choisir heure sur la liste" value="<?php if(isset($_POST['hr_fin'])){echo $_POST['hr_fin'];}?>">
				<small class="alert-danger"><?php echo (!empty($error['hr_fin'])) ? $error['hr_fin'] : ''; ?></small>
			</div>
		</div>

		<div class="form-row">	
			<div class="form-group col-md-6">
				<input type="reset" name="reset_activite" value="Nettoyer" class="btn btn-secondary btn-lg btn-block btn__admin btn__admin--nettoyer">
			</div>
			<div class="form-group col-md-6">
				<input type="submit" name="publier_activite" value="Publier" class="btn btn-secondary btn-lg btn-block btn__admin btn__admin--publier">
			</div>
		</div>
	</form>
	<p class="p__admin--pieddepage"><a class="p__a__admin--pieddepage" href="#">Aller à la liste des activités</a></p>
			
	<div class="col-lg-1"></div>
</div>
</main>
</div>
</div>

<?php
}else{		
	$insertion = insererActivite($bdd, $data);

	//vérifie si query ok (returns false or last_id)
	if($insertion){
		echo '<div class="col-md-12 reponse"><p>Activité correctement enregistrée, merci.</p>
			<p><a href="index.php?action=page-activite&code-activite='.$insertion.'" class="alert-link">Voir l\'activité publique</a></p>
			<p><a href="index.php?action=modif-activite&code-activite='.$insertion.'" class="alert-link">Voir la fiche</a></p>
			<p><a href="index.php?action=ajout-activite" class="alert-link">Publier une autre activité</a></p></div>';
		exit;
	}else{
		echo '<div class="col-md-12 reponse"><p>Erreur lors de la requête, veuillez contacter l\'adminsitrateur de la base de données.</p><a href="?action=ajout-activite" class="alert-link">Enregistrer une autre activité</a></div>';
	}
}	
?>