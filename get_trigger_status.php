<?php
include './DB_config.php';
$conn = getConnection();
$sql = "
begin
SELECT STATUS into :l_stat FROM USER_TRIGGERS WHERE TRIGGER_NAME = 'UPDATE_LOGIN';
SELECT STATUS into :n_stat FROM USER_TRIGGERS WHERE TRIGGER_NAME = 'ADD_NOTIFICATION';
end;";
$result = oci_parse($conn, $sql);
oci_bind_by_name($result, ':l_stat', $l_stat, 10);
oci_bind_by_name($result, ':n_stat', $n_stat, 10);
oci_execute($result);
?>