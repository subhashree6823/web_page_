<?php
include 'db.php';
session_start();

$data = json_decode(file_get_contents("php://input"));
$email = $data->email;
$password = $data->password;

$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['name'];
        echo json_encode(["status" => "success", "user" => $user['name']]);
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid password"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "User not found"]);
}
?>
