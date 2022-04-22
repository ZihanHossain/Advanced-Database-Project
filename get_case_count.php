<?php
include './DB_config.php';
$count = 0;

$conn = getConnection();
session_start();
// $sql = 'select police_id from police where citizen_id = '.$_SESSION['citizen_id'];
$sql = 'begin
select police_id into :p_id from police where citizen_id = :c_id;
select count(*) into :c_count from violation_records where police_id = :p_id;
end;';
$result = oci_parse($conn, $sql);
oci_bind_by_name($result, ":c_id", $_SESSION['citizen_id'], -1);
oci_bind_by_name($result, ":p_id", $_SESSION['police_id'], 3);
oci_bind_by_name($result, ":c_count", $count, 3);
// oci_define_by_name($result, 'POLICE_ID', $police_id);
oci_execute($result);
?>