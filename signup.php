<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Save user details to MySQL database
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);
    $stmt->execute();
    $stmt->close();

    // Save user details to JSON file
    $userData = json_decode(file_get_contents('userdata.json'), true);
    $userData[] = array('username' => $username, 'email' => $email, 'password' => $password);
    file_put_contents('userdata.json', json_encode($userData));

    echo "Signup successful!";
}
?>
