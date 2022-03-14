<?php
include './DB_config.php';
$err = '';
if(isset($_POST['login']))
{
    if(isset($_POST['username']) && isset($_POST['password']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $conn = getConnection();
        $sql = "select * from login where username = '$username' and password = '$password'";
        $result = oci_parse($conn, $sql);
        oci_execute($result);
        $result = oci_fetch($result);
        if(!empty($result))
        {
            
                $err = 'Login successfull';
                // header('Location: ./user-login.php');
            
        }
        else
        {
            $err = 'Username or Password is wrong.';
        }
    }
    else
    {
        $err = 'Please enter an username and password';
    }
}
?>