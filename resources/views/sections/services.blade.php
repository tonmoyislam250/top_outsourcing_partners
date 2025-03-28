<section class="services" style="margin: 20px;">
    <div class="services-header" style="margin-bottom: 20px;">
        <h2>OUR KEY SERVICES</h2>
    </div>

    <div class="services-grid" style="margin-bottom: 20px;">
        @foreach($services as $service)
            @include('components.service-card', ['service' => $service])
        @endforeach
    </div>

    <div class="cta" style="margin-top: 20px;">
        <a href="{{ url('/consult') }}" class="btn">Optimize Your Business Today!</a>
    </div>
</section>