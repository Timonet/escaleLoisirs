<?php
//profil membre presente fiche avec coordonnees modifiables

$erreur_code = '';
$error = [];
$insertion = '';

//le traitement des donnees de la fiche si elles sont modifiees
if(isset($_POST['modifier_membre'])){
  
  $data = validerMembre($_POST);
  if(in_array(false, $data)){
    $error = messagesErreurs($data);
  }

  if (!$error){
    $insertion = modifMembre($bdd, $data);

    if(!$insertion){
      echo '<div class="col-md-12 reponse"><p>Erreur lors de la requête, veuillez contacter l\'adminsitrateur de la base de données.</p>
      <p><a href="index.php?action=fichelivre&code_livre='.$_GET['code_membre'].'">Retour à la fiche du livre</a></p>
      <p><a href="index.php?action=listelivres">Retour à la liste de livres</a></p></div>';
      exit();
    }else{
      echo '<div class="col-md-12 reponse"><p>Fiche correctement enregistrée, merci.</p>
      <p><a href="index.php?action=fichelivre&code_livre='.$_POST['code_membre'].'">Retour à la fiche du livre</a></p>
      <p><a href="index.php?action=listelivres">Retour à la liste de livres</a></p></div>';
      exit();
    } 
  }
}

if (isset($_GET['code_membre']) && is_numeric($_GET['code_membre'])){

  $resultat = afficheInfosMembre($bdd, $_GET['code_membre']);
  $membre = mysqli_fetch_assoc($resultat);

  if(is_null($membre)){
    $erreur_code = "Nous n'avons pas reçu les bonnes données.";
  }
}else{
    $erreur_code = "Nous n'avons pas reçu assez de données.";
}

if($erreur_code){
  echo '<div class="col-md-12 reponse"><p>'.$erreur_code.'</p><a href="index.php" class="alert-link">Veuillez réessayer, merci.</a></div>';
}else{
  
//Affichage de fiche membre modifiable
?>
<h1>| &nbsp;&nbsp;mon profil&nbsp;&nbsp; |</h1>

<!-- coordonnées modifiables + liste inscriptions-->
<div class="row row__monprofil">
  <div class="col-lg-6 col_monprofil">
    <h3 class="h3__admin--etroit">Vos coordonnées</h3>
    <h6 class="h6__monprofil">*Vous pouvez actualiser vos coordonnées sur cette même page.</h6>
    
    <!--fiche modifiable animateur(trice)-->
    <form method="post" action="" class="form__monprofil">
      <div class="form-row">
        <div class="form-group col-sm-6">
          <input required type="text" class="form-control" name="nom_membre" placeholder="Nom" value="<?php echo (isset($_POST['nom_membre'])) ? $_POST['nom_membre'] : $membre['nom_personne'];?>">
          <small class="alert alert-danger"><?php echo (!empty($error['nom_membre'])) ? $error['nom_membre'] : ''; ?></small>
        </div>
        <div class="form-group col-sm-6">
          <input required type="text" class="form-control" name="prenom_membre" placeholder="Prénom" value="<?php echo (isset($_POST['prenom_membre'])) ? $_POST['prenom_membre'] : $membre['prenom_personne'];?>">
          <small class="alert alert-danger"><?php echo (!empty($error['prenom_membre'])) ? $error['prenom_membre'] : ''; ?></small>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-sm-2">
          <input required type="text" class="form-control" name="adresse_membre" placeholder="N. rue" value="<?php echo (isset($_POST['adresse_membre'])) ? $_POST['adresse_membre'] : $membre['numero_adresse_personne'];?>">
          <small class="alert alert-danger"><?php echo (!empty($error['adresse_membre'])) ? $error['adresse_membre'] : ''; ?></small>
        </div>
        <div class="form-group col-sm-4">
          <input required type="text" class="form-control" name="rue_membre" placeholder="Rue" value="<?php echo (isset($_POST['rue_membre'])) ? $_POST['rue_membre'] : $membre['rue_adresse_personne'];?>">
          <small class="alert alert-danger"><?php echo (!empty($error['rue_membre'])) ? $error['rue_membre'] : ''; ?></small>
        </div>
        <div class="form-group col-sm-2">
          <input required type="text" class="form-control" name="cp_membre" placeholder="C.P." value="<?php echo (isset($_POST['cp_membre'])) ? $_POST['cp_membre'] : $membre['code_postal_adresse_personne'];?>">
          <small class="alert alert-danger"><?php echo (!empty($error['cp_membre'])) ? $error['cp_membre'] : ''; ?></small>
        </div>
        <div class="form-group col-sm-4">
          <input type="text" class="form-control" name="ville_membre" placeholder="Ville" value="<?php echo (isset($_POST['ville_membre'])) ? $_POST['ville_membre'] : $membre['ville_adresse_personne'];?>">
          <small class="alert alert-danger"><?php echo (!empty($error['ville_membre'])) ? $error['ville_membre'] : ''; ?></small>
        </div>
        </div>

        <div class="form-row">  
        <div class="form-group col-sm-6">
          <input required type="text" class="form-control" name="tel_membre" placeholder="Téléphone" value="<?php echo (isset($_POST['tel_membre'])) ? $_POST['tel_membre'] : $membre['telephone_personne'];?>">
          <small class="alert alert-danger"><?php echo (!empty($error['tel_membre'])) ? $error['tel_membre'] : ''; ?></small>
        </div>
        <div class="form-group col-sm-6">
          <input required type="text" class="form-control" name="courriel_membre" placeholder="Téléphone" value="<?php echo (isset($_POST['courriel_membre'])) ? $_POST['courriel_membre'] : $membre['courriel_personne'];?>">
          <small class="alert alert-danger"><?php echo (!empty($error['courriel_membre'])) ? $error['courriel_membre'] : ''; ?></small>
        </div>
      </div>

      <div class="form-row">  
        <div class="form-group col-sm-5">
          <input type="submit" name="modifier_membre" value="Actualiser" class="btn btn-secondary btn-lg btn-block btn__admin btn__admin--publier">
        </div>
      </div>
    </form>             
  </div>
<?php
}
?>

  <!--liste activites / permet se désinscrire-->
  <div class="col-lg-6 col_monprofil">
    <h3 class="h3__admin--etroit">Liste de vos activités</h3>
    <h6 class="h6__monprofil">*Pour vous désinscrire, clickez sur "annuler".</h6>
    <table class="table table-sm">
      <thead class="thead__admin--minimal">
        <tr>
          <th scope="col">Titre activité</th>
          <th scope="col">Dates</th>
          <th scope="col">Payement</th>
          <th scope="col">Annuler</th>
        </tr>
      </thead>
      <tbody class="tbody__admin--minimal">
        <?php
        $resultat = afficheListeActivites($bdd, $_GET['code_membre']);

        while($donnees= mysqli_fetch_assoc($resultat)){
          echo '<tr>
            <td><a href="index.php?action=page-activite&code-activite='.$donnees['code_activite'].'">'.$donnees['nom_activite'].'</td>
            <td>'.$donnees['date_debut_activite'].', '.$donnees['date_fin_activite'].'</td>
            <td>'.$donnees['paye'].'</td>
            <td><a class="td__a__monprofil" href="#">Annuler</a></td> <!--lien-->
          </tr>';
        }
        ?>
      </tbody>
    </table>
    <h6 class="h6__monprofil">Les payements doivent se faire en personne. Si vous avez des questions, contactez l'<a class="a__monprofil" href="mailto:info@escaleLoisirs.cariblay.com">administrateur</a>.</h6>
  </div>
</div>

<!-- /FOOTER -->
<footer class="footer">
            <div class="row">

                <div class="col-md-6 section-contact">


                    <div>
                        <p class="title-contact">Nous joindre</p>
                    </div>

                    <div class="coordonnees-footer">
                        <p>
                            7050 boul. St-Laurent<br> Montréal QC H2R 1T8
                        </p>
                    </div>

                    <div class="coordonnees-footer">
                        <p>
                            Téléphone: 514 405-0523<br> Courriel: info@escaleloisirs.cariblay.com
                        </p>
                    </div>

                    <div class="row logos-medias">

                        <div class="logo-medias"><a href="#"><img class="card-img-top" src="medias/mediasSociaux/logo_facebook.svg" alt=" Facebook" title="Facebook"></a></div>
                        <div class="logo-medias"><a href="#"><img class="card-img-top"  src="medias/mediasSociaux/logo_twitter.svg" alt=" Twitter" title="Twitter"></a></div>
                        <div class="logo-medias"><a href="#"><img class="card-img-top"  src="medias/mediasSociaux/logo_googlePlus.svg" alt="Google+" title="Google+"></a></div>
                        <div class="logo-medias"><a href="#"><img class="card-img-top"  src="medias/mediasSociaux/logo-youTube.svg" alt="You Tube" title="You Tube"></a></div>

                    </div>

                </div>



                <div class="col-md-6 form-contact form-contact__monprofil">
                    <div class="well well-sm">
                        <form class="form-horizontal" action="" method="post">
                            <fieldset>
                                <div class="title-contact">Contactez-nous</div><br>

                                <!-- Name input-->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input id="name" name="name" type="text" placeholder="Nom" class="form-control">
                                    </div>
                                </div>

                                <!-- Email input-->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input id="email" name="email" type="text" placeholder="Courriel" class="form-control">
                                    </div>
                                </div>

                                <!-- Subject input-->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input id="subject" name="subject" type="text" placeholder="Sujet" class="form-control">
                                    </div>
                                </div>

                                <!-- Message body -->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <textarea class="form-control" id="message" name="message" placeholder="Message" rows="5"></textarea>
                                    </div>
                                </div>

                                <!-- Form actions -->
                                <div class="form-group">
                                    <div class="col-md-11">
                                        <button type="submit" class="btn btn-primary">Envoyer</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>


                </div>

            </div>

</footer> 

</div><!-- /.row -->  

</section><!-- /.col-lg-9 -->

</div><!-- /.row -->       

</div><!-- /.container -->

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>