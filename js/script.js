/**
 * Created by mdupree on 10/8/16.
 */


// jQuery Document
$(document).ready(function(){

  //If user wants to end session
  $("#exit").click(function(){
    var exit = confirm("Are you sure you want to end the session?");
    if(exit==true){window.location = 'index.php?logout=true';}
  });

  //If user submits the form
  $("#submitmsg").click(function(){
    var clientmsg = $("#usermsg").val();
    $.post("core/post.php", {text: clientmsg});
    $("#usermsg").attr("value", "");
    return false;
  });

  //Load the file containing the chat log
  function loadLog(){
    var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
    $.ajax({
      url: "log/log.html",
      cache: false,
      success: function(html){
        $("#chatbox").html(html); //Insert chat log into the #chatbox div

        //Auto-scroll
        var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
        if(newscrollHeight > oldscrollHeight){
          $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
        }
      },
    });
  }
  setInterval (loadLog, 15);	//Reload file every 2500 ms or x ms if you wish to change the second parameter

});//End Document Ready Function()