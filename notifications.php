<?php
require_once('./get_notifications.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
    <center>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Details</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($notifications as $notification): ?>
                    <tr>
                        <th> </th>
                        <th><?php echo $notification[0] ?></th>
                        <th><?php echo $notification[1] ?></th>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </center>
</body>
</html>