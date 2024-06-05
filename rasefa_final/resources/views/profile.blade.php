<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                <li><a href="{{asset('account')}}"><i class="ri-account-circle-line"></i></a></li>
              </ul>
              <!-- Navigation bar -->
            </div>
        </div>
    </header>
    <!-- header -->

    <main class="ds-main-section">
        <div class="wrapper bg-white mt-sm-5">
        
        <br>
        <h2 class="ds-heading">Profile Photo</h2>
        <div class="d-flex align-items-start py-3 border-bottom">
            <img src="https://images.pexels.com/photos/1037995/pexels-photo-1037995.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                class="img" alt="">
            <div class="pl-sm-4 pl-2" id="img-section">
                <b>Profile Photo</b>
                <p>Accepted file type .png. Less than 1MB</p>
                <button class="btn button border"><b>Upload</b></button>
            </div>
        </div>

        <br>
        <h2 class="ds-heading">Contact Detail</h2>
        <div class="py-2">
            <div class="row py-2">
                <div class="col-md-6">
                    <label for="username">Username</label>
                    <input type="text" class="bg-light form-control" value="{{ $pembeli->username }}" disabled="">
                </div>
                <div class="col-md-6 pt-md-0 pt-3">
                    <label for="email">Nama</label>
                    <input type="text" class="form-control" value="{{ $pembeli->nama }}" required="">
                </div>
            </div>
            <div class="row py-2">
            <div class="col-md-6 pt-md-0 pt-3">
                    <label for="email">Email Address</label>
                    <input type="text" class="form-control" value="{{ $pembeli->email }}" required="">
                </div>
                <div class="col-md-6 pt-md-0 pt-3">
                    <label for="phone-number">Phone Number</label>
                    <input type="tel" class="form-control" value="{{ $pembeli->no_telfon }}" required="">
                </div>
            </div>
            <div class="py-3 pb-4 border-bottom"></div>
            
            <br>
            <h2 class="ds-heading">Change Password</h2>
            <div class="row py-2">
                <div class="form-group">
                    <label for="account-recent-pass">Recent Password</label>
                    <input class="form-control" type="password">
                </div>             
                <div class="form-group">
                    <label for="account-new-pass">New Password</label>
                    <input class="form-control" type="password">
                </div>
                <div class="form-group">
                    <label for="account-confirm-pass">New Password</label>
                    <input class="form-control" type="password">
                </div>
            </div>

            <div class="d-sm-flex align-items-center pt-3" id="save">
                <button type="button" class="btn btn-primary btn-sm">Save Changes</button>
            </div>
        </div>
    </div>
   </main>

    <section>
        <br>
        <div class="text-center">
            <a href="account" class="ds-button ds-arrow-button"><i class="ri-arrow-left-s-line"></i> Back</a>
        </div>
        <br>
    </section>

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
   </footer>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script src="assets/js/main.js"></script>
  </body>
</html>