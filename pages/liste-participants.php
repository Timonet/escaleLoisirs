<?php
var_dump($_GET);
//On recoit GET info pour ordonner colonnes
$afficherPar = (isset($_GET['ordonne_par']))  ? $_GET['ordonne_par'] : 'Nom';
$ascOuDesc = (isset($_GET['direction']))  ? $_GET['direction'] : 'ASC';


$orderInfos = afficherAscDesc($afficherPar, $ascOuDesc);

$inscrits = afficheListeInscrits($bdd, $orderInfos['ordreType'], $orderInfos['direction'], $_GET['code_activite']);

?>

<div class="row row_main__admin">
	
	<!--colonnes laterales pour centrer le contenu-->
	<div class="col-lg-1"></div>

	<div class="col-lg-10">
		<h2 class= "jumbotron jumbotron__h2__admin">Liste participants: (nom activité clickable - PHP)</h2>

		<!--champ de recherche-->
		<h3 class="h3__admin--etroit">Rechercher un participant sur la liste</h3>
		<form class="form-inline form-inline__admin">
		  <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Votre recherche ici">
		  <button type="submit" name="btn-rechercher" class="btn btn-secondary btn__admin--rechercher mb-2">Rechercher</button>
		</form>

		<!--liste participats-->
		<table class="table table-hover table-sm">
			<thead class="thead thead__admin--jaune">
				<tr>
					<th scope="col"><a href="?action=liste-membres&ordonne_par=nom&direction=<?php echo $orderInfos['ordreNom']?>">Nom</a></th>

					<th scope="col"><a href="?action=liste-membres&ordonne_par=prenom&direction=<?php echo $orderInfos['ordrePrenom']?>">Prénom</a></th>

					<th scope="col"><a href="?action=liste-membres&ordonne_par=tel&direction=<?php echo $orderInfos['ordreTel']?>">Téléphone</a></th>

					<th scope="col"><a href="?action=liste-membres&ordonne_par=courriel&direction=<?php echo $orderInfos['ordreCourriel']?>">Courriel</a></th>

					<th scope="col">Payé</th>

					<th scope="col">Supprimer membre</th>
				</tr>
			</thead>
			<tbody class="tbody__admin">
				<?php
				while($donnees = mysqli_fetch_assoc($inscrits)){
					echo '<tr>
						<td>'.$donnees['Nom'].'</td>
						<td>'.$donnees['Prenom'].'</td>
						<td>'.$donnees['Telephone'].'</td>
						<td>'.$donnees['Courriel'].'</td>
						<td>Payé</td>
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