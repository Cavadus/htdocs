<html>
  <head>
      <title>Simple Comment System</title>

      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/example.css">

      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>

  </head>

  <body>
    <br><center><h2><font face="Andalus">Simple Comment System</font></h2></center><br>

    <?php
      include('config.php');
     ?>

     <div class="cmt-container">

       <?php
        $query = $db->prepare("SELECT * FROM comments") ;
        $query->execute();

        while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
          $name = $data['name'];
          $comment = $data['comment'];
          $date = $data['date'];
        ?>

        <div class="cmt-cnt">
          <img src="img/profile-img.jpg" />
          <div class="thecom">
            <h5><?php echo $name; ?></h5>
            <span class="com-dt"><?php echo $date; ?></span>
            <br />
            <p><?php echo $comment; ?></p>
          </div>
        </div>
      <?php } ?>

      <div class="new-com-bt">
        <span>Write a comment...</span>
      </div>

      <div class="new-com-cnt">
        <input type="text" id="name-com" name="name-com" value="" placeholder="Your name" />
        <br/>
        <textarea class="the-new-com"></textarea>
        <div class="bt-add-com">Post Comment</div>
        <div class="bt-cancel-com">Cancel</div>
      </div>

      <div class="clear"></div>

    </div>

    <script type="text/javascript">
      $(function() {
        //On clicking 'Write a comment box'
        $('.new-com-bt').click(function(event) {
          $(this).hide();  //Hide write comment box
          $('.new-com-cnt').show();  //Show the new comment input box
          $('#name-com').focus();  //Focus the cursor at the name field
        });

        $('.the-new-com').bind('input propertychange', function() {
          $(".bt-add-com").css({opacity:0.6});
          var checklength = $(this).val().length;
          if(checklength) {
            $(".bt-add-com").css({opacity:1});
          }
        });

        $('.bt-cancel-com').click(function() {
          $('.the-new-com').val('');
          $('.new-com-cnt').fadeOut('fast', function() {
            $('.new-com-bt').fadeIn('fast');
          });
        });

        //On clicking "Post Comment"

        $('.bt-add-com').click(function() {
          var theCom = $('.the-new-com');
          var theName = $('#name-com');

          if (!theCom.val()) {
            alert('You need to write a comment!');
          }

          else {
            $.ajax({
              type: "POST",
              url: "add-comment.php",
              data: { 'act=add-com&name='+theName.val()+'&comment='.theCom.val(),
                      success: function(xyz) {
                        theCom.val('');
                        theName.val('');
                        $('.new-com-cnt').hide('fast', function() {
                          $('.new-com-bt').show('fast');
                          $('.new-com-bt').before(xyz);
                        });
                      };
            });
          }
        });

      });
    </script>

  </body>
</html>
