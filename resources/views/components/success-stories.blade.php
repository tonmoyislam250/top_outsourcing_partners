<link rel="stylesheet" href="{{ asset('css/review.css') }}">
<link rel="stylesheet" href="{{ asset('css/default/swiper-bundle.min.css') }}"> <!-- Swiper styles -->
<link rel="stylesheet" href="{{ asset('css/default/animate.min.css') }}"> <!-- Animation library -->

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
    <h2 class="animate__animated animate__slideInDown">Why Our Clients Stick With Us?</h2>
    <p class="animate__animated animate__fadeIn animate__delay-2s">Meet our clients who have worked with us to achieve their business goals. Get inspired by the journeys of businesses that have successfully scaled their operations, streamlined their processes, and transformed their financial strategies with our support and expertise.</p>
  </div>

  <div class="swiper-container">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <div class="review-card review-card--highlighted animate__animated animate__fadeInUp">
          <div class="review-card__avatar">
            <img src="{{ asset('images/avatars/avatar1.svg') }}" alt="Avatar">
          </div>
          <p class="review-card__text" style="font-size: 15px; font-style: italic; font-family: 'Georgia', serif;">"Working with Top Outsourcing Partners was a game-changer for our company. Their expertise in financial process automation and bookkeeping helped us cut down on errors and saved us valuable time, allowing us to focus on growing our business. Their team is highly professional and committed to our success."</p>
          <p class="review-card__author" style="font-size: 15px;">— Amit Rahman, CFO at Tech Innovations Ltd.</p>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="review-card animate__animated animate__fadeInUp animate__delay-1s">
          <div class="review-card__avatar">
            <img src="{{ asset('images/avatars/avatar2.svg') }}" alt="Avatar">
          </div>
          <p class="review-card__text" style="font-size: 15px; font-style: italic; font-family: 'Georgia', serif;">"We were struggling with resource constraints until we partnered with Top Outsourcing Partners. They offered scalable outsourcing solutions that allowed us to expand without the cost of additional in-house staff. Thanks to their support, we’ve been able to increase our client base and streamline operations."</p>
          <p class="review-card__author" style="font-size: 15px;">— Sarah Patel, Senior Partner</p>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="review-card animate__animated animate__fadeInUp animate__delay-2s">
          <div class="review-card__avatar">
            <img src="{{ asset('images/avatars/avatar3.svg') }}" alt="Avatar">
          </div>
          <p class="review-card__text" style="font-size: 15px; font-style: italic; font-family: 'Georgia', serif;">"The team at Top Outsourcing Partners introduced us to AI-powered financial tools that drastically improved our efficiency. Automating our reporting processes has not only saved us time but has also improved accuracy and compliance with regulatory standards. We’re seeing better financial insights, and our decision-making process has improved."</p>
          <p class="review-card__author" style="font-size: 15px;">— Emily Carter, Founder & CEO</p>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="review-card animate__animated animate__fadeInUp animate__delay-3s">
          <div class="review-card__avatar">
            <img src="{{ asset('images/avatars/avatar4.svg') }}" alt="Avatar">
          </div>
          <p class="review-card__text" style="font-size: 15px; font-style: italic; font-family: 'Georgia', serif;">"As a small business, managing our financials was a challenge. After partnering with Top Outsourcing Partners for bookkeeping services, we no longer have to worry about financial mismanagement. Their team handled our day-to-day finances, which allowed us to concentrate on what we do best."</p>
          <p class="review-card__author" style="font-size: 15px;">— Sarah Sultana, Founder of Sultana Design Studios</p>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="review-card animate__animated animate__fadeInUp animate__delay-4s">
          <div class="review-card__avatar">
            <img src="{{ asset('images/avatars/avatar5.svg') }}" alt="Avatar">
          </div>
          <p class="review-card__text" style="font-size: 15px; font-style: italic; font-family: 'Georgia', serif;">"Top Outsourcing Partners has been crucial in helping us scale our operations. Their CFO services provided us with the financial insights and strategic advice we needed to make smart, data-driven decisions. Our growth has accelerated since partnering with them, and we continue to benefit from their expertise."</p>
          <p class="review-card__author" style="font-size: 15px;">— John Peterson, CEO at MetroTech Solutions</p>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="review-card animate__animated animate__fadeInUp animate__delay-5s">
          <div class="review-card__avatar">
            <img src="{{ asset('images/avatars/avatar6.svg') }}" alt="Avatar">
          </div>
            <p class="review-card__text" style="font-size: 15px; font-style: italic; font-family: 'Georgia', serif;">"Switching to QuickBooks with the help of Top Outsourcing Partners was seamless. They ensured that all our data was accurately transferred, and the transition was completed with minimal downtime. Their support has improved our operational efficiency, and we now have more control over our financial processes."</p>
          <p class="review-card__author" style="font-size: 15px;">— Emily Martinez, CFO at Greenfield Enterprises</p>
        </div>
      </div>
    </div>
  </div>
      </div>
      <!-- <div class="swiper-slide">
        <div class="review-card animate__animated animate__fadeInUp animate__delay-6s">
          <div class="review-card__avatar">
            <img src="{{ asset('images/avatars/avatar7.svg') }}" alt="Avatar">
          </div>
          Another inspiring story of success from our graduates.
        </div>
      </div> -->
      <!-- <div class="swiper-slide">
        <div class="review-card animate__animated animate__fadeInUp animate__delay-7s">
          <div class="review-card__avatar">
            <img src="{{ asset('images/avatars/avatar8.svg') }}" alt="Avatar">
          </div>
          Discover how our students achieved their dreams.
        </div>
      </div> -->
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
      1024: { slidesPerView: 3 }, // For larger screens
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
