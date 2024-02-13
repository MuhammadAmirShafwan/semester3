

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penggajian</title>  

<link href="bootstrap/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="bootstrap/sign-in.css" rel="stylesheet">
  </head>
  <body class="d-flex align-item-center py-4 bg-body-tertiary">
    
<main class="form-signin w-100 m-auto">
  <form method="post" action="cek_login.php" class="login-container">
    <h1 class="h3 mb-3 fw-normal">Please Sign In</h1>

    <div class="form-group">
        <label for="floatingInput">Username</label>
        <input type="text" class="form-control" id="floatingInput" placeholder="Enter Username" name="username">
    </div>

    <div class="form-group">
        <label for="floatingPassword">Password</label>
        <input type="password" class="form-control" id="floatingPassword" placeholder="Enter Password" name="password">
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Login</button>

    <div class="d-flex justify-content-center links">
        Dont Have account? <a href="register.php">Create</a>
    </div>

    <p class="mt-5 mb-3 text-muted">&copy; 2023</p>
</form>

  <?php
    if(isset($_GET['pesan'])){
        if($_GET['pesan'] == "gagal"){
            echo '<script language="JavaScript" type="text/javascript">';
            echo 'alert("Login gagal! Username dan password salah!");';
            echo '</script>';
        } else if($_GET['pesan'] == "logout"){
          echo '<script language="JavaScript" type="text/javascript">';
          echo 'alert("Anda telah berhasil logout");';
          echo '</script>';
        } else if($_GET['pesan'] == "belum_login"){
          echo '<script language="JavaScript" type="text/javascript">';
            echo 'alert("Anda harus login untuk mengakses halaman admin");';
            echo '</script>';
         } else if($_GET['pesan'] == "true"){
              echo '<script language="JavaScript" type="text/javascript">';
              echo 'alert("Akun Telah Dibuat!");';
              echo '</script>';
          }
           
        }
    
?>

</main>
   
  </body>
</html>
