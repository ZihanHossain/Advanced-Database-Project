<?php
include './DB_config.php';
$err = '';
if(isset($_POST['login']))
{
    if(isset($_POST['username']) && isset($_POST['password']))
    {
        $username = strval($_POST['username']);
        $password = strval($_POST['password']);
        $conn = getConnection();
        $sql = "select * from login where username = '$username' and password = '$password'";
        $result = oci_parse($conn, $sql);
        oci_execute($result);
        $result = oci_fetch($result);
        if($result)
        {
            if(oci_num_rows($result) > 0 )
            {
                $err = 'Login successfull';
                // header('Location: ./user-login.php');
            }
            else
            {
                $err = 'Please provide correct username and password';
            }
        }
    }
    else
    {
        $err = 'Please enter an username and password';
    }
}
?>