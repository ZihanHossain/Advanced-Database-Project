<?php
    require_once('./get_all_citizens.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Polices
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
<body>
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-body d-flex justify-content-between pt-0 pb-0">
                    <form class="search-form d-flex" method="get" action="./citizens.php">
                        <input type="text" value="" placeholder="Citizen Name" name="c_name" class="form-control">
                        <select class="form-control" id="inputState" name="job">
                            <option value="">Select job</option>
                            <option value="STUDENT">Student</option>
                            <option value="ADMIN">Admin</option>
                            <option value="POLICE">Police</option>
                        </select>
                        <select class="form-control" id="inputState" name="has_a">
                            <option value="">Has account?</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                        <button type="submit" class="search d-flex"><i class="fas fa-search"></i>Search</button>
                    </form>
                    <a href="./admin-dashboard.php"><button class="search d-flex"><i class="bx bx-arrow-back"></i>Dashboard</button></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php foreach($citizens as $citizen): ?>
            <div class="col-3 col-md-6 col-sm-12 mb-25" id="citizens">
                <div class="box client">
                    <a href="client-details.html"><h5 class="mt-17"><?php echo $citizen[0]; ?></h5></a>
                    <ul class="info">
                        <li class="fs-14"><i class="bx bxs-phone"></i><?php echo $citizen[3]; ?></li>
                        <li class="fs-14"><i class="bx bxs-envelope"></i><?php echo $citizen[7]; ?></li>
                    </ul>
                    <div class="group-btn d-flex justify-content-between">
                        <a class="bg-btn-pri color-white" href="message.html">Message</a>
                        <a class="bg-btn-sec color-main" href="user-profile.html">View Profile</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</body>
</html>