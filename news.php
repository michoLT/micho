<!DOCTYPE html>
<html lang=lt>
  <?php include "head.html";?>
  <body>
    <?php include "header_and_nav.html"; ?>
    <article>
     <script src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.7.1.js"></script>
      <script type="text/javascript">
        function confirmation() {
          return confirm('Are you sure you want to delete this?');
      }
  $(document).ready(function() {
  var showChar = 100;
  var ellipsestext = "...";
  var moretext = "more";
  var lesstext = "less";
  $('.more').each(function() {
    var content = $(this).html();

    if(content.length > showChar) {

      var c = content.substr(0, showChar);
      var h = content.substr(showChar-1, content.length - showChar);

      var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

      $(this).html(html);
    }

  });

  $(".morelink").click(function(){
    if($(this).hasClass("less")) {
      $(this).removeClass("less");
      $(this).html(moretext);
    } else {
      $(this).addClass("less");
      $(this).html(lesstext);
    }
    $(this).parent().prev().toggle();
    $(this).prev().toggle();
    return false;
  });
});
      </script>
      <div class="text-news">

        <?php
        include "mysqli-news.php";
        $query = mysqli_query($con,"Select * from news ORDER BY time DESC");
        while ($row = mysqli_fetch_assoc($query)){
        ?>
        <br><b><?php echo $row['title']; ?></b><br><br>
        <img src="gallery/<?php echo $row['image']; ?>" class="news-photos"><br>
        <p id='<?php  echo "article-" . $row['id'] ?>'><?php
            echo substr($row['article'], 0, 20);
          ?> <br></p>
           <button onclick='document.querySelector("#article-<?php echo $row['id'] ?>").innerText="<?php echo $row['article']; ?>"'>read more</button>
        <br><i>[<?php echo date("Y-m-d H:i:s", $row['time']); ?>]</i><hr>

        <?php
          if (iMEMBER){
            if (iADMIN) {
        ?>
              <form action='news.php' method='POST' class='news-form'>
                <input type='submit' name='<?php echo $row['id']; ?>' value='Edit article'>
              </form>
              <form action='news.php' method='POST' onclick='return confirmation()' class='news-form'>
                <input type='submit' name='delete_article' value='Delete article'>
                <input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
              </form><br><br><hr>

        <?php
              if (isset($_POST[$row['id']])){
                echo "
                  <form action='news.php' method='POST' enctype='multipart/form-data'>
                    Title: <input name= 'title' size='50' value= '{$row['title']}'><br>
                    Photo: <input name='image' type='file' value= '{$row['image']}'><br>
                    Article: <textarea name='article' cols='140' rows='20'>{$row['article']}</textarea><br>
                    <input type='hidden' name='id' value='{$row['id']}'/><br>
                    <input type='submit' name='update_article' value='Update article' />
                  </form>
                ";
              }
              if (isset($_POST['delete_article'])){
                @extract($_POST);
                mysqli_query($con,"DELETE from news WHERE id='$id'");
                  if ($id == $row['id']) {
                    echo "you have successfully deleted article!";
                    header("Refresh:3; url=news.php");
                }
              }
              if (isset($_POST['update_article'])){
                @extract($_POST);
                $image=$_FILES['image']['name'];
                mysqli_query($con,"UPDATE news SET article='$article', image='$image', title='$title' WHERE id='$id'");
                if ($id == $row['id']) {
                  echo "you have successfully updated your articles!<br>";
                  header("Refresh:3; url=news.php");
                }

              }
            }
          }
        }
        ?>
      </div>
      <div class="text-news">
      <img src="gallery/honda_logo.jpg" class="news-photo">
        <p1>Micho garage is best garage in Vilnius, inspired by old school Hondas and Subaru. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p1>
          <div class="comment more">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Vestibulum laoreet, nunc eget laoreet sagittis,
            quam ligula sodales orci, congue imperdiet eros tortor ac lectus.
            Duis eget nisl orci. Aliquam mattis purus non mauris
            blandit id luctus felis convallis.
            Integer varius egestas vestibulum.
            Nullam a dolor arcu, ac tempor elit. Donec.
           </div>
      </div>





      </article>
    <?php include "footer.html"; ?>
  </body>
</html>
