<?php /* Smarty version Smarty-3.0.5, created on 2014-10-28 05:42:33
         compiled from "themes/classic/footer.php" */ ?>
<?php /*%%SmartyHeaderCode:1406613267544f8f39c69a56-83066974%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70a1396aa4cad317420f4599f8ea50bfaa67c029' => 
    array (
      0 => 'themes/classic/footer.php',
      1 => 1414499801,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1406613267544f8f39c69a56-83066974',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="foclear"></div>
<?php if ($_smarty_tpl->getVariable('adsoffon')->value==2){?>
<div id="beforefooter">
<?php echo $_smarty_tpl->getVariable('sensedown')->value;?>

</div>
<?php }?>
<div id="footer">
<a href="<?php echo $_smarty_tpl->getVariable('sitepath')->value;?>
">Home</a> | 
<a href="<?php echo $_smarty_tpl->getVariable('sitepath')->value;?>
/signup.php">Sign Up</a> | 
<a href="<?php echo $_smarty_tpl->getVariable('sitepath')->value;?>
/link.php">Sign In</a> | 
<!-- ## You may NOT REMOVE powered by phpEnter.net link from the pages. ## -->
<a href="http://www.phpenter.net">Powered by phpEnter.net 4.2.7.</a> | 
<!-- ## You may NOT REMOVE powered by phpEnter.net link from the pages. ## -->
<a href="<?php echo $_smarty_tpl->getVariable('sitepath')->value;?>
">CopyRight <?php echo $_smarty_tpl->getVariable('sitetitle')->value;?>
</a><br /><br />
<a href="<?php echo $_smarty_tpl->getVariable('sitepath')->value;?>
/privacy.php">Privacy</a> | 
<a href="<?php echo $_smarty_tpl->getVariable('sitepath')->value;?>
/aboutus.php">About Us</a> | 
<a href="<?php echo $_smarty_tpl->getVariable('sitepath')->value;?>
/terms.php">Terms of Use</a> | 
<a href="<?php echo $_smarty_tpl->getVariable('sitepath')->value;?>
/archive.php">Archive</a>
</div>
</div>
</body>
</html>