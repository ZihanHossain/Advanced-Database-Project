<?php
session_start();
if(!isset($_SESSION['name']))
{
    header('Location: ./user-login.php');
}
else
{
    require './get_case_count.php';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Police Dashboard
    </title>
    <link rel="shortcut icon" href="./images/favicon.png" type="image/png">
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/icons.min.css">

    <!-- APP CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/responsive.css">
</head>

<body class="sidebar-expand">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="sidebar-logo">
            <a href="index.html">
                <img src="./images/logo.png" alt="Protend logo">
            </a>
            <div class="sidebar-close" id="sidebar-close">
                <i class='bx bx-left-arrow-alt'></i>
            </div>
        </div>
        <!-- SIDEBAR MENU -->
        <div class="simlebar-sc" data-simplebar>
            <ul class="sidebar-menu tf">
                <li class="sidebar-submenu">
                    <a href="index.html" class="sidebar-menu-dropdown">
                        <i class='bx bxs-home'></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-submenu">
                    <a href="project.html" class="sidebar-menu-dropdown">
                        <i class='bx bxs-bolt'></i>
                        <span>Cases</span>
                    </a>
                </li>

                <li class="sidebar-submenu">
                    <a href="clients.html" class="sidebar-menu-dropdown">
                        <i class='bx bxs-user'></i>
                        <span>Notifications</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="board.html">
                        <i class='bx bxs-dashboard'></i>
                        <span>Citizen Profile</span>
                    </a>
                </li> -->
                <li>
                    <a href="change-profile.php">
                        <i class='bx bxs-dashboard'></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="message.html">
                        <i class='bx bxs-message-rounded-detail' ></i>
                        <span>Message</span>
                    </a>
                </li>
                <li>
                    <a class="darkmode-toggle" id="darkmode-toggle" onclick="switchTheme()">
                        <div>
                            <i class='bx bx-cog mr-10'></i>
                            <span>darkmode</span>
                        </div>

                        <span class="darkmode-switch"></span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
    <!-- Main Header -->
    <div class="main-header">
        <div class="d-flex">
            <div class="mobile-toggle" id="mobile-toggle">
                <i class='bx bx-menu'></i>
            </div>
            <div class="main-title">
                Board
            </div>
        </div>

        <div class="d-flex align-items-center">

            
            <div class="dropdown d-inline-block mt-12">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="./images/profile/profile.png"
                            alt="Header Avatar">
                        <span class="pulse-css"></span>
                        <span class="info d-xl-inline-block  color-span">
                            <span class="d-block fs-20 font-w600"><?php echo $_SESSION['name'] ?></span>
                            <span class="d-block mt-7" ><?php echo $_SESSION['email'] ?></span>
                        </span>
                            
                        <i class='bx bx-chevron-down'></i>
                    </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span>Profile</span></a>
                    <a class="dropdown-item" href="#"><i class="bx bx-wallet font-size-16 align-middle me-1"></i> <span>My Wallet</span></a>
                    <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end">11</span><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span>Settings</span></a>
                    <a class="dropdown-item" href="#"><i class="bx bx-lock-open font-size-16 align-middle me-1"></i> <span>Lock screen</span></a>
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-item">Police ID: <?php echo $_SESSION['p_id'] ?></div>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="session_destroy.php"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span>Logout</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Header -->
    <!-- MAIN CONTENT -->
    <div class="main">
        <div class="main-content board">
            <div class="row">
                <div class="col">
                    <div class="box card-box" style="padding:0px !important;">
                        <a href="/add-case.php" class="icon-box bg-color-3" style="width: 100%; justify-content: center;">
                            <div class="icon bg-icon-10">
                                <i class="bx bxs-add-to-queue bx-flashing"></i>
                            </div>
                            <div style="padding-top: 1.5%">
                                <h5 class="title-box">File a new case</h5>
                            </div>
                        </a>
                    </div>
                    <div class="box card-box" style="justify-content: center; padding:0px !important">
                        <div class="icon-box bg-color-1" style="justify-content: center;">
                            <div class="icon bg-icon-1">
                                <i class="bx bxs-bell bx-tada"></i>
                            </div>
                            <div class="content">
                                <h5 class="title-box">Case Count</h5>
                                <p class="color-1 mb-0 pt-4">Total case: <Span class="color-6"><?php echo $count; ?></Span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->

    <div class="overlay"></div>

    <!-- SCRIPT -->
    <!-- APEX CHART -->

    <script src="./libs/jquery/jquery.min.js"></script>
    <script src="./libs/jquery/jquery-ui.min.js"></script>
    <script src="./libs/moment/min/moment.min.js"></script>
    <script src="./libs/apexcharts/apexcharts.js"></script>
    <script src="./libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./libs/peity/jquery.peity.min.js"></script>
    <script src="./libs/chart.js/Chart.bundle.min.js"></script>
    <script src="./libs/owl.carousel/owl.carousel.min.js"></script>
    <script src="./libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="./libs/simplebar/simplebar.min.js"></script>

    <!-- APP JS -->
    <script src="./js/main.js"></script>
    <script src="./js/shortcode.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>