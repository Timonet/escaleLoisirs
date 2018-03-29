<body>
    <!--menu aside, header caroussel et pop-up mon profile-->

    <div class="background">
        <!-- Page Content -->
        <div class="container">

            <div class="row">


                <aside class="col-lg-3 aside_menu">

                        <a href="#"><img class="card-img-top logo" src="medias/logos/logo_escaleLoisirs.svg" alt="logo" max-width="200"></a>
                        

                        <div class="div-search" data-toggle="collapse" data-target="#recherche-form">
                            <img src="medias/icones/loupe_noire.svg" alt="Recherche">
                        </div>
                        <form action="" class="search-form collapse" id="recherche-form">
                            <label for="search" class="sr-only">Recherche</label>
                            <input type="text" class="form-control" name="search" id="search" placeholder="Recherche">

                        </form>

                        <div class="list-group">
                            <a href="#" class="list-group-item" id="menu_activite">Activités</a>
                            <a href="#" class="list-group-item" id="menu_propos">À propos</a>
                            <a href="#" class="list-group-item" id="menu_contact">Contact</a>
                            <a href="#" class="list-group-item" id="menu_profil" data-toggle="modal" data-target="#authentification">Mon profil</a>
                            <a href="#" class="list-group-item" id="menu_langue">English</a>
                        </div>


                        <div class="coordonnees">
                            <p>
                                2018 &#9400; escaleLoisirs<br> 7050 boul. St-Laurent<br> Téléphone 514 405-0523<br> info@escaleloisirs.cariblay.com
                            </p>
                        </div>

                </aside>
                <!-- /.col-lg-3 -->


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
                        </div>

                    </div>
                </div>

                </section>

                <!--header CAROUSEL-->
                <section class="col-lg-9 principale">

                    <div id="carouselExampleIndicators" class="carousel slide carousel_border" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img class="d-block img-fluid" src="medias/images/yoga.jpg" alt="première image">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="medias/images/karate.jpg" alt="deuxième image">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="medias/images/cuisine.jpg" alt="troisième image">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                        </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                    </div>

<!--suit page centrale /accueil/fiche activite/profil membre...-->    