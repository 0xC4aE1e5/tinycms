<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="tinycms"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Please sign in.';
    exit;
} else {
    if ($_SERVER["PHP_AUTH_PW"] == strip_tags(file_get_contents("../password.php"))) {
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
    <link rel="stylesheet" href="style.css">
    <meta name="robots" content="noindex">
</head>

<body>
    <h1>tinycms</h1>
    <form action="edit.php" onsubmit="var elem = document.getElementById('p'); elem.value = `../${elem.value}.html`"><input type="text" name="page" placeholder="page name" id="p"><input type="submit" value="create page"></form>
    <br>
    <?php
    foreach (glob("../*.html") as $key) {
        if ($key == "../index.html") {
            echo '<a href="' . $key . '">[home page]</a>';
        } else {
            echo '<a href="' . $key . '">' . explode(".", basename($key))[0] . '</a>';
        }
        echo '&nbsp;<a href="edit.php?page=' . $key . '">edit</a>';
        if ($key != "../index.html") {
            echo '&nbsp;<a href="delete.php?page=' . $key . '">delete</a>';
        }
        echo "<br>";
    }
    ?>
    <a href="zipper.php">Export site</a>
</body>

</html>