<section class="services-section">
<svg class="services-section-svg" viewBox="0 0 1200 300" preserveAspectRatio="none" aria-hidden="true" focusable="false">
  <!-- path: top dome, flat bottom -->
  <path d="M0 300 L0 160 Q600 30 1200 160 L1200 300 Z" fill="#E6F9FF"/>
</svg>

    <div class="container">
        <h2 class="section-title text-center mb-5 animate__animated animate__fadeIn">Transform your business with us</h2>

        <p class="section-desc text-center">
            {{ __('Welcome to Top Outsourcing Partners, your trusted partner for efficient, scalable, and innovative outsourcing solutions. With years of industry expertise, we empower businesses to achieve operational excellence, reduce costs, and drive growth by leveraging cutting-edge technology and skilled professionals. Whether you\'re a small business or a global enterprise, we\'re here to unlock your potential.') }}
        </p>

        <h2 class="section-subtitle text-center mb-5 animate__animated animate__fadeIn">OUR KEY SERVICES</h2>

        <div class="row justify-content-center">
            @foreach($services ?? [] as $service)
            <div class="col-md-4 d-flex align-items-stretch mb-4">
                <div class="service-card-wrapper animate__animated animate__fadeInUp w-100 delay-{{ $loop->index }}">
                    @include('components.service-card', ['service' => $service])
                </div>
            </div>

            @if(($loop->index + 1) % 3 == 0 && !$loop->last)
        </div>
        <div class="row justify-content-center">
            @endif
            @endforeach
        </div>

        <div class="text-center mt-5">
            <a href="{{ url('/consult') }}" class="btn-primary">Optimize Your Business Today!</a>
        </div>
    </div>
</section>
