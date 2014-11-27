<?php
session_start();
/**********************************************************************
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
************************************************************************/
include('settings.php');
unset($_SESSION['cusid']);
unset($_SESSION['INC_USER_ID']);
unset($_SESSION['INC_USER_NAME']);
unset($_SESSION['CC_MODER']);
unset($_SESSION['INC_USER_THUMB']);
unset($_SESSION['INC_USER_PRIV']);
unset($_SESSION['HTTP_USER_AGENT']);
unset($_SESSION['logged_in']);
unset($_SESSION['loggedin']);
unset($_SESSION['ss_fprint']);
unset($_SESSION['incsess']);
unset($_SESSION['inecsess']);
unset($_SESSION['jumps']);
session_unset();
session_destroy();
$_SESSION = array();
?>
<script type="text/javascript">
function delayer(){
    window.location = "index.php"
}
</script>
<body onLoad="setTimeout('delayer()', 2000)">
<div style='text-align:center;width:468px;margin:0px auto;min-height:60px;max-height:80px;background: #F8F8F8;font-size:12px;color:#555;font-family:tahoma;helvetica,arial;border-top: 1px dashed #EEE;margin-top:32px;padding-top:8px;'>You have successfully logged out<br /><br /><img src="themes/<?php echo $themes; ?>/styles/images/ajax-loader.gif" border="0"><br /></div>
<?php
######################################
##signout.php                 4.1.4.##
######################################
?>