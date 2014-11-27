<?php
##############################
# clear.php      version 1.1.#
##############################
?>
<html>
<body style="font-family:tahoma;font-size:10px;">
<?php
session_start();
 require_once 'salt.php';
  require_once 'securesession.class.php';
  $ss = new SecureSession();
  $ss->check_browser = true;
  $ss->check_ip_blocks = 2;
  $ss->secure_word = $salt;
  $ss->regenerate_id = true;
if(!$ss->Check() || !isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
	die();
}
$crepath = realpath('./../');
$cachedir = $crepath."/temp/templates_c/";
if($dir = @dir($cachedir)) {
	while($files = $dir->read()) {
		if(is_file($cachedir.$files)) {
			if(preg_match('/\.php$/',$files) > 0) {
				echo $files."<br />";
				unlink($cachedir.$files);
			}
		}
	}
	$dir->close();
}
unset($dir,$files);
echo "Templates_c directory is empty<br />";
$cachedir2 = $crepath."/temp/cache/";
if($dir2 = @dir($cachedir2)) {
	while($files = $dir2->read()) {
		if(is_file($cachedir2.$files)) {
			if(preg_match('/\.php$/',$files) > 0) {
				echo $files."<br />";
				unlink($cachedir2.$files);
			}
		}
	}
	$dir2->close();
}
unset($dir2,$files);
echo "Cache directory is empty"; 
?>
</body></html>