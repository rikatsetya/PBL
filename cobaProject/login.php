<?php
require_once 'crud.php';

$crud = new Crud();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $tampil = $crud->readByUsername($username, $_POST['password']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Survey</title>
</head>

<body>
    <div>
        <h1>Login</h1>
        <form method="post">
            <br>
            <label for="username">Username :
                <input type="text" id="username" name="username" required></label>
            <br>
            <label for="password">Password :
                <input type="password" id="password" name="password" required></label>
            <br>
            <button type="submit">Submit</button>
            <br>
            belum punya akun? <a href="signUp.php">Sign UP</a>.
        </form>
        <br><button onclick="history.back()">Back</button>
    </div>
</body>

</html>