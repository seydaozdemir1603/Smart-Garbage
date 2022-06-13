<?php
include '../connection.php';
header('Content-type: application/json');
$api_key = "6C793695171E793D";
if (isset($_GET['id']) && isset($_GET['api_key'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $received_key = mysqli_real_escape_string($conn, $_GET['api_key']);
    if ($received_key == $api_key) {
        $sql = "UPDATE status SET status = IF(status=1, 0, 1) WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        echo json_encode("success", JSON_PRETTY_PRINT);
    } else {
        echo json_encode("wrong api key", JSON_PRETTY_PRINT);
    }
} else {
    echo json_encode("insufficient params", JSON_PRETTY_PRINT);
}
