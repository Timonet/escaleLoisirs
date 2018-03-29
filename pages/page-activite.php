<body>
                <!--info activite et inscription -->
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

                                <?php
                                include('pages/creer-profil-paiement.php');
                                ?>                        
                                
                            </div>

                            <div id="membre-exist" class="container tab-pane fade"><br>
                                <p>Afin de vous inscrire à une activité du centre, vous devez préalablement vous authentifier.</p><br>
                                
                                <?php
                                include('pages/connexion-membre.php');
                                ?>    

                                TEST
                                
                           </div>

                        </div>
                    </section>
                </div>
                <!-- /col-xl-6 col-sm-12 /info activite et inscription -->

         <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>