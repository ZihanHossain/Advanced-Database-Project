<?php
require_once('./get_profile_info.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile</title>
    <link rel="shortcut icon" href="./images/favicon.png" type="image/png" />
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
    <!-- BOXICONS -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/icons.min.css" />

    <link rel="stylesheet" href="./libs/date-picker/datepicker.css" />
    <!-- APP CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/grid.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/responsive.css" />
  </head>

  <body class="sidebar-expand counter-scroll">
    <!-- MAIN CONTENT -->

    <div class="main-content">
      <section class="login">
        <div class="row">
          <div class="col-12">
            <div class="box">
              <div class="box-header d-flex justify-content-between">
                  <h4 class="fs-30">Change profile info</h4>
              </div>
              <div class="line"></div>
              <div class="box-body">
                <div class="auth-content my-auto">
                  <div class="mt-5 pt-2">
                    <div class="mb-24">
                      <label class="form-label mb-14">User Name</label>
                      <input
                        type="text"
                        class="form-control"
                        id="username"
                        name="username"
                        placeholder="Your text"
                        value=<?php echo $username; ?>
                      />
                    </div>
                    <div class="mb-16">
                      <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                          <label class="form-label mb-14">Password</label>
                        </div>
                      </div>

                      <div class="input-group auth-pass-inputgroup">
                        <input
                          type="password"
                          id="password"
                          name="password"
                          class="form-control"
                          placeholder="Enter password"
                          aria-label="Password"
                          aria-describedby="password-addon"
                          value=<?php echo $password; ?>
                        />
                        <button
                          class="btn shadow-none ms-0"
                          type="button"
                          id="password-addon"
                        >
                          <i class="far fa-eye-slash"></i>
                        </button>
                      </div>
                    </div>
                    <div class="row mb-29">
                      <div class="col">
                        <p style="color: red" id="msg"></p>
                      </div>
                    </div>
                    <div class="mb-3">
                      <button
                        class="btn bg-primary color-white w-100 waves-effect waves-light fs-18 font-w500"
                        type="submit"
                        name="change"
                        onclick="changeLoginInfo()"
                      >
                        Change
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- END MAIN CONTENT -->

    <div class="overlay"></div>

    <!-- SCRIPT -->
    <script src="./libs/jquery/jquery.min.js"></script>
    <script src="./libs/jquery/jquery-ui.min.js"></script>
    <script src="./libs/moment/min/moment.min.js"></script>
    <script src="./libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./libs/peity/jquery.peity.min.js"></script>
    <script src="./libs/chart.js/Chart.bundle.min.js"></script>
    <script src="./libs/owl.carousel/owl.carousel.min.js"></script>
    <script src="./libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/countto.js"></script>
    <script src="./libs/date-picker/datepicker.js"></script>
    <script src="./libs/simplebar/simplebar.min.js"></script>
    <script src="./libs/password/pass-addon.init.js"></script>
    <!-- APEX CHART -->

    <!-- APP JS -->

    <script>
      function changeLoginInfo()
      {
        let username = document.getElementById('username').value;
        let password = document.getElementById('password').value;
        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", "change_profile.php");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("username="+username+"&password="+password);
        xhttp.onload = function() {
          document.getElementById('msg').innerHTML = this.responseText;
        }
      }
    </script>
  </body>
</html>
