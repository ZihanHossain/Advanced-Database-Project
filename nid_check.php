<?php
require_once './DB_config.php';
$err = '';
$n_id_err = '';
$nid_check = false;
$name = '';
$job = '';
$f_name = '';
$c_id = 0;

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
            $sql = "select u.*,f.name as f_name from Citizens u, Citizens f where u.national_id = '$n_id' and f.citizen_id = u.father_id";
            $result = oci_parse($conn, $sql);
            oci_execute($result);
            if(oci_fetch($result))
            {
                $nid_check = true;
                $name = oci_result($result, 'NAME');
                $c_id = oci_result($result, 'CITIZEN_ID');
                $job = oci_result($result, 'JOB');
                $f_name = oci_result($result, 'F_NAME');
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
?>