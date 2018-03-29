<?php

$erreur_code = '';

if (isset($_GET['code-activite']) && is_numeric($_GET['code-activite'])){

    $resultat = afficheInfosActivite($bdd, $_GET['code-activite']);
    $activite = mysqli_fetch_assoc($resultat);

    if(is_null($activite)){
        $erreur_code = "Nous n'avons pas reçu les bonnes données.";
    }
}else{
    $erreur_code = "Nous n'avons pas reçu assez de données.";
}

if($erreur_code){
    echo '<div class="col-md-12 reponse"><p>'.$erreur_code.'</p><a href="index.php" class="alert-link">Veuillez réessayer, merci.</a></div>';
}else{
    
//Affichage de fiche auteur et liste livres avec titre clickable
?>


<!--info activite et inscription -->
<div class="row select-act">

    <!-- Section description d'activité -->
    <section class="col-xl-6 col-sm-12 mb-4">
        <div class="col-12">
            <h3>| &nbsp;&nbsp;activité sélectionnée&nbsp;&nbsp; |</h3>
            <table class="table table-md table-hover">
                <tr>
                    <th scope="col">Activité</th>
                    <td><?php echo $activite['nom_activite']?></td>
                </tr>
                <tr>
                    <th scope="col">Catégorie</th>
                    <td><?php echo $activite['nom_categorie']?></td>
                </tr>
                <tr>
                    <th scope="col">Description</th>
                    <td><?php echo $activite['description_activite']?></td>
                </tr>
            </table>
        </div><br>

        <div class="col-12">
            <h3>| &nbsp;&nbsp;détails&nbsp;&nbsp; |</h3>
            <table class="table table-md table-hover">
                <tr>
                    <th scope="col">Date de début</th>
                    <td><?php echo $activite['date_debut_activite']?></td>
                </tr>
                <tr>
                    <th scope="col">Date de fin</th>
                    <td><?php echo $activite['date_fin_activite']?></td>
                </tr>
                <tr>
                    <th scope="col">Horaire</th>
                    <td><?php echo $activite['heure_debut_activite']; echo $activite['heure_fin_activite']?></td>
                </tr>
                <tr>
                    <th scope="col">Animateur</th>
                    <td><?php echo $activite['nom_personne']?></td>
                </tr>
                <tr>
                    <th scope="col">Nombre de places</th>
                    <td><?php echo $activite['nb_participants_max_activite']?></td>
                </tr>
                <tr>
                    <th scope="col">Salle</th>
                    <td><?php echo $activite['salle_activite']?></td>
                </tr>
                <tr>
                    <th scope="col">Coût</th>
                    <td><?php echo $activite['prix_activite']?></td>
                </tr>
            </table>
        </div>
    </section>

    <!-- Section abonnement ou authentification pour l'inscription -->
    <section class="col-xl-6 col-sm-12 mb-4 n-inscription">
       
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#nouv-membre">Nouveau Membre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#membre-exist">Membre Existant</a>
            </li>
        </ul>

        <!-- Tabs contenu -->
        <div class="tab-content card card-body mb-4">
            <div id="nouv-membre" class="container tab-pane active"><br>                            

                <?php
                include('pages/creer-profil-paiement.php');
                ?>                        
                
            </div>

            <div id="membre-exist" class="container tab-pane fade"><br>
                <p>Afin de vous inscrire à une activité du centre, vous devez préalablement vous authentifier.</p><br>
                
                <?php
                include('pages/connexion-membre.php');
                ?>    

                TEST
                
           </div>

        </div>
    </section>
</div>
<!-- /col-xl-6 col-sm-12 /info activite et inscription -->

 <!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<?php
}
?>