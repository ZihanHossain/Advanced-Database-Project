<?php
include './DB_config.php';
$err = '';
$n_id_err = '';
$nid_check = false;

if(isset($_POST['check']))
{
    if(strlen($_POST['n_id'])>1)
    {
        $n_id = $_POST['n_id'];
        $conn = getConnection();
        $sql = "select * from login where national_id = '$n_id'";
        $result = oci_parse($conn, $sql);
        oci_execute($result);
        $result = oci_fetch($result);
        if($result)
        {
            $n_id_err = 'This NID number is already registered.';
        }
        else
        {
            $sql = "select citizen_id from Citizens where national_id = '$n_id'";
            $result = oci_parse($conn, $sql);
            oci_execute($result);
            $result = oci_fetch($result);
            if($result)
            {
                $nid_check = true;
            }
            else
            {
                $n_id_err = 'Please enter correct NID number';
            }
        }
    }
    else
    {
        $n_id_err = 'Please enter your NID number';
    }
}

if(isset($_POST['register']))
{
    if(strlen($_POST['username'])>1 && strlen($_POST['password'])>1)
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