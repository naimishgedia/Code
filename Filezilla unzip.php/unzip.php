<?php
	$target = pathinfo(realpath('phpmailer.zip'));
	$a = "abc";
	$path =  $target['dirname']. DIRECTORY_SEPARATOR .$a;
	$zip = new ZipArchive();
    $x = $zip->open('phpmailer.zip');
    if($x === true) {
        $zip->extractTo($path);
		echo "Success";
        $zip->close();
    } else {
        die("There was a problem. Please try again!");
    }
?>