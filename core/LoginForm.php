<?php
/**
 * Created by PhpStorm.
 * User: mdupree
 * Date: 10/8/16
 * Time: 11:47 AM
 */
include_once 'BuddyList.php';
session_start();

function loginForm(){
  echo '
    <div id="loginform">
    <form action="index.php" method="post">
        <p>Please enter your name to continue:</p>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" />
        <input type="submit" name="enter" id="enter" value="Enter" />
    </form>
    </div>
    ';
}

//@todo can be refactored
//handles Name entry
if(isset($_POST['enter'])){
  if($_POST['name'] != ""){
    if(!isset($_SESSION['name']) && !isset($_SESSION['user_id'])) {
      $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
      $_SESSION['user_id'] = uniqid();
      write_to_online_list();
      write_to_online_list_clean();
    }
  }
  else{
    echo '<span class="error">Please type in a name</span>';
  }
}

//@todo can be refactored
//handles logging out when exit is clicked
if(isset($_GET['logout'])){

  //Remove from online list
  remove_from_online_list();
  write_to_online_list_clean();

  //Simple exit message
  $fp = fopen("log/log.html", 'a');
  fwrite($fp, "<div class='msgln'><i>User ". $_SESSION['name'] ." has left the chat session.</i><br></div>");
  fclose($fp);
  session_destroy();
  header("Location: index.php"); //Redirect the user
}