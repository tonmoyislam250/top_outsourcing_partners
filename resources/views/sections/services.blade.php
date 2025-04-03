<section class="services-section">
    <div class="container">
        <h2 class="section-title text-center mb-5 animate__animated animate__fadeIn" style="font-weight: bold;">Transform your business with us</h2>
        <p class="text-center">{{ __('Welcome to TopOutsourcingPartners, your trusted partner for efficient, scalable, and innovative outsourcing solutions. With years of industry expertise, we empower businesses to achieve operational excellence, reduce costs, and drive growth by leveraging cutting-edge technology and skilled professionals. Whether you\'re a small business or a global enterprise, we\'re here to unlock your potential.') }}</p>
        <h2 class="section-title text-center mb-5 animate__animated animate__fadeIn" style="font-weight: bold;">OUR KEY SERVICES</h2>
        <div class="row">
            @foreach($services ?? [] as $service)
            <div class="col-md-4 mb-4">
                <div class="service-card animate__animated animate__fadeInUp" style="animation-delay: {{ 0.15 * $loop->index }}s">
                    @include('components.service-card', ['service' => $service])
                </div>
            </div>
            @if(($loop->index + 1) % 3 == 0 && !$loop->last)
        </div>
        <div class="row">
            @endif
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="{{ url('/consult') }}" class="btn-primary" style="padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;">Optimize Your Business Today!</a>
        </div>
    </div>
</section>