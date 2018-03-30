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

		<div class="row">
			<div class="col-sm-6">
				<!--champ de recherche-->
				<h3 class="h3__admin--etroit">Rechercher un(e) animateur(trice)</h3>
				<form class="form-inline form-inline__admin">
				  <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Votre recherche ici">
				  <button type="submit" name="btn-rechercher" class="btn btn-secondary btn__admin--rechercher mb-2">Rechercher</button>
				</form>
			</div>
			<div class="col-sm-4 offset-2">
				<a class="card-text__admin_link" href="index.php?action=ajout-animateur"><input type="button" value="Ajouter un(e) animateur(trice)" class="btn btn-secondary btn-block btn__admin btn__admin--ajout""></input></a>	
			</div>
		</div>

		<!--liste membres / noms clickables, vers fiche individuelle-->
		<table class="table table-hover table-sm">
			<thead class="thead thead__admin--jaune">
				<tr>
					<th scope="col"><a href="?action=liste-animateurs&ordonne_par=nom&direction=<?php echo $orderInfos['ordreNom']?>">Nom</a></th>
					<th scope="col"><a href="?action=liste-animateurs&ordonne_par=prenom&direction=<?php echo $orderInfos['ordrePrenom']?>">Prénom</a></th>
					<th scope="col"><a href="?action=liste-animateurs&ordonne_par=tel&direction=<?php echo $orderInfos['ordreTel']?>">Téléphone</a></th>
					<th scope="col"><a href="?action=liste-animateurs&ordonne_par=courriel&direction=<?php echo $orderInfos['ordreCourriel']?>">Courriel</a></th>
					<th scope="col">Supprimer animateur</th>
				</tr>
			</thead>
			<tbody class="tbody__admin">
				<?php
				//****************manque liens vers effacer
				while($donnees = mysqli_fetch_assoc($liste)){
					echo '<tr>
						<td style="display:none;">'.$donnees['Code'].'</td>						
						<td><a href="index.php?action=modif-animateur&code_personne='.$donnees['Code'].'">'.$donnees['Nom'].'</td>
						<td>'.$donnees['Prenom'].'</td>
						<td>'.$donnees['Telephone'].'</td>
						<td><a href="mailto:'.$donnees['Courriel'].'">'.$donnees['Courriel'].'</a></td>
						<td><a href="#" data-toggle="modal" data-target="#supprimerAnimateur">Supprimer</a></td>
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

<!-- The Modal -->
<div class="modal fade" id="supprimerAnimateur">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Supprimer la fiche animateur</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


      <?php 
		while($donnees = mysqli_fetch_assoc($liste)){
      // Modal body -->
      echo '<div class="modal-body">
        <p>Désirez-vous supprimer définitivement la fiche de '.$donnees['prenom'].' '.$donnees['Nom'].'; ?></p>
        <p class="text-danger">Cette action est irréversible.</p>
      </div>';
  }
      ?>

      <!-- Modal footer -->
     <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
      	<button type="button" class="btn btn-success btn-block">Confirmer</button>
	</div>
    </div>
  </div>
</div>

    <!-- section d'authentification en "modal" -->
    <section class="form-wrap modal fade" id="supprimerAnimateur">


    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">
                <h3 class="modal-title">Authentification</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form role="form" action="javascript:;" method="post" id="login-form" autocomplete="off">

                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Courriel">
                    </div>
                    <div class="form-group">
                        <input type="password" name="key" id="key" class="form-control" placeholder="Mot de passe">
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox"> Se souvenir de moi
                        </label>
                    </div>
                    <input type="submit" id="btn-login" class="btn btn-custom btn-block" value="Accéder à mon compte">
                </form>
            </div>

        </div>
    </div>

    </section>

</div>

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>