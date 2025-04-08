<link rel="stylesheet" href="{{ asset('css/review.css') }}">
<link rel="stylesheet" href="{{ asset('css/default/swiper-bundle.min.css') }}"> <!-- Swiper styles -->
<link rel="stylesheet" href="{{ asset('css/animate.min.css') }}"> <!-- Animation library -->

<style>
  .swiper-container {
    background-color: #fff9db; /* Light yellow background */
    overflow: hidden;
  }

  .success-stories-section {
    background-color: #fff9db; /* Light yellow background */
    position: relative;
    padding-top: 50px;
    border-top-left-radius: 145px;
    border-top-right-radius: 145px
  }

</style>

<section class="success-stories-section">
  <div class="success-stories-heading" style="border-top-left-radius: 50px; border-top-right-radius: 50px;" animate__animated animate__fadeIn animate__delay-1s">
    <h2 class="animate__animated animate__slideInDown">Success Stories</h2>
    <p class="animate__animated animate__fadeIn animate__delay-2s">Meet our graduates working at top companies. Get inspired by the journeys of our students who have successfully transitioned into high-paying careers with the help of our courses and mentorship.</p>
  </div>

  <div class="swiper-container">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <div class="review-card review-card--highlighted animate__animated animate__fadeInUp">
          <div class="review-card__avatar">
            <img src="{{ asset('images/avatars/avatar1.svg') }}" alt="Avatar">
          </div>
          Meet our graduates working at top companies. Get inspired by the journeys of our students.
        </div>
      </div>
      <div class="swiper-slide">
        <div class="review-card animate__animated animate__fadeInUp animate__delay-1s">
          <div class="review-card__avatar">
            <img src="{{ asset('images/avatars/avatar2.svg') }}" alt="Avatar">
          </div>
          Meet our graduates working at top companies. Get inspired by the journeys of our students.
        </div>
      </div>
      <div class="swiper-slide">
        <div class="review-card animate__animated animate__fadeInUp animate__delay-2s">
          <div class="review-card__avatar">
            <img src="{{ asset('images/avatars/avatar3.svg') }}" alt="Avatar">
          </div>
          Meet our graduates working at top companies. Get inspired by the journeys of our students. Meet our graduates working at top companies. Get inspired by the journeys of our students.
        </div>
      </div>
      <div class="swiper-slide">
        <div class="review-card animate__animated animate__fadeInUp animate__delay-3s">
          <div class="review-card__avatar">
            <img src="{{ asset('images/avatars/avatar4.svg') }}" alt="Avatar">
          </div>
          Meet our graduates working at top companies. Get inspired by the journeys of our students.
        </div>
      </div>
      <div class="swiper-slide">
        <div class="review-card animate__animated animate__fadeInUp animate__delay-4s">
          <div class="review-card__avatar">
            <img src="{{ asset('images/avatars/avatar5.svg') }}" alt="Avatar">
          </div>
          Meet our graduates working at top companies. Get inspired by the journeys of our students. Meet our graduates working at top companies. Get inspired by the journeys of our students.
        </div>
      </div>
      <div class="swiper-slide">
        <div class="review-card animate__animated animate__fadeInUp animate__delay-5s">
          <div class="review-card__avatar">
            <img src="{{ asset('images/avatars/avatar6.svg') }}" alt="Avatar">
          </div>
          Meet our graduates working at top companies. Get inspired by the journeys of our students.
        </div>
      </div>
      <div class="swiper-slide">
        <div class="review-card animate__animated animate__fadeInUp animate__delay-6s">
          <div class="review-card__avatar">
            <img src="{{ asset('images/avatars/avatar7.svg') }}" alt="Avatar">
          </div>
          Another inspiring story of success from our graduates.
        </div>
      </div>
      <div class="swiper-slide">
        <div class="review-card animate__animated animate__fadeInUp animate__delay-7s">
          <div class="review-card__avatar">
            <img src="{{ asset('images/avatars/avatar8.svg') }}" alt="Avatar">
          </div>
          Discover how our students achieved their dreams.
        </div>
      </div>
    </div>
  </div>
</section>

<script src="{{ asset('js/swiper-bundle.min.js') }}"></script> <!-- Swiper script -->
<script>
  const swiper = new Swiper('.swiper-container', {
    slidesPerView: 1, // Display 4 reviews at once
    spaceBetween: 20, // Space between slides
    navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
    breakpoints: {
      1024: { slidesPerView: 4 }, // For larger screens
      768: { slidesPerView: 2 },  // For medium screens
      480: { slidesPerView: 1 },  // For smaller screens
    },
    on: {
      slideChange: function () {
        // Adding animations to slides as they become active
        document.querySelectorAll('.swiper-slide-active .review-card').forEach(card => {
          card.classList.add('animate__animated', 'animate__pulse');
        });
      }
    }
  });
</script>
