<?php session_start();
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
     header('Location: signin.php');
    die();
  }
include ('settings.php');
if($payoffon == 0)
 {
 die();
 }
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
require_once ('languages/lang_'.$langs.'.php');
$arecordSet =&$conn->Execute('SELECT * FROM categori ORDER BY name ASC');
if (!$arecordSet)
    print $conn->ErrorMsg();
else
    while (!$arecordSet->EOF) {
        if ($arecordSet->fields['cord'] == 0) {
            $aval[] = $arecordSet->fields;
        } else {
            $nval[] = $arecordSet->fields;
        }
        $arecordSet->MoveNext();
    }
$smarty->assign('categori',$aval);
$smarty->assign('subcat', @$nval);
$smarty->display('blank.php');
?>
<body>
<div style="float:left;margin-top:4px;">
<div id="linkpanel">
<div id="blockhead"><?php echo $lang['LINKNEWS'] ?></div><br />
<?php
$shouter = @$_SESSION['INC_USER_ID'];
$shouter = $conn->addq($shouter);
$id = $_GET['id'];
$id = $conn->addq($id);
$crecordSet = &$conn->Execute('SELECT * FROM newser where blogid = ? and buserid = ? and main = ? ORDER by blogid desc LIMIT 1', array($id,$shouter,"0"));
if(!$crecordSet)
	print $conn->ErrorMsg();
else
	while(!$crecordSet->EOF) {
		echo "<strong>".$crecordSet->fields['btexty']."</strong><br />";
if($crecordSet->fields['main'] == 0 && $payoffon == 1){
?>
<br /><?php echo $lang['MAKESPONSOR']; ?>&nbsp;<font color="red"><strong><?php echo $payvalue; ?>USD</strong></font>&nbsp;<?php echo $payday; ?>&nbsp;days<br /><br />
<form action='checkout.php?id=<?php echo $crecordSet->fields['blogid'] ?>' METHOD='POST'>
	<input type='image' name='paypal_submit' id='paypal_submit' src='themes/<?php echo $themes; ?>/styles/images/btn_paynow_SM.gif' border='0' width="37px" height="23px" align='top' alt='Pay with PayPal'/>
</form><br />
<?php
}else{
if($payoffon == 1){ ?><br /><?php echo $lang['SPONSOR']; ?><br /><br /><?php }else{ ?> <br /> <?php } ?>
<?php
}
$crecordSet->MoveNext();

	}
if($payoffon == 1){
echo $lang['SPONSORNO'];
}
?>
</div>
<script src='https://www.paypalobjects.com/js/external/dg.js' type='text/javascript'></script>
<script>
	var dg = new PAYPAL.apps.DGFlow(
	{
		trigger: 'paypal_submit',
		expType: 'instant'
		 //PayPal will decide the experience type for the buyer based on his/her 'Remember me on your computer' option.
	});
</script>
<br />
</div>
</div>
<?php
$smarty->display('footer.php');
$arecordSet->Close();
$crecordSet->Close();
$conn->Close();
######################################
##link.php                    4.1.4.##
######################################
?>