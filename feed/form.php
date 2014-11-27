<?php @session_start();
/* * ********************************************************************
*  Copyright notice PHP Enter
*
*  (c) 2011 Predrag Rukavina - admin[at]phpenter[dot]net
*  All rights reserved
*
*  This script is part of the PHP Enter project. 
*  The PHP Enter project is free software; you can redistribute it and/or
*  modify it under the terms of the GNU General Public License
*  as published by the Free Software Foundation; either version 2
*  of the License, or (at your option) any later version.
*
*  This program is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  You should have received a copy of the GNU General Public License
*  along with this program; if not, write to the Free Software
*  Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
*  MA  02110-1301, USA.
*
*  This copyright notice MUST appear in all copies of the script!
* ********************************************************************** */
require_once ('salt.php');
require_once ('classes/securesession.class.php');
$ss = new SecSession();
$ss->check_browser = true;
$ss->check_ip_blocks = 2;
$ss->secure_word = $salt;
$ss->regenerate_id = true;
if (!$ss->Check() || !isset($_SESSION['loggedin']) || !$_SESSION['loggedin'])
  {
    die();
  }
if (!$_SESSION['inecsess'])
  {
    die();
  }
	if(get_magic_quotes_gpc()) {
		$univer = date("Yhis");
		$cidblog = stripslashes($_POST['idblog']);
		$bname = stripslashes($_POST['bname']);
		$summary = stripslashes($_POST['summary']);
		$cbadress = stripslashes($_POST['badress']);
		$amess = stripslashes($_POST['amess']);
		$amesst = htmlspecialchars($amess);
	} else {
		$univer = date("Yhis");
		$cidblog = $_POST['idblog'];
		$bname = $_POST['bname'];
		$summary = $_POST['summary'];
		$cbadress = $_POST['badress'];
		$amess = $_POST['amess'];
		$amesst = htmlspecialchars($amess);
	}
	?>
<form action="post.php" id="incform" enctype="multipart/form-data" method="post">
<h3>New Story</h3>
<input type="hidden" name="univer" value="<?php echo $univer; ?>" />
<input type="hidden" name="badress" value="<?php echo $cbadress; ?>" />
<input type="hidden" name="idblog" value="<?php echo $cidblog; ?>" />
<div style="<?php echo @$error1; ?>"><?php echo $lang['BOOKFIELD1']; ?>:</div>
<div><input id="firstfield" type="text" name="bname" value="<?php echo $bname; ?>" /></div>
<br />
<br />
<div style="<?php echo @$error2; ?>"><?php echo $lang['POSTSUM']; ?>:</div>
<div><input id="firstfield" type="text" name="summary" value="<?php echo $summary; ?>" /></div>
<br />
<br />
<div style="<?php echo @$error3; ?>"><?php echo $lang['POSTIMG']; ?>:</div>
<div><input type="file" name="image" /></div>
<br />
<br />
<div style="<?php echo @$error4; ?>"><?php echo $lang['POSTDES']; ?>:</div>
<div><textarea name="amess" class="postarea"><?php echo @$amesst; ?></textarea></div><br /><br />
<div><input class="buton" type="submit" value="<?php echo $lang['LINKSUB']; ?>" name="query" /></div>
</form>
<br />
<br />
</div>