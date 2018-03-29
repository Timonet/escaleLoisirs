<?php

//On recoit GET info pur ordonner colonnes
$afficherPar = (isset($_GET['ordonne_par']))  ? $_GET['ordonne_par'] : 'Code';
$ascOuDesc = (isset($_GET['direction']))  ? $_GET['direction'] : 'ASC';

$orderInfos = afficherAscDesc($afficherPar, $ascOuDesc);

$liste = afficheListe($bdd, $orderInfos['ordreType'], $orderInfos['direction']);

?>

<div class="row row_main__admin">
	
	<!--colonnes laterales pour centrer le contenu-->
	<div class="col-lg-1"></div>

	<div class="col-lg-10">
		<h2 class= "jumbotron jumbotron__h2__admin">Liste des activités</h2>

		<!--champ de recherche-->
		<h3 class="h3__admin--etroit">Rechercher une activité</h3>
		<form class="form-inline form-inline__admin">
		  <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Votre recherche ici">
		  <button type="submit" name="btn-rechercher" class="btn btn-secondary btn__admin--rechercher mb-2">Rechercher</button>
		</form>

		<!--liste activités / titres clickables, vers fiche individuelle-->
		<table class="table table-hover table-sm">
			<thead class="thead thead__admin--jaune">
				<tr>
					<th scope="col"><a href="?action=liste-activites&ordonne_par=code&direction=<?php echo $orderInfos['ordreCode']?>">Code</a></th>
					<th scope="col"><a href="?action=liste-activites&ordonne_par=titre&direction=<?php echo $orderInfos['ordreTitre']?>">Titre</a></th>
					<th scope="col"><a href="?action=liste-activites&ordonne_par=categorie&direction=<?php echo $orderInfos['ordreCategorie']?>">Categorie</a></th>
					<th scope="col"><a href="?action=liste-activites&ordonne_par=animateur&direction=<?php echo $orderInfos['ordreAnimateur']?>">Animateur</a></th>
					<th scope="col"><a href="?action=liste-activites&ordonne_par=places&direction=<?php echo $orderInfos['ordrePlaces']?>">Places</a></th>
					<th scope="col">Liste inscrits</th> 
					<th scope="col"><a href="?action=liste-activites&ordonne_par=prix&direction=<?php echo $orderInfos['ordrePrix']?>">Prix</a></th> 
                    <th scope="col"><a href="?action=liste-activites&ordonne_par=debut&direction=<?php echo $orderInfos['ordreDebut']?>">Date début</a></th> 
                    <th scope="col"><a href="?action=liste-activites&ordonne_par=fin&direction=<?php echo $orderInfos['ordreFin']?>">Date fin</a></th>
					<th scope="col">Effacer</th> 
				</tr>
			</thead>
			<tbody class="tbody__admin">
				<?php
				//****************manque liens vers liste inscrits et vers effacer
				while($donnees = mysqli_fetch_assoc($liste)){
					echo '<tr>
						<td>'.$donnees['Code'].'</td>
						<td><a href="index.php?action=modif-activite&code-activite='.$donnees['Code'].'">'.$donnees['Titre'].'</td>
						<td>'.$donnees['Categorie'].'</td>
						<td>'.$donnees['Animateur'].'</td>
						<td>'.$donnees['Places'].'</td>
						<td>WHAT LISTE INSCRITS</td>
						<td>'.$donnees['Prix'].'</td>
						<td>'.$donnees['Date_debut'].'</td>
						<td>'.$donnees['Date_fin'].'</td>	
						<td>WHAT EFFACER</td>										
					</tr>';
				}
				?>
			</tbody>
		</table>
	</div>

	<div class="col-lg-1"></div
</div>
</main>
</div>
</div>