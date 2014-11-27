<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<div id="vforms">
<div id="cconfig">Htpasswd Password</div>
<?php
if(isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$dir = dirname(__FILE__);
        $string = $username . ":" . crypt($password);
                        touch(".htaccess");
                        chmod(".htaccess", 0666);
                        $fhandle = fopen(".htaccess", "wb");
                        fwrite($fhandle, "AuthUserFile " . $dir . "/.htpasswd\n");
                        fwrite($fhandle, "AuthName \"Please Login\"\n");
                        fwrite($fhandle, "AuthType Basic\n");
                        fwrite($fhandle, "require valid-user\n");
                        fclose($fhandle);
                        chmod(".htaccess", 0444);
                        touch(".htpasswd");
                        chmod(".htpasswd", 0666);
                        $fhandle = fopen(".htpasswd", "wb");
                        fwrite($fhandle, $string);
                        fclose($fhandle);
                        chmod(".htpasswd", 0444);
                        echo "<div id ='information'>&nbsp;Successfully. ";
                   } else {
?>
<form action="htprotect.php" method="POST">
Username:<br>
<input name="username" type="text" id="incc" /><br><br>
Password:<br>
<input name="password" type="text" id="incc" /><br><br>
<input type="submit" class="topicbuton" name="submit" value="Submit">
</form>
<?php } ?>
</div>
<?php
include ('footer.php');
/**************************************
* Revision: v.4.1.6.
***************************************/
?>