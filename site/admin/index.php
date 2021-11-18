<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="tinycms"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Please sign in.';
    exit;
} else {
    if ($_SERVER["PHP_AUTH_PW"] . "\n" == file_get_contents("../../password")) {
        false;
    } else {
        echo "Invalid login. Try clearing logins!";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tinycms</title>
    <link rel="stylesheet" href="../style.css">
    <meta name="robots" content="noindex">
</head>
<body>
    <h1>tinycms</h1>
    <form action="edit.php" onsubmit="var elem = document.getElementById('p'); elem.value = `../${elem.value}.html`"><input type="text" name="page" placeholder="page name" id="p"><input type="submit" value="Create Page"></form>
    <br>
    <?php
        foreach (glob("../*.html") as $key) {
            echo '<a href="edit.php?page='.$key.'">'.explode(".", basename($key))[0].'</a><br>';
        }
    ?>
</body>
</html>