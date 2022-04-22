<?php
include './DB_config.php';
$conn = getConnection();
if(isset($_GET['name']) || isset($_GET['has_a']) || isset($_GET['job']))
{
    if(strlen($_GET['job']) > 1)
        $sql = "select * from citizens where job = '".$_GET['job']."'";
    if(strlen($_GET['has_a']) > 1)
        $sql = "select * from citizens where HAS_ACCOUNT = '".$_GET['has_a']."'";
    if(strlen($_GET['c_name']) > 1)
        $sql = "select * from citizens where NAME = '".$_GET['c_name']."'";
    if(strlen($_GET['c_name']) > 1 && strlen($_GET['job']) > 1)
        $sql = "select * from citizens where NAME = '".$_GET['c_name']."' and job = '".$_GET['job']."'";
    if(strlen($_GET['c_name']) > 1 && strlen($_GET['has_a']) > 1)
        $sql = "select * from citizens where NAME = '".$_GET['c_name']."' and HAS_ACCOUNT = '".$_GET['has_a']."'";
    if(strlen($_GET['has_a']) > 1 && strlen($_GET['job']) > 1)
        $sql = "select * from citizens where HAS_ACCOUNT = '".$_GET['has_a']."' and job = '".$_GET['job']."'";
    if(strlen($_GET['c_name']) > 1 && strlen($_GET['job']) > 1 && strlen($_GET['has_a']) > 1)
        $sql = "select * from citizens where NAME = '".$_GET['c_name']."' and job = '".$_GET['job']."' and HAS_ACCOUNT = '".$_GET['job']."'";
}
else
    $sql = 'select * from citizens';

$result = oci_parse($conn, $sql);
oci_execute($result);
$citizens = array();
while (($row = oci_fetch_array($result, OCI_BOTH)) != false) {
    array_push($citizens, [$row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[10]]);
}
?>