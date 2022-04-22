<?php
require_once('./get_cases.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Cases
    </title>
    <link rel="shortcut icon" href="./images/favicon.png" type="image/png">
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/icons.min.css">

    <!-- Plugin -->
    <link rel="stylesheet" href="./libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="./libs/date-picker/datepicker.css">
    <link rel="stylesheet" href="./libs/datatable/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="./libs/rating/css/rating-themes.css">
    <!-- APP CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/responsive.css">
</head>

<body>
    <?php foreach($f_cases as $case): ?>
                    <div class="box left-dot mb-30">
                        <div class="box-header  border-0 pd-0">
                            <div class="box-title fs-20 font-w600">Basic Info</div>
                        </div>
                        <div class="box-body pt-20 user-profile">
                            <div class="table-responsive">
                                <table class="table mb-0 mw-100 color-span">
                                    <tbody>
                                        <tr>
                                            <td class="py-2 px-0"> <span class="w-50">Violation ID</span> </td>
                                            <td>:</td>
                                            <td class="py-2 px-0"> <span class="">#<?php echo $case[0] ?></span> </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-0"> <span class="w-50">Citizen Name</span> </td>
                                            <td>:</td>
                                            <td class="py-2 px-0"> <span class=""><?php echo $case[1] ?></span> </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-0"> <span class="w-50">Violation Name</span> </td>
                                            <td>:</td>
                                            <td class="py-2 px-0"> <span class=""><?php echo $case[2] ?></span> </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-0"> <span class="w-50">Violation Date</span> </td>
                                            <td>:</td>
                                            <td class="py-2 px-0"> <span class=""><?php echo $case[3] ?></span> </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-0"> <span class="w-50">Total Fine</span> </td>
                                            <td>:</td>
                                            <td class="py-2 px-0"> <span class=""><?php echo $case[4] ?></span> </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-0"> <span class="w-50">Street</span> </td>
                                            <td>:</td>
                                            <td class="py-2 px-0"> <span class=""><?php echo $case[7] ?></span> </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-0"> <span class="w-50">Comment</span> </td>
                                            <td>:</td>
                                            <td class="py-2 px-0"> <span class=""><?php echo $case[6] ?></span> </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-0"> <span class="w-50">Status</span> </td>
                                            <td>:</td>
                                            <td class="py-2 px-0"> <span class="badge badge-success"><?php if($case[5] == 'false') echo 'Unpaid'; else echo 'Paid'; ?></span> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
    <?php endforeach ?>
</body>
</html>