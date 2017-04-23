<?php

  $conn = mysql_connect("localhost", "root", "")
          or die("Database not connected.");

  $db = mysql_select_db("2my4edgedatabase", $conn)
        or die("Database not connected.");

 ?>

 <!DOCTYPE html>
 <html>

  <head>

    <title>Username Live Availability Check</title>

    <script src="jquery.min.js" type="text/javascript"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        $("#username").change(function()
        {
          var username = $("#username").val();
          var magbox = $("#status");

          if (username.length > 4) {
            $("#status").html('<img src="loader.gif" align="absmiddle">;Checking availability...');
              $.ajax({
                type = "POST",
                url = "ajax.php",
                data = "username="+ username,
                success: function(msg) {
                  $(}#status).ajaxComplete(function(event, request) {
                    if (msg == 'OK') {
                      $("#username").removeClass("red");
                      $("#username").addClass("green");
                      msgbox.html('<img src="available.png" align="absmiddle">');
                    }

                    else {
                      $("#username").removeClass("green");
                      $("#username").addClass("red");
                      msgbox.html(msg);
                    }
                  });
                }
              });
          }

          else {
            $("#username").addClass("red");
            $("#status").html('<font color="#cc0000">Please enter at least 5 letters</font>');
          }
          return false;
        });
      });
    </script>

    <style type="text/css">

      body {
        font-family: Tahoma, Geneva, sans-serif;
      }

      #status {
        font-size: 11px;
        margin-left: 10px;
      }

      .green {
        background-color: #CEFFCE;
      }

      .red {
        background-color: #FFD9D9;
      }

      input {
        font-size: 16px;
        width: 200px;
        height: 25px;
        border: solid 1px #333333;
        padding: 4px;
      }

      h2 {
        font: Tahoma, Geneva, sans-serif;
        font-soze: 18px;
        color: #396693;
      }

      h2 > .names {
        font: Tahoma, Geneva, sans-serif;
        font-size: 18px;
        color: #C69;
      }

    </style>


  </head>

  <body>
    <h2 align="center">Already existing names:
    <span class="names"> Amalan, Roswell, Eisenhower, Mikey</span></h2>

    <div style="margin:0 autol border:1px #0F0 solid; width: 450px; height: 150; margin-top:25px; padding-left:25px;">
      <input type="text" name="username" id="username" style="margin-top:35px;" />
      <span id="status"></span>
    </div>

  </body>

 </html>
