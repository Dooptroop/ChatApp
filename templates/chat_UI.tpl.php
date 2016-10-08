<?php
/**
 * Created by PhpStorm.
 * User: mdupree
 * Date: 10/8/16
 * Time: 12:51 PM
 */
?>
<div class="online-members sidebar left">

  <h1 class="title online-title">Online:</h1>
  <div class="list" id="online-list">
    <!--      --><?php
    //        echo retrieve_members_online();
    //      ?>
  </div>
</div>
<div id="wrapper">
  <div id="menu">
    <p class="welcome">Welcome, <b><?php echo $_SESSION['name']; ?></b></p>
    <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
    <div style="clear:both"></div>
  </div>



  <div id="chatbox"><?php
    if (file_exists("log/log.html") && filesize("log/log.html") > 0) {
      $handle = fopen("log/log.html", "r");
      $contents = fread($handle, filesize("log/log.html"));
      fclose($handle);

      echo $contents;
    }
    ?>
  </div>

  <form name="message" action="">
    <input name="usermsg" type="text" id="usermsg" size="63"/>
    <input name="submitmsg" type="submit" id="submitmsg" value="Send"/>
  </form>
</div>