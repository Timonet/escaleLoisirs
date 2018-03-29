<?php

$error=[];
$envoyer_form2 = false;

//Vérification inputs utilisateur
if(isset($_POST['btn_login_membre'])){

    $data = validerConnexion($_POST);
    if(in_array(false, $data)){
        $error = messagesErreurs($data);
    }

    //Envoi ou pas des données
    if (!$error){
        $envoyer_form2 = true;
    }
    echo 'PRETEST';
}

if(!$envoyer_form2){
    //les erreurs dans le corps du formulaire
    echo 'PRETEST2';
?>
<!-- section d'authentification -->
<form method="post" action="">
    <div class="form-group">
        <input type="email" class="form-control" name="courriel_membre" placeholder="Courriel">
    </div>
    <div class="form-group">
        <input type="password" id="pwd" class="form-control" name="motpasse_membre" placeholder="Mot de passe">
    </div>
    <div class="form-check">
        <label class="form-check-label">
              <input class="form-check-input" type="checkbox"> Se souvenir de moi
            </label>
    </div>
    <div class="btn-nouv-membre">
        <input type="submit" class="btn btn-custom btn-block" name="btn_login_membre" value="Accéder à mon compte"> 
    </div>
</form>

<!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php
}else{     
    echo 'YESTEST';
    $pourComparer = getDonneesConnexion($bdd, $data);

    if($pourComparer){
        if (($pourComparer['courriel_membre'] == $_POST['courriel_membre'])
            && ($pourComparer['motpasse_membre'] == $_POST['motpasse_membre'])){
            echo 'YES';
            //include('pages/paiement-activite.php');
            exit;
        }
    }else{
        echo '<div class="col-md-12 reponse"><p>Mauvais mot de passe ou courriel. Veuillez réessayer.</p></div>';
    }
    echo 'TEST2';
}   
?>