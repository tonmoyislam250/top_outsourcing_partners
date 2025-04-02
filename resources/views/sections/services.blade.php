<section class="services" style="margin: 20px;">
    <div class="services-header" style="margin-bottom: 20px;">
        <h2>OUR KEY SERVICES</h2>
    </div>

    <div class="services-grid" style="margin-bottom: 20px;">
        @foreach($services as $service)
            @include('components.service-card', ['service' => $service])
        @endforeach
    </div>

    <div class="call-to-action" style="margin-top: 30px; text-align: center;">
        <a href="{{ url('/consult') }}" class="btn-primary" style="padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;">Optimize Your Business Today!</a>
    </div>
</section>