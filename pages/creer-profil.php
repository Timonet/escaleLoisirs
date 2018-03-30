<?php

$error=[];
$envoyer_form = false;

//Vérification inputs utilisateur
if(isset($_POST['enregistrer_nouv_membre'])){

    $data = validerNouveauMembre($_POST);
    if(in_array(false, $data)){
        $error = messagesErreurs($data);
    }

    //Envoi ou pas des données
    if (!$error){
        $envoyer_form = true;
    }
}

if(!$envoyer_form){
    //$error dans le corps du formulaire
?>

<p>Afin de vous inscrire à une activité du centre, vous devez préalablement vous créer un profil membre.</p><br>

<form method="post" action="">

    <h5>| &nbsp;&nbsp;informations personnelles&nbsp;&nbsp; |</h5><br>
    
    <!--Espace pour message erreur gral.-->
    <div class="form-group">
        <div class="col-md-10 col-md-offset-2">
            <?php
            //Message d'erreur de base, les autres s'affichent sous les champs du formulaire
            if((isset($error) && count($error) > 0)){
                echo '<div>Oups! Besoin de quelques corrections:</div>';
            }
            ?>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <input type="text" class="form-control" name="nom_membre" placeholder="Nom" value="<?php if(isset($_POST['nom_membre'])){echo $_POST['nom_membre'];}?>">
            <small class="alert alert--cachee"><?php echo (!empty($error['nom_membre'])) ? $error['nom_membre'] : ''; ?></small>
        </div>
        <div class="form-group col-md-12">
            <input type="text" class="form-control" name="prenom_membre" placeholder="Prénom" value="<?php if(isset($_POST['prenom_membre'])){echo $_POST['prenom_membre'];}?>">
            <small class="alert alert--cachee"><?php echo (!empty($error['prenom_membre'])) ? $error['prenom_membre'] : ''; ?></small>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <input type="text" class="form-control" name="adresse_membre" placeholder="No civique" value="<?php if(isset($_POST['adresse_membre'])){echo $_POST['adresse_membre'];}?>">
            <small class="alert alert--cachee"><?php echo (!empty($error['adresse_membre'])) ? $error['adresse_membre'] : ''; ?></small>
        </div>
        <div class="form-group col-md-8">
            <input type="text" class="form-control" name="rue_membre" placeholder="Rue" value="<?php if(isset($_POST['rue_membre'])){echo $_POST['rue_membre'];}?>">
            <small class="alert alert--cachee"><?php echo (!empty($error['rue_membre'])) ? $error['rue_membre'] : ''; ?></small>
        </div>
        <div class="form-group col-md-8">
            <input type="text" class="form-control" name="ville_membre" placeholder="Ville" value="<?php if(isset($_POST['ville_membre'])){echo $_POST['ville_membre'];}?>">
            <small class="alert alert--cachee"><?php echo (!empty($error['ville_membre'])) ? $error['ville_membre'] : ''; ?></small>
        </div>
        <div class="form-group col-md-4">
            <input type="text" class="form-control" name="cp_membre" placeholder="Code postal" value="<?php if(isset($_POST['cp_membre'])){echo $_POST['cp_membre'];}?>">
            <small class="alert alert--cachee"><?php echo (!empty($error['cp_membre'])) ? $error['cp_membre'] : ''; ?></small>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <input type="text" class="form-control" name="tel_membre" placeholder="Telephone" value="<?php if(isset($_POST['tel_membre'])){echo $_POST['tel_membre'];}?>">
            <small class="alert alert--cachee"><?php echo (!empty($error['tel_membre'])) ? $error['tel_membre'] : ''; ?></small>
        </div>
    </div><br>
    
    <h5>| &nbsp;&nbsp;identifiant escaleLoisirs&nbsp;&nbsp; |</h5><br>
    <div class="form-row">
        <div class="form-group col-md-12">
            <input type="email" class="form-control" name="courriel_membre" placeholder="Courriel" value="<?php if(isset($_POST['courriel_membre'])){echo $_POST['courriel_membre'];}?>">
            <small class="alert alert--cachee"><?php echo (!empty($error['courriel_membre'])) ? $error['courriel_membre'] : ''; ?></small>
        </div>
        <div class="form-group col-md-12">
            <input type="password" class="form-control" name="motpasse_membre" placeholder="Choisir un mot de passe" value="<?php if(isset($_POST['motpasse_membre'])){echo $_POST['motpasse_membre'];}?>">
            <small class="alert alert--cachee"><?php echo (!empty($error['motpasse_membre'])) ? $error['motpasse_membre'] : ''; ?></small>
        </div>
        <div class="form-group col-md-12">
            <input type="password" class="form-control" name="motpasse2_membre" placeholder="Confirmer votre mot de passe" value="<?php if(isset($_POST['motpasse2_membre'])){echo $_POST['motpasse2_membre'];}?>">
            <small class="alert alert--cachee"><?php echo (!empty($error['motpasse2_membre'])) ? $error['motpasse2_membre'] : ''; ?></small>
        </div>
    </div>
    
    <!--SPRINT 4
    <div class="form-check">
        <label class="form-check-label">
              <input class="form-check-input" type="checkbox"> Se souvenir de moi
            </label>
    </div>-->

    <div class="btn-nouv-membre">
        <input type="submit" name="enregistrer_nouv_membre" value="Devenir membre" class="btn btn-custom btn-block">
    </div>
</form>

<?php
}else{     
    //ici on sait que code_role = membre(3)
    $code_role = 3;
    $insertion = insererNouveauMembre($bdd, $data, $code_role);

    //vérifie si query ok
    if($insertion){  
        echo '<h5>Profil membre enregistré. Merci!</h5>
        <h3>Tres important!</h3>
        <p>Vous devez payer pour confirmer votre inscription.</p>
        <p><a href="?action=paiement&code_membre='.$insertion.'&code-activite='.$_GET['code-activite'].'">Payer</a></p>';
    }else{
        echo '<p><a href="?action=page-activite&code-activite='.$_GET['code-activite'].'">Erreur lors du traitement. Veuillez réessayer.</a></p>';
    }
}   
?>