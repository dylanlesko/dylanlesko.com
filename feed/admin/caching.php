<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<script type="text/javascript">
<!--
function popup(mylink, windowname)
{
if (! window.focus)return true;
var href;
if (typeof(mylink) == 'string')
   href=mylink;
else
   href=mylink.href;
window.open(href, windowname, 'width=400,height=540,scrollbars=yes');
return false;
}
//-->
</script>
<div id=vforms>
<div id="cconfig">Caching</div>
<?php
if(isset($_POST['submit'])) {
	$caching = $_POST['caching'];
	if(get_magic_quotes_gpc()) {
		$caching = stripslashes($caching);
	}
	$sql = 'UPDATE abcoption SET valueopt = '.$conn->qstr($caching).' WHERE optionid = '.$conn->qstr("6").'';
	if($conn->Execute($sql) === false) {
		print '<br /><div id="error">error [3]: '.$conn->ErrorMsg().'</div><br />';
	}
	echo "<div id ='information'>&nbsp;Successfully. "; 
    ?>
<a href="caching.php">Back to Caching</a></div>
<?php } else { ?>
<div><a href="clear.php" onClick="return popup(this, 'notes')">Clear Cache</a></div><br />
<form method="post" action="caching.php">
Module Off/On<br>
<?php if($caching == 1) { ?>
<select style="background:#EEFFE3;" id="incc" name="caching">
<option value='1'>-- On</option>
<option style="background:#ffffff;" value='1'>---- On</option>
<option style="background:#ffffff;" value='0'>------ Off</option>
</select>
<?php } ?>
<?php if($caching == 0) { ?>
<select style="background:#FFF6C1;" id="incc" name="caching">
<option value='0'>-- Off</option>
<option style="background:#ffffff;" value='1'>---- On</option>
<option style="background:#ffffff;" value='0'>------ Off</option>
</select>
<?php } ?>
<br /><br />
<input type="submit" class="topicbuton" name="submit" value="Submit" /><br /><br />
</form>
</div>
<?php
}
include ('footer.php');
$conn->Close();
/**************************************
* Revision: v.4.1.4.
***************************************/
?>