<?php 

if(isset($_POST['btn_login_menu'])){
    echo 'hello';
    //  Récupération id_personne et mot de passe

    // Dans une 2e etape: mp HACHE
    // $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);

    $query = 'SELECT code_personne, mot_passe_personne FROM personnes WHERE courriel_personne = ?';
    $stmt = mysqli_prepare($bdd, $query);
    mysqli_stmt_bind_param($stmt, 's', $courriel);
    mysqli_execute($stmt);
    $resultat = mysqli_stmt_get_result($stmt);
    $donnees = mysqli_fetch_assoc($resultat);


    // Comparaison du m.p. envoyé via le formulaire avec la bdd et connexion

    // Dans une 2e etape, mp hache
    // $isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);

    if (!$donnees){
        echo 'Mauvais identifiant ou mot de passe !';
    }else{
        if ($donnees['mot_passe_personne']==$_POST['motpasse_connex']) {
           // session_start();
          //  $_SESSION['id'] = $donnees['id'];
           // $_SESSION['courriel'] = $donnees['courriel_personne'];
            echo 'Vous êtes connecté !';
        }
        else {
            echo 'Mauvais identifiant ou mot de passe !';
        }
    }
}else{
    ?>
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
<?php
}
?>