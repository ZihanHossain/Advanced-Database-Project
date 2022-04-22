<?php
    include './DB_config.php';
    $conn = getConnection();
    if($_POST['trigger'] == 'nott')
        $sql = "
        begin
        trigger_on_off.notification_trigger_on_off;
        end;";
    else if($_POST['trigger'] == 'log')
        $sql = "
        begin
        trigger_on_off.login_trigger_on_off;
        end;";
    $result = oci_parse($conn, $sql);
    if(oci_execute($result))
        echo 'true';
    else
        echo 'false';
?>