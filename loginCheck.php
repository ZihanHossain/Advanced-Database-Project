<?php
include './DB_config.php';
$err = '';
if(isset($_POST['login']))
{
    if(strlen($_POST['username'])>1 && strlen($_POST['password'])>1)
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $conn = getConnection();
        $sql = "declare
        n_id number;
        begin
        n_id := login_check(:u_name,:pass);
        if n_id > 0 then
        :success := 1;
        select name, email, citizen_id into :c_name, :c_email, :c_id from citizens where national_id = n_id;
        :p_id := check_if_police(:c_id);
        else
        :success := 0;
        end if;
        end;";
        $result = oci_parse($conn, $sql);
        oci_bind_by_name($result, ":u_name", $username, -1);
        oci_bind_by_name($result, ":pass", $password, -1);
        oci_bind_by_name($result, ":c_name", $c_name, 50);
        oci_bind_by_name($result, ":c_email", $c_email, 100);
        oci_bind_by_name($result, ":c_id", $c_id, 50);
        oci_bind_by_name($result, ":success", $success, 10);
        oci_bind_by_name($result, ":p_id", $p_id, 10);
        oci_execute($result);
        // $result = oci_fetch($result);
        // !empty($result)
        
            
            if($success == 1)
            {
                session_start();
                $_SESSION['name'] = $c_name;
                $_SESSION['email'] = $c_email;
                $_SESSION['citizen_id'] = $c_id;
                if($p_id != 0)
                {
                    $_SESSION['p_id'] = $p_id;
                    header('Location: ./police-dashboard.php');
                }
                else{
                    if($username == 'admin')
                        header('Location: ./admin-dashboard.php');
                    else
                        header('Location: ./citizen-dashboard.php');
                }
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