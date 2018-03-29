<?php

 /*var_dump($_POST);
 var_dump($_POST['paiement']);


$error2='';
$envoyer = false;

if(isset($_POST['inscrire-paiement'])){

    if(!isset($_POST['paiement'])){
        $error2 = 'Choisir une methode de paiement, SVP.';
    }else{
        $envoyer = true;
    }
}

if(!$envoyer){*/

?>


<h5>Profil membre enregistré. Merci!</h5>

<p>À titre indicatif, veuillez choisir la méthode de paiement avec laquelle vous prévoyez couvrir les frais d'inscription.</p>

<form class="form-paiement" method="post" action="">
   <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="paiement" id="inlineRadio1" value="comptant">
        <label class="form-check-label" for="inlineRadio1">Comptant</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="paiement" id="inlineRadio2" value="cheque">
        <label class="form-check-label" for="inlineRadio2">Chèque</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="paiement" id="inlineRadio3" value="credit">
        <label class="form-check-label" for="inlineRadio3">Crédit</label>
    </div>
    <input type="submit" name="inscrire-paiement" class="btn btn-custom btn-block" value="Envoyer ma demande d'inscription">
</form>

<p>Prendre note que vous devez vous présenter au comptoir d'accueil du centre afin de payer les frais d'admission. Une fois le paiement accepté, nous vous confirmerons votre inscription.</p>


<!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<?php

 var_dump($_POST);
 var_dump($_POST['paiement']);
/*}else{     
    //ici on sait que code_role = membre(3)
   // $code_role = 3;
    //$insertion = insererNouveauMembre($bdd, $data, $code_role);
    $insertion2=1;
    //vérifie si query ok
    if($insertion2){  
        var_dump($_POST);
        echo  'TEST OK';
        //'<div class="tab-content card card-body mb-4">  <div class="container tab-pane active"><br> <p>TEST3</p><br> </div>';
    }else{
         var_dump($_POST);
        echo 'TEST ERROR';
        //'<div class="col-md-12 reponse"><p>Erreur lors du traitement. Veuillez réessayer.</p></div>';
    }
}*/
?>




