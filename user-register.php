<?php
require_once './nid_check.php';
// require_once './register-user.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration</title>
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
                <a href="user-register.php">
                  <img src="./images/logo.png" alt="" />
                </a>

                <div class="action-reg">
                  <h4 class="fs-30">Registration</h4>
                  <a href="new-account.html">Create an account</a>
                </div>
              </div>
              <div class="line"></div>
              <div class="box-body">
                <div class="auth-content my-auto">
                  <form class="mt-5 pt-2" method="POST">
                    <div class="">
                        <label class="form-label mb-14">National Id Number</label>
                        <input
                          type="number"
                          class="form-control"
                          id="n_id"
                          name="n_id"
                          placeholder="Your text"
                          value=<?php if(isset($n_id)){echo "'$n_id'";} ?>
                          <?php if($nid_check){echo 'disabled';} ?>
                        />
                    </div>
                    <div class="row">
                      <div class="col">
                        <p style="color: red"><?php echo $n_id_err; ?></p>
                      </div>
                    </div>
                    <button
                        class="btn bg-primary color-white w-20 waves-effect waves-light fs-18 font-w500"
                        type="submit"
                        name="check"
                        <?php if($nid_check){echo 'disabled';} ?>
                      >
                        Check
                    </button>
                  </form>
                  <div <?php if($nid_check){echo "style='display:block'";} else{echo "style='display:none'";} ?>>
                    <div class="row mb-24">
                      <div class="col">
                            <label class="form-label mb-14">Name</label>
                            <input
                              type="text"
                              class="form-control"
                              id="name"
                              name="name"
                              placeholder="Name"
                              value=<?php if(isset($name)){echo "'$name'";} ?>
                              disabled
                            />
                      </div>
                      <div class="col" style="display: none;">
                            <label class="form-label mb-14">Citizen Id</label>
                            <input
                              type="number"
                              class="form-control"
                              id="c_id"
                              name="c_id"
                              placeholder="Citizen Id"
                              value=<?php if(isset($c_id)){echo "'$c_id'";} ?>
                              disabled
                            />
                      </div>
                      <div class="col">
                            <label class="form-label mb-14">Job</label>
                            <input
                              type="text"
                              class="form-control"
                              id="job"
                              name="job"
                              placeholder="Job"
                              value=<?php if(isset($job)){echo "'$job'";} ?>
                              disabled
                            />
                      </div>
                    </div>
                    <div class="row mb-24">
                      <div class="col-6">
                        <label class="form-label mb-14">Father</label>
                              <input
                                type="text"
                                class="form-control"
                                id="f_name"
                                name="f_name"
                                placeholder="Father's Name"
                                value=<?php if(isset($f_name)){echo "'$f_name'";} ?>
                                disabled
                              />
                      </div>
                    </div>
                  </div>
                  <div class="mt-5 pt-2"<?php if($nid_check){echo "style='display:block'";} else{echo "style='display:none'";} ?>>
                    <div class="mb-24">
                      <label class="form-label mb-14">User Name</label>
                      <input
                        type="text"
                        class="form-control"
                        id="username"
                        name="username"
                        placeholder="Your text"
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
                          name="password"
                          id="password"
                          class="form-control"
                          placeholder="Enter password"
                          aria-label="Password"
                          aria-describedby="password-addon"
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
                        <p id='err' style="color: red"></p>
                        <!-- <?php echo $err; ?> -->
                      </div>
                    </div>
                    <div class="mb-3">
                      <button
                        class="btn bg-primary color-white w-100 waves-effect waves-light fs-18 font-w500"
                        type="submit"
                        name="register"
                        onclick="register()"
                      >
                        Create Account
                      </button>
                    </div>
                  </div>

                  <div class="mt-37 text-center">
                    <p class="text-muted mb-0 fs-14">
                      Do you have an account ?
                      <a
                        href="user-login.php"
                        class="text-primary fw-semibold"
                      >
                        Sign In
                      </a>
                    </p>
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
      function register(){
        let username = document.getElementById("username").value;
        let password = document.getElementById("password").value;
        let c_id = document.getElementById('c_id').value;
        let n_id = document.getElementById('n_id').value;

        if(password.length < 1 || username.length < 1)
        {
          document.getElementById("err").innerHTML = "Please enter username and password";
        }
        else
        {
          document.getElementById("err").innerHTML = "";
          const xhttp = new XMLHttpRequest();
          xhttp.open("POST", "register-user.php");
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("username="+username+"&password="+password+"&c_id="+c_id+"&n_id="+n_id);
          xhttp.onload = function() {
            if(this.responseText === 'success')
            {
              location.href = 'user-login.php';
            }
          }
        }
      }
    </script>
  </body>
</html>
