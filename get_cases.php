<?php
session_start();
include './DB_config.php';
$conn = getConnection();
$sql = 'select * from violation_records where police_id = '.$_SESSION['police_id'];
$result = oci_parse($conn, $sql);
oci_execute($result);
$cases = array();
while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
    array_push($cases, [$row[0], $row[1], $row[2], $row[4], $row[5], $row[6], $row[7], $row[8]]);
}
$f_cases = array();
foreach($cases as $case)
{
    $sql1 = "begin
        select name into :n from citizens where citizen_id = :c_id;
        select VIOLATION_NAME into :vc_n from VIOLATION_CATEGORY where VIOLATION_CATEGORY_ID = :vc_id;
        select STATION_NAME into :s_n from streets where STREET_ID = :s_id;
    end;";
    $result = oci_parse($conn, $sql1);
    oci_bind_by_name($result, ':n', $name, 100);
    oci_bind_by_name($result, ':c_id', $case[1], -1);
    oci_bind_by_name($result, ':vc_n', $vc_name, 100);
    oci_bind_by_name($result, ':vc_id', $case[2], -1);
    oci_bind_by_name($result, ':s_n', $s_name, 100);
    oci_bind_by_name($result, ':s_id', $case[7], -1);
    oci_execute($result);
    $replacement = array(1 => $name, 2 => $vc_name, 7 => $s_name);
    $case = array_replace($case, $replacement);
    array_push($f_cases, $case);
}
?>