<?php
session_start();

require 'services/koneksi.php';

$notification = '';

function displayNotification($message)
{
  return "<div style='position: absolute; top: 2%; left: 1%; background: linear-gradient(to left top, #f5f5f5, #fca5a5); width: 300px; height: 55px; font-size: 10px; display: flex; justify-content: center; align-items: center;' class='rounded shadow-md px-4 text-danger fw-bold animate__animated animate__fadeInDown' role='alert'>
  <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" fill=\"currentColor\" class=\"h-5 w-5\">
      <path
        fill-rule=\"evenodd\"
        d=\"M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z\"
        clip-rule=\"evenodd\"
      />
    </svg>
  " . htmlspecialchars($message) . "
  </div>";
}

if (isset($_SESSION['login'])) {
  header("Location: index.php");
  exit;
}

if (isset($_POST['login'])) {
  if (!empty($_POST['email'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $notification = displayNotification('Format email tidak valid!');
    } else {
      $query = "SELECT * FROM admin WHERE email = '$email'";
      $result = mysqli_query($conn, $query);

      if (!$result) {
        echo "Error: " . mysqli_error($conn);
        exit;
      }

      if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['password'];

        $hashedPassword = hash('sha256', $password);
        if ($hashedPassword === $storedPassword) {
          $_SESSION['login'] = true;
          header("Location: index.php");
          exit;
        } else {
          $notification = displayNotification('Login Gagal, Password Salah!');
        }
      } else {
        $notification = displayNotification('Login Gagal!, Email salah!');
      }
    }
  } else {
    $notification = displayNotification('Email tidak boleh kosong!');
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="soft-ui/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="soft-ui/assets/img/favicon.png">
  <title>
    Login AdminPro (MS)
  </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="soft-ui/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="soft-ui/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="soft-ui/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="soft-ui/assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body>
  <?= $notification ?>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Login AdminPro MS</h3>
                  <p class="mb-0">Masukan Email dan Password Admin untuk mengakses Dashboard</p>
                </div>

                <div class="card-body">
                  <form role="form" method="post">
                    <div class="form-floating mb-3">
                      <input type="email" id="email" name="email" class="form-control" placeholder="email"
                        value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">
                      <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="password" id="password" name="password" class="form-control" placeholder="password"
                        value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
                      <label for="password">Password</label>
                    </div>
                    <div class="text-center">
                      <button type="submit" name="login" class="btn bg-gradient-info w-100 mt-4 mb-0">Masuk</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                  style="background-image:url('soft-ui/assets/img/curved-images/curved6.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>\
  <!--   Core JS Files   -->
  <script src="soft-ui/assets/js/core/popper.min.js"></script>
  <script src="soft-ui/assets/js/core/bootstrap.min.js"></script>
  <script src="soft-ui/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="soft-ui/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="soft-ui/assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>