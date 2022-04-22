<?php
include './DB_config.php';
$conn = getConnection();
$sql = 'select * from VIOLATION_CATEGORY';
$result = oci_parse($conn, $sql);
oci_execute($result);
$violations = array();
while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
    array_push($violations, [$row[0], $row[1]]);
}

$sql1 = 'select * from STREETS';
$result = oci_parse($conn, $sql1);
oci_execute($result);
$streets = array();
while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
    array_push($streets, [$row[0], $row[1]]);
}
?>