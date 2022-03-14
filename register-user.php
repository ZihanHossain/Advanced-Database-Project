<?php
require_once './DB_config.php';

        $username = strval($_POST['username']);
        $password = strval($_POST['password']);
        $c_id = strval($_POST['c_id']);
        $n_id = strval($_POST['n_id']);
        $conn = getConnection();

        $sql1 = "update citizens set HAS_ACCOUNT = 'yes' where citizen_id = $c_id";
        $result = oci_parse($conn, $sql1);
        oci_execute($result);

        $sql = "Insert into login values (seq_login.nextval,'$username', '$password', '$n_id')";
        $result = oci_parse($conn, $sql);
        $result = oci_execute($result);
        if($result)
        {
            echo 'success';
        }
    
?>