<?php
include './DB_config.php';
session_start();
$conn = getConnection();
$sql = "begin
add_case(".$_POST['n_id'].", ".$_POST['vc_id'].", ".$_POST['s_id'].", ".$_SESSION['p_id'].", '".$_POST['p_c']."');
end;";
$result = oci_parse($conn, $sql);
oci_execute($result);
// echo $_POST['p_c'];
?>