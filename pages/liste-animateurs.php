<?php

//On recoit GET info pour ordonner colonnes
$afficherPar = (isset($_GET['ordonne_par']))  ? $_GET['ordonne_par'] : 'Code';
$ascOuDesc = (isset($_GET['direction']))  ? $_GET['direction'] : 'ASC';

$orderInfos = afficherAscDesc($afficherPar, $ascOuDesc);

$liste = afficheListeAnimateurs($bdd, $orderInfos['ordreType'], $orderInfos['direction']);

?>


<div class="row row_main__admin">

	<!--colonnes laterales pour centrer le contenu-->
	<div class="col-lg-1"></div>

	<div class="col-lg-10">
		<h2 class= "jumbotron jumbotron__h2__admin">Liste des animateurs(trices)</h2>

		<!--champ de recherche-->
		<h3 class="h3__admin--etroit">Rechercher un(e) animateur(trice)</h3>
		<form class="form-inline form-inline__admin">
		  <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Votre recherche ici">
		  <button type="submit" name="btn-rechercher" class="btn btn-secondary btn__admin--rechercher mb-2">Rechercher</button>
		</form>

		<!--liste membres / noms clickables, vers fiche individuelle-->
		<table class="table table-hover table-sm">
			<thead class="thead thead__admin--jaune">
				<tr>
					<th scope="col"><a href="?action=liste-animateurs&ordonne_par=nom&direction=<?php echo $orderInfos['ordreNom']?>">Nom</a></th>
					<th scope="col"><a href="?action=liste-animateurs&ordonne_par=prenom&direction=<?php echo $orderInfos['ordrePrenom']?>">Prénom</a></th>
					<th scope="col"><a href="?action=liste-animateurs&ordonne_par=tel&direction=<?php echo $orderInfos['ordreTel']?>">Téléphone</a></th>
					<th scope="col"><a href="?action=liste-animateurs&ordonne_par=courriel&direction=<?php echo $orderInfos['ordreCourriel']?>">Courriel</a></th>
					<th scope="col">Effacer</th>
				</tr>
			</thead>
			<tbody class="tbody__admin">
				<?php
				//****************manque liens vers effacer
				while($donnees = mysqli_fetch_assoc($liste)){
					echo '<tr>
						<td style="display:none;">'.$donnees['Code'].'</td>						
						<td><a href="index.php?action=modif-animateur&code-personne='.$donnees['Code'].'">'.$donnees['Nom'].'</td>
						<td>'.$donnees['Prenom'].'</td>
						<td>'.$donnees['Telephone'].'</td>
						<td><a href="mailto:'.$donnees['Courriel'].'">'.$donnees['Courriel'].'</a></td>
						<td>WHAT EFFACER</td>										
					</tr>';
				}
				?>
			</tbody>
		</table>

	<div class="col-lg-1"></div>
</div>
</main>
</div>
</div>	 