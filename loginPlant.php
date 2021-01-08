<?php
session_start();
if (isset($_GET['logout'])) {
    $_SESSION['logget'] = 0;
    header('location:http://localhost/phpNd/plants/loginPlant.php');
    die;
}
// tikrinam ar prisijungimo info teisinga
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('data.json'), 1);
    foreach ($data as $user) {
        if (($_POST['email'] ?? '') === $user['email'] &&
            md5($_POST['password'] ?? '') === $user['password']
        ) {
            $_SESSION['name'] = $user['name'];
            $_SESSION['logget'] = 1;
            header('location:http://localhost/phpNd/plants/plantGrass.php');
            die;
        }
    }
    $_SESSION['msg'] = 'Bad email or password';
    header('location:http://localhost/phpNd/plants/loginPlant.php');
    die;
}
if (isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="logStyle.css">
</head>

<body>
    <div class="log">
        <h1>Log in</h1>
        <form action="" method="post">
            <div class="form-row">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="ebl@n.ru">
            </div>
            <div class="form-row">
                <label for="password">Password</label>
                <input id="password" type="password" name="password">
            </div>
            <button type="submit">Log in</button>
        </form>
        <div><?= $msg ?? '' ?></div>
    </div>
</body>

</html>