<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fots -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
      <!-- Remixicon Icon -->
      <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
      <!-- Remixicon Icon -->
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
      <!-- Main CSS -->
      <link rel="stylesheet" href="{{asset('style/account.css')}}"> 
      <link rel="icon" type="image/x-icon" href="{{ asset('logorasefa.png') }}" />
    <title>Rasefa</title>
</head>
<body>

     <!-- header -->
     <header class="ds-header" id="site-header">
        <div class="container">
            <div class="ds-header-inner">
              <!-- logo -->
              <a href="home" class="ds-logo">
                <span>R</span>asefa
              </a>
              <!-- logo -->
              <!-- Navigation bar -->
              <ul class="ds-navbar">
                <li><a href="#" target="_blank"><i class="ri-search-line"></i></a></li>
                <li><a href="keranjang" target="_blank"><i class="ri-shopping-cart-2-line"></i></a></li>
                <li><a href="account"><i class="ri-account-circle-line"></i></a></li>
              </ul>
              <!-- Navigation bar -->
            </div>
        </div>
    </header>
   
   <!--  Catalogue-->
   <div class="ds-katalog">
     <div class="container">
          <div class="ds-katalog-list-section">
            <div class="ds-katalog-list">
              <div class="row">
                  <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 col-xxl-7">
                      <section>
                          <p> Welcome! </p>
                          <h3 class="ds-katalog-tilte">Username</h3>
                          <br>
                          <a href="profile" class="ds-button">Profile </a>
                          <br>
                          <a href="myorders" class="ds-button">My Orders </a>
                      </section>
                  </div>
                  <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5">
                      <figure><img src="{{asset('img/katalog-details-image-1.jpg')}}"></figure>
                  </div>
              </div>
            </div>
            </div>
          </div>
     </div>
   </div>
   <!--  katalog -->

   <!--  footer -->
   <footer class="ds-footer text-center">
     <div class="container">
        <section>
          <span>Stay in touch</span>
          <h4>Ready to talk?</h4>
          <p>Feel free to contact us</p>
          <a href="mailto:test@test.com" class="ds-button">Lets Talk</a>
        </section>
        <span class="ds-copyright">© 2022 All rights reserved. Free minimal bootstrap template by <a href="https://designstub.com/" target="_blank">Designstub</a>.</span>
     </div>
</body>
</html>