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
<?php
    file_put_contents($_POST["file"], '<!DOCTYPE html><html><head><link rel="stylesheet" href="style.css"></head><body>'.$_POST["data"].'</body></html>');
    header("X-Robots-Tag: noindex");
    header("Refresh: 0; url=".$_POST["file"]);
?>