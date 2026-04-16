<?php
include 'db.php';

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if($conn->query($sql)){
        echo "Registered successfully!";
    } else {
        echo "Error!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>

<h2>Register</h2>

<form method="POST">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit" name="register">Register</button>
</form>

</body>
</html>