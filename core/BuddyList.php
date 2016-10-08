<?php
/**
 * Created by PhpStorm.
 * User: mdupree
 * Date: 10/8/16
 * Time: 1:32 PM
 */
//@todo this will break.. make a path
$online_log = "/var/www/dev/chatapp/log/online.html";
$online_log_clean = "/var/www/dev/chatapp/log/whosonline.html";

function write_to_online_list(){

  $fp_online = fopen($GLOBALS['online_log'], 'a');
  fwrite($fp_online, ":" . $_SESSION['name'] . ":" . $_SESSION['user_id'] . "\r\n");
  fclose($fp_online);
}
function write_to_online_list_clean(){
  $online_list = get_online_list_clean();
  file_put_contents($GLOBALS['online_log_clean'], '');


  $list = retrieve_members_online();
  $fp_online = fopen($GLOBALS['online_log_clean'], 'a');
  fwrite($fp_online, '');
  fwrite($fp_online, $list);
  fclose($fp_online);
}
function remove_from_online_list(){
  $online_list = get_online_list();
  $search = ':' . $_SESSION['name'] . ':' . $_SESSION['user_id'];
  $online_list = str_replace($search, '', $online_list);
  file_put_contents($GLOBALS['online_log'], $online_list);
}

function get_online_list(){
  return file_get_contents($GLOBALS['online_log']);
}
function get_online_list_clean(){
  return file_get_contents($GLOBALS['online_log_clean']);
}

function retrieve_members_online(){
  $handle = fopen($GLOBALS['online_log'], "r");
  $online_list = '<ul>';
  if ($handle) {
    while (($line = fgets($handle)) !== false) {
      if(trim($line) != ''){
        $online_list .= '<li>' . get_string_between($line, ':', ':') . '</li>';
      }
    }
    fclose($handle);
  } else {
    // error opening the file.
  }
  $online_list .= '</ul>';

  return $online_list;
}

function get_string_between($string, $start, $end){
  $string = ' ' . $string;
  $ini = strpos($string, $start);
  if ($ini == 0) return '';
  $ini += strlen($start);
  $len = strpos($string, $end, $ini) - $ini;
  return substr($string, $ini, $len);
}




