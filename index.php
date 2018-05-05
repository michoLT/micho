<!DOCTYPE html>
<html lang=lt>
<?php include "head.html"; ?>

<body>
  <?php include "header_and_nav.html"; ?>
  <article>

    <script src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.7.1.js"></script>
    <script src="src/jquery-3.3.1.slim.js"></script>
    <script src="src/simpleslider.js"></script>
    <script type="text/javascript">

   var slideCount = document.querySelectorAll('.slider .slide-item').length;
  var slideWidth = document.querySelectorAll('.slider-outer')[0].offsetWidth;
  var slideHeight = document.querySelectorAll(".slider-outer")[0].offsetHeight;

  var sliderUlWidth = slideCount * slideWidth;
  document.querySelectorAll('.slider')[0].style.cssText = "width:" + sliderUlWidth + "px";

  for (var i = 0; i < slideCount; i++) {
    document.querySelectorAll('.slide-item')[i].style.cssText = "width:" + slideWidth + "px;height:" + slideHeight + "px";
  }

  setInterval(function() {
    moveRight();
  }, 3000);
  var counter = 1;

  function moveRight() {
    var slideNum = counter++
      if (slideNum < slideCount) {
        var transformSize = slideWidth * slideNum;
        document.querySelectorAll('.slider')[0].style.cssText =
          "width:" + sliderUlWidth + "px; -webkit-transition:all 800ms ease; -webkit-transform:translate3d(-" + transformSize + "px, 0px, 0px);-moz-transition:all 800ms ease; -moz-transform:translate3d(-" + transformSize + "px, 0px, 0px);-o-transition:all 800ms ease; -o-transform:translate3d(-" + transformSize + "px, 0px, 0px);transition:all 800ms ease; transform:translate3d(-" + transformSize + "px, 0px, 0px)";

      } else {
        counter = 1;
        document.querySelectorAll('.slider')[0].style.cssText = "width:" + sliderUlWidth + "px;-webkit-transition:all 800ms ease; -webkit-transform:translate3d(0px, 0px, 0px);-moz-transition:all 800ms ease; -moz-transform:translate3d(0px, 0px, 0px);-o-transition:all 800ms ease; -o-transform:translate3d(0px, 0px, 0px);transition:all 800ms ease; transform:translate3d(0px, 0px, 0px)";
      }

  }

      </script>
    <div class="text">
      <div class="main">
        <div class="slider-outer">
          <div class="slider">
            <div class="slide-item"><span class="slide-image" style="background-image: url(http://placehold.it/1920x1000/FE0000);"></span></div>
            <div class="slide-item"><span class="slide-image" style="background-image: url(http://placehold.it/1920x1000/FEE000);"></span></div>
            <div class="slide-item"><span class="slide-image" style="background-image: url(http://placehold.it/1920x1000/FE00C7);"></span></div>


          </div>
        </div>
      </div>
      <div id="myslider" class="slider">

  <img src="/gallery/1.jpg">

  <img src="/gallery/2.jpg">

  <img src="/gallery/3.jpg">


      </div>

      <h1> Welcome to ChoboMicho garage!!!!</h1>
      <br>
      <img src="gallery/civic.jpg" class="index-photo">
    </div>
  </article>

  <?php include "footer.html"; ?>
</body>

</html>
