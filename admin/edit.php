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
    <!-- Main Quill library -->
    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <!-- Theme included stylesheets -->
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
    <meta name="robots" content="noindex">
</head>

<body>
    <h1>tinycms</h1>
    <form action="push.php" method="post" onsubmit="pusha();">
        <div class="editor">
            <?php if (!file_exists($_GET["page"])) {
                file_put_contents($_GET["page"], "");
            }
            echo file_get_contents($_GET["page"]); ?>
        </div>
        <script defer>
            var editora = new Quill('div', {
                theme: "snow",
                modules: {
                    toolbar: [{
                        header: ["1", "2", "3", "4", false]
                    }, 'bold', 'italic', 'underline', 'strike', 'link', 'image', 'video', {
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }, {
                        'color': []
                    }, {
                        'background': []
                    }]
                }
            });

            function pusha() {
                document.querySelector("#code").value = editora.root.innerHTML
            }
        </script>
        <input type="hidden" name="data" id="code">
        <input type="hidden" name="file" value="<?php echo $_GET["page"]; ?>">
        <br>
        <input type="submit" value="publish & return">
    </form>
</body>

</html>