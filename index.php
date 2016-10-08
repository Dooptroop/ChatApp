<?php
include("config.php");
include("includes.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>MDupree Chat</title>
  <?php include_once 'imports.php'?>
</head>

<?php
if(!isset($_SESSION['name'])){
  loginForm();
}
else{
  include("templates/chat_UI.tpl.php");
  ?>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
  <?php
}
?>
