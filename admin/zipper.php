<?php

// No authentication is needed for this page.
// It's useless as a hacker can still download the
// entire site with certain apps like HTTrack.
// And, if they edit the admin pages,
// it's still only on their own server.

// create a zip of ../*.html, ../style.css
// and send it to the user.

header("Cpntent-Type: application/zip");
header("Content-Disposition: attachment; filename=exported_site.zip");
header("Content-Transfer-Encoding: binary");

chdir("..");

$zip = new ZipArchive();
$zip->open("tmp.zip", ZipArchive::CREATE);
foreach (glob("*.html") as $key) {
    $zip->addFile($key);
}
$zip->addFile("style.css");

$zip->close();

readfile("tmp.zip");

unlink("tmp.zip");
