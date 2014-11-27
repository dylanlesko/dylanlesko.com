<?php
include ('settings.php');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require_once ('languages/lang_'.$langs.'.php');
$rating = (int)$_POST['rating'];
$id = (int)$_POST['id'];
if(isset($_COOKIE['incrated'.$id])) {
	echo "<div style='width:100px;float:left;background:#FFF5C3;font-family: Arial, sans-serif;font-size:14px;position:relative;top:0px;left:2px;'>$lang[VOTE1]</div>";
} else {
	$arecordSet = &$conn->Execute('SELECT * FROM tubevideo WHERE yuid = ? LIMIT 1', array($conn->addq($id)));
	if(!$arecordSet)
		print $conn->ErrorMsg();
	else
		while(!$arecordSet->EOF) {
			if($rating > 5 || $rating < 1) {
				echo "Rating can't be below 1 or more than 5";
			}
			setcookie("incrated".$id,$id,time() + 60 * 60 * 24 * 365);
			$total_ratings = $arecordSet->fields['totaly_ratings'];
			$total_rating = $arecordSet->fields['ytotal_rating'];
			$current_rating = $arecordSet->fields['yrating'];
			$new_total_rating = $total_rating + $rating;
			$new_total_ratings = $total_ratings + 1;
			$new_rating = $new_total_rating / $new_total_ratings;
$sql = $conn->Prepare('UPDATE tubevideo SET ytotal_rating = ? WHERE yuid = ?');
if($conn->Execute($sql,array($conn->addq($new_total_rating),$conn->addq($id))) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
}
$sql2 = $conn->Prepare('UPDATE tubevideo SET yrating = ? WHERE yuid = ?');
if($conn->Execute($sql2,array($conn->addq($new_rating),$conn->addq($id))) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
}
$sql3 = $conn->Prepare('UPDATE tubevideo SET totaly_ratings = ? WHERE yuid = ?');
if($conn->Execute($sql3,array($conn->addq($new_total_ratings),$conn->addq($id))) === false) {
		print '<br /><div id="error">error inserting[1]: '.$conn->ErrorMsg().'</div><br />';
}
				echo "<div style='width:100px;float:left;background:#FFF5C3;font-family: Arial, sans-serif;font-size:14px;position:relative;top:0px;left:2px;'>$lang[VOTE2]</div>";
				$arecordSet->MoveNext();
			}
		}
$conn->Close();
######################################
##sendv.php                   4.1.4.##
######################################
?>