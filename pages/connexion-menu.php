<?php 

$error3=[];
$envoyer_form3 = false;

//Vérification inputs utilisateur
if(isset($_POST['btn_login_menu'])){

    //  Récupération id_personne et mot de passe
    // Dans une 2e etape: mp HACHE
    // $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
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
    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">
                <h3 class="modal-title">Authentification</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="post" id="login-form-menu" action="javascript:;">
                    <!--role="form"    autocomplete="off"-->

                    <div class="form-group">
                        <input type="email" name="courreil_connex" id="email" class="form-control" placeholder="Courriel">
                    </div>
                    <div class="form-group">
                        <input type="password" name="motpasse_connex" id="key" class="form-control" placeholder="Mot de passe">
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox"> Se souvenir de moi
                        </label>
                    </div>
                    <input type="submit" id="btn-login" class="btn btn-custom btn-block" name="btn_login_menu" value="Accéder à mon compte">
                </form>

                <!--<script type="text/javascript">
                    function form_submit() {
                        document.getElementById("login_form").submit();
                    }    
                </script>-->
            </div>

        </div>
    </div>

    <script type="text/javascript">
    //modifie le comportement des tab         
    $(document).ready(function(){
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if(activeTab){
            $('#myTab a[href="' + activeTab + '"]').tab('show');
        }
    });
</script>
<?php
}else{    
    // Comparaison du m.p. envoyé via le formulaire avec la bdd et connexion
    // Dans une 2e etape, mp hache
    // $isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);
            /*if ($donnees['mot_passe_personne']==$_POST['motpasse_connex']) {
            session_start();
            $_SESSION['id'] = $donnees['id'];
            $_SESSION['courriel'] = $donnees['courriel_personne'];
            echo 'Vous êtes connecté !';
        }*/
    $pourComparer = getDonneesConnexion($bdd, $data);
  
    if($pourComparer){
       if (($pourComparer['courriel_personne'] == $data['courriel_membre_login']) && ($pourComparer['mot_passe_personne'] == $data['motpasse_membre_login'])){
            header('Location: ?action=profil-membre&code_membre='.$pourComparer['code_personne'].'');
            exit;
//**********faut faire code pour admin/anim/membre**************      
        }
    }else{
        echo 'Mauvais identifiant ou mot de passe !';
    }
}   

//https://stackoverflow.com/questions/16154216/twitter-bootstrap-modal-form-submit
//https://codepen.io/hanapiers/pen/EXNrGP
//http://www.superglobals.net/submit-form-bootstrap-modal/

?>