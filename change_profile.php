<?php
session_start();
include './DB_config.php';
$conn = getConnection();
$sql = "begin :msg := 'Change Updated'; change_login_info(:u_name, :pass, :c_id); exception when OTHERS then :msg := 'Please try again between 7 AM - 11 PM'; end;";
$result = oci_parse($conn, $sql);
oci_bind_by_name($result, ":u_name", $_POST['username'], 100);
oci_bind_by_name($result, ":pass", $_POST['password'], 20);
oci_bind_by_name($result, ":c_id", $_SESSION['citizen_id'], 20);
oci_bind_by_name($result, ":msg", $msg, 200);
oci_execute($result);
echo $msg;
?>