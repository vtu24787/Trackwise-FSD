<?php
include 'db.php';
session_start();

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $_SESSION['user'] = $username;
        echo "Login successful!";
        header("Location: index.php");
    } else {
        echo "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - TrackWise</title>

    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            font-family: Arial;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-box {
            background: white;
            padding: 30px;
            border-radius: 12px;
            width: 300px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        .login-box h2 {
            text-align: center;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #0072ff;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #005edb;
        }

        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>

<body>

<div class="login-box">
    <h2>Login</h2>

    <?php if(isset($error)) { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>
</div>

</body>
</html>