<?php
include './connection.php';

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$password = sha1($password);

$sql = "SELECT * FROM users WHERE username= '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        session_start();
        $_SESSION['username'] = $username;
        header('Location: ./portal.php');
    }
} else {
    header('Location: ./index.php?error');
}
?>