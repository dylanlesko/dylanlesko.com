<?php session_start();
/* * ************************************
* PHP Enter is licensed under the
* GNU General Public License version 2
* ************************************* */
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
session_unset();
session_destroy();
echo"<center style='font-family:tahoma'>You have successfully logged out";
?>
<script type="text/javascript">
    <!--
    function delayer(){
        window.location = "signin.php"
    }
    //-->
</script>
<body onLoad="setTimeout('delayer()', 2000)">
<?php
/**************************************
* Revision: v.4.1.4.
***************************************/
?>
