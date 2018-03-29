<title>Inscription</title>

<body>

                <div class="row select-act">

                    <!-- Section description d'activité -->
                    <section class="col-xl-6 col-sm-12 mb-4">
                        <div class="col-12">
                            <h3>| &nbsp;&nbsp;activité sélectionnée&nbsp;&nbsp; |</h3>
                            <table class="table table-md table-hover">
                                <tr>
                                    <th scope="col">Activité</th>
                                    <td>Titre activité (php)</td>
                                </tr>
                                <tr>
                                    <th scope="col">Classification</th>
                                    <td>Titre catégorie (php)</td>
                                </tr>
                                <tr>
                                    <th scope="col">Description</th>
                                    <td>Description de l'activité (php)</td>
                                </tr>
                            </table>
                        </div><br>

                        <div class="col-12">
                            <h3>| &nbsp;&nbsp;détails&nbsp;&nbsp; |</h3>
                            <table class="table table-md table-hover">
                                <tr>
                                    <th scope="col">Date de début</th>
                                    <td>Date début (php)</td>
                                </tr>
                                <tr>
                                    <th scope="col">Date de fin</th>
                                    <td>Date fin (php)</td>
                                </tr>
                                <tr>
                                    <th scope="col">Horaire</th>
                                    <td>Horaire (php)</td>
                                </tr>
                                <tr>
                                    <th scope="col">Animateur</th>
                                    <td>Nom animateur (php)</td>
                                </tr>
                                <tr>
                                    <th scope="col">Nombre de places</th>
                                    <td>Nb places (php)</td>
                                </tr>
                                <tr>
                                    <th scope="col">Salle</th>
                                    <td>Salle (php)</td>
                                </tr>
                                <tr>
                                    <th scope="col">Coût</th>
                                    <td>Prix (php)</td>
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
                                            <input required type="email" class="form-control" name="courriel_membre" placeholder="Choisir un mot de passe" value="">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input required type="email" class="form-control" name="courriel_membre" placeholder="Confirmer votre mot de passe" value="">
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


                            </div>
                            <div id="membre-exist" class="container tab-pane fade"><br>
                                <p>Afin de vous inscrire à une activité du centre, vous devez préalablement vous authentifier.</p><br>

                                <!-- section d'authentification en "modal" -->
                                <form action="">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="courriel_membre" placeholder="Courriel">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="pwd" placeholder="Mot de passe">
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                              <input class="form-check-input" type="checkbox"> Se souvenir de moi
                                            </label>
                                    </div>
                                    <div class="btn-nouv-membre">
                                        <input type="submit" name="login_membre" class="btn btn-custom btn-block" value="Accéder à mon compte" data-toggle="modal" data-target="#paiementExistant">
                                    </div>
                                </form>

                            </div>

                        </div>
                    </section>
                </div>
                <!-- /col-xl-6 col-sm-12 /info activite et inscription -->

              
        <!-- section d'authentification en "modal" -->
        <section class="form-wrap modal fade" id="authentification">


            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content">

                    <div class="modal-header">
                        <h3 class="modal-title">Authentification</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form role="form" action="javascript:;" method="post" id="login-form" autocomplete="off">

                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Courriel">
                            </div>
                            <div class="form-group">
                                <input type="password" name="key" id="key" class="form-control" placeholder="Mot de passe">
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                              <input class="form-check-input" type="checkbox"> Se souvenir de moi
                            </label>
                            </div>
                            <input type="submit" class="btn btn-custom btn-lg btn-block" name="login_membre" value="Accéder à mon compte">
                        </form>
                    </div>

                </div>
            </div>


        </section>

        <!-- section paiement en "modal" -->
        <section class="form-wrap modal fade show" id="paiementNouveau">


            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content">

                    <div class="modal-header creationMembre-reussie">
                        <h3 class="modal-title creationMembre-title">Votre profil membre escaleLoisirs a été créé avec succès!</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <p>À titre indicatif, veuillez choisir la méthode de paiement avec laquelle vous prévoyez couvrir les frais d'inscription.</p>

                        <form class="form-paiement" role="form" action="javascript:;" method="post" autocomplete="off">
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
                        </form>
                           
                            <p>Prendre note que vous devez vous présenter au comptoir d'accueil du centre afin de payer les frais d'admission. Une fois le paiement accepté, nous vous confirmerons votre inscription.</p>
                            <input type="submit" class="btn btn-custom btn-block" value="Envoyer ma demande d'inscription">

                    </div>

                </div>
            </div>


        </section>
<!-- section paiement en "modal" -->
        <section class="form-wrap modal fade show" id="paiementExistant">


            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content">

                    <div class="modal-header creationMembre-reussie">
                        <h3 class="modal-title creationMembre-title">Authentification réussie! <br> Content de vous revoir.</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <p>À titre indicatif, veuillez choisir la méthode de paiement avec laquelle vous prévoyez couvrir les frais d'inscription.</p>

                        <form class="form-paiement" role="form" action="javascript:;" method="post" autocomplete="off">
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
                        </form>
                           
                            <p>Prendre note que vous devez vous présenter au comptoir d'accueil du centre afin de payer les frais d'admission. Une fois le paiement accepté, nous vous confirmerons votre inscription.</p>
                            <input type="submit" class="btn btn-custom btn-block" value="Envoyer ma demande d'inscription">

                    </div>

                </div>
            </div>


        </section>
       