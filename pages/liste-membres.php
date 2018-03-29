<?php

include('../model/connexion_escaleLoisirs.php');
include('../model/fonctions_multi.php');
include('../model/fonctions_membres.php');

//On recoit GET info pur ordonner colonnes
$afficherPar = (isset($_GET['ordonne_par']))  ? $_GET['ordonne_par'] : 'Code';
$ascOuDesc = (isset($_GET['direction']))  ? $_GET['direction'] : 'ASC';

$orderInfos = afficherAscDesc($afficherPar, $ascOuDesc);

$membres = listeMembres($bdd, $orderInfos['orderType'], $orderInfos['direction']);

?>

<!doctype html>
<html lang="fr">
<!--Projet web 1
	Site web Centre Communautaire / escaleLoisirs
	Page *liste membres* dans gestion pour administrateurs-->

<head>
  <meta charset="utf-8">
  <title>escaleLoisirs / Gestion - liste membres</title>
  <meta name="author" content="Sara Potau">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="../style/stylePerso.css">>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet">
</head>

<body>
	<div class="container-fluid">
      <div class="row">

      	<!-- Lateral gauche / Logo et menu pour pages gesion administrateurs-->
        <aside class="col-xl-2 col-lg-3 col-md-4 aside_menu">
          <a href="#"><img class="card-img-top logo" src="../medias/logos/logo_escaleLoisirs.svg" alt="logo" width="200"></a>   

          <div class="list-group list-group_menu_admin">
            <a href="#" class="list-group-item list-group-item__admin--sitepublique" id="menu_activite">Site publique</a>
            <a href="#" class="list-group-item list-group-item__admin--membres" id="menu_propos">Membres</a>
            <a href="#" class="list-group-item list-group-item__admin--animateurs" id="menu_contact">Animateurs</a>
            <a href="#" class="list-group-item list-group-item__admin--activites" id="menu_profil">Activités</a>
            <a href="#" class="list-group-item list-group-item__admin--webmestre" id="menu_langue">Contactez le webmestre</a>
          </div>
        </aside>

		<!-- Header simple et contenu principal page-->
		<main class="col-xl-10 col-lg-9 col-md-8 principale main__admin" >
			<h1 class="jumbotron jumbotron__admin">Gestion</h1>
			<div class="row row_main__admin">
				
				<!--colonnes laterales pour centrer le contenu-->
				<div class="col-lg-1"></div>

				<div class="col-lg-10">
					<h2 class= "jumbotron jumbotron__h2__admin">Liste des membres enregistrés</h2>

					<!--champ de recherche-->
					<h3 class="h3__admin--etroit">Rechercher un membre</h3>
					<form class="form-inline form-inline__admin">
					  <input type="text" class="form-control mb-2 mr-sm-2" name="recherche" placeholder="Votre recherche ici">
					  <button type="submit" name="btn-rechercher" class="btn btn-secondary btn__admin--rechercher mb-2">Rechercher</button>
					</form>

					<!--liste membres-->
					<table class="table table-hover table-sm">
						<thead class="thead thead__admin--jaune">
							<tr>
								<th scope="col"><a href="?action=listeMembres&ordonne_par=nom&direction=<?php echo $orderInfos['orderNom']?>">Nom</a></th>
								<th scope="col"><a href="?action=listeMembres&ordonne_par=prenom&direction=<?php echo $orderInfos['orderPrenom']?>">Prénom</a></th>
								<th scope="col">Adresse</th>
								<th scope="col"><a href="?action=listeMembres&ordonne_par=courriel&direction=<?php echo $orderInfos['orderCourriel']?>">Courriel</a></th>	
								<th scope="col">Supprimer membre</th>
							</tr>
						</thead>
						<tbody class="tbody__admin">
							<?php
							while($donnees = mysqli_fetch_assoc($membres)){
								echo '<tr>
									<td>'.$donnees['Nom'].'</td>
									<td>'.$donnees['Prenom'].'</td>
									<td>'.$donnees['Adresse'].'</td>
									<td>'.$donnees['Courriel'].'</td>
									<td>Supprimer</td>
								</tr>';
							}
							?>
						</tbody>
					</table>
				</div>

				<div class="col-lg-1"></div>
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