<body class="parallax-index">
  <?php require_once 'header.php' ?>
  
  


                  
                      <!-- PLAT desktop -->

                      <!-- Section des catégories desktop-->
                      
                      

                          <div class="container card-custom d-none d-md-flex">
                              <div class=" row categories-page1 card_desktop">

                              <?php
                              foreach ($categories_index as $cat) {
                                    $cat->affichage_categorie_desktop();
                              }
                             ?>

                              </div>
                          </div>
                      
                          <!-- CATEGORIE MOBILE -->
                          
                          <div class="categorie_mobile d-sm flex d-md-none d-lg-none">

                          <?php
                              foreach ($categories_index as $cat) {
                                    $cat->affichage_categorie_mobile();
                              }
                             ?>

                          </div>
                      
                          <footer class="text-center mt-5">

</body>
                  
                  
    <?php
    require_once('footer.php');
    ?>