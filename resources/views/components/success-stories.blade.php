<section class="success-stories-section">
    <svg class="success-stories-svg" viewBox="0 0 1200 300" preserveAspectRatio="none" aria-hidden="true" focusable="false">
        <path d="M0 300 L0 160 Q600 30 1200 160 L1200 300 Z" fill="#F6FFC6"/>
    </svg>

    <div class="container">
        <div class="success-stories-heading">
            <h2>Why Our Clients Stick With Us?</h2>
            <p>
                Meet our clients who have worked with us to achieve their business goals. Get inspired by the journeys of businesses that have successfully scaled their operations, streamlined their processes, and transformed their financial strategies with our support and expertise.
            </p>
        </div>

        <div class="swiper-container">
            <div class="swiper-wrapper">
                @php
                    $reviews = [
                        [
                            'avatar' => 'avatar1.svg',
                            'text' => 'We have been working with Top Outsourcing Partners for the past four years and couldn\'t be happier with their services. Their team has consistently delivered outstanding solutions across bookkeeping, accounting, payroll, and Employer of Record (EOR) services. Highly reliable, responsive, flexible, and professional — TOP has proven to be a trusted partner. Plus, their services were provided at only 30% of the cost compared to our previous outsourcing firms in London and Dallas.',
                            'author' => '— Faz Karim, Director - Marketing & Stakeholder Engagement, Pink Squid.',
                            'highlighted' => true
                        ],
                        [
                            'avatar' => 'avatar2.svg',
                            'text' => 'It is a pleasure to acknowledge the outstanding contributions of Top Outsourcing Partners over the past seven years. Their energetic team has been instrumental in managing our bookkeeping, accounting, and financial reporting, allowing us to focus on our core business activities like merchandising, marketing, and sales. With service costs at just 40% of the industry average, TOP has helped us achieve significant savings, enhancing our competitiveness in a highly challenging market.',
                            'author' => '— Avijit Samanta, Head of Finance, VIP Bags'
                        ],
                        [
                            'avatar' => 'avatar3.svg',
                            'text' => 'Since 2011, Top Outsourcing Partners has consistently delivered a positive and proactive experience, supporting us in bookkeeping, accounting, internal audits, investigation, and compliance services. Their commitment to maintaining financial transparency, cost-effectiveness, and healthy records has strengthened our company’s operational foundation. Their team\'s proactive approach has been a key factor in keeping our financial affairs compliant and risk-free.',
                            'author' => '— Ashok Yadav, Head of Finance, PDS Group'
                        ],
                        [
                            'avatar' => 'avatar4.svg',
                            'text' => 'As a small business, managing our financials was a challenge. After partnering with Top Outsourcing Partners for bookkeeping services, we no longer have to worry about financial mismanagement. Their team handled our day-to-day finances, which allowed us to concentrate on what we do best.',
                            'author' => '— Arvind Kumar, Team Lead - Finance, Netcom Learning'
                        ],
                        [
                            'avatar' => 'avatar5.svg',
                            'text' => 'Top Outsourcing Partners has been crucial in helping us scale our operations. Their CFO services provided us with the financial insights and strategic advice we needed to make smart, data-driven decisions. Our growth has accelerated since partnering with them, and we continue to benefit from their expertise.',
                            'author' => '— John Peterson, CEO at MetroTech Solutions'
                        ],
                        [
                            'avatar' => 'avatar6.svg',
                            'text' => 'Switching to QuickBooks with the help of Top Outsourcing Partners was seamless. They ensured that all our data was accurately transferred, and the transition was completed with minimal downtime. Their support has improved our operational efficiency, and we now have more control over our financial processes.',
                            'author' => '— Emily Martinez, CFO at Greenfield Enterprises'
                        ]
                    ];
                @endphp

                @foreach($reviews as $review)
                    <div class="swiper-slide">
                        <div class="review-card {{ $review['highlighted'] ?? false ? 'review-card--highlighted' : '' }}">
                            <div class="review-card__avatar">
                                <img src="{{ asset('images/avatars/' . $review['avatar']) }}" alt="Avatar">
                            </div>
                            <p class="review-card__text">"{{ $review['text'] }}"</p>
                            <p class="review-card__author">{{ $review['author'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
<script>
    const swiper = new Swiper('.swiper-container', {
        slidesPerView: 2.3, // 2 full + partial left/right
        centeredSlides: true,
        spaceBetween: 50,
        loop: true,
        autoplay: {
            delay: 5000, // 5 seconds
            disableOnInteraction: false // keeps autoplay even if user interacts
        },
        breakpoints: {
            1024: { slidesPerView: 2.3 },
            768: { slidesPerView: 1.3 },
            480: { slidesPerView: 1 }
        }
    });
</script>

