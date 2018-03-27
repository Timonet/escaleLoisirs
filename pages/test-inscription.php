https://stackoverflow.com/questions/36047526/open-bootstrap-modal-after-php-form-submit



<div class="tab-content card card-body mb-4">
<div id="nouv-membre" class="container tab-pane active"><br>
    
    <p>Afin de vous inscrire à une activité du centre, vous devez préalablement vous créer un profil membre.</p><br>

    <form method="post" action="">
        <h5>| &nbsp;&nbsp;informations personnelles&nbsp;&nbsp; |</h5><br>
        <div class="form-row">
            <div class="form-group col-md-12">
                <input required type="text" class="form-control" name="nom_membre" placeholder="Nom" value="">
            </div>
            <div class="form-group col-md-12">
                <input required type="text" class="form-control" name="prenom_membre" placeholder="Prénom" value="">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <input required type="text" class="form-control" name="adresse_membre" placeholder="No civique" value="">
            </div>
            <div class="form-group col-md-8">
                <input required type="text" class="form-control" name="rue_membre" placeholder="Rue" value="">
            </div>
            <div class="form-group col-md-8">
                <input required type="text" class="form-control" name="ville_membre" placeholder="Ville" value="">
            </div>
            <div class="form-group col-md-4">
                <input required type="text" class="form-control" name="cp_membre" placeholder="Code postal" value="">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <input required type="text" class="form-control" name="tel_membre" placeholder="Telephone" value="">
            </div>
        </div><br>
        
        <h5>| &nbsp;&nbsp;identifiant escaleLoisirs&nbsp;&nbsp; |</h5><br>
        <div class="form-row">
            <div class="form-group col-md-12">
                <input required type="text" class="form-control" name="courriel_membre" placeholder="Courriel" value="">
            </div>
            <div class="form-group col-md-12">
                <input required type="email" class="form-control" name="mp_membre" placeholder="Choisir un mot de passe" value="">
            </div>
            <div class="form-group col-md-12">
                <input required type="email" class="form-control" name="mp_membre" placeholder="Confirmer votre mot de passe" value="">
            </div>
        </div>
        
        <div class="form-check">
            <label class="form-check-label">
                  <input class="form-check-input" type="checkbox"> Se souvenir de moi
                </label>
        </div>

        <div class="btn-nouv-membre">
            <input type="submit" name="enregistrer_nouv_membre" value="Devenir membre" class="btn btn-custom btn-block" data-toggle="modal" data-target="#paiementNouveau">
        </div>

    </form>