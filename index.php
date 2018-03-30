<?php

include('model/connexion_bdd.php');
include('model/functions.php');
include('model/functionsActivites.php');
include('model/fonctions_animateurs.php');
include('model/functionsMembres.php');
include('model/functionsListes.php');
include('pages/head-commun.html');



//MVC
if (isset($_GET['action'])){
    if($_GET['action'] == 'profil-membre'){
        include('pages/header_menu.php'); 
        include('pages/profil-membre.php');
    }elseif ($_GET['action'] == 'page-activite'){
        include('pages/header_menu.php'); 
        include('pages/page-activite.php');
    }elseif ($_GET['action'] == 'accueil-animateur'){
        include('pages/header_menu_animateur.html'); 
        include('pages/accueil-animateur.php');
    }elseif ($_GET['action'] == 'accueil-admin'){
        include('pages/header_menu_admin.html'); 
        include('pages/accueil-admin.php');
    }elseif ($_GET['action'] == 'liste-participants'){ //liste-participants par activite vue par admin
        include('pages/header_menu_admin.html'); 
        include('pages/liste-participants.php');
    }elseif ($_GET['action'] == 'liste-inscrits'){ //liste-participants par activite vue par animateur
        include('pages/header_menu_animateur.html'); 
        include('pages/liste-inscrits.php');
    }elseif ($_GET['action'] == 'supprime-fiche'){ //supprime ligne/fiche
        include('pages/header_menu_admin.html'); 
        include('pages/supprime.php');
    }elseif ($_GET['action'] == 'liste-membres'){
        include('pages/header_menu_admin.html'); 
        include('pages/liste-membres.php');
    }elseif ($_GET['action'] == 'liste-activites'){
        include('pages/header_menu_admin.html'); 
        include('pages/liste-activites.php');
    }elseif ($_GET['action'] == 'liste-animateurs'){
        include('pages/header_menu_admin.html'); 
        include('pages/liste-animateurs.php');
    }elseif ($_GET['action'] == 'ajout-activite'){
        include('pages/header_menu_admin.html'); 
        include('pages/ajout-activite.php');
    }elseif ($_GET['action'] == 'ajout-animateur'){
        include('pages/header_menu_admin.html'); 
        include('pages/ajout-animateur.php');
    }elseif ($_GET['action'] == 'modif-activite'){
        include('pages/header_menu_admin.html'); 
        include('pages/fiche-activite.php');
    }elseif ($_GET['action'] == 'modif-animateur'){
        include('pages/header_menu_admin.html'); 
        include('pages/fiche-animateur.php');
    }elseif ($_GET['action'] == 'effacer'){
        include('pages/header_menu_admin.html'); 
        include('pages/effacer.php');
    }

}elseif (isset($_GET['go']) && ($_GET['go'] == 'go')){
    //include('view/resultat.php');
}else{ 
    include('pages/header_menu.php'); 
?>

<!--
    Page accueil avec liste activites
    Menu aside et caroussel header dans page html commune a toutes les pages
-->

    <h1>| &nbsp;&nbsp;nos activités&nbsp;&nbsp; |</h1>

    <div class="row activites">

        <div class="col-md-4 col-sm-6 mb-4">
            <div class="hovereffect">
                <img class="img-responsive" src="medias/images/cuisiner.jpg" alt="">
                <div class="headline-vert">Cuisine en famille</div>

                <div class="card slide-vert text-center">
                  <div class="card-body">
                    <h5 class="card-title">Cuisine en famille</h5>
                    <p class="card-text">Découvrez ou redécouvrez le plaisir de passer du temps en famille!</p>
                    <a href="#" class="btn btn-primary">Inscrivez-vous</a>
                  </div>
                </div>

            </div>

        </div>

        <div class="col-md-4 col-sm-6 mb-4">
            <div class="hovereffect">
                <img class="img-responsive" src="medias/images/parkour.jpg" alt="">
                <div class="headline-orange">Parkour en ville</div>
                <div class="card slide-orange text-center">
                  <div class="card-body">
                    <h5 class="card-title">Parkour en ville</h5>
                    <p class="card-text">Partagez votre passion avec d'autres passionnés.</p>
                    <a href="#" class="btn btn-primary">Inscrivez-vous</a>
                  </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 mb-4">
            <div class="hovereffect">
                <img class="img-responsive" src="medias/images/relaxation.jpg" alt="">
                <div class="headline-violet">Relaxation tous âges</div>
                <div class="card slide-violet text-center">
                  <div class="card-body">
                    <h5 class="card-title text-light">Relaxation tous âges</h5>
                    <p class="card-text text-light">L'art de bien relaxer et libérer votre esprit!</p>
                    <a href="#" class="btn btn-primary">Inscrivez-vous</a>
                  </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 mb-4">
            <div class="hovereffect">
                <img class="img-responsive" src="medias/images/danse_enfants.jpg" alt="">
                <div class="headline-orange">Danse-bébé</div>
                <div class="card slide-orange text-center">
                  <div class="card-body">
                    <h5 class="card-title">Danse-bébé</h5>
                    <p class="card-text">Offrez à votre enfant la joie de s'exprimer par la danse!</p>
                    <a href="#" class="btn btn-primary">Inscrivez-vous</a>
                  </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 mb-4">
            <div class="hovereffect">
                <img class="img-responsive" src="medias/images/cardio.jpg" alt="">
                <div class="headline-bleu">Cardio intense</div>
                <div class="card slide-bleu text-center">
                  <div class="card-body">
                    <h5 class="card-title">Cardio intense</h5>
                    <p class="card-text">Venez suer avec nos meilleurs entraîneurs!</p>
                    <a href="#" class="btn btn-primary">Inscrivez-vous</a>
                  </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 mb-4">
            <div class="hovereffect">
                <img class="img-responsive" src="medias/images/pilates.jpg" alt="">
                <div class="headline-vert">Pilates</div>
                <div class="card slide-vert text-center">
                  <div class="card-body">
                    <h5 class="card-title">Cardio intense</h5>
                    <p class="card-text">Améliorez votre posture et l'alignement de votre corps!</p>
                    <a href="#" class="btn btn-primary">Inscrivez-vous</a>
                  </div>
                </div>
            </div>
        </div>
    </div>


    <input class="btn btn-primary" id="btn-plus-activ" type="submit" value="Voir plus d'activités" />

    <!-- /.row -->

    <section class="section section-newsletter">

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4>INFOLETTRE</h4>
                    <p>
                        Ne manquez rien, inscrivez-vous à notre infolettre
                    </p>
                </div>
                <!-- col -->
                <div class="col-md-6 infolettre">
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control input-subscription" name="">
                            <div class="input-group-append">
                                <input class="btn btn-primary" type="submit" value="Envoyer" />
                            </div>
                        </div>
                    </form>
                </div>
                <!-- col -->
            </div>
            <!-- row -->
        </div>

    </section>

    <section>

        <h2>| &nbsp;&nbsp;escaleLoisirs&nbsp;&nbsp; |</h2>

        <p class="presentation">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.
        </p>

    </section>

    <section>

        <h2>| &nbsp;&nbsp;nos partenaires&nbsp;&nbsp; |</h2>

        <div class="row partenaires">

            <div class="col-4">
                <a href="#"><img class="logo-img-top" src="medias/logos/partenaires/LOGO_FQCCL.png" alt="logo FQCCL"></a>
            </div>

            <div class="col-4">
                <a href="#"><img class="logo-img-top" src="medias/logos/partenaires/logo_MONTREAL.png" alt="logo ville de Montréal"></a>
            </div>

            <div class="col-4">
                <a href="#"><img class="logo-img-top" src="medias/logos/partenaires/logo_QUEBEC.png" alt="logo province de Québec"></a>
            </div>

        </div>

    </section>
    <!-- /NEWSLETTER -->


    <footer class="footer">
        <div class="row">

            <div class="col-md-6 section-contact">


                <div>
                    <p class="title-contact">Nous joindre</p>
                </div>

                <div class="coordonnees-footer">
                    <p>
                        7050 boul. St-Laurent<br> Montréal QC H2R 1T8
                    </p>
                </div>

                <div class="coordonnees-footer">
                    <p>
                        Téléphone: 514 405-0523<br> Courriel: info@escaleloisirs.cariblay.com
                    </p>
                </div>

                <div class="row logos-medias">

                    <div class="logo-medias"><a href="#"><img class="card-img-top" src="medias/mediasSociaux/logo_facebook.svg" alt=" Facebook" title="Facebook"></a></div>
                    <div class="logo-medias"><a href="#"><img class="card-img-top"  src="medias/mediasSociaux/logo_twitter.svg" alt=" Twitter" title="Twitter"></a></div>
                    <div class="logo-medias"><a href="#"><img class="card-img-top"  src="medias/mediasSociaux/logo_googlePlus.svg" alt="Google+" title="Google+"></a></div>
                    <div class="logo-medias"><a href="#"><img class="card-img-top"  src="medias/mediasSociaux/logo-youTube.svg" alt="You Tube" title="You Tube"></a></div>

                </div>

            </div>



            <div class="col-md-6 form-contact">
                <div class="well well-sm">
                    <form class="form-horizontal" action="" method="post">
                        <fieldset>
                            <div class="title-contact">Contactez-nous</div><br>

                            <!-- Name input-->
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input id="name" name="name" type="text" placeholder="Nom" class="form-control">
                                </div>
                            </div>

                            <!-- Email input-->
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input id="email" name="email" type="text" placeholder="Courriel" class="form-control">
                                </div>
                            </div>

                            <!-- Subject input-->
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input id="subject" name="subject" type="text" placeholder="Sujet" class="form-control">
                                </div>
                            </div>

                            <!-- Message body -->
                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea class="form-control" id="message" name="message" placeholder="Message" rows="5"></textarea>
                                </div>
                            </div>

                            <!-- Form actions -->
                            <div class="form-group">
                                <div class="col-md-11">
                                    <button type="submit" class="btn btn-primary">Envoyer</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>


            </div>

        </div>

    </footer>

</section>
<!-- /.col-lg-9 -->

</div>
<!-- /.row -->



</div>
<!-- /.container -->

</div>
<!-- /.background -->

    
    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

<?php   
}
//include('view/footer.php');

?>