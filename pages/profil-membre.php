
                      
          <h1>| &nbsp;&nbsp;mon profil&nbsp;&nbsp; |</h1>

          <!-- coordonnées modifiables + liste inscriptions-->
          <div class="row row__monprofil">
            <div class="col-lg-6 col_monprofil">
              <h3 class="h3__admin--etroit">Vos coordonnées</h3>
              <h6 class="h6__monprofil">*Vous pouvez actualiser vos coordonnées sur cette même page.</h6>
              
              <!--fiche modifiable animateur(trice)-->
              <form method="post" action="" class="form__monprofil">
                <div class="form-row">
                  <div class="form-group col-sm-6">
                    <input required type="text" class="form-control" name="nom_membre" placeholder="Nom" value="">
                  </div>
                  <div class="form-group col-sm-6">
                    <input required type="text" class="form-control" name="prenom_membre" placeholder="Prenom" value="">
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-sm-2">
                    <input required type="text" class="form-control" name="n_rue_membre" placeholder="N. rue" value="">
                  </div>
                  <div class="form-group col-sm-4">
                    <input required type="text" class="form-control" name="rue_membre" placeholder="Rue" value="">
                  </div>
                  <div class="form-group col-sm-2">
                    <input required type="text" class="form-control" name="cp_membre" placeholder="C.P." value="">
                  </div>
                  <div class="form-group col-sm-4">
                    <input required type="text" class="form-control" name="ville_membre" placeholder="Ville" value="">
                  </div>
                  </div>

                  <div class="form-row">  
                  <div class="form-group col-sm-6">
                    <input required type="text" class="form-control" name="tel_membre" placeholder="Téléphone" value="">
                  </div>

                  <div class="form-group col-sm-6">
                    <input required type="text" class="form-control" name="courriel_membre" placeholder="Courriel" value="">
                  </div>
                </div>

                <div class="form-row">  
                  <div class="form-group col-sm-5">
                    <input type="submit" name="modifier_membre" value="Actualiser" class="btn btn-secondary btn-lg btn-block btn__admin btn__admin--publier">
                  </div>
                </div>
              </form>             
            </div>

            <div class="col-lg-6 col_monprofil">
              <!--liste activites / permet se désinscrire-->
              <h3 class="h3__admin--etroit">Liste de vos activités</h3>
              <h6 class="h6__monprofil">*Pour vous désinscrire, clickez sur "annuler".</h6>
              <table class="table table-sm">
                <thead class="thead__admin--minimal">
                  <tr>
                    <th scope="col">Titre activité</th>
                    <th scope="col">Dates</th>
                    <th scope="col">Payement</th>
                    <th scope="col">Annuler</th>
                  </tr>
                </thead>
                <tbody class="tbody__admin--minimal">
                  <tr>
                    <td>$bdd / Titre activité</td>
                    <td>$bdd / Dates</td>
                    <td>$bdd / Payement</td> <!--via PHP, soit "Paye", soit "A payer"-->
                    <td><a class="td__a__monprofil" href="#">Annuler</a></td> <!--lien-->
                  </tr>
                </tbody>
              </table>
              <h6 class="h6__monprofil">Les payements doivent se faire en personne. Si vous avez des questions, contactez l'<a class="a__monprofil" href="mailto:info@escaleLoisirs.cariblay.com">administrateur</a>.</h6>
            </div>
          </div>

            <!-- /FOOTER -->
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



                            <div class="col-md-6 form-contact form-contact__monprofil">
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
                  

          </div><!-- /.row -->  

        </section><!-- /.col-lg-9 -->

      </div><!-- /.row -->       

    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>