<?php
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
include ('header.php');
?>
<div id="vforms">
<div id="cconfig">Delete Image</div>
<?php
$id = $_GET['id'];
$file = $_GET['file'];
$file1 = $_GET['file'];
$file2 = $_GET['file'];
$result = mysql_query("DELETE FROM vgalery WHERE galid ='$id'") or die(mysql_error());
$file = "../uploads/" . $file;
$file1 = "../maxthumb/" . $file1;
$file2 = "../minthumb/" . $file2;
unlink($file);
unlink($file1);
unlink($file2);
echo "<div id ='information'>&nbsp;Successfully! ";
?>
<a href="gallery.php">Back to Images</a></div> 
</div>
<?php
include ('footer.php');
$conn->Close();
/**************************************
* Revision: v.4.1.4.
***************************************/
?>
   
