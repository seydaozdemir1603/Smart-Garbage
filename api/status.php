<?php
include '../connection.php';
header('Content-type: application/json');

$sql = "SELECT * FROM status";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $result_array[$i]['id'] = $row['id'];
        $result_array[$i]['status'] = $row['status'];
        $result_array[$i]['value'] = $row['value'];
        $i++;
    }
    echo json_encode($result_array, JSON_PRETTY_PRINT);
} else {
    echo json_encode("null", JSON_PRETTY_PRINT);
}
