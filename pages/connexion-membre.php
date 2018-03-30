<?php

$error3=[];
$envoyer_form3 = false;

//Vérification inputs utilisateur
if(isset($_POST['btn_login_membre'])){

    $data = validerConnexion($_POST);
    if(in_array(false, $data)){
        $error3 = messagesErreurs($data);
    }

    //Envoi ou pas des données
    if (!$error3){
        $envoyer_form3= true;
    }
}

if(!$envoyer_form3){
    //$error3 dans le corps du formulaire
?>
<!-- section d'authentification -->
<p>Afin de vous inscrire à une activité du centre, vous devez préalablement vous authentifier.</p><br>

<form method="post" action="">
    <h5>| &nbsp;&nbsp;authentification&nbsp;&nbsp; |</h5><br>
    
    <div class="form-group">
        <input type="email" class="form-control" name="courriel_membre_login" placeholder="Courriel" value="">
        <small class="alert alert--cachee"><?php echo (!empty($error3['courriel_membre_login'])) ? $error3['courriel_membre_login'] : ''; ?></small>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="motpasse_membre_login" placeholder="Mot de passe" value="">
            <small class="alert alert--cachee"><?php echo (!empty($error3['motpasse_membre_login'])) ? $error3['motpasse_membre_login'] : ''; ?></small>
    </div>
    <!--SPRINT 4
    <div class="form-check">
        <label class="form-check-label">
              <input class="form-check-input" type="checkbox"> Se souvenir de moi
            </label>
    </div>-->
    <div class="btn-nouv-membre">
        <input type="submit" name="btn_login_membre" class="btn btn-custom btn-block" value="Accéder à mon compte"> 
    </div>
</form>

<?php
}else{    
    $pourComparer = getDonneesConnexion($bdd, $data);
  
    if($pourComparer){
       if (($pourComparer['courriel_personne'] == $data['courriel_membre_login']) && ($pourComparer['mot_passe_personne'] == $data['motpasse_membre_login'])){
            echo '<h3>Tres important!</h3>
                <p>Vous devez payer en personne pour confirmer votre inscription.</p>
                <p><a href="?action=paiement&code_membre='.$pourComparer['code_personne'].'&code-activite='.$_GET['code-activite'].'">Payer</a></p>';            
        }
    }else{
        echo 'Mauvais identifiant ou mot de passe !';
    }
}   
?>