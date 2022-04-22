<?php
session_start();
if(!isset($_SESSION['name']))
{
    header('Location: ./user-login.php');
}
include './DB_config.php';
$conn = getConnection();
$sql = '
begin
:success := get_citizen_id(:n_id);
end;';
$result = oci_parse($conn, $sql);
oci_bind_by_name($result, ':n_id', $_POST['n_id'], -1);
oci_bind_by_name($result, ':success', $success, 8);
oci_execute($result);

if($success == 0)
{
    $success = 'false';
}
echo $success;

?>