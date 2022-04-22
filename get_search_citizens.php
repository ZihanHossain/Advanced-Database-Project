<?php
include './DB_config.php';
$conn = getConnection();
$sql = "select * from citizens where job = '".$_POST['job']."'";
$result = oci_parse($conn, $sql);
oci_execute($result);
$citizens = array();
while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
    array_push($citizens, [$row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[10]]);
}

?>