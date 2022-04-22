<?php
session_start();
include './DB_config.php';
$conn = getConnection();
$sql = 'select * from notification where recever_id = '.$_SESSION['citizen_id'];
$result = oci_parse($conn, $sql);
oci_execute($result);
$notifications = array();
while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
    array_push($notifications, [$row[2], $row[3]]);
}
?>