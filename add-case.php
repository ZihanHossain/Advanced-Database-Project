<?php
session_start();
if(!isset($_SESSION['name']))
{
    header('Location: ./user-login.php');
}
else
{
    require_once('./get_add_case_info.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Protend - Project Management Admin Dashboard HTML Template
    </title>
    <link rel="shortcut icon" href="./images/favicon.png" type="image/png">
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/icons.min.css">

    <link rel="stylesheet" href="./libs/date-picker/datepicker.css">
    <!-- APP CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/responsive.css">
</head>

<body>
    <!-- MAIN CONTENT -->
        <div class="main-content project">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 mb-24">
                                    <div class="form-group"> <label class="form-label">National ID</label> <input class="form-control" placeholder="Enter National Id" id="n_id" type="number" onblur="get_citizen_info()"> </div>
                                </div>
                                <!-- <div class="col-md-6 col-sm-12 mb-24">
                                    <div class="form-group"> <label class="form-label">Project Title</label> <input class="form-control" placeholder="Software Development"> </div>
                                </div> -->
                            </div>
                            <div style="display: block;">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-24">
                                        <div class="icon-box bg-color-2" id="name"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 mb-24">
                                    <div class="form-group"> <label class="form-label">Violation Catagory:</label> 
                                        <select id="vc_id" name="violations" class="form-control custom-select select2 select2-hidden-accessible" data-placeholder="Select Department" tabindex="-1" aria-hidden="true">
                                            <option label="Select one" value=''>
                                            <?php foreach($violations as $violation): ?>
                                                <option label=<?php echo $violation[1] ?> value="<?php echo $violation[0] ?>">
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 mb-24">
                                    <div class="form-group"> <label class="form-label">Street:</label> 
                                        <select id="s_id" name="streets" class="form-control custom-select select2 select2-hidden-accessible" data-placeholder="Select Department" tabindex="-1" aria-hidden="true">
                                            <option label="Select one" value=''>
                                            <?php foreach($streets as $street): ?>
                                                <option label=<?php echo $street[1] ?> value="<?php echo $street[0] ?>">
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-24"> <label class="form-label">Comment:</label>
                                <textarea id="p_c" class="form-control" name="text" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="gr-btn mt-15"> <a href="/police-dashboard.php" class="btn btn-danger btn-lg mr-15 fs-16">CLOSE</a> <a href="#" class="btn btn-primary btn-lg fs-16" onclick="submit_form()">SUBMIT</a> </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- END MAIN CONTENT -->

    <div class="overlay"></div>

    <!-- SCRIPT -->
    <script>
        function get_citizen_info()
        {
            let n_id = document.getElementById("n_id").value;
            const xhttp = new XMLHttpRequest();
            xhttp.open("POST", "get_citizen_info(add-case).php");
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("n_id="+n_id);
            xhttp.onload = function()
            {
                if(this.responseText != 'false')
                {
                    document.getElementById("name").innerHTML = 'Valid National ID';
                }
                else
                    document.getElementById('name').innerHTML = 'Invalid National ID';
            }
        }

        function submit_form()
        {
            let n_id = document.getElementById("n_id").value;
            let vc_id = document.getElementById("vc_id").value;
            let s_id = document.getElementById("s_id").value;
            let p_c = document.getElementById("p_c").value;
            if(n_id.length < 1 || vc_id.length < 1 || s_id.length < 1)
            {
                alert('Please fill all the field.');
            }
            else
            {
                const xhttp = new XMLHttpRequest();
                xhttp.open("POST", "add_case.php");
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("n_id="+n_id+"&vc_id="+vc_id+"&s_id="+s_id+"&p_c="+p_c);
                xhttp.onload = function()
                {
                    alert(this.responseText);
                }
            }
        }
    </script>
    <!-- APEX CHART -->

    <script src="./libs/jquery/jquery.min.js"></script>
    <script src="./libs/jquery/jquery-ui.min.js"></script>
    <script src="./libs/moment/min/moment.min.js"></script>
    <script src="./libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="./libs/date-picker/datepicker.js"></script>
    <script src="./libs/simplebar/simplebar.min.js"></script>


    <!-- APP JS -->
    <script src="./js/main.js"></script>
    <script src="./js/shortcode.js"></script>
    <script src="./js/pages/datepicker.js"></script>

    <script>
    </script>
</body>

</html>