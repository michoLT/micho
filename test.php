<!DOCTYPE html>
<html lang=lt>
  <?php include "head.html"; ?>
  <body>
    <?php include "header_and_nav.html"; ?>
    <article>
      <script type="text/javascript">
        let countdown;
        const timerDisplay = document.querySelector('.display__time-left');
        const endTime = document.querySelector('.display__end-time');
        const buttons = document.querySelectorAll('[data-time]');

        function timer(seconds) {
          // clear any existing timers
          clearInterval(countdown);

          const now = Date.now();
          const then = now + seconds * 1000;
          displayTimeLeft(seconds);
          displayEndTime(then);

          countdown = setInterval(() => {
            const secondsLeft = Math.round((then - Date.now()) / 1000);
            // check if we should stop it!
            if(secondsLeft < 0) {
              clearInterval(countdown);
              return;
            }
            // display it
            displayTimeLeft(secondsLeft);
          }, 1000);
        }

        function displayTimeLeft(seconds) {
          const minutes = Math.floor(seconds / 60);
          const remainderSeconds = seconds % 60;
          const display = `${minutes}:${remainderSeconds < 10 ? '0' : '' }${remainderSeconds}`;
          document.title = display;
          timerDisplay.textContent = display;
        }

        function displayEndTime(timestamp) {
          const end = new Date(timestamp);
          const hour = end.getHours();
          const adjustedHour = hour > 12 ? hour - 12 : hour;
          const minutes = end.getMinutes();
          endTime.textContent = `Be Back At ${adjustedHour}:${minutes < 10 ? '0' : ''}${minutes}`;
        }

        function startTimer() {
          const seconds = parseInt(this.dataset.time);
          timer(seconds);
        }

        buttons.forEach(button => button.addEventListener('click', startTimer));
        document.customForm.addEventListener('submit', function(e) {
          e.preventDefault();
          const mins = this.minutes.value;
          console.log(mins);
          timer(mins * 60);
          this.reset();
        });
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
      </div>
    </article>
    <?php include "footer.html"; ?>
  </body>
</html>
