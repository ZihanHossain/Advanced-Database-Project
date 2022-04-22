<?php
session_start();
include './DB_config.php';
$conn = getConnection();
$sql = 'begin
get_login_info(get_national_id('.$_SESSION['citizen_id'].'), :u_name, :pass);
end;';
$result = oci_parse($conn, $sql);
oci_bind_by_name($result, ":u_name", $username, 100);
oci_bind_by_name($result, "pass", $password, 20);
oci_execute($result);
?>