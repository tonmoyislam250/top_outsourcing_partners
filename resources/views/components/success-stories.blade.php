<link rel="stylesheet" href="{{ asset('css/review.css') }}">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"> <!-- Swiper styles -->

<style>
  .swiper-container {
    overflow: hidden; /* Prevent hidden slides from affecting layout */
  }
</style>

<div class="success-stories-heading">
  <h2>Success Stories</h2>
  <p>Meet our graduates working at top companies. Get inspired by the journeys of our students who have successfully transitioned into high-paying careers with the help of our courses and mentorship.</p>
</div>

<div class="swiper-container">
  <div class="swiper-wrapper">
    <div class="swiper-slide">
      <div class="review-card review-card--highlighted">
        <div class="review-card__avatar">
          <img src="{{ asset('images/avatars/avatar1.svg') }}" alt="Avatar">
        </div>
        Meet our graduates working at top companies. Get inspired by the journeys of our students.
      </div>
    </div>
    <div class="swiper-slide">
      <div class="review-card">
        <div class="review-card__avatar">
          <img src="{{ asset('images/avatars/avatar2.svg') }}" alt="Avatar">
        </div>
        Meet our graduates working at top companies. Get inspired by the journeys of our students.
      </div>
    </div>
    <div class="swiper-slide">
      <div class="review-card">
        <div class="review-card__avatar">
          <img src="{{ asset('images/avatars/avatar3.svg') }}" alt="Avatar">
        </div>
        Meet our graduates working at top companies. Get inspired by the journeys of our students. Meet our graduates working at top companies. Get inspired by the journeys of our students.
      </div>
    </div>
    <div class="swiper-slide">
      <div class="review-card">
        <div class="review-card__avatar">
          <img src="{{ asset('images/avatars/avatar4.svg') }}" alt="Avatar">
        </div>
        Meet our graduates working at top companies. Get inspired by the journeys of our students.
      </div>
    </div>
    <div class="swiper-slide">
      <div class="review-card">
        <div class="review-card__avatar">
          <img src="{{ asset('images/avatars/avatar5.svg') }}" alt="Avatar">
        </div>
        Meet our graduates working at top companies. Get inspired by the journeys of our students. Meet our graduates working at top companies. Get inspired by the journeys of our students.
      </div>
    </div>
    <div class="swiper-slide">
      <div class="review-card">
        <div class="review-card__avatar">
          <img src="{{ asset('images/avatars/avatar6.svg') }}" alt="Avatar">
        </div>
        Meet our graduates working at top companies. Get inspired by the journeys of our students.
      </div>
    </div>
    <div class="swiper-slide">
      <div class="review-card">
        <div class="review-card__avatar">
          <img src="{{ asset('images/avatars/avatar7.svg') }}" alt="Avatar">
        </div>
        Another inspiring story of success from our graduates.
      </div>
    </div>
    <div class="swiper-slide">
      <div class="review-card">
        <div class="review-card__avatar">
          <img src="{{ asset('images/avatars/avatar8.svg') }}" alt="Avatar">
        </div>
        Discover how our students achieved their dreams.
      </div>
    </div>
  </div>
</div>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> <!-- Swiper script -->
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
  });
</script>
