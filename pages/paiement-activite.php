<?php

$error2='';
$envoyer2 = false;

if(isset($_POST['inscrire-paiement'])){

    if(empty($_POST['paiement'])){
        $error2 = 'Choisir une methode de paiement, SVP.';
    }else{
        $envoyer2 = true;
    }
}

if(!$envoyer2){
    //MANQUE CSS!!
    echo $error2;
?>

<!--MANQUE CSS!!-->
<h1>| &nbsp;&nbsp;paiement&nbsp;&nbsp; |</h1>

<p>Vous devez vous présenter au comptoir d'accueil du centre afin de payer les frais d'admission. Une fois le paiement accepté, nous vous confirmerons votre inscription.</p>
<p>À titre indicatif, veuillez choisir la méthode de paiement avec laquelle vous prévoyez couvrir les frais d'inscription.</p>

<form class="form-paiement" method="post" action="">
<?php
$options = afficheOptionsPaiement($bdd);
while ($donnees = mysqli_fetch_assoc($options)) {
    echo '
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="paiement" value="'.$donnees['code_paiement'].'">
        <label class="form-check-label" >'.$donnees['nom_paiement'].'</label>
    </div>';
}
?>
    <input type="submit" name="inscrire-paiement" class="btn btn-custom btn-block" value="Envoyer ma demande d'inscription">
</form>
   
<?php
}else{  

    $insertion2= insererInscription($bdd, $_POST['paiement'], $_GET['code_membre'], $_GET['code-activite']);
    //vérifie si query ok
    if($insertion2){  
        echo '<h5>Demande d\'inscription reçue. Merci!</h5>
        <h3>N\'oubliez pas de passer faire votre payement au centre.</h3>
        <p><a href="?action=profil-membre&code_membre='.$_GET['code_membre'].'">Voir vos inscriptions</a></p>
        <p><a href="?action=toutes-activites">Voir plus d\'activités</a></p>';
        exit;
    }else{
        // SPRINT 4 if mysql_error contents "Duplicate entry" then error_mssg = Votre inscription a deja ete processee. Contactez admin.
        echo '<h3>Erreur lors du traitement. </h3>
        <p><a href="?action=page-activite&code-activite='.$_GET['code-activite'].'">Veuillez réessayer.</a></p>';
    }
}

?>