<!DOCTYPE html>
<html>

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Banque du Sang</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  </head>

<body>

  <!-- ***** Preloader Start *****  
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>-->
  
  <!-- ***** Preloader End ***** -->
  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="/" class="logo">
              <h4>Banque<span> Du Sang</span></h4>
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Acceuil</a></li>
              <li class="scroll-to-section"><a href="#about">A propos</a></li>
              <li class="scroll-to-section"><a href="#services">Services</a></li>
              
              <li class="scroll-to-section"><div class="main-red-button"><a href="{{ Route('dashboard')}}" id="besoinsang">TABLEAU DE BORD</a></div></li> 
              <li class="scroll-to-section"><div class="main-red-button"><a href="{{ Route('register') }}" id="besoinsang">REGISTER</a></div></li> 
      
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->
 
  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <h6>BIENVENUE DANS LA BANQUE DU SANG</h6>
                <h2>Sauvez une vie <em>Faites un don</em> <span>votre SANG</span> serez entre DES BONNES MAINS</h2>
                <p>Nous vous facilitons la procédure de don, afin d'aider le maximum de patients en besoin urgent du sang ! N'hésitez SURTOUT PAS !
        

                    <div class="main-blue-button"><a href="">FAITES UN DON</a></div>

                
              </div>
            </div>
            <div class="col-lg-6 align-self-center">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="assets/images/blood1.png" style="width:500px; height:500px;" alt="don de sang">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="about" class="about-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="left-image wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
            <img src="assets/images/blood1 (2).png" alt="person graphic">
          </div>
        </div>
        <div class="col-lg-8 align-self-center">
          <div class="services">
            <div class="row">
              <div class="col-lg-6">
                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                  <div class="icon">
                    <img src="assets/images/service-icon-01.png" alt="reporting">
                  </div>
                  <div class="right-text">
                    <h4>Prélévement Sécuritaire</h4>
                    <p>Personnel médical compétent, prêt à repondre à vos questions</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
                  <div class="icon">
                    <img src="assets/images/service-icon-02.png" alt="">
                  </div>
                  <div class="right-text">
                    <h4>Accompagnement</h4>
                    <p>Votre santé compte beaucoup, on vous suit même aprés votre don</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.9s">
                  <div class="icon">
                    <img src="assets/images/service-icon-03.png" alt="">
                  </div>
                  <div class="right-text">
                    <h4>Analyse sanguine</h4>
                    <p>Profitez d'un bilan médical de votre état de santé gratuitement</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="1.1s">
                  <div class="icon">
                    <img src="assets/images/service-icon-04.png" alt="">
                  </div>
                  <div class="right-text">
                    <h4>Ayez des Avantages</h4>
                    <p>Devenez membre et ayez accés à plusieurs avantages médicaux</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="services" class="our-services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center  wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
          <div class="left-image">
            <img src="assets/images/sangDis.jpg" width="500px" height="500px" alt="">
          </div>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
          <div class="section-heading">
            <h2>Nous assurons la bonne distribution de votre <span>SANG</span> </h2>
            <p>Nous mettons à votre disposition une équipe d'expert afin de vous servire de la meilleure façon et vous faciliter le don et la transfusion de votre sang, la distribution se fait en toute transparence.</p>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="first-bar progress-skill-bar">
                <h4>Sang transfusé</h4>
                <span>80%</span>
                <div class="filled-bar"></div>
                <div class="full-bar"></div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="second-bar progress-skill-bar">
                <h4>Sang en stock</h4>
                <span>20%</span>
                <div class="filled-bar"></div>
                <div class="full-bar"></div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="third-bar progress-skill-bar">
                <h4>Demande traitée cette année</h4>
                <span>94%</span>
                <div class="filled-bar"></div>
                <div class="full-bar"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="portfolio" class="our-portfolio section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading  wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
            <h2>Nous rendons un service <em>Humain</em> &amp; surtout <span>Transparent</span></h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-sm-6">
          <a href="#">
            <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
              <div class="hidden-content">
                <h4>Analyse Gratuit</h4>
                <p>Profitez d'un bilan médical gratuit.</p>
              </div>
              <div class="showed-content">
                <img src="assets/images/icon2.png" alt="">
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-sm-6">
          <a href="#">
            <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.4s">
              <div class="hidden-content">
                <h4>Prélèvement Agile</h4>
                <p>Vous serez entre des bonnes mains, grâce à nos médecins.</p>
              </div>
              <div class="showed-content">
                <img src="assets/images/icon1.png" alt="">
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-sm-6">
          <a href="#">
            <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.5s">
              <div class="hidden-content">
                <h4>Accompagnement</h4>
                <p>Notre corps médical fera un suivi régulier de votre état de santé.</p>
              </div>
              <div class="showed-content">
                <img src="assets/images/icon3.png" alt="">
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-sm-6">
          <a href="#">
            <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.6s">
              <div class="hidden-content">
                <h4>Avantages</h4>
                <p>En ayant une carte de donneur, vous aurez accés facile au services médicaux.</p>
              </div>
              <div class="showed-content">
                <img src="assets/images/icon4.png" alt="">
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
  
  <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <div class="section-heading">
            <h2>Vous avez des questions ?</h2>
            <p>Veuillez remplir ce formulaire soignesement et nous reviendrons vers vous dans les plus brefs délais</p>
            <div class="phone-info">
              <h4>Demande urgente, Appelez le: <span><i class="fa fa-phone"></i> <a href="#">05 35 35 55 35</a></span></h4>
            </div>
          </div>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
        @if(session()->get('status') != "")   
                           <div class="alert alert-success d-flex align-items-center" width="500px" role="alert">
                              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <div>
                              <script>
                                function submit(){ 
                                const input = document.getElementById("name");
                                window.addEventListener("load", (e)=>{
                                input.focus(); 
                                })
                          }
                            </script>
                            </div>
                            </div>
                    @endif 
        <form id="contact" action="{{ Route('contact.post'); }}" method="post">
            @csrf
            <div class="row">
                
              <div class="col-lg-6">
                <fieldset>
                  <input type="text" name="name" id="name" placeholder="Nom" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <input type="text" name="nname" id="surname" placeholder="Surnom" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="mail" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Votre Email" required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <textarea name="msg" type="text" class="form-control" id="message" placeholder="Message" required=""></textarea>  
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="main-button" onclick="submit()">Envoyer</button>
                </fieldset>
              </div>
            </div>
            <div class="contact-dec">
              <img src="assets/images/contact-decoration.png" alt="">
            </div>
          </form>
          
        </div>
      </div>
    </div>
  </div>
  
  
  @extends('footer')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/animation.js"></script>
  <script src="assets/js/imagesloaded.js"></script>
  <script src="assets/js/templatemo-custom.js"></script>
</body>
</html>