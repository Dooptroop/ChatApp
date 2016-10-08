<?php
/**
 * Created by PhpStorm.
 * User: mdupree
 * Date: 10/8/16
 * Time: 12:13 PM
 */

session_start();

//handle the POST submit message
if(isset($_SESSION['name'])){
  $text = $_POST['text'];

  $fp = fopen("../log/log.html", 'a');
  fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>".$_SESSION['name']."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
  fclose($fp);
}