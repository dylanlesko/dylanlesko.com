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
include ('settings.php');
require_once ('languages/lang_'.$langs.'.php');
require_once ('salt.php');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
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
if (!$_SESSION['inecsess'])
  {
    die();
  }
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
<div style="float:left;margin-top:4px;color:#555;">
<div id="linkpanel">
<div id="blockhead"><?php echo $lang['LINKSTORY']; ?></div><br />
<span class="hal4">&nbsp;<a title="<?php echo $lang['LINKNO']; ?>" href="post.php"><?php echo $lang['LINKNO']; ?></a>
</span><br />
<form action="post.php" method="post">
<span class="hal4">&nbsp;<?php echo $lang['LINKWITH']; ?></span><br />
<input type="text" name="incname" class="cinput" style="width:340px;"><br /><br />
<input type="submit" value="<?php echo $lang['LINKSUB']; ?>" name="Submit" class="buton">
</form>
</div>
<br />
<div id="linkpanel">
<?php
$shouter = @$_SESSION['INC_USER_ID'];
$brecordSet = &$conn->Execute('SELECT * FROM users WHERE usid = ?', array($shouter));
if(!$brecordSet)
	print $conn->ErrorMsg();
else
	while(!$brecordSet->EOF) {
		$cfullname = $brecordSet->fields['fullname'];
		$cusername = $brecordSet->fields['username'];
		$chomep = $brecordSet->fields['homep'];
		$cbiosi = $brecordSet->fields['biosi'];
		$cthumbs = $brecordSet->fields['thumbs'];
		$brecordSet->MoveNext();
	} ?>
<span class="featuredcontainer">
<div id="blockhead"><?php echo $lang['LINKPROF'] ?>
<a href="uploads/<?php echo $cthumbs ?>"><img style="position:relative;top:-3px;" src="minthumb/<?php echo $cthumbs ?>" width="25px" height="25px" border="0"></a></div>
<br />
</span>
<form method="post" enctype="multipart/form-data" action="setprofile.php"><br /><br />
<span class="hal4">&nbsp;<?php echo $lang['LINKFULL']; ?></span><br />
<input type="text" name="fullname" class="cinput" value="<?php echo $cfullname ?>" style="width:340px;"><br /><br />
<span class="hal4">&nbsp;<?php echo $lang['LINKHOME']; ?></span><br />
<input type="text" name="homep" class="cinput" value="<?php echo $chomep ?>" style="width:340px;"><br /><br />
<span class="hal4">&nbsp;<?php echo $lang['LINKABOUT']; ?></span><br />
<textarea name="biosi" class="cinput" style="width:340px;"><?php echo $cbiosi; ?></textarea><br /><br />
<?php echo $lang['NEWIMAGE']; ?>
<input id="check" type="checkbox" name="coption" value="1"><br /><br />
<input type="file" name="image" /><br /><br />
<input type="submit" value="<?php echo $lang['LINKSUB']; ?>" name="query" class="buton" />
</form>
</div>
<?php
$drecordSet = &$conn->Execute('SELECT * FROM modules where modap = ? and mactive = ?', array('1','1'));
if(!$drecordSet)
	print $conn->ErrorMsg();
else
	while(!$drecordSet->EOF) {
?>
<div id="bpanel">
<div id="blockhead"><?php echo $drecordSet->fields['modname'] ?></div>
<?php echo $lang['BOOKTEXT']; ?>&nbsp;
<a href="javascript:(function(){f='<?php echo $sitepath; ?>/bookmark.php?urld='+encodeURIComponent(window.location.href.replace(/http?:\/\//i, '').replace(/https?:\/\//i, ''))+'&title='+encodeURIComponent(document.title)+'&notes='+encodeURIComponent(''+(window.getSelection?window.getSelection():document.getSelection?document.getSelection():document.selection.createRange().text))+'&v=6&';a=function(){if(!window.open(f+'noui=1&jump=doclose','enter','location=yes,links=no,scrollbars=no,toolbar=no,width=660,height=300'))location.href=f+'jump=yes'};if(/Firefox/.test(navigator.userAgent)){setTimeout(a,0)}else{a()}})()"><?php echo htmlspecialchars_decode($drecordSet->fields['mabstrt']); ?></a>
</div>
<?php
$drecordSet->MoveNext();
	}
?>
</div>
<div style="float:right;margin-top:4px;color:#555;">
<div id="linkpanel">
<div id="blockhead">
<?php echo $lang['LINKLINKS'] ?>
</div><br />
<div id="linkhead">
<img src="themes/<?php echo $themes; ?>/styles/images/penguin.png" width="22px" height="22px" title="Howdy <?php echo $_SESSION['INC_USER_NAME']; ?>"></a>
&nbsp;<?php echo $lang['RETHEADE'] ?>&nbsp;<?php echo $_SESSION['INC_USER_NAME']; ?>&nbsp;&nbsp;&nbsp;
<img src="themes/<?php echo $themes; ?>/styles/images/sign-out.png" width="16px" height="16px" title="<?php echo $lang['LINKOUT'] ?>">
<a title="<?php echo $lang['LINKOUT'] ?>" href="signout.php"><?php echo $lang['LINKOUT'] ?></a>
&nbsp;&nbsp;&nbsp;<img src="themes/<?php echo $themes; ?>/styles/images/newstory.png" width="16px" height="16px" title="<?php echo $lang['LINKNEWS'] ?>">
&nbsp;<a title="<?php echo $lang['LINKNEWS'] ?>" href="profile.php?id=<?php echo $_SESSION['INC_USER_ID']; ?>"><?php echo
$lang['LINKNEWS'] ?></a>
&nbsp;&nbsp; <img src="themes/<?php echo $themes; ?>/styles/images/messag.png" width="16px" height="16px" title="<?php echo $lang['LINKMESS'] ?>">
&nbsp;<a title="<?php echo $lang['LINKMESS'] ?>" href="messages.php"><?php echo $lang['LINKMESS'] ?></a>
</div>
</div>
<br />
<div id="linkpanel">
<div id="blockhead"><?php echo $lang['LINKTUBE']; ?></div><br />
<form action="postube.php" method="post">
<span class="hal4">&nbsp;<?php echo $lang['LINKTURL']; ?></span> <font style="font-size:9px;"><?php echo $lang['TOOLS3']; ?></font><br />
<input type="text" name="yadress" class="cinput" style="width:340px;"><br /><br />
<input type="submit"  value="<?php echo $lang['LINKSUB']; ?>" name="Submit" class="buton">
</form>
</div>
<br />
<div id="linkpanel">
<div id="blockhead">
<?php echo $lang['LINKGAL'] ?>
</div><br />
<form action="postimg.php" enctype="multipart/form-data" method="post">
<span class="hal4">&nbsp;<?php echo $lang['LINKIMT'] ?></span>
<br />
<input type="text" name="gtitle" size="35" />
<br />
<br />
<span class="hal4">&nbsp;<?php echo $lang['LINKIMG'] ?></span>
<br />
<input type="file" name="image" />
<br /><br />
<input type="submit"  value="<?php echo $lang['LINKSUB']; ?>" name="query" class="buton">
</form>
</div>
<br />
<div id="linkpanel">
<script>
function goto(site) {
var msg = confirm("<?php echo $lang['LINKALER'] ?>")
if (msg) {window.location.href = site}
else (null)
}
</script>
<div id="blockhead"><?php echo $lang['LINKNEWS'] ?></div><br />
<?php
if($payoffon == 1){
echo $lang['SPONSORNO']."<br /><br />";
echo"<img src='themes/$themes/styles/images/btn_paynow_SM.gif' border='0' width='37px' height='23px'><br /><br />";
}
$shouter = @$_SESSION['INC_USER_ID'];
$crecordSet = &$conn->Execute('SELECT * FROM newser where buserid = ? ORDER by blogid desc', array($shouter));
if(!$crecordSet)
	print $conn->ErrorMsg();
else
	while(!$crecordSet->EOF) {
		echo "<strong>".$crecordSet->fields['btexty']."</strong><br /><a href=\"edit.php?id=".$crecordSet->fields['blogid']."&mod=".$crecordSet->fields['editor']."\">[$lang[LINKEDIT]]</a> <a href=\"javascript:goto('delete.php?id=".$crecordSet->fields['blogid']."&file=".$crecordSet->fields['images']."')\">[$lang[LINKDEL]]</a>";
if($crecordSet->fields['main'] == 0 && $payoffon == 1){
?>
&nbsp;<a href="sponsored.php?id=<?php echo $crecordSet->fields['blogid']; ?>">[<?php echo $lang['MAKESPONSOR']; ?>]</a><br /><br />
<?php
}else{
if($payoffon == 1){ ?>&nbsp;[<?php echo $lang['SPONSOR']; ?>]<br /><br /><?php }else{ ?> <br /><br /> <?php } ?>
<?php
}
$crecordSet->MoveNext();
	}
?>
</div>
<br />
</div>
</div>
<?php
$smarty->display('footer.php');
$arecordSet->Close();
$brecordSet->Close();
$crecordSet->Close();
$conn->Close();
######################################
##link.php                    4.1.4.##
######################################
?>