<?php
include './DB_config.php';
$err = '';
if(isset($_POST['register']))
{
    if(isset($_POST['username']) && isset($_POST['password']))
    {
        $username = strval($_POST['username']);
        $password = strval($_POST['password']);
        $conn = getConnection();
        $sql = "Insert into login values (seq_login.nextval,'$username', '$password')";
        $result = oci_parse($conn, $sql);
        $result = oci_execute($result);
        if($result)
        {
            header('Location: ./user-login.php');
        }
    }
    else
    {
        $err = 'Please enter an username and password';
    }
}
?>